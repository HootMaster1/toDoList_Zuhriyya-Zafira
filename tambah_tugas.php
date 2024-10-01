<?php
session_start(); 
include 'config.php';

$task_name = $_POST['task_name'];
$status = $_POST['status'];
$deadline = $_POST['deadline'];

if (empty($task_name) || empty($status) || empty($deadline)) {
    echo "Semua field harus diisi!";
    exit();
}

$stmt = $conn->prepare("INSERT INTO tasks (task_name, status, deadline) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $task_name, $status, $deadline);

if ($stmt->execute() === TRUE) {
    $_SESSION['message'] = "Tugas berhasil ditambahkan!";
    header("Location: allUser.php");
    exit();
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
