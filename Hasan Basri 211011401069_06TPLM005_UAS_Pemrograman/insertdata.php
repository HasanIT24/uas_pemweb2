<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $group_id = $_POST['group_id'];
    $name = $_POST['name'];
    $wins = $_POST['wins'];
    $draws = $_POST['draws'];
    $losses = $_POST['losses'];

    // Cek apakah group_id valid
    $query = "SELECT * FROM groups WHERE id='$group_id'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $query = "INSERT INTO teams (group_id, name, wins, draws, losses) VALUES ('$group_id', '$name', '$wins', '$draws', '$losses')";
        if ($conn->query($query) === TRUE) {
            echo "Data berhasil dimasukkan!";
        } else {
            echo "Error: " . $query . "<br>" . $conn->error;
        }
    } else {
        echo "Group ID tidak valid.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Tim</title>
</head>
<body>
    <a href="index.php">Kembali</a>
</body>
</html>
