<?php
session_start();
require 'db.php';

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$id = $_GET['id'];

$stmt = $conn->prepare("DELETE FROM teams WHERE id=?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    header("Location: generate_report.php");
    exit();
} else {
    echo "Failed to delete the team.";
}

$conn->close();
?>
