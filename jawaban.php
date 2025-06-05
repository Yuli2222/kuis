<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
include 'config.php';

$jawaban = $_POST['jawaban'];   // array: [id_soal => pilihan_user]
$total = count($jawaban);
$benar = 0;
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hasil Kuis</title>
    <style>
      .hasil { margin-bottom: 15px; padding:10px; border:1px solid #ddd; }
      .benar { color: green; }
      .salah { color: red; }
    </style>
</head>
<body>
    <h2>Hasil Kuis</h2>

    <?php foreach($jawaban as $id => $pil): 
        // ambil data soal & kunci
        $r = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM questions WHERE id=$id"));
        $status = ($pil === $r['correct_option']) ? 'Benar' : 'Salah';
        if ($status === 'Benar') $benar++;
    ?>
        <div class="hasil">
            <p><strong><?php echo $id; ?>. <?php echo $r['question']; ?></strong></p>
            <p>Jawaban Anda: <?php echo $pil; ?>. <?php 
                echo $r['option_'.strtolower($pil)]; 
            ?></p>
            <p>Status: 
                <span class="<?php echo strtolower($status); ?>">
                    <?php echo $status; ?>
                </span>
            </p>
        </div>
    <?php endforeach; ?>

    <h3>Skor Anda: <?php echo $benar; ?> / <?php echo $total; ?></h3>
    <p><a href="kuis.php">Ulangi Kuis</a> | <a href="logout.php">Logout</a></p>
</body>
</html>
