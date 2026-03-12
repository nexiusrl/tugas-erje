<?php
// my-db.php
$host = 'localhost';
$user = 'root';
$pass = ''; // Default XAMPP/MySQL tidak pakai password
$dbname = 'belajar_crud';

// Buat koneksi ke server MySQL
$db = new mysqli($host, $user, $pass);

if ($db->connect_error) {
    die("Koneksi gagal: " . $db->connect_error);
}

// Otomatis buat database jika belum ada
$db->query("CREATE DATABASE IF NOT EXISTS $dbname");

// Pilih database tersebut
$db->select_db($dbname);

// Buat tabel siswa jika belum ada
$db->query("CREATE TABLE IF NOT EXISTS siswa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    kelas VARCHAR(50) NOT NULL
)");

?>