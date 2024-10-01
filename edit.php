<?php
session_start();
include 'config.php';

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $task_name = $_POST['task_name'];
    $status = $_POST['status'];
    $deadline = $_POST['deadline'];

    $stmt = $conn->prepare("UPDATE tasks SET task_name=?, status=?, deadline=? WHERE id=?");
    $stmt->bind_param("sssi", $task_name, $status, $deadline, $id);

    if ($stmt->execute() === TRUE) {
        $_SESSION['message'] = "Tugas berhasil diperbarui!";
        header("Location: allUser.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
}

$stmt = $conn->prepare("SELECT * FROM tasks WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$task = $result->fetch_assoc();
$stmt->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Tugas</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f0f2f5;
            font-family: Arial, sans-serif;
        }
        .container {
            margin-top: 50px;
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            padding: 30px;
            border-radius: 10px;
            max-width: 600px;
            margin: 0 auto;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Edit Tugas</h2>
    <form action="" method="post">
        <div class="form-group">
            <label for="task_name">Nama Tugas:</label>
            <input type="text" id="task_name" name="task_name" class="form-control" value="<?php echo $task['task_name']; ?>" required>
        </div>
        <div class="form-group">
            <label for="status">Status:</label>
            <select id="status" name="status" class="form-control" required>
                <option value="pending" <?php if($task['status'] == 'pending') echo 'selected'; ?>>Pending</option>
                <option value="completed" <?php if($task['status'] == 'completed') echo 'selected'; ?>>Completed</option>
            </select>
        </div>
        <div class="form-group">
            <label for="deadline">Deadline:</label>
            <input type="date" id="deadline" name="deadline" class="form-control" value="<?php echo $task['deadline']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Perbarui</button>
    </form>
</div>
</body>
</html>
