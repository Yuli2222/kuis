<?php
session_start();
require_once 'config.php';

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

if (empty($username) || empty($password)) {
    echo "<script>alert('Username dan password harus diisi.'); window.location='login.php';</script>";
    exit;
}

$query = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
$query->bind_param("ss", $username, $password);
$query->execute();
$result = $query->get_result();

if ($result->num_rows > 0) {
    $_SESSION['username'] = $username;
    $_SESSION['status'] = "login";
    header("Location: mulai.php");
    exit;
} else {
    echo "<script>alert('Login gagal! Username atau Password salah'); window.location='login.php';</script>";
}
?>
