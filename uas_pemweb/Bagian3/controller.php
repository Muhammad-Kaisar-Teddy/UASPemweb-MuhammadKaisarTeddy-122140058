<?php
class MatakuliahController extends Koneksi {
    public function getMatakuliah() {
        $conn = $this->getConnection();
        $sql = "SELECT * FROM matakuliah";
        $result = $conn->query($sql);

        $data = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function addMatakuliah($kode, $namamk, $pengampu) {
        $conn = $this->getConnection();
        $sql = "INSERT INTO matakuliah (kode, namamk, pengampu) VALUES ('$kode', '$namamk', '$pengampu')";
        return $conn->query($sql);
    }

    public function updateMatakuliah($kode, $namamk, $pengampu) {
        $conn = $this->getConnection();
        $sql = "UPDATE matakuliah SET namamk='$namamk', pengampu='$pengampu' WHERE kode='$kode'";
        return $conn->query($sql);
    }

    public function deleteMatakuliah($kode) {
        $conn = $this->getConnection();
        $sql = "DELETE FROM matakuliah WHERE kode='$kode'";
        return $conn->query($sql);
    }
}
?>
