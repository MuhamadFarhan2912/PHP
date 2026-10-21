
<?php
$nama = "";
$email = "";
$nilai = "";
$keterangan = "";
$warna = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari form
    $nama = htmlspecialchars($_POST["nama"]);
    $email = htmlspecialchars($_POST["email"]);
    $nilai = (int) $_POST["nilai"];

    // Struktur kendali untuk menentukan kelulusan
    if ($nilai > 70) {
        $keterangan = "Lulus";
        $warna = "#d4edda";
    } elseif ($nilai < 70) {
        $keterangan = "Remedial";
        $warna = "#f8d7da";
    } else {
        $keterangan = "Nilai tepat 70";
        $warna = "#fff3cd";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Penilaian Ujian</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f2f5;
            padding: 40px 20px;
        }

        .container {
            max-width: 400px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 0 10px #ccc;
        }

        h2 {
            text-align: center;
        }

        label {
            display: block;
            margin-top: 15px;
            margin-bottom: 5px;
        }

        input {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            width: 100%;
            padding: 12px;
            margin-top: 20px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .hasil {
            margin-top: 20px;
            padding: 15px;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Form Penilaian Ujian</h2>

    <form method="POST" action="">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama"
               value="<?= $nama ?>" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email"
               value="<?= $email ?>" required>

        <label for="nilai">Nilai Ujian:</label>
        <input type="number" id="nilai" name="nilai"
               min="0" max="100" value="<?= $nilai ?>"
               placeholder="Masukkan nilai 0-100" required>

        <button type="submit">Periksa Nilai</button>
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST") : ?>
        <div class="hasil" style="background-color: <?= $warna ?>;">
            <h3>Hasil Penilaian</h3>

            <p><strong>Nama:</strong> <?= $nama ?></p>
            <p><strong>Email:</strong> <?= $email ?></p>
            <p><strong>Nilai Ujian:</strong> <?= $nilai ?></p>
            <p><strong>Keterangan:</strong> <?= $keterangan ?></p>
        </div>
    <?php endif; ?>

</div>

</body>
</html>
