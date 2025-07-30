<?php
$koneksi = new mysqli("localhost", "root", "", "db_form");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $jumlah_penawaran = $_POST["jumlah_penawaran"];
    $pesan = $_POST["pesan"];
    $durasi_pengerjaan = $_POST["durasi_pengerjaan"];

    $stmt = $koneksi->prepare("INSERT INTO penawaran (jumlah_penawaran, pesan, durasi_pengerjaan) 
    VALUES (?, ?, ?)");
    $stmt->bind_param("isi", $jumlah_penawaran, $pesan, $durasi_pengerjaan);

    if ($stmt->execute()) {
        echo "<script>alert('Pengajuan Penawaran berhasil disimpan!');</script>";
    } else {
        echo "<script>alert('Terjadi kesalahan: " . $stmt->error . "');</script>";
    }

    $stmt->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color:rgb(209, 209, 209);
        }
        .container{
            background-color: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(164, 164, 164, 0.1);
            max-width: 500px;
            margin: 80px auto;
            text-align: center;
        }
        label {
            text-align: left;
            display: block;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
    <h2>Pengajuan Penawaran</h2>
    <p>Untuk Proyek: <strong>Desain Logo Perusahaan Baru</strong></p>

    <form method="POST" action="form-pengajuan-penawaran.php">
        <label for="jumlah">Jumlah Penawaran Anda (IDR):</label>
            <input type="number" name="jumlah_penawaran" id="jumlah" class="form-control" min="0" step="1">

        <label for="pesan">Pesan/Proposal Anda:
            <textarea name="pesan" id="pesan" row="4" class="form-control"></textarea>

        <label for="durasi">Perkiraan Durasi Pengerjaan (Hari)</label>
            <input type="number" name="durasi_pengerjaan" id="durasi" class="form-control" min="1" step="1">
        <br>
        <button type="submit" class="btn btn-primary w-100">Ajukan Penawaran</button>
    </form>
    </div>
</body>
</html>