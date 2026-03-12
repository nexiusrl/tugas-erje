<?php
// my-create.php
require 'db.php';

// CREATE: Menyimpan data ketika tombol dtekan
if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];

    // Menyiapkan query simpan (menggunakan prepare mencegah SQL Injection)
    $stmt = $db->prepare("INSERT INTO siswa (nama, kelas) VALUES (?, ?)");
    // "ss" berarti dua parameter yang dikirim bertipe string.
    $stmt->bind_param("ss", $nama, $kelas);
    $stmt->execute();

    // Kembali ke halaman utama (index.php) setelah tersimpan
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Tambah Siswa</title>
</head>

<body>
    <h2>Tambah Data Siswa</h2>
    <form method="POST">
        <label>Nama:</label><br>
        <input type="text" name="nama" required><br><br>

        <label>Kelas:</label><br>
        <input type="text" name="kelas" required><br><br>

        <button type="submit" name="simpan">Simpan</button>
        <a href="index.php">Batal</a>
    </form>
</body>

</html>