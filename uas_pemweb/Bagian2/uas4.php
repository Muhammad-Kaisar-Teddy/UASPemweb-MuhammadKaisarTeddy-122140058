<?php
// Koneksi ke database
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'uas_pemweb';

$conn = mysqli_connect($host, $user, $password, $database);

// Periksa koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Membuat tabel (jika belum ada)
$tableQuery = "
CREATE TABLE IF NOT EXISTS produk (
    kode_produk VARCHAR(100) PRIMARY KEY,
    nama_produk VARCHAR(100) NOT NULL,
    harga INT NOT NULL,
    informasibrowser VARCHAR(255) NOT NULL,
    alamatip VARCHAR(45) NOT NULL
)";
mysqli_query($conn, $tableQuery);

// Proses tambah, edit, dan hapus data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $kode_produk = htmlspecialchars($_POST['kode_produk'] ?? '');
    $nama_produk = htmlspecialchars($_POST['nama_produk'] ?? '');
    $harga_produk = htmlspecialchars($_POST['harga_produk'] ?? '');

    // Dapatkan informasi browser dan alamat IP
    $informasi_browser = $_SERVER['HTTP_USER_AGENT'];
    $alamat_ip = $_SERVER['REMOTE_ADDR'];

    if (isset($_POST['action']) && $_POST['action'] === 'add') {
        // Tambah data baru
        $insertQuery = "INSERT INTO produk (kode_produk, nama_produk, harga, informasibrowser, alamatip) 
                        VALUES ('$kode_produk', '$nama_produk', '$harga_produk', '$informasi_browser', '$alamat_ip')";
        if (mysqli_query($conn, $insertQuery)) {
            header("Location: " . $_SERVER['PHP_SELF']);
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } elseif (isset($_POST['action']) && $_POST['action'] === 'edit') {
        // Edit data
        $updateQuery = "UPDATE produk SET 
                        nama_produk='$nama_produk', harga='$harga_produk' 
                        WHERE kode_produk='$kode_produk'";
        if (mysqli_query($conn, $updateQuery)) {
            header("Location: " . $_SERVER['PHP_SELF']);
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } elseif (isset($_POST['action']) && $_POST['action'] === 'delete') {
        // Hapus data
        $kode_produk = htmlspecialchars($_POST['kode_produk']);
        $deleteQuery = "DELETE FROM produk WHERE kode_produk='$kode_produk'";
        if (mysqli_query($conn, $deleteQuery)) {
            header("Location: " . $_SERVER['PHP_SELF']);
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Produk</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f8f9fa;
        }

        .container {
            max-width: 600px;
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

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-actions {
            text-align: center;
            margin-top: 15px;
        }

        .form-actions button {
            padding: 10px 20px;
            border: none;
            background: #6f42c1;
            color: white;
            border-radius: 4px;
            cursor: pointer;
        }

        .form-actions button:hover {
            background: #5a33a7;
        }

        .description {
            text-align: center;
            font-size: 16px;
            color: #000;
            /* Warna teks hitam */
            font-weight: bold;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="navigation">
        <a href="../Bagian1/Event Handling/uas3.html">&larr; Sebelumnya</a>
        <a href="uas5.php">Next &rarr;</a>
    </div>

    <div class="description">2.1 : Pengelolaan Data Dengan PHP</div>

    <div class="container">
        <?php if (!isset($_POST['edit']) && !isset($_POST['new'])): ?>
            <h2>Daftar Produk</h2>
            <table>
                <thead>
                    <tr>
                        <th>Kode Produk</th>
                        <th>Nama Produk</th>
                        <th>Harga Produk</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $selectQuery = "SELECT * FROM produk";
                    $result = mysqli_query($conn, $selectQuery);
                    if (mysqli_num_rows($result) > 0):
                        while ($row = mysqli_fetch_assoc($result)): ?>
                            <tr>
                                <td><?= $row['kode_produk'] ?></td>
                                <td><?= $row['nama_produk'] ?></td>
                                <td><?= $row['harga'] ?></td>
                                <td>
                                    <form method="POST" style="display:inline;">
                                        <input type="hidden" name="kode_produk" value="<?= $row['kode_produk'] ?>">
                                        <button type="submit" name="edit" value="edit">Edit</button>
                                    </form>
                                    <form method="POST" style="display:inline;">
                                        <input type="hidden" name="kode_produk" value="<?= $row['kode_produk'] ?>">
                                        <input type="hidden" name="action" value="delete">
                                        <button type="submit" onclick="return confirm('Hapus data ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4">Tidak ada data produk.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
            <form method="POST">
                <button type="submit" name="new" value="new">Tambah Data Baru</button>
            </form>
        <?php else: ?>
            <h2><?= isset($_POST['edit']) ? 'Edit Produk' : 'Tambah Produk Baru' ?></h2>
            <form method="POST">
                <div class="form-group">
                    <label for="kode_produk">Kode Produk</label>
                    <input type="text" id="kode_produk" name="kode_produk"
                        value="<?= isset($_POST['edit']) ? $_POST['kode_produk'] : '' ?>" required>
                </div>
                <div class="form-group">
                    <label for="nama_produk">Nama Produk</label>
                    <input type="text" id="nama_produk" name="nama_produk" required>
                </div>
                <div class="form-group">
                    <label for="harga_produk">Harga Produk</label>
                    <input type="number" id="harga_produk" name="harga_produk" required>
                </div>
                <?php if (isset($_POST['edit'])): ?>
                    <input type="hidden" name="action" value="edit">
                <?php else: ?>
                    <input type="hidden" name="action" value="add">
                <?php endif; ?>
                <div class="form-actions">
                    <button type="submit"><?= isset($_POST['edit']) ? 'Simpan Perubahan' : 'Tambahkan' ?></button>
                </div>
            </form>
        <?php endif; ?>
    </div>
</body>

</html>
