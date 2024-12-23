<?php
class ProdukController {
    private $conn;

    // Konstruktor untuk mengatur koneksi database
    public function __construct($host, $user, $password, $database) {
        $this->conn = new mysqli($host, $user, $password, $database);
        if ($this->conn->connect_error) {
            die("Koneksi gagal: " . $this->conn->connect_error);
        }
    }

    // Metode untuk mendapatkan semua produk
    public function getProduk() {
        $sql = "SELECT * FROM produk";
        $result = $this->conn->query($sql);
        $data = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    // Metode untuk menambah produk baru
    public function tambahProduk($kode_produk, $nama_produk, $harga, $informasi_browser, $alamat_ip) {
        $sql = "INSERT INTO produk (kode_produk, nama_produk, harga, informasibrowser, alamatip) 
                VALUES ('$kode_produk', '$nama_produk', '$harga', '$informasi_browser', '$alamat_ip')";
        return $this->conn->query($sql);
    }
}
