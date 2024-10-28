<?php
include_once 'Database.php';
include_once 'Siswa.php';

$db = new Database();
$connection = $db->getConnection();
$siswa = new Siswa($connection);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id_siswa'];
    $nisn = $_POST['nisn'];
    $nama = $_POST['nama_lengkap'];
    $alamat = $_POST['alamat'];
    $siswa->updateSiswa($id, $nisn, $nama, $alamat);
    header("Location: index.php");
}

$id_siswa = $_GET['id'];
$data_siswa = $siswa->getSiswaById($id_siswa);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Siswa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
<div class="container" style="margin-top: 50px;">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h2 class="text-center">Edit Siswa</h2>
            <form method="POST">
                <input type="hidden" name="id_siswa" value="<?php echo $data_siswa['id_siswa']; ?>">
                <div class="form-group">
                    <label>NISN</label>
                    <input type="text" name="nisn" class="form-control" value="<?php echo $data_siswa['nisn']; ?>" required>
                </div>
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" class="form-control" value="<?php echo $data_siswa['nama_lengkap']; ?>" required>
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control" rows="3" required><?php echo $data_siswa['alamat']; ?></textarea>
                </div>
                <button type="submit" class="btn btn-success">Update</button>
                <a href="index.php" class="btn btn-danger">Batal</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>
