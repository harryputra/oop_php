<?php
<?php
class Siswa {
    private $db;
    private $table = 'Siswa';

    public function __construct($db) {
        $this->db = $db;
    }

    // Fungsi untuk menambahkan siswa
    public function tambahSiswa($nisn, $nama, $alamat) {
        $query = "INSERT INTO {$this->table} (nisn, nama_lengkap, alamat) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("sss", $nisn, $nama, $alamat);
        return $stmt->execute();
    }

    // Fungsi untuk mendapatkan semua siswa
    public function getSiswa() {
        $query = "SELECT * FROM {$this->table}";
        return $this->db->query($query);
    }

    // Fungsi untuk mendapatkan siswa berdasarkan id
    public function getSiswaById($id_siswa) {
        $query = "SELECT * FROM {$this->table} WHERE id_siswa = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $id_siswa);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    // Fungsi untuk mengupdate data siswa
    public function updateSiswa($id_siswa, $nisn, $nama, $alamat) {
        $query = "UPDATE {$this->table} SET nisn = ?, nama_lengkap = ?, alamat = ? WHERE id_siswa = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("sssi", $nisn, $nama, $alamat, $id_siswa);
        return $stmt->execute();
    }

    // Fungsi untuk menghapus siswa berdasarkan id
    public function hapusSiswa($id_siswa) {
        $query = "DELETE FROM {$this->table} WHERE id_siswa = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $id_siswa);
        return $stmt->execute();
    }
}
?>

