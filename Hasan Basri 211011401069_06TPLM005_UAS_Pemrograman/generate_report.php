<!DOCTYPE html>
<html>
<head>
    <title>UEFA EURO 2024</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h1, h2 {
            text-align: center;
        }
        form, .table-container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f4f4f4;
        }
        .center {
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>UEFA EURO 2024</h1>
    <h2>Select Group</h2>
    <form method="POST" action="">
        <div class="center">
            <label for="group_id">Group:</label>
            <select name="group_id" id="group_id" required>
                <option value="1">A</option>
                <option value="2">B</option>
                <option value="3">C</option>
                <option value="4">D</option>
            </select>
            <button type="submit">Show Group</button>
        </div>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        require 'db.php';

        $group_id = $_POST['group_id'];

        $query = "SELECT * FROM teams WHERE group_id='$group_id' ORDER BY points DESC, name ASC";
        $result = $conn->query($query);

        echo "<h2>Group " . chr(64 + $group_id) . "</h2>";
        echo "<div class='table-container'>";
        echo "<table>
                <tr>
                    <th>Tim</th>
                    <th>Menang</th>
                    <th>Seri</th>
                    <th>Kalah</th>
                    <th>Poin</th>
                    <th>Aksi</th>
                </tr>";

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['name']}</td>
                        <td>{$row['wins']}</td>
                        <td>{$row['draws']}</td>
                        <td>{$row['losses']}</td>
                        <td>{$row['points']}</td>
                        <td>    
                            <a href='edit_team.php?id={$row['id']}'>Edit</a> | 
                            <a href='delete_team.php?id={$row['id']}' onclick='return confirm(\"Are you sure you want to delete this team?\")'>Delete</a>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr>
                    <td colspan='6'>No data available for this group.</td>
                  </tr>";
        }
        echo "</table>";
        echo "</div>";

        $conn->close();
    }
    ?>
</body>
</html>
