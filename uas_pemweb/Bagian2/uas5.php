<?php
require_once 'produkcontroller.php';

// Inisialisasi controller
$produkController = new ProdukController('localhost', 'root', '', 'uas_pemweb');

// Proses tambah produk
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'add') {
    $kode_produk = htmlspecialchars($_POST['kode_produk']);
    $nama_produk = htmlspecialchars($_POST['nama_produk']);
    $harga = htmlspecialchars($_POST['harga']);
    $informasi_browser = $_SERVER['HTTP_USER_AGENT'];
    $alamat_ip = $_SERVER['REMOTE_ADDR'];

    $produkController->tambahProduk($kode_produk, $nama_produk, $harga, $informasi_browser, $alamat_ip);
    header("Location: " . $_SERVER['PHP_SELF']); // Refresh halaman setelah menambah produk
    exit();
}

// Mendapatkan semua produk
$dataProduk = $produkController->getProduk();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Produk</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f8f9fa;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .navigation {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
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

        .description {
            text-align: center;
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 20px;
            color: #000;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th,
        table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        table th {
            background-color: #6f42c1;
            color: white;
        }

        .form-container {
            margin-top: 20px;
            background: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
        }

        .form-container h3 {
            margin-bottom: 15px;
        }

        .form-container label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-container input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-container button {
            padding: 10px 20px;
            border: none;
            background: #6f42c1;
            color: white;
            border-radius: 4px;
            cursor: pointer;
        }

        .form-container button:hover {
            background: #5a33a7;
        }
    </style>
</head>

<body>
    <div class="navigation">
        <a href="uas4.php">&larr; Sebelumnya</a>
        <a href="../bagian4/uas9.php">Next &rarr;</a>
    </div>

    <div class="description">2.2 : Objek PHP berbasis OOP</div>

    <div class="container">
        <h2>Daftar Produk</h2>
        <table>
            <thead>
                <tr>
                    <th>Kode Produk</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Informasi Browser</th>
                    <th>Alamat IP</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($dataProduk)) : ?>
                    <?php foreach ($dataProduk as $produk) : ?>
                        <tr>
                            <td><?= $produk['kode_produk'] ?></td>
                            <td><?= $produk['nama_produk'] ?></td>
                            <td><?= $produk['harga'] ?></td>
                            <td><?= $produk['informasibrowser'] ?></td>
                            <td><?= $produk['alamatip'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="5">Tidak ada data produk.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <!-- Form Tambah Produk -->
        <div class="form-container">
            <h3>Tambah Produk Baru</h3>
            <form method="POST">
                <input type="hidden" name="action" value="add">
                <label for="kode_produk">Kode Produk</label>
                <input type="text" id="kode_produk" name="kode_produk" required>

                <label for="nama_produk">Nama Produk</label>
                <input type="text" id="nama_produk" name="nama_produk" required>

                <label for="harga">Harga Produk</label>
                <input type="number" id="harga" name="harga" required>

                <button type="submit">Tambahkan</button>
            </form>
        </div>
    </div>
</body>

</html>
