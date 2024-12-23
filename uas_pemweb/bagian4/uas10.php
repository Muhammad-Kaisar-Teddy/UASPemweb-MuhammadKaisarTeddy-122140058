<?php
session_start(); // Memulai sesi

// Periksa apakah page2_count telah diinisialisasi
if (!isset($_SESSION['page2_count'])) {
    $_SESSION['page2_count'] = 0; // Inisialisasi nilai
}

// Tambahkan hitungan
$_SESSION['page2_count']++;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page 2</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f8f9fa;
        }

        .navigation {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .navigation a {
            text-decoration: none;
            padding: 10px 20px;
            background: #007bff;
            color: #fff;
            border-radius: 4px;
            transition: background 0.3s;
        }

        .navigation a:hover {
            background: #0056b3;
        }

        .description {
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            margin: 20px 0;
        }

        .container {
            text-align: center;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        h1 {
            margin-bottom: 20px;
        }

        p {
            font-size: 16px;
            margin-top: 20px;
        }

        .btn-back {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 16px;
            text-decoration: none;
            background-color: #007bff;
            color: white;
            border-radius: 4px;
            transition: 0.3s;
        }

        .btn-back:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <!-- Tombol Navigasi -->
    <div class="navigation">
        <a href="../Bagian2/uas5.php">&larr; Sebelumnya</a>
        <a href="uas11.php">Selanjutnya &rarr;</a>
    </div>

    <!-- Keterangan Tengah -->
    <div class="description">4.1 : State Management dengan Session</div>

    <!-- Konten Utama -->
    <div class="container">
        <h1>Welcome to Page 2</h1>
        <p>Anda telah mengunjungi halaman ini sebanyak <strong><?php echo $_SESSION['page2_count']; ?></strong> kali.</p>
        <a href="uas9.php" class="btn-back">Go back to Page 1</a>
    </div>
</body>

</html>
