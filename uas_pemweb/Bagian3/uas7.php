<?php
class Koneksi
{
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "uas_pemweb";
    private $conn;

    public function getConnection()
    {
        if ($this->conn == null) {
            $this->conn = new mysqli($this->host, $this->username, $this->password, $this->dbname);

            if ($this->conn->connect_error) {
                die("Koneksi gagal: " . $this->conn->connect_error);
            }
        }
        return $this->conn;
    }
}
?>