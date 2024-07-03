<?php
session_start();
require 'db.php';

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $wins = $_POST['wins'];
    $draws = $_POST['draws'];
    $losses = $_POST['losses'];
    $points = $_POST['points'];

    $stmt = $conn->prepare("UPDATE teams SET name=?, wins=?, draws=?, losses=?, points=? WHERE id=?");
    $stmt->bind_param("siiiii", $name, $wins, $draws, $losses, $points, $id);

    if ($stmt->execute()) {
        header("Location: generate_report.php");
        exit();
    } else {
        $error = "Failed to update the team.";
    }
}

$query = $conn->prepare("SELECT * FROM teams WHERE id=?");
$query->bind_param("i", $id);
$query->execute();
$result = $query->get_result();

if ($result->num_rows > 0) {
    $team = $result->fetch_assoc();
} else {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Edit Team</title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center">Edit Team</h2>
                <?php if (isset($error)) : ?>
                    <div class="alert alert-danger"><?php echo $error; ?></div>
                <?php endif; ?>
                <form method="POST" action="">
                    <div class="mb-3">
                        <label for="name" class="form-label">Team Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $team['name']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="wins" class="form-label">Wins</label>
                        <input type="number" class="form-control" id="wins" name="wins" value="<?php echo $team['wins']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="draws" class="form-label">Draws</label>
                        <input type="number" class="form-control" id="draws" name="draws" value="<?php echo $team['draws']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="losses" class="form-label">Losses</label>
                        <input type="number" class="form-control" id="losses" name="losses" value="<?php echo $team['losses']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="points" class="form-label">Points</label>
                        <input type="number" class="form-control" id="points" name="points" value="<?php echo $team['points']; ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

<?php
$conn->close();
?>
