<?php
// my-edit.php
require 'db.php';

// Ambil ID dari link (contoh: edit.php?id=1)
$id = $_GET['id'];

// Ambil data siswa yang spesifik sesuai dengan ID-nya
$stmt = $db->prepare("SELECT * FROM siswa WHERE id = ?");
$stmt->bind_param("i", $id); // "i" yaitu integer (angka)
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

// UPDATE: Jika tombol update ditekan, maka perbaharui data
if (isset($_POST['update'])) {
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];

    $stmt2 = $db->prepare("UPDATE siswa SET nama = ?, kelas = ? WHERE id = ?");
    // "ssi" berarti parameter pertama String, kedua String, ketiga Integer.
    $stmt2->bind_param("ssi", $nama, $kelas, $id);
    $stmt2->execute();

    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Edit Siswa</title>
</head>

<body>
    <h2>Edit Data Siswa</h2>
    <form method="POST">
        <label>Nama:</label><br>
        <!-- Mengisi value dengan nilai sebelumnya -->
        <input type="text" name="nama" value="<?= $row['nama'] ?>" required><br><br>

        <label>Kelas:</label><br>
        <input type="text" name="kelas" value="<?= $row['kelas'] ?>" required><br><br>

        <button type="submit" name="update">Update</button>
        <a href="index.php">Batal</a>
    </form>
</body>

</html>