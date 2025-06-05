<?php
session_start();
include "config.php";

// Ambil data dari form
$username = trim($_POST['username'] ?? '');
$password = trim($_POST['password'] ?? '');

// Validasi input
if ($username === '' || $password === '') {
    header("Location: register.php?error=Harap isi semua kolom!");
    exit;
}

// Cek apakah username sudah ada, dengan prepared statement
$stmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->store_result();
if ($stmt->num_rows > 0) {
    $stmt->close();
    header("Location: register.php?error=Username sudah digunakan!");
    exit;
}
$stmt->close();

// Simpan password dalam bentuk plain-text
$stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
$stmt->bind_param("ss", $username, $password);
if ($stmt->execute()) {
    $_SESSION['username'] = $username;
    header("Location: mulai.php");
    exit;
} else {
    header("Location: register.php?error=Gagal mendaftar, silakan coba lagi.");
    exit;
}
?>
