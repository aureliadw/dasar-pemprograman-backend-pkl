<?php
    $koneksi = new mysqli("localhost", "root", "", "db_form");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $detail = $_POST['detail_proyek'];
    $deskripsi = $_POST['deskripsi'];
    $kategori = $_POST['kategori'];
    $anggaran = $_POST['anggaran'];
    $batas = $_POST['batas_penawaran'];
    $lokasi = $_POST['lokasi_pengerjaan'];

    $lampiran = $_FILES['lampiran']['name'];
    $tmp = $_FILES['lampiran']['tmp_name'];
    move_uploaded_file($tmp, "uploads/" . $lampiran);

    $stmt = $koneksi->prepare("INSERT INTO posting_proyek (detail_proyek, deskripsi, kategori, anggaran, batas_penawaran, lampiran, lokasi_pengerjaan) VALUES (?, ?, ?, ?, ?, ?, ?) ");
    $stmt->bind_param("sssisss", $detail, $deskripsi, $kategori, $anggaran, $batas, $lampiran, $lokasi);
    $stmt->execute();

    if ($stmt->execute()) {
    header("Location: form-posting-proyek.php?status=sukses");
    exit();
    }

    echo "<script>alert('Proyek berhasil diposting!');</script>";
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
            box-shadow: 0 0 15px rgba(129, 129, 129, 0.1);
            max-width: 500px;
            margin: 80px auto;
            text-align: center;
        }
        label {
            text-align: left;
            display: block;
        }
        h4 {
            text-align: left;
            display: block;
        }
        h6 {
            text-align: left;
            display: block;
        }
        form > * {
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
    <h2>Posting Proyek Baru</h2><br>

    <form method="POST" action="form-posting-proyek.php" enctype="multipart/form-data">
        <label for="detail-proyek">Detail Proyek:</label>
        <textarea name="detail_proyek" id="detail-proyek" rows="4" class="form-control"></textarea>

        <label for="text">Deskripsi Proyek:</label>
        <textarea name="deskripsi" id="text" class="form-control"></textarea>
        <br>
        <label for="kategori-proyek">Kategori Proyek:</label>
        <select name="kategori" class="form-control">
            <option value="penulisan_konten">Penulisan Konten</option>
            <option value="desain_grafis">Desain Grafis</option>
        </select>
        <br>
        <label for="anggaran-proyek">Anggaran Proyek (IDR):</label>
        <input type="number" name="anggaran" id="anggaran-proyek" class="form-control">
        <br>
        <label for="batas-penawaran">Batas Akhir Penawaran:</label>
        <input type="datetime-local" name="batas_penawaran" id="batas-penawaran" class="form-control">
        <br>
        <label for="file">Lampiran Proyek:</label>
        <input type="file" name="lampiran" id="file" class="form-control">
        <br>
        <h6>Lokasi Pengerjaan:</h6>
        <label>
        <input type="radio" name="lokasi_pengerjaan" value="remote" id="remote"> Remote 
        <input type="radio" name="lokasi_pengerjaan" value="onsite" id="onsite"> Onsite
        </label>
        <br>
        <button type="submit" class="btn btn-primary w-100">Posting Proyek</button>
    </form>
    </div>
</body>
</html>