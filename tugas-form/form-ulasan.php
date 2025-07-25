<?php
$koneksi = new mysqli("localhost", "root", "", "db_form");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rating   = $_POST["rating"];
    $komentar = $_POST["komentar"];

    if (empty($rating) || empty($komentar)) {
        echo "<script>alert('Rating dan komentar wajib diisi');</script>";
        exit;
    }

    $query = "INSERT INTO ulasan (rating, komentar) VALUES (?, ?)";
    $stmt  = $koneksi->prepare($query);
    $stmt->bind_param("is", $rating, $komentar);

    if ($stmt->execute()) {
        header("Location: form-posting-proyek.php?status=sukses");
        exit();
    } else {
        echo "<script>alert('Terjadi kesalahan saat menyimpan ulasan!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ulasan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
        background-color:rgb(209, 209, 209);
    }
    .container {
      background-color: #ffffff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 15px rgba(161, 161, 161, 0.1);
      max-width: 500px;
      margin: 80px auto;
      text-align: center;
    }
    textarea {
      resize: none;
    }
    label {
        display: block;
        text-align: left;
    }
    .rating {
        display: inline-flex;
        direction: rtl;
    }
    .rating input {
        display: none;
    }
    .rating label {
        font-size: 30px;
        color: gray;
        cursor: pointer;
        padding: 0 3px;
    }
    .rating input:checked ~ label,
    .rating label:hover,
    .rating label:hover ~ label {
        color: gold;
    }
    </style>
</head>
<body>
    <div class="container">
    <h2>Beri Ulasan</h2>
    <p>Untuk [Nama Pengguna Freelancer/Klien] pada</p>
    <p>Proyek: Desain Logo Perusahaan Baru</p>

    <form method="POST" action="form-ulasan.php">
        <label for="rating">Rating:</label>
        <div style="text-align: left;">
        <div class="rating">
            <input type="radio" id="star5" name="rating" value="5">
            <label for="star5" title="5 stars">★</label>
            <input type="radio" id="star4" name="rating" value="4">
            <label for="star4" title="4 stars">★</label>
            <input type="radio" id="star3" name="rating" value="3">
            <label for="star3" title="3 stars">★</label>
            <input type="radio" id="star2" name="rating" value="2">
            <label for="star2" title="2 stars">★</label>
            <input type="radio" id="star1" name="rating" value="1">
            <label for="star1" title="1 stars">★</label>
        </div>
        <br>
        <div class="mb-3">
        <label for="komentar">Komentar:</label><br>
        <textarea name="komentar" id="komentar" class="form-control" rows="4" placeholder="Ceritakan pengalaman anda..."></textarea>
        <br>
        </div>
        <button type="submit" class="btn btn-primary w-100">Kirim Ulasan</button>
    </form>
    </div>
</body>
</html>