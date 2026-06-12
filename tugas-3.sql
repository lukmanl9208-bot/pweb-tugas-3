-- Tugas 3: Buat tabel fakultas dan prodi dengan contoh data

-- Tabel fakultas
CREATE TABLE IF NOT EXISTS fakultas (
  fakultas_id INT PRIMARY KEY,
  fakultas_name VARCHAR(100) NOT NULL
);

-- Tabel prodi
CREATE TABLE IF NOT EXISTS prodi (
  prodi_id INT PRIMARY KEY,
  fakultas_id INT,
  prodi_name VARCHAR(100) NOT NULL,
  prodi_strata VARCHAR(10),
  FOREIGN KEY (fakultas_id) REFERENCES fakultas(fakultas_id) ON DELETE CASCADE
);

-- Isi tabel fakultas (contoh)
INSERT INTO fakultas (fakultas_id, fakultas_name) VALUES
(1, 'Fakultas Teknik'),
(2, 'Fakultas Humaniora, Hukum & Pariwisata'),
(3, 'Fakultas Kedokteran'),
(4, 'Fakultas Kesehatan'),
(5, 'Fakultas Ekonomi & Bisnis'),
(6, 'Fakultas Seni & Desain'),
(7, 'Fakultas Pendidikan');

-- Isi tabel prodi (contoh)
INSERT INTO prodi (prodi_id, fakultas_id, prodi_name, prodi_strata) VALUES
(1, 1, 'Ilmu Komputer', 'S1'),
(2, 1, 'Teknologi Informasi', 'S1'),
(3, 1, 'Rekayasa Perangkat Lunak', 'S1'),
(4, 1, 'Sistem Informasi', 'D3'),
(5, 2, 'Sastra Inggris', 'S1'),
(6, 2, 'Pariwisata', 'S1'),
(7, 3, 'Kedokteran', 'S1'),
(8, 4, 'Gizi', 'S1'),
(9, 5, 'Manajemen', 'S1'),
(10, 6, 'Desain Komunikasi Visual', 'S1'),
(11, 7, 'Pendidikan Teknologi Informasi', 'S1');
