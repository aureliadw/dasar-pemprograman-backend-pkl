CREATE DATABASE perpustakaan_sekolah;

USE perpustakaan_sekolah

SHOW DATABASES; 

-- Membuat tabel 'Buku' untuk menyimpan informasi koleksi buku perpustakaan.
-- Kolom:
--   id_buku: Kunci utama unik, otomatis bertambah (INT AUTO_INCREMENT PRIMARY KEY)
--   judul: Nama buku, wajib diisi (VARCHAR(255) NOT NULL)
--   penulis: Nama penulis buku, wajib diisi (VARCHAR(255) NOT NULL)
--   tahun_terbit: Tahun buku diterbitkan, bisa kosong (INT)
--   stok: Jumlah buku yang tersedia, wajib diisi, default 1 (INT NOT NULL DEFAULT 1)
--   tanggal_ditambahkan: Waktu buku dicatat ke sistem, otomatis terisi (TIMESTAMP DEFAULT CURRENT_TIMESTAMP)

CREATE TABLE IF NOT EXISTS Buku (
    id_buku INT AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(255) NOT NULL,
    penulis VARCHAR(255) NOT NULL,
    tahun_terbit INT,
    stok INT NOT NULL DEFAULT 1,
    tanggal_ditambahkan TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

DESC Buku;

CREATE TABLE IF NOT EXISTS Anggota (
    id_anggota INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(255) NOT NULL,
    kelas VARCHAR(50) NOT NULL,
    tanggal_daftar TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

DESC Anggota;

CREATE TABLE IF NOT EXISTS Peminjaman (
    id_peminjaman INT AUTO_INCREMENT PRIMARY KEY,
    id_buku INT NOT NULL,
    id_anggota INT NOT NULL,
    tanggal_pinjam DATE NOT NULL,
    tanggal_kembali DATE,
    FOREIGN KEY (id_buku) REFERENCES Buku(id_buku),
    FOREIGN KEY (id_anggota) REFERENCES Anggota(id_anggota)
);

DESC Peminjaman;

ALTER TABLE Buku
ADD COLUMN penerbit VARCHAR(255);

DESC Buku;

-- Menambahkan kolom 'penerbit' ke tabel Buku
ALTER TABLE Buku
MODIFY COLUMN tahun_terbit SMALLINT

DESC Buku;

ALTER TABLE Buku
DROP COLUMN penerbit;

-- Memasukkan data buku ke tabel 'Buku'
INSERT INTO Buku (judul, penulis, tahun_terbit, stok) VALUES
('Petualangan Sherina', 'Riri Riza', 2000, 5),
('Laskar Pelangi', 'Andrea  Hirata', 2005, 8),
('Ayah, Mengapa Aku Berbeda', 'TereLiye', 2010, 3),
('Harry Potter dan Batu Bertuah', 'J>K> Rowling', 1997, 10);

SELECT * FROM buku;

INSERT INTO Anggota (nama, kelas) VALUES
('Budi Santoso', 'VVI A'),
('Siti Aminah', 'VII B'),
('Joko Susilo', 'IX C'),
('Dewi Lestari', 'VII A');

SELECT * FROM Anggota;

INSERT INTO Peminjaman (id_buku, id_anggota, tanggal_pinjam, tanggal_kembali) VALUES
(1, 1, '2024-07-01', '2024-07-08'), -- Budi pinjam petualangan sherina, sudah kembali
(2, 2, '2024-07-03', NULL),
(3, 3, '2024-07-05', NULL),
(4, 4, '2024-07-06', NULL);

SELECT * FROM Peminjaman;

-- Mengubah stokk buku 'Laskar pelangi' menjadi 7
UPDATE Buku
SET stok = 7
WHERE judul = 'Laskar Pelangi';

SELECT judul, stok FROM Buku WHERE judul = 'Laskar Pelangi';

-- Mengubah tanggal kembali peminjaman Siti Aminah (id_anggota 2, id_buku 2)
UPDATE Peminjaman 
SET tanggal_kembali = '2024-07-01'
WHERE id_buku = 2 AND id_anggota = 2;

SELECT * FROM Peminjaman WHERE id_buku = 2 AND id_anggota = 2;

-- Menghapus buku 'Ayah, Mengapa Aku berbeda?' dari tabel buku
DELETE FROM Buku
WHERE judul = 'Ayah, Mengapa Aku Berbeda?';

SELECT * FROM Buku;

DELETE FROM Peminjaman
WHERE tanggal_kembali IS NOT NULL AND tanggal_kembali < '2024-07-05';

SELECT * FROM Peminjaman;

-- Mengambil  semua kolom (*) daari tabel buku
SELECT * FROM Buku;
SELECT judul, penulis FROM Buku;
SELECT nama FROM Anggota WHERE kelas = 'VII A';

-- Operator Logika: AND, OR, NOT
-- Mencari buku yang ditulis oleh 'andrea hirata' Dan stoknya lebih dari 5
SELECT judul, penulis, stok FROM Buku WHERE penulis = 'Andrea Hirata' AND stok > 5;
-- OR
SELECT nama, kelas FROM Anggota WHERE kelas = 'VII A' OR kelas = 'VII B';
-- NOT
SELECT judul FROM Buku WHERE NOT judul = 'Petualangan Sherina';

-- Operator Pencarian: IN, LIKE
-- Mencari anggota dari kelas 'VII A' atau 'IX C'
SELECT nama, kelas FROM Anggota WHERE kelas IN ('VII A', 'IX C')

-- Mencari buku yang judulnya mengandung kata 'potter'
SELECT judul FROM Buku WHERE judul LIKE '%Potter%';

--Memilih Data Unik: DISTINCT
-- Menampilkan daftar kelas yang unik dari tabel anggota
SELECT DISTINCT kelas FROM Anggota;

--Mengurutkan Hasil: ORDER BY
-- Mengurutkan buku berdasarkan judul secara abjad (A-Z)
SELECT judul, penulis FROM Buku ORDER BY judul ASC;

--Membatasi Hasil: LIMIT
-- Mengambil 2 buku pertama dari tabel buku
SELECT judul, penulis FROM Buku LIMIT 2;

-- Fungsi Agregat: SUM, COUNT, AVG, MIN, MAX
-- Menghitung total stok semua buku di perpustakaan
SELECT SUM(stok) AS total_stok_buku FROM Buku;

-- Mengelompokkan Data: GROUP BY dan HAVING
-- Menghitung jumlah anggota per kelas
SELECT kelas, COUNT(id_anggota) AS jumlah_anggota
FROM Anggota
GROUP BY kelas;
-- Menghitung jumlah anggota per kelas, tapi hanya untuk kelas yang memiliki lebih dari 1 anggota
SELECT kelas, COUNT(id_anggota) AS jumlah_anggota
FROM Anggota
GROUP BY kelas
HAVING COUNT(id_anggota) > 1;

--Menggabungkan Data (JOIN Queries)
-- Menampilkan daftar peminjaman: siapa (nama anggota) meminjam buku apa (judul buku)
SELECT
    A.nama AS nama_anggota,
    B.judul AS judul_buku,
    P.tanggal_pinjam,
    P.tanggal_kembali
FROM Peminjaman AS P
INNER JOIN Anggota AS A ON P.id_anggota = A.id_anggota
INNER JOIN Buku AS B ON P.id_buku = B.id_buku;

--Menampilkan semua anggota dan buku yang pernah mereka pinjam (jika ada)
SELECT
    A.nama AS nama_anggota,
    B.judul AS judul_buku,
    P.tanggal_pinjam
FROM Anggota AS A
LEFT JOIN Peminjaman AS P ON A.id_anggota = P.id_anggota
LEFT JOIN Buku AS B ON P.id_buku = B.id_buku;

-- Menampilkan semua buku dan siapa saja yang meminjamnya (jika ada)
SELECT
    B.judul AS judul_buku,
    A.nama AS nama_anggota,
    P.tanggal_pinjam
FROM Buku AS B
RIGHT JOIN Peminjaman AS P ON B.id_buku = P.id_buku
RIGHT JOIN Anggota AS A ON P.id_anggota = A.id_anggota;

-- Mencari pasangan buku yang ditulis oleh penulis yang sama 
SELECT
    B1.judul AS judul_buku_1,
    B1.penulis,
    B2.judul AS judul_buku_2
FROM Buku AS B1
INNER JOIN Buku AS B2 ON B1.penulis = B2.penulis
WHERE B1.id_buku < B2.id_buku
