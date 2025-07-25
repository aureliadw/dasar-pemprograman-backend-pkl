<?php 
$koneksi = new mysqli("localhost", "root", "", "db_form");

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $judul_list = $_POST['judul_tugas'] ?? [];
    $deskripsi_list = $_POST['deskripsi'] ?? [];
    $batas_list = $_POST['batas_akhir'] ?? [];
    $status_list = $_POST['status'] ?? [];
    $progress_list = $_POST['progress_hidden'] ?? [];
    $aksi_list = $_POST['aksi'] ?? [];

    for ($i = 0; $i < count($judul_list); $i++) {
        $judul = $koneksi->real_escape_string($judul_list[$i]);
        $deskripsi = $koneksi->real_escape_string($deskripsi_list[$i]);
        $batas = $koneksi->real_escape_string($batas_list[$i]);
        $status = $koneksi->real_escape_string($status_list[$i]);
        $progres = intval($progress_list[$i]);
        $aksi = $koneksi->real_escape_string($aksi_list[$i]);

        if ($judul != "") { 
            $sql = "INSERT INTO manajemen_tugas (judul, deskripsi, batas, status, progres, aksi)
                    VALUES ('$judul', '$deskripsi', '$batas', '$status', $progres, '$aksi')";
            $koneksi->query($sql);
        }
    }

    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

$koneksi->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Manajemen Tugas Proyek</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <style>
    body {
        background-color:rgb(209, 209, 209);
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }
    .container {
        background-color: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 15px rgba(164, 164, 164, 0.1);
        max-width: 900px;
        width: 100%;
        text-align: center;
    }
    table {
        width: 100%;
        table-layout: fixed;
    }
    td, th {
        word-wrap: break-word;
    }
    input[type="range"] {
        width: 100%;
    }
    h5 {
        text-align: left;
        display: block;
    }
  </style>
</head>
<body>
<form method="POST" action="">
    <div class="container">
    <h2>Manajemen Tugas Proyek</h2>
    <p>Proyek:<strong> Pembangunan Aplikasi E-commerce</strong></p>
    <h5><strong> Daftar Tugas </strong></h5>

    <table border="1" class="table table-bordered">
      <thead>
        <tr>
          <th>JUDUL TUGAS</th>
          <th>DESKRIPSI TUGAS</th>
          <th>BATAS AKHIR</th>
          <th>STATUS</th>
          <th>PROGRES (%)</th>
          <th>AKSI</th>
        </tr>
      </thead>
      <tbody id="tabel-body">
        <tr>
          <td><input type="text" name="judul_tugas[]" class="form-control"></td>
          <td><input type="text" name="deskripsi[]" class="form-control"></td>
          <td><input type="date" name="batas_akhir[]" class="form-control"></td>
          <td>
            <select name="status[]" class="form-select">
                <option value="dalam_proses">Dalam Proses</option>
                <option value="selesai">Selesai</option>
                <option value="belum_mengisi">Belum Mengisi</option>
            </select>
          </td>
          <td>
            <input type="range" min="0" max="100" value="0" class="progress-range">
            <span class="output">0%</span>
            <input type="hidden" class="progress-hidden" name="progress_hidden[]" value="0">
          </td>
          <td>
            <select name="aksi[]" class="form-select">
              <option value="hapus">❌</option>
              <option value="selesai">✔️</option>
            </select>
          </td>
        </tr>
      </tbody>
    </table>

    <div class="text-start mb-3">
        <button id="tambah-btn" type="button" class="btn btn-primary">+ Tambah Tugas</button>
    </div>

    <div class="text-start">
      <button type="submit" class="btn btn-success w-100">Simpan Perubahan Tugas</button>
    </div>
  </div>
</form>

<script>
  function updateProgressBar(row) {
    const range = row.querySelector(".progress-range");
    const output = row.querySelector(".output");
    const hidden = row.querySelector(".progress-hidden");

    range.addEventListener("input", () => {
      output.textContent = range.value + "%";
      hidden.value = range.value;
    });
  }

  document.querySelectorAll("#tabel-body tr").forEach(updateProgressBar);

  document.getElementById("tambah-btn").addEventListener("click", function () {
    const tbody = document.getElementById("tabel-body");
    const newRow = document.createElement("tr");

    newRow.innerHTML = `
      <td><input type="text" name="judul_tugas[]" class="form-control"></td>
      <td><input type="text" name="deskripsi[]" class="form-control"></td>
      <td><input type="date" name="batas_akhir[]" class="form-control"></td>
      <td>
        <select name="status[]" class="form-select">
          <option value="dalam_proses">Dalam Proses</option>
          <option value="selesai">Selesai</option>
          <option value="belum_mengisi">Belum Mengisi</option>
        </select>
      </td>
      <td>
        <input type="range" min="0" max="100" value="0" class="progress-range">
        <span class="output">0%</span>
        <input type="hidden" class="progress-hidden" name="progress_hidden[]" value="0">
      </td>
      <td>
        <select name="aksi[]" class="form-select">
          <option value="hapus">❌</option>
          <option value="selesai">✔️</option>
        </select>
      </td>
    `;

    tbody.appendChild(newRow);
    updateProgressBar(newRow);
  });
</script>
</body>
</html>
