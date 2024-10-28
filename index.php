<?php
include_once 'Database.php';
include_once 'Siswa.php';

// Inisialisasi Database
$db = new Database();
$connection = $db->getConnection();

// Inisialisasi kelas Siswa
$siswa = new Siswa($connection);
$all_siswa = $siswa->getSiswa();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
<div class="container" style="margin-top: 50px;">
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center">Data Siswa</h2>
            <a href="tambah_siswa.php" class="btn btn-success mb-3">Tambah Siswa</a>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>NISN</th>
                    <th>Nama Lengkap</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php while ($row = $all_siswa->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['id_siswa']; ?></td>
                        <td><?php echo $row['nisn']; ?></td>
                        <td><?php echo $row['nama_lengkap']; ?></td>
                        <td><?php echo $row['alamat']; ?></td>
                        <td>
                            <a href="edit_siswa.php?id=<?php echo $row['id_siswa']; ?>" class="btn btn-primary">Edit</a>
                            <a href="hapus_siswa.php?id=<?php echo $row['id_siswa']; ?>" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
