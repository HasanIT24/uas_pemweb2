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
        form {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
        }
        form div {
            margin-bottom: 15px;
        }
        label {
            display: inline-block;
            width: 100px;
        }
        input, select, button {
            padding: 8px;
            width: calc(100% - 110px);
        }
        button {
            width: auto;
        }
        .center {
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>UEFA EURO 2024</h1>
    <h2>Masukkan Data Tim</h2>
    <form method="POST" action="insertdata.php">
        <div>
            <label for="group_id">Group:</label>
            <select name="group_id" id="group_id" required>
                <option value="1">A</option>
                <option value="2">B</option>
                <option value="3">C</option>
                <option value="4">D</option>
            </select>
        </div>
        <div>
            <label for="name">Nama Negara:</label>
            <select name="name" id="name" required>
                <option value="Spanyol">Spanyol</option>
                <option value="Italia">Italia</option>
                <option value="Kroasia">Kroasia</option>
                <option value="Albania">Albania</option>

            </select>
        </div>
        <div>
            <label for="wins">Menang:</label>
            <input type="number" name="wins" id="wins" min="0" required>
        </div>
        <div>
            <label for="draws">Seri:</label>
            <input type="number" name="draws" id="draws" min="0" required>
        </div>
        <div>
            <label for="losses">Kalah:</label>
            <input type="number" name="losses" id="losses" min="0" required>
        </div>
        <div class="center">
            <button type="submit">Masukkan</button>
        </div>
    </form>
    <h2 class="center">Laporan</h2>
    <div class="center">
        <a href="generate_report.php">Lihat Laporan</a>
    </div>
</body>
</html>
