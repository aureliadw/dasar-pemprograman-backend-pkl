<?php
$koneksi = new mysqli("localhost", "root", "", "db_form");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $jumlah_pembayaran = $_POST["jumlah_pembayaran"];
    $metode_pembayaran = $_POST["metode_pembayaran"];
    $setuju_syarat = isset($_POST["setuju_syarat"]) ? 1 : 0;

    $stmt = $koneksi->prepare("INSERT INTO pembayaran (jumlah_pembayaran, metode_pembayaran, setuju_syarat) VALUES (?, ?, ?)");
    $stmt->bind_param("isi", $jumlah_pembayaran, $metode_pembayaran, $setuju_syarat);

    if ($stmt->execute()) {
        echo "<script>alert('Pembayaran berhasil disimpan!');</script>";
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
            box-shadow: 0 0 15px rgba(156, 156, 156, 0.1);
            max-width: 500px;
            margin: 80px auto;
            text-align: center;
        }
        button{
            margin: 5px;
        }
        label {
            text-align: left;
            display: block;
        }
    </style>
</head>
<body>
    <div class="container">
    <h2>Pembayaran Proyek</h2>
    <p>Proyek: <strong>Pembangunan Aplikasi E-commerce</strong></p>

    <div class="mb-3">
    <form method="POST" action="form-pembayaran.php">
        <label for="jumlah">Jumlah Pembayaran (IDR):</label><br>
        <input type="number" name="jumlah_pembayaran" id="jumlah" class="form-control" min="0" step="100"><br>

        <label for="metode">Metode Pembayaran:</label><br>
        <select name="metode_pembayaran" id="metode" class="form-control">
            <option value="transfer">Transfer Bank</option>
            <option value="ewallet">E-Wallet</option>
            <option value="cod">Cash on Delivery</option>
        </select>
        <br>
        <input type="checkbox" name="setuju_syarat" value="1"> Saya setuju dengan syarat dan ketentuan pembayaran</input>
        <br>
        <button type="submit" class="btn btn-primary w-100">Lanjutkan Pembayaran</button>
    </form>
    </div>
    </div>
</body>
</html>