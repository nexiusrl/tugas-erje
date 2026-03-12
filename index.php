<?php
// my-index.php
// Memanggil file koneksi database
require 'db.php';

// READ: Ambil semua data dari tabel siswa
$result = $db->query("SELECT * FROM siswa");
?>
<!DOCTYPE html>
<html>

<head>
    <title>Sistem CRUD Sederhana</title>
</head>

<body>
    <h2>Data Siswa</h2>
    <a href="create.php">Tambah Siswa Baru</a>
    <br><br>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Aksi</th>
        </tr>

        <!-- Melooping data siswa -->
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['nama'] ?></td>
                <td><?= $row['kelas'] ?></td>
                <td>
                    <a href="edit.php?id=<?= $row['id'] ?>">Edit</a> |
                    <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                </td>
            </tr>
        <?php endwhile; ?>

    </table>
</body>

</html>