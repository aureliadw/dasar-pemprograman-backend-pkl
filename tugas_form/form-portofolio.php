<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "db_form";

$koneksi = new mysqli($host, $user, $password, $database);
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

$pesan = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul = htmlspecialchars($_POST['judul_portofolio'] ?? '');
    $ringkasan = htmlspecialchars($_POST['ringkasan_portofolio'] ?? '');
    $keahlian = isset($_POST['keahlian']) ? implode(",", array_map('htmlspecialchars', $_POST['keahlian'])) : '';
    $warna_tema = htmlspecialchars($_POST['warna_tema'] ?? '#ffffff');
    
    $gambar = '';
    if (isset($_FILES['gambar_proyek'])) {
        $gambarNames = array_filter($_FILES['gambar_proyek']['name']);
        $gambar = !empty($gambarNames) ? json_encode($gambarNames) : '';
    }

    $terima_klien = isset($_POST['terima_klien']) ? 'ya' : 'tidak';
    $layanan = isset($_POST['layanan']) ? implode(",", array_map('htmlspecialchars', $_POST['layanan'])) : '';

    $longitude = isset($_POST['longitude']) ? floatval($_POST['longitude']) : null;
    $latitude = isset($_POST['latitude']) ? floatval($_POST['latitude']) : null;

    if ($longitude < -180 || $longitude > 180) {
        $pesan = "Error: Longitude harus berada dalam rentang -180 hingga 180.";
    } elseif ($latitude < -90 || $latitude > 90) {
        $pesan = "Error: Latitude harus berada dalam rentang -90 hingga 90.";
    }

    $items = [];
    if (isset($_POST['judul_item']) && is_array($_POST['judul_item'])) {
        $judul_items = $_POST['judul_item'];
        $deskripsi_items = $_POST['deskripsi_item'] ?? array_fill(0, count($judul_items), '');
        $url_items = $_POST['url_item'] ?? array_fill(0, count($judul_items), '');

        for ($i = 0; $i < count($judul_items); $i++) {
            $judul_item = trim(htmlspecialchars($judul_items[$i]));
            $deskripsi_item = trim(htmlspecialchars($deskripsi_items[$i]));
            $url_item = trim(filter_var($url_items[$i], FILTER_SANITIZE_URL));

            if (!empty($judul_item) && !empty($deskripsi_item) && !empty($url_item) && filter_var($url_item, FILTER_VALIDATE_URL)) {
                $items[] = [
                    'judul' => $judul_item,
                    'deskripsi' => $deskripsi_item,
                    'url' => $url_item
                ];
            } else {
                $pesan = "Error: Semua field item proyek harus diisi dengan benar!";
                break;
            }
        }
    }

    if (empty($pesan)) {
        $item_json = !empty($items) ? json_encode($items) : NULL;
        
        $stmt = $koneksi->prepare("INSERT INTO portofolio (
            judul_portofolio, ringkasan_portofolio, keahlian,
            warna_tema, gambar_proyek, terima_klien, layanan, 
            longitude, latitude, items
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        $stmt->bind_param(
            "ssssssssss",
            $judul, $ringkasan, $keahlian,
            $warna_tema, $gambar, $terima_klien,
            $layanan, $longitude, $latitude, $item_json
        );

        if ($stmt->execute()) {
            $pesan = "Data berhasil disimpan!";
            error_log("Data items yang disimpan: " . print_r($items, true));
        } else {
            $pesan = "Gagal menyimpan data: " . $stmt->error;
            error_log("Error MySQL: " . $stmt->error);
            error_log("Query: " . $stmt->errno);
        }

        $stmt->close();
    }
}
?>

<?php if ($pesan): ?>
<div class="alert alert-info text-center"> <?= $pesan ?> </div>
<?php endif; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Portofolio Saya</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

  <style>
    body {
      background-color: rgb(209, 209, 209);
    }
    .container {
      background-color: white;
      padding: 40px;
      border-radius: 10px;
      box-shadow: 0 0 15px rgba(129, 129, 129, 0.1);
      max-width: 600px;
      margin: 80px auto;
      text-align: center;
    }
    label {
      text-align: left;
      display: block;
    }
    form > * {
      margin-bottom: 15px;
    }
    h5 {
      text-align: left;
      display: block;
    }
    table th, table td {
      padding: 6px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Portofolio Saya</h2>
    <h5>Informasi Dasar</h5>

    <form method="POST" action="form-portofolio.php" enctype="multipart/form-data">
      <label for="judul">Judul Portofolio:</label>
      <input type="text" name="judul_portofolio" id="judul" class="form-control" required />

      <label for="portofolio">Ringkasan Portofolio:</label>
      <textarea name="ringkasan_portofolio" id="portofolio" rows="5" class="form-control" required></textarea>

      <label for="keahlian">Keahlian:</label>
      <select multiple name="keahlian[]" id="keahlian" class="form-select">
        <option>Pengembangan Aplikasi Mobile</option>
        <option>Penulisan Konten</option>
        <option>Pemasaran Digital</option>
      </select>

      <label for="warna">Warna Tema Portofolio:</label>
      <input type="color" name="warna_tema" id="warna" class="form-control" />

      <h5>Galeri Gambar Proyek</h5>
      <label for="gambar">Unggah Gambar Proyek:</label>
      <input type="file" name="gambar_proyek[]" id="gambar" multiple class="form-control" />

      <h5>Item Proyek Anda</h5>
      <input type="text" name="judul_item[]" placeholder="Nama proyek" class="form-control" required />
      <input type="text" name="deskripsi_item[]" placeholder="Ringkasan proyek" class="form-control" required />
      <input type="url" name="url_item[]" placeholder="https://www.example.com" class="form-control" required />
      <button type="button" class="btn btn-primary btn-sm mt-2" onclick="tambahItem()">Tambah Item Proyek</button>

      <table id="tabelItem" class="table table-bordered mt-3">
        <thead>
          <tr>
            <th>Judul</th>
            <th>Deskripsi</th>
            <th>URL</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>

      <h5>Lokasi Utama (Peta)</h5>
      <input type="text" name="longitude" id="long" placeholder="Longitude" class="form-control" />
      <input type="text" name="latitude" id="lat" placeholder="Latitude" class="form-control" />
      <button type="button" class="btn btn-success w-100 mt-2" onclick="tampilkanLokasi()">Cari & Tampilkan Lokasi</button>
      <p id="lokasi-output" class="mt-2"></p>

      <h5>Persetujuan</h5>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="terima_klien" value="ya" checked />
        <label class="form-check-label">Saya sedang terbuka untuk menerima klien baru</label>
      </div>

      <label>Layanan yang Ditawarkan:</label>
      <input type="checkbox" name="layanan[]" value="Konsultasi" checked /> Konsultasi
      <input type="checkbox" name="layanan[]" value="Maintenance" checked /> Maintenance
      <input type="checkbox" name="layanan[]" value="Pelatihan" /> Pelatihan

      <div class="form-check mt-2">
        <input class="form-check-input" type="checkbox" name="setuju" required />
        <label class="form-check-label">
          Saya menyetujui <a href="#">Syarat & Ketentuan</a> serta <a href="#">Kebijakan Privasi</a>
        </label>
      </div>

      <button type="submit" class="btn btn-primary mt-3 w-100">Simpan Portofolio</button>
    </form>
  </div>

  <script>
    function tambahItem() {
      const table = document.querySelector("#tabelItem tbody");
      const row = document.createElement("tr");
      row.innerHTML = `
        <td><input type="text" name="judul_item[]" class="form-control" required /></td>
        <td><input type="text" name="deskripsi_item[]" class="form-control" required /></td>
        <td><input type="url" name="url_item[]" class="form-control" required /></td>
        <td><button type="button" class="btn btn-danger btn-sm" onclick="this.parentElement.parentElement.remove()">Hapus</button></td>
      `;
      table.appendChild(row);
    }

    function tampilkanLokasi() {
      const long = document.getElementById("long").value;
      const lat = document.getElementById("lat").value;
      document.getElementById("lokasi-output").textContent = `Lokasi yang ditampilkan: ${lat}, ${long}`;
    }

    document.addEventListener("DOMContentLoaded", function () {
      $('#keahlian').select2();
    });
  </script>
</body>
</html>
