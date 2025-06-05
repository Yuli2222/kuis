<?php
session_start();

$questions = [
    1 => ['question' => 'Ibu kota negara Indonesia adalah...', 'options' => ['A' => 'Surabaya', 'B' => 'Jakarta', 'C' => 'Bandung', 'D' => 'Medan'], 'correct' => 'B'],
    2 => ['question' => 'Lambang negara Indonesia adalah...', 'options' => ['A' => 'Harimau', 'B' => 'Komodo', 'C' => 'Garuda', 'D' => 'Elang'], 'correct' => 'C'],
    3 => ['question' => 'Jumlah provinsi di Indonesia pada tahun 2024 adalah...', 'options' => ['A' => '32', 'B' => '33', 'C' => '34', 'D' => '38'], 'correct' => 'D'],
    4 => ['question' => 'Planet terbesar di tata surya adalah...', 'options' => ['A' => 'Mars', 'B' => 'Bumi', 'C' => 'Jupiter', 'D' => 'Saturnus'], 'correct' => 'C'],
    5 => ['question' => 'Hari Kemerdekaan Indonesia diperingati setiap tanggal...', 'options' => ['A' => '17 Juli', 'B' => '17 Agustus', 'C' => '18 Agustus', 'D' => '10 November'], 'correct' => 'B'],
    6 => ['question' => 'Alat musik tradisional dari Jawa Barat adalah...', 'options' => ['A' => 'Angklung', 'B' => 'Sasando', 'C' => 'Tifa', 'D' => 'Gamelan'], 'correct' => 'A'],
    7 => ['question' => 'Sungai terpanjang di Indonesia adalah...', 'options' => ['A' => 'Sungai Mahakam', 'B' => 'Sungai Bengawan Solo', 'C' => 'Sungai Kapuas', 'D' => 'Sungai Musi'], 'correct' => 'C'],
    8 => ['question' => 'Pahlawan proklamator kemerdekaan Indonesia adalah...', 'options' => ['A' => 'Ki Hajar Dewantara', 'B' => 'Soekarno dan Hatta', 'C' => 'Sudirman', 'D' => 'R.A. Kartini'], 'correct' => 'B'],
    9 => ['question' => 'Nama candi Buddha terbesar di dunia di Indonesia adalah...', 'options' => ['A' => 'Prambanan', 'B' => 'Mendut', 'C' => 'Borobudur', 'D' => 'Sewu'], 'correct' => 'C'],
    10 => ['question' => 'Warna bendera Indonesia adalah...', 'options' => ['A' => 'Merah dan Kuning', 'B' => 'Merah dan Putih', 'C' => 'Putih dan Biru', 'D' => 'Hitam dan Merah'], 'correct' => 'B'],
    11 => ['question' => 'Presiden pertama Indonesia adalah...', 'options' => ['A' => 'Soekarno', 'B' => 'Soeharto', 'C' => 'Habibie', 'D' => 'Gus Dur'], 'correct' => 'A'],
    12 => ['question' => 'Jumlah pemain dalam satu tim sepak bola adalah...', 'options' => ['A' => '10', 'B' => '11', 'C' => '12', 'D' => '9'], 'correct' => 'B'],
    13 => ['question' => 'Negara dengan populasi terbanyak di dunia adalah...', 'options' => ['A' => 'India', 'B' => 'Amerika', 'C' => 'Tiongkok', 'D' => 'Indonesia'], 'correct' => 'C'],
    14 => ['question' => 'Gunung tertinggi di Indonesia adalah...', 'options' => ['A' => 'Merapi', 'B' => 'Kerinci', 'C' => 'Rinjani', 'D' => 'Puncak Jaya'], 'correct' => 'D'],
    15 => ['question' => 'Hewan khas Australia adalah...', 'options' => ['A' => 'Harimau', 'B' => 'Kanguru', 'C' => 'Panda', 'D' => 'Koala'], 'correct' => 'B'],
    16 => ['question' => 'Nama lain dari Bumi adalah...', 'options' => ['A' => 'Planet Biru', 'B' => 'Planet Merah', 'C' => 'Planet Raksasa', 'D' => 'Planet Kecil'], 'correct' => 'A'],
    17 => ['question' => 'Ibukota Sumatera Utara adalah...', 'options' => ['A' => 'Medan', 'B' => 'Padang', 'C' => 'Pekanbaru', 'D' => 'Palembang'], 'correct' => 'A'],
    18 => ['question' => 'Organisasi ASEAN dibentuk pada tahun...', 'options' => ['A' => '1945', 'B' => '1967', 'C' => '1955', 'D' => '1970'], 'correct' => 'B'],
    19 => ['question' => 'Hewan tercepat di darat adalah...', 'options' => ['A' => 'Singa', 'B' => 'Cheetah', 'C' => 'Kuda', 'D' => 'Serigala'], 'correct' => 'B'],
    20 => ['question' => 'Penemu bola lampu adalah...', 'options' => ['A' => 'Albert Einstein', 'B' => 'Isaac Newton', 'C' => 'Thomas Edison', 'D' => 'Nikola Tesla'], 'correct' => 'C'],
    21 => ['question' => 'Simbol kimia dari air adalah...', 'options' => ['A' => 'CO2', 'B' => 'H2O', 'C' => 'NaCl', 'D' => 'O2'], 'correct' => 'B'],
    22 => ['question' => 'Bahasa resmi negara Jepang adalah...', 'options' => ['A' => 'Mandarin', 'B' => 'Jepang', 'C' => 'Korea', 'D' => 'Thai'], 'correct' => 'B'],
    23 => ['question' => 'Candi Prambanan merupakan candi agama...', 'options' => ['A' => 'Buddha', 'B' => 'Islam', 'C' => 'Hindu', 'D' => 'Kristen'], 'correct' => 'C'],
    24 => ['question' => 'Hari Pahlawan diperingati setiap...', 'options' => ['A' => '10 November', 'B' => '17 Agustus', 'C' => '2 Mei', 'D' => '1 Juni'], 'correct' => 'A'],
    25 => ['question' => 'Negara tetangga Indonesia di utara adalah...', 'options' => ['A' => 'Australia', 'B' => 'Singapura', 'C' => 'Malaysia', 'D' => 'Timor Leste'], 'correct' => 'C'],
    26 => ['question' => 'Benua terbesar di dunia adalah...', 'options' => ['A' => 'Afrika', 'B' => 'Amerika', 'C' => 'Asia', 'D' => 'Eropa'], 'correct' => 'C'],
    27 => ['question' => 'Simbol sila ke-5 Pancasila adalah...', 'options' => ['A' => 'Pohon Beringin', 'B' => 'Bintang', 'C' => 'Rantai Emas', 'D' => 'Padi dan Kapas'], 'correct' => 'D'],
    28 => ['question' => 'Pulau terbesar di Indonesia adalah...', 'options' => ['A' => 'Sumatera', 'B' => 'Kalimantan', 'C' => 'Jawa', 'D' => 'Sulawesi'], 'correct' => 'B'],
    29 => ['question' => 'Bapak Pendidikan Nasional Indonesia adalah...', 'options' => ['A' => 'Ki Hajar Dewantara', 'B' => 'Soekarno', 'C' => 'Moh. Yamin', 'D' => 'R.A. Kartini'], 'correct' => 'A'],
    30 => ['question' => 'Alat untuk mengukur suhu adalah...', 'options' => ['A' => 'Barometer', 'B' => 'Termometer', 'C' => 'Higrometer', 'D' => 'Anemometer'], 'correct' => 'B']
];
$totalQuestions = count($questions);
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

// Inisialisasi timer (3 menit)
if (!isset($_SESSION['start_time'])) {
    $_SESSION['start_time'] = time(); // Waktu mulai kuis
}

$currentQuestion = $_SESSION['current_question'] ?? 1;
$_SESSION['current_question'] = $currentQuestion;

$timeElapsed = time() - $_SESSION['start_time']; // Waktu yang telah berlalu

if ($timeElapsed >= 600) { // 600 detik = 10 menit
    header("Location: finish.php"); // Waktu habis, arahkan ke halaman selesai
    exit;
}

if (isset($questions[$currentQuestion])) {
    $soal = $questions[$currentQuestion];
} else {
    header("Location: finish.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userAnswer = $_POST['answer'] ?? '';
    $correctAnswer = $soal['correct'];

    if ($userAnswer === $correctAnswer) {
        $_SESSION['score']++;
    }

    $_SESSION['current_question']++;

    if ($_SESSION['current_question'] > $totalQuestions) {
        header("Location: finish.php");
        exit;
    }

    header("Location: kuis.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>Soal <?php echo $currentQuestion; ?></title>
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        video.bg-video {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transform: translate(-50%, -50%);
            z-index: -2;
        }

        .quiz-container {
            background: white;
            padding: 2rem;
            border-radius: 0.5rem;
            box-shadow: 0 0.5rem 1rem rgba(201, 34, 34, 0.6);
            text-align: center;
            width: 90%;
            max-width: 600px;
            animation: zoomIn 0.8s ease-out;
            z-index: 1;
        }

        .question {
            margin: 1.5rem 0;
            font-size: 1.2rem;
            opacity: 0;
            animation: fadeInLeft 1s ease-out forwards;
        }

        .option-btn {
            display: block;
            width: 100%;
            margin: 0.5rem 0;
            padding: 0.75rem;
            border: none;
            border-radius: 0.3rem;
            background-color: #007bff;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
            animation: slideIn 1s ease-out;
        }

        .option-btn:hover {
            background-color: #0056b3;
            transform: scale(1.05);
            animation: glow 1.5s ease-out infinite;
        }

        #feedback {
            margin-top: 20px;
            font-size: 24px;
            transition: all 0.5s ease-in-out;
            transform: scale(0);
            opacity: 0;
        }

        #feedback.show {
            transform: scale(1);
            opacity: 1;
        }

        #correctAnswerText {
            margin-top: 1rem;
            font-size: 1.2rem;
            color: #ff5733;
            display: none;
        }

        .timer {
            font-size: 1.5rem;
            font-weight: bold;
            color: #ff0000;
        }

        @keyframes zoomIn {
            0% {
                transform: scale(0);
                opacity: 0;
            }
            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        @keyframes fadeInLeft {
            0% {
                opacity: 0;
                transform: translateX(-50px);
            }
            100% {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideIn {
            0% {
                opacity: 0;
                transform: translateX(-50px);
            }
            100% {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes glow {
            0% {
                box-shadow: 0 0 5px #fff;
            }
            50% {
                box-shadow: 0 0 20px #00f;
            }
            100% {
                box-shadow: 0 0 5px #fff;
            }
        }
    </style>
    <script>
        let timer;
        let timeLeft = 600 - <?php echo $timeElapsed; ?>; // Waktu yang tersisa dalam detik

        function startTimer() {
            timer = setInterval(function() {
                if (timeLeft <= 0) {
                    clearInterval(timer);
                    document.getElementById('timeLeft').textContent = "Waktu Habis!";
                    window.location.href = "finish.php"; // Redirect ke halaman selesai
                } else {
                    let minutes = Math.floor(timeLeft / 60);
                    let seconds = timeLeft % 60;
                    if (seconds < 10) {
                        seconds = '0' + seconds; // Format 00 detik
                    }
                    document.getElementById('timeLeft').textContent = minutes + ":" + seconds;
                    timeLeft--;
                }
            }, 1000);
        }

        window.onload = function() {
            startTimer();
            const music = document.getElementById('bgMusic');
            music.volume = 0.2;

            // Hanya mulai musik jika belum pernah diputar
            if (!sessionStorage.getItem('musicStarted')) {
                sessionStorage.setItem('musicStarted', 'true');
                document.body.addEventListener('click', function () {
                    if (music.paused) {
                        music.play().catch(e => console.log('Autoplay diblokir:', e));
                    }
                }, { once: true });
            } else {
                // Jika musik sudah diputar, pastikan untuk melanjutkan
                if (music.paused) {
                    music.play().catch(e => console.log('Autoplay diblokir:', e));
                }
            }
        };

        function submitAnswer(button) {
            const form = document.getElementById('quizForm');
            const input = document.getElementById('answerInput');
            const selected = button.getAttribute('data-value');
            const correctAnswer = button.getAttribute('data-correct') === 'true';

            input.value = selected;

            const correctSound = document.getElementById('correctSound');
            const wrongSound = document.getElementById('wrongSound');
            const feedback = document.getElementById('feedback');
            const correctAnswerText = document.getElementById('correctAnswerText');

            document.querySelectorAll('.option-btn').forEach(btn => btn.disabled = true);

            if (correctAnswer) {
                correctSound.play();
                feedback.innerHTML = '✅ Jawaban Benar!';
                feedback.style.color = 'green';
                correctAnswerText.style.display = 'none';
            } else {
                wrongSound.play();
                feedback.innerHTML = '❌ Jawaban Salah!';
                feedback.style.color = 'red';

                correctAnswerText.innerHTML = `Jawaban yang benar adalah: <?php echo $soal['correct']; ?>`;
                correctAnswerText.style.display = 'block';
            }

            feedback.classList.add('show');

            setTimeout(() => {
                feedback.classList.remove('show');
                form.submit();
            }, 2000);
        }
    </script>
</head>
<body class="quiz-slide">
    <video class="bg-video" autoplay muted loop>
        <source src="asset/img/animasi1.mp4" type="video/mp4">
        Browser tidak mendukung video tag ini.
    </video>
    <div class="quiz-container">
        <h2>Soal <?php echo $currentQuestion; ?> dari <?php echo $totalQuestions; ?></h2>
        <p class="question"><?php echo $soal['question']; ?></p>
        <p class="timer" id="timeLeft">Waktu Tersisa: 10:00</p> <!-- Timer 10 menit -->
        <form id="quizForm" method="post">
            <input type="hidden" name="answer" id="answerInput">
            <?php foreach ($soal['options'] as $key => $text): ?>
                <button 
                    type="button" 
                    class="option-btn"
                    data-value="<?php echo $key; ?>"
                    data-correct="<?php echo ($key === $soal['correct']) ? 'true' : 'false'; ?>"
                    onclick="submitAnswer(this)">
                    <?php echo $key . '. ' . $text; ?>
                </button>
            <?php endforeach; ?>
        </form>
        <div id="feedback"></div>
        <div id="correctAnswerText"></div>
    </div>
    <audio id="correctSound" src="asset/sounds/correct.mp3"></audio>
    <audio id="wrongSound" src="asset/sounds/wrong.mp3"></audio>
    <audio id="bgMusic" src="asset/music/musickuis2.mp3" autoplay loop></audio>
</body>
</html>