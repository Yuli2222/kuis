<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <title>Mulai Kuis</title>
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

    #bgVideo {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
      z-index: -1;
    }

    .start-container {
      background: rgba(255, 255, 255, 0.85);
      padding: 2rem 2.5rem;
      border-radius: .75rem;
      box-shadow: 0 .5rem 1rem rgba(0,0,0,0.3);
      text-align: center;
      max-width: 400px;
      animation: zoomIn 1s ease-out;
    }

    .start-container h2 {
      margin-bottom: 1rem;
      font-size: 1.8rem;
      animation: fadeIn 1s ease-out;
      color: #333;
    }

    .start-container p {
      font-size: 1rem;
      margin-bottom: 1.5rem;
      color: #555;
    }

    .btn-start {
      background-color: #28a745;
      color: white;
      padding: 12px 24px;
      border: none;
      border-radius: 0.5rem;
      cursor: pointer;
      font-size: 1rem;
      animation: pulse 2s infinite, glow-green 1.5s ease-in-out infinite;
      transition: background 0.3s ease, transform 0.3s ease;
    }

    .btn-start:hover {
      background-color: #218838;
      transform: scale(1.05);
    }

    @keyframes zoomIn {
      0% { transform: scale(0.8); opacity: 0; }
      100% { transform: scale(1); opacity: 1; }
    }

    @keyframes fadeIn {
      0% { opacity: 0; }
      100% { opacity: 1; }
    }

    @keyframes pulse {
      0%, 100% { transform: scale(1); }
      50% { transform: scale(1.05); }
    }

    @keyframes glow-green {
      0% { box-shadow: 0 0 5px #28a745; }
      50% { box-shadow: 0 0 20px #28a745, 0 0 30px #28a745; }
      100% { box-shadow: 0 0 5px #28a745; }
    }
  </style>
</head>
<body>

  <!-- Video latar belakang -->
  <video autoplay muted loop id="bgVideo">
    <source src="asset/img/animasi1.mp4" type="video/mp4">
  </video>

  <!-- Konten Mulai -->
  <div class="start-container">
    <h2>Halo, <?= htmlspecialchars($_SESSION['username']); ?>!</h2>
    <p>Selamat datang di Kuis Sains.<br>Siap untuk memulai?</p>
    <a href="kuis.php"><button class="btn-start">Mulai Kuis</button></a>
  </div>

  <!-- Backsound -->
  <audio id="bgMusic" src="asset/music/backsound.mp3" autoplay loop></audio>

  <!-- JavaScript autoplay audio -->
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
