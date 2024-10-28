<?php
include_once 'Database.php';
include_once 'Siswa.php';

$db = new Database();
$connection = $db->getConnection();
$siswa = new Siswa($connection);

$id_siswa = $_GET['id'];
$siswa->hapusSiswa($id_siswa);
header("Location: index.php");
?>
