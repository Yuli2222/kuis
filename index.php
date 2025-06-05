<?php session_start(); if (!isset($_SESSION['username'])) { header("Location: login.php"); exit; } ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <title>Menu Kuis</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="bg-light text-center p-5">
    <h1>Halo, <?php echo $_SESSION['username']; ?>!</h1>
    <a href="kuis.php" class="btn btn-primary m-2">Mulai Kuis</a><br>
    <a href="leaderboard.php" class="btn btn-warning m-2">Lihat Leaderboard</a><br>
    <a href="logout.php" class="btn btn-danger m-2">Logout</a>
</body>
</html>
