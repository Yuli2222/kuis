<?php
session_start();
require_once 'config.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$score = $_SESSION['score'] ?? 0;
$totalQuestions = 30;
$username = $_SESSION['username'];

// Simpan skor
$stmt = $conn->prepare("INSERT INTO skor (username, nilai) VALUES (?, ?)");
$stmt->bind_param("si", $username, $score);
$stmt->execute();
$stmt->close();

// Ambil leaderboard
$leaderboard = [];
$result = $conn->query("SELECT username, nilai FROM skor ORDER BY nilai DESC, waktu ASC LIMIT 10");
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $leaderboard[] = $row;
    }
}

// Reset sesi kuis
unset($_SESSION['current_question']);
unset($_SESSION['score']);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hasil Kuis</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.5.1/dist/confetti.browser.min.js"></script>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: url('asset/img/finish.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        .result-container {
            background: rgba(255, 255, 255, 0.8);
            padding: 2rem;
            border-radius: 0.75rem;
            text-align: center;
            box-shadow: 0 0.5rem 1.5rem rgba(0,0,0,0.3);
            width: 90%;
            max-width: 600px;
            margin-bottom: 2rem;
        }
        h1 {
            color: #333;
            margin-bottom: 1rem;
        }
        .score {
            font-size: 2rem;
            color: #28a745;
            margin: 1rem 0;
        }
        .actions a {
            text-decoration: none;
            display: inline-block;
            padding: 0.75rem 1.5rem;
            margin: 0.5rem;
            border-radius: 0.5rem;
            color: white;
            background-color: #007bff;
            transition: background-color 0.3s;
        }
        .actions a:hover {
            background-color: #0056b3;
        }
        .leaderboard {
            background: rgba(255, 255, 255, 0.8);
            padding: 1rem;
            border-radius: 0.5rem;
            box-shadow: 0 0.3rem 1rem rgba(0,0,0,0.2);
            width: 90%;
            max-width: 600px;
        }
        .leaderboard h2 {
            margin-top: 0;
            color: #333;
        }
        .leaderboard table {
            width: 100%;
            border-collapse: collapse;
        }
        .leaderboard th, .leaderboard td {
            padding: 0.5rem;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }
        .leaderboard th {
            background-color: #f0f0f0;
        }
        .highlight {
            background-color: #e0f7fa;
            font-weight: bold;
        }
        .emoji-animation {
            font-size: 2rem;
            animation: blink 1s infinite;
            margin-top: 1rem;
        }
        @keyframes blink {
            0% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.5; transform: scale(1.2); }
            100% { opacity: 1; transform: scale(1); }
        }
        marquee {
            color: yellow;
            font-size: 1.5rem;
            font-weight: bold;
            background: #222;
            padding: 10px;
        }
    </style>
</head>
<body>

    <marquee behavior="scroll" direction="left" scrollamount="8">
        <?= $score >= 15 ? "🎉 Selamat $username! Kamu hebat!" : "😢 Semangat $username! Coba lagi ya!" ?>
    </marquee>

    <div class="result-container">
        <h1><?= $score >= 15 ? '🎉 Kuis Selesai!' : '😢 Kuis Selesai' ?></h1>
        <p class="score">Skor Anda: <strong><?= $score ?></strong> dari <strong><?= $totalQuestions ?></strong></p>
        <div class="emoji-animation"><?= $score >= 15 ? '🎈🎊✨🎉' : '😔💔🥀' ?></div>
        <div class="actions">
            <a href="kuis.php">Ulangi Kuis</a>
            <a href="logout.php">Logout</a>
        </div>
    </div>

    <div class="leaderboard">
        <h2>🏆 Papan Peringkat 10 Besar</h2>
        <table>
            <thead>
                <tr>
                    <th>Peringkat</th>
                    <th>Username</th>
                    <th>Skor</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($leaderboard as $index => $row): ?>
                <tr class="<?= ($row['username'] === $username) ? 'highlight' : '' ?>">
                    <td><?= $index + 1 ?></td>
                    <td><?= htmlspecialchars($row['username']) ?></td>
                    <td><?= $row['nilai'] ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Audio kondisi -->
    <audio id="congratulationSound" src="http://localhost/kuis/asset/sounds/congratulation.mp3" muted></audio>
    <audio id="sadSound" src="http://localhost/kuis/asset/sounds/sad.mp3" muted></audio>

    <script>
        window.onload = function() {
            const success = <?= $score >= 15 ? 'true' : 'false' ?>;
            const congratulationAudio = document.getElementById("congratulationSound");
            const sadAudio = document.getElementById("sadSound");

            // Tentukan audio yang akan diputar
            const audio = success ? congratulationAudio : sadAudio;

            // Tambahkan event listener untuk memulai audio pada interaksi pengguna pertama kali
            document.body.addEventListener('mousemove', function() {
                audio.muted = false;
                audio.play().catch(function(err) {
                    console.log("Pemutaran otomatis gagal:", err);
                });
            });
        };
    </script>

    <!-- Confetti -->
    <?php if ($score >= 15): ?>
    <script>
        const duration = 5 * 1000;
        const animationEnd = Date.now() + duration;
        const defaults = { startVelocity: 30, spread: 360, ticks: 60, zIndex: 1000 };

        function randomInRange(min, max) {
            return Math.random() * (max - min) + min;
        }

        const interval = setInterval(() => {
            const timeLeft = animationEnd - Date.now();
            if (timeLeft <= 0) return clearInterval(interval);

            const particleCount = 50 * (timeLeft / duration);
            confetti(Object.assign({}, defaults, {
                particleCount,
                origin: { x: randomInRange(0.1, 0.3), y: Math.random() - 0.2 }
            }));
            confetti(Object.assign({}, defaults, {
                particleCount,
                origin: { x: randomInRange(0.7, 0.9), y: Math.random() - 0.2 }
            }));
        }, 250);
    </script>
    <?php endif; ?>

</body>
</html>
