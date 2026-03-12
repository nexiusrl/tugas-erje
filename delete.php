<?php
// my-delete.php
require 'db.php';

// Ambil ID dari link (contoh: delete.php?id=1)
$id = $_GET['id'];

// DELETE: Hapus data siswa yang ID-nya sama
$stmt = $db->prepare("DELETE FROM siswa WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

// Jika selesai dihapus, lempar lagi ke index.php
header("Location: index.php");
exit;
?>