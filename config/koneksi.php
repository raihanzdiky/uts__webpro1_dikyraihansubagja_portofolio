<?php
// config/koneksi.php

$host     = 'localhost';
$dbname   = 'db_uts_web';
$username = 'root';      // Default XAMPP/Laragon
$password = '';          // Kosongkan jika menggunakan default XAMPP/Laragon

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    
    // Mengatur mode error PDO agar memunculkan Exception jika query gagal
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    
} catch (PDOException $e) {
    // Hentikan eksekusi jika koneksi gagal
    die("Koneksi database gagal: " . $e->getMessage());
}