<?php
session_start();
if (isset($_SESSION['username'])) {
    header("Location: kuis.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <title>Registrasi Kuis Sains</title>
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

    .register-form {
      background: rgba(255, 255, 255, 0.85);
      padding: 2rem;
      border-radius: .5rem;
      box-shadow: 0 .5rem 1rem rgba(0,0,0,0.3);
      width: 100%;
      max-width: 400px;
      text-align: center;
      animation: zoomIn 1s ease-out;
    }

    .register-form h2 {
      margin-bottom: 1.5rem;
      color: #343a40;
      animation: fadeIn 1s ease-out;
    }

    .register-form input {
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

    .button-group {
      display: flex;
      flex-direction: column;
      gap: 10px;
      margin-top: 1rem;
    }

    .register-btn {
      background-color:rgb(41, 181, 169);
      width: 100%;
      animation: pulse 2s infinite, glow-green 1.5s ease-in-out infinite;
    }

    .register-btn:hover {
      background-color:rgb(17, 137, 181);
    }

    .login-btn {
      background-color: #6c757d;
      text-align: center;
      text-decoration: none;
      padding: .5rem 1rem;
      border-radius: .3rem;
      width: 100%;
      animation: pulse 2s infinite, glow-gray 1.5s ease-in-out infinite;
    }

    .login-btn:hover {
      background-color: #5a6268;
    }

    .error {
      color: red;
      margin-bottom: 10px;
    }

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
      50% { transform: scale(1.05); }
    }

    @keyframes glow-green {
      0% { box-shadow: 0 0 5pxrgb(15, 116, 184); }
      50% { box-shadow: 0 0 20px #28a745, 0 0 30px #28a745; }
      100% { box-shadow: 0 0 5px #28a745; }
    }

    @keyframes glow-gray {
      0% { box-shadow: 0 0 5px #6c757d; }
      50% { box-shadow: 0 0 20px #6c757d, 0 0 30px #6c757d; }
      100% { box-shadow: 0 0 5px #6c757d; }
    }
  </style>
</head>
<body>

  <!-- Video Background -->
  <video autoplay muted loop id="bgVideo">
    <source src="asset/img/kuis_animasi.mp4" type="video/mp4">
  </video>

  <div class="register-form">
    <h2>Daftar Peserta</h2>
    <?php
    if (isset($_GET['error'])) {
        echo '<p class="error">' . htmlspecialchars($_GET['error']) . '</p>';
    }
    ?>
    <form action="proses_register.php" method="post">
      <input type="text" name="username" placeholder="Username" required>
      <input type="password" name="password" placeholder="Password" required>
      <div class="button-group">
        <button type="submit" class="btn register-btn">Daftar</button>
        <a href="login.php" class="btn login-btn">Login</a>
      </div>
    </form>
  </div>

  <!-- Audio -->
  <audio id="bgMusic" src="asset/music/backsound.mp3" autoplay loop></audio>

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
