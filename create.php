<!DOCTYPE html>
<html>
<head>
    <title>Tambah Tugas Baru</title>
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
        .form-table {
            width: 100%;
            margin: 0 auto;
            border-collapse: separate;
            border-spacing: 0 15px;
        }
        .form-table th, .form-table td {
            padding: 10px;
            text-align: left;
        }
        .form-table th {
            border: 2px solid #0056b3;
            border-radius: 10px;
            background-color: #ffffff;
            color: #0056b3;
        }
        .form-table td {
            background-color: #f0f2f5;
            color: #333;
        }
        .btn-primary {
            background-color: #0056b3;
            border-color: #0056b3;
            color: #ffffff;
            display: block;
            width: fit-content;
            margin: 20px auto 0;
            padding: 10px 20px;
            border-radius: 5px;
        }
        .form-control {
            border: 1px solid #000000;
        }
        label {
            color: #000000;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Tambah Tugas Baru</h2>
    <form action="tambah_tugas.php" method="post">
        <table class="form-table">
            <tr>
                <th><label for="task_name">Nama Tugas:</label></th>
                <td><input type="text" id="task_name" name="task_name" class="form-control" required></td>
            </tr>
            <tr>
                <th><label for="status">Status:</label></th>
                <td>
                    <select id="status" name="status" class="form-control" required>
                        <option value="pending">Pending</option>
                        <option value="completed">Completed</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th><label for="deadline">Deadline:</label></th>
                <td><input type="date" id="deadline" name="deadline" class="form-control" required></td>
            </tr>
        </table>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
    <?php
    if (isset($_SESSION['message'])) {
        echo "<div class='alert alert-info'>".$_SESSION['message']."</div>";
        unset($_SESSION['message']);
    }
    ?>
</div>
</body>
</html>
