<?php
$koneksi = new mysqli("localhost", "root", "", "db_form");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama            = $_POST["nama"];
    $email           = $_POST["email"];
    $kata_sandi      = password_hash($_POST["kata_sandi"], PASSWORD_DEFAULT);
    $konfirmasi_sandi = $_POST["konfirmasi_sandi"];

    if (!password_verify($konfirmasi_sandi, $kata_sandi)) {
        echo "<script>alert('Konfirmasi kata sandi tidak cocok!');</script>";
        exit;
    }

    $tipe_pengguna   = $_POST["tipe_pengguna"];
    $nomor_telepon   = $_POST["nomor_telepon"];
    $bio             = $_POST["bio"];
    $gambar_profil   = $_FILES["gambar_profil"]["name"];
    $tmp_name        = $_FILES["gambar_profil"]["tmp_name"];

    $stmt = $koneksi->prepare(
        "INSERT INTO pengguna (nama, email, kata_sandi, tipe_pengguna, nomor_telepon, bio, gambar_profil) 
         VALUES (?, ?, ?, ?, ?, ?, ?)"
    );
    $stmt->bind_param("sssssss", $nama, $email, $kata_sandi, $tipe_pengguna, $nomor_telepon, $bio, $gambar_profil);

    if ($stmt->execute()) {
        move_uploaded_file($tmp_name, "uploads/" . $gambar_profil);
        header("Location: form-posting-proyek.php?status=sukses");
        exit();
    } else {
        echo "<script>alert('Terjadi kesalahan saat registrasi.');</script>";
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
            box-shadow: 0 0 15px rgba(140, 140, 140, 0.1);
            max-width: 500px;
            margin: 80px auto;
            text-align: center;
        }
        h4 {
            text-align: left;
            display: block;
        }
        label {
            text-align: left;
            display: block;
            margin-top: 10px;
        }
        button{
            margin: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
    <h2>Registrasi Pengguna</h2><br>
    <h4>Informasi Akun</h4>
    <br>
    <form method="POST" enctype="multipart/form-data">
        <label for="nama">Nama Lengkap:</label>
        <input type="text" id="nama" name="nama" class="form-control" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" class="form-control" required>

        <div class="position-relative">
        <label for="password">Kata Sandi:</label>
        <input type="password" id="password" name="kata_sandi" class="form-control">
        <i class="bi bi-eye-slash position-absolute end-0 top-50 translate-middle-y me-3" id="togglePassword" style="cursor:pointer;"></i>
        </div>

        <label for="confirm_password">Konfirmasi Kata Sandi:</label>
        <input type="password" id="confirm_password" name="konfirmasi_sandi" class="form-control" required>
        <br>

        <h4>Tipe Pengguna</h4>
        <div class="form-check text-start">
            <label>
            <input type="radio" name="tipe_pengguna" id="klien" value="klien"> Klien
            </label>
            <label>
            <input type="radio" name="tipe_pengguna" id="freelancer" value="freelancer"> Freelancer
            </label>
        </div>
        <br>
        <h4>Detail Tambahan</h4>
        <label for="number">Nomor Telepon:</label>
        <input type="tel" id="number" name="nomor_telepon" pattern="\d{10,13}" maxlength="13" class="form-control">

        <label for="bio">Bio (khusus Freelancer):</label>
        <textarea name="bio" id="bio" class="form-control"></textarea>

        <label for="file">Gambar Profil</label>
        <input type="file" name="gambar_profil" id="file" accept="image/png, image/jpg, image/jpeg, image/webp">
        
        <button type="submit" class="btn btn-primary w-100">Daftar Sekarang</button>
    </form>
</div>
</body>
</html>