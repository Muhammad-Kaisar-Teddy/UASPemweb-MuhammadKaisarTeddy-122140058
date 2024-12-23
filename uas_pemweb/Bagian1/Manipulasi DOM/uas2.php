<?php
include 'config.php';
$mahasiswa = mysqli_query($conn, "SELECT * FROM users");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            text-align: center;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        .navigation {
            display: flex;
            justify-content: space-between;
            margin: 20px auto;
            width: 80%;
            max-width: 600px;
        }

        .navigation a {
            text-decoration: none;
            padding: 10px 20px;
            background: #6f42c1;
            color: #fff;
            border-radius: 4px;
            transition: background 0.3s;
        }

        .navigation a:hover {
            background: #5a33a7;
        }

        .title {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="navigation">
        <a href="uas1.html">&larr; Sebelumnya</a>
        <a href="../Event Handling/uas3.html">Next &rarr;</a>
    </div>
    <div class="title">Bagian 1.2: Tabel Database</div>
    <table border="1">
        <tr>
            <th>No</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Prodi</th>
        </tr>
        <?php foreach ($mahasiswa as $key => $row): ?>
            <tr>
                <td><?php echo $key + 1; ?></td>
                <td><?php echo $row['nim']; ?></td>
                <td><?php echo $row['nama']; ?></td>
                <td><?php echo $row['prodi']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>