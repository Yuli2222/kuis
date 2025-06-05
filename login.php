<?php
// login.php
session_start();
if (isset($_SESSION['username'])) {
    header("Location: kuis.php"); // Redirect ke halaman kuis jika sudah login
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <title>Login Kuis Sains</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(135deg, rgb(42, 199, 219), rgb(195, 75, 105));
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      color: #212529;
      position: relative;
      overflow: hidden;
    }

    /* Video latar belakang */
    #bgVideo {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
      z-index: -1;
    }

    /* Form Login */
    .login-form {
      background: rgba(255, 255, 255, 0.8);
      padding: 2rem;
      border-radius: .5rem;
      box-shadow: 0 .5rem 1rem rgba(0,0,0,0.3);
      width: 100%;
      max-width: 400px;
      text-align: center;
      animation: zoomIn 1s ease-out;
    }

    .login-form h2 {
      margin-bottom: 1.5rem;
      color: #343a40;
      animation: fadeIn 1s ease-out;
    }

    .login-form input {
      width: 100%;
      padding: .5rem;
      margin-bottom: 1rem;
      border: 1px solid #ced4da;
      border-radius: .25rem;
      animation: floating 3s ease-in-out infinite;
    }

    .btn {
      display: inline-block;
      font-weight: 400;
      text-align: center;
      border: 1px solid transparent;
      padding: .5rem 1rem;
      font-size: 1rem;
      border-radius: .3rem;
      cursor: pointer;
      transition: background-color .2s;
      color: #fff;
    }

    .login-btn {
      background-color: #007bff;
      width: 100%;
      animation: pulse 2s infinite, glow 1.5s ease-in-out infinite;
    }

    .login-btn:hover {
      background-color: #0056b3;
    }

    .daftar-btn {
      background-color: #6c757d;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      padding: .5rem 1rem;
      border-radius: .3rem;
      width: 100%;
      margin-top: 10px;
      animation: pulse 2s infinite, glow-gray 1.5s ease-in-out infinite;
    }

    .daftar-btn:hover {
      background-color: #5a6268;
    }

    /* Animasi */
    @keyframes zoomIn {
      0% { transform: scale(0.8); opacity: 0; }
      100% { transform: scale(1); opacity: 1; }
    }

    @keyframes floating {
      0%, 100% { transform: translateY(0); }
      50% { transform: translateY(-10px); }
    }

    @keyframes fadeIn {
      0% { opacity: 0; }
      100% { opacity: 1; }
    }

    @keyframes pulse {
      0%, 100% { transform: scale(1); }
      50% { transform: scale(1.1); }
    }

    @keyframes glow {
      0% { box-shadow: 0 0 5px #007bff; }
      50% { box-shadow: 0 0 20px #007bff, 0 0 30px #007bff; }
      100% { box-shadow: 0 0 5px #007bff; }
    }

    @keyframes glow-gray {
      0% { box-shadow: 0 0 5px #6c757d; }
      50% { box-shadow: 0 0 20px #6c757d, 0 0 30px #6c757d; }
      100% { box-shadow: 0 0 5px #6c757d; }
    }
  </style>
</head>
<body>

  <!-- Video latar belakang -->
  <video autoplay muted loop id="bgVideo">
    <source src="asset/img/kuis_animasi.mp4" type="video/mp4">
  </video>

  <!-- Form Login -->
  <div class="login-form">
    <h2>Login Kuis Sains</h2>
    <form action="proses_login.php" method="post">
      <input type="text" name="username" placeholder="Username" required>
      <input type="password" name="password" placeholder="Password" required>
      
      <button type="submit" class="btn login-btn">Login</button>
      <a href="register.php" class="btn daftar-btn">Daftar</a>
    </form>
  </div>

  <!-- 🔊 Backsound music -->
  <audio id="bgMusic" src="asset/music/backsound.mp3" autoplay loop></audio>

  <!-- 💡 JavaScript untuk mengatasi autoplay yang diblokir -->
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const music = document.getElementById('bgMusic');
      music.volume = 0.2;

      document.body.addEventListener('click', function () {
        if (music.paused) {
          music.play().catch(e => console.log('Autoplay diblokir:', e));
        }
      }, { once: true });
    });
  </script>
</body>
</html>
