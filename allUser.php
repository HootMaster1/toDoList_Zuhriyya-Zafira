<?php
session_start();
include 'config.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>To-Do List</title>
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
            max-width: 800px;
            margin: 0 auto;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        table {
            width: 100%;
            margin: 0 auto;
            border-collapse: separate;
            border-spacing: 0 15px;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            border: 2px solid #0056b3;
            border-radius: 10px;
            background-color: #ffffff;
            color: #0056b3;
        }
        td {
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
        .btn {
            border-radius: 5px;
            padding: 5px 10px;
            margin-right: 5px;
        }
        .btn-detail {
            background-color: #007bff;
            color: #ffffff;
        }
        .btn-edit {
            background-color: #28a745;
            color: #ffffff;
        }
        .btn-delete {
            background-color: #dc3545;
            color: #ffffff;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Daftar Tugas</h2>
    <?php
    // Menampilkan pesan jika ada
    if (isset($_SESSION['message'])) {
        echo "<div class='alert alert-success'>" . $_SESSION['message'] . "</div>";
        unset($_SESSION['message']); // Menghapus pesan setelah ditampilkan
    }
    ?>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Tugas</th>
                <th>Status</th>
                <th>Deadline</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM tasks";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['task_name'] . "</td>";
                    echo "<td>" . $row['status'] . "</td>";
                    echo "<td>" . $row['deadline'] . "</td>";
                    echo "<td>
                            <a href='complete.php?id=" . $row['id'] . "' class='btn btn-detail'>Selesaikan</a>
                            <a href='edit.php?id=" . $row['id'] . "' class='btn btn-edit'>Edit</a>
                            <a href='delete.php?id=" . $row['id'] . "' class='btn btn-delete' onclick='return confirm(\"Apakah Anda yakin?\")'>Hapus</a>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5' class='text-center'>Tidak ada tugas yang ditemukan.</td></tr>";
            }
            $conn->close();
            ?>
        </tbody>
    </table>
    <a href="create.php" class="btn btn-primary">Tambah Tugas</a>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
