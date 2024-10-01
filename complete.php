<?php
session_start();
include 'config.php';

$id = $_GET['id'];

$stmt = $conn->prepare("UPDATE tasks SET status='completed' WHERE id=?");
$stmt->bind_param("i", $id);

if ($stmt->execute() === TRUE) {
    $_SESSION['message'] = "Tugas berhasil diselesaikan!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();

header("Location: allUser.php");
exit();
?>
