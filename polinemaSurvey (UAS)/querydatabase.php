CREATE TABLE m_user (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(20),
    nama VARCHAR (50),
    password VARCHAR(255),
    role ENUM ('admin','mahasiswa', 'alumni', 'orangtua', 'dosen', 'tendik', 'industri')
);

CREATE TABLE m_kategori (
    kategori_id INT AUTO_INCREMENT PRIMARY KEY,
    kategori_nama ENUM ('mahasiswa', 'alumni', 'orangtua', 'dosen', 'tendik', 'industri')
);

CREATE TABLE m_survey (
    survey_id INT AUTO_INCREMENT PRIMARY KEY,
    survey_nama ENUM ('pengajaran', 'fasilitas', 'lulusan', 'pelayanan')
);

CREATE TABLE dimensi (
    dimensi_id INT AUTO_INCREMENT PRIMARY KEY,
    dimensi_nama ENUM ('tangibles', 'reliability', 'responsiveness', 'assurance', 'empathy'),
    dimensi_bobot INT
);

CREATE TABLE m_survey_soal (
    soal_id INT AUTO_INCREMENT PRIMARY KEY,
    survey_id INT,
    dimensi_id INT,
    kategori_id INT,
    no_urut INT (11),
    soal_nama VARCHAR(500),
    FOREIGN KEY (kategori_id) REFERENCES m_kategori(kategori_id),
    FOREIGN KEY (survey_id) REFERENCES m_survey(survey_id),
    FOREIGN KEY (dimensi_id) REFERENCES dimensi(dimensi_id)
);

CREATE TABLE m_history (
    history_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    survey_id INT,
    kategori_id INT,
    saran VARCHAR (500),
    survey_tanggal DATETIME,
    FOREIGN KEY (user_id) REFERENCES m_user (user_id),
    FOREIGN KEY (survey_id) REFERENCES m_survey(survey_id),
    FOREIGN KEY (kategori_id) REFERENCES m_kategori(kategori_id)
);


CREATE TABLE t_responden_dosen  (
    responden_dosen_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    responden_nip VARCHAR(20),
    responden_nama VARCHAR(50),
    responden_unit VARCHAR(50),
    responden_tanggal DATETIME,
    FOREIGN KEY (user_id) REFERENCES m_user (user_id)
);

CREATE TABLE t_responden_tendik (
    responden_tendik_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    responden_nopeg VARCHAR(20),
    responden_nama VARCHAR(50),
    responden_unit VARCHAR(50),
    responden_tanggal DATETIME,
    FOREIGN KEY (user_id) REFERENCES m_user (user_id)
);

CREATE TABLE t_responden_mahasiswa (
    responden_mahasiswa_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    responden_nim VARCHAR(20),
    responden_nama VARCHAR(50),
    responden_prodi VARCHAR(100),
    responden_email VARCHAR(100),
    responden_hp VARCHAR(20),
    tahun_masuk YEAR,
    responden_tanggal DATETIME,
    FOREIGN KEY (user_id) REFERENCES m_user (user_id)
);

CREATE TABLE t_responden_alumni (
    responden_alumni_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    responden_nim VARCHAR(20),
    responden_nama VARCHAR(50),
    responden_prodi VARCHAR(100),
    responden_email VARCHAR(100),
    responden_hp VARCHAR(20),
    tahun_lulus YEAR,
    responden_tanggal DATETIME,
    FOREIGN KEY (user_id) REFERENCES m_user (user_id)
);

CREATE TABLE t_responden_ortu (
    responden_ortu_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    responden_nama VARCHAR(50),
    responden_jk ENUM('L', 'P'),
    responden_umur TINYINT,
    responden_hp VARCHAR(20),
    responden_pendidikan VARCHAR(30),
    responden_pekerjaan VARCHAR(50),
    mahasiswa_nim VARCHAR(20),
    mahasiswa_nama VARCHAR(50),
    mahasiswa_prodi VARCHAR(100),
    responden_tanggal DATETIME,
    FOREIGN KEY (user_id) REFERENCES m_user (user_id)
);

CREATE TABLE t_responden_industri (
    responden_industri_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    responden_nama VARCHAR(50),
    responden_jabatan VARCHAR(50),
    responden_perusahaan VARCHAR(50),
    responden_email VARCHAR(100),
    responden_hp VARCHAR(20),
    responden_kota VARCHAR(50),
    responden_tanggal DATETIME,
    FOREIGN KEY (user_id) REFERENCES m_user (user_id)
);


CREATE TABLE t_jawaban_dosen (
    jawaban_dosen_id INT AUTO_INCREMENT PRIMARY KEY,
    responden_dosen_id INT,
    soal_id INT,
    jawaban VARCHAR(255),
    FOREIGN KEY (responden_dosen_id) REFERENCES t_responden_dosen (responden_dosen_id),
    FOREIGN KEY (soal_id) REFERENCES m_survey_soal (soal_id)
);

CREATE TABLE t_jawaban_tendik (
    jawaban_tendik_id INT AUTO_INCREMENT PRIMARY KEY,
    responden_tendik_id INT,
    soal_id INT,
    jawaban VARCHAR(255),
    FOREIGN KEY (responden_tendik_id) REFERENCES t_responden_tendik(responden_tendik_id),
    FOREIGN KEY (soal_id) REFERENCES m_survey_soal (soal_id)
);

CREATE TABLE t_jawaban_mahasiswa (
    jawaban_mahasiswa_id INT AUTO_INCREMENT PRIMARY KEY,
    responden_mahasiswa_id INT,
    soal_id INT,
    jawaban VARCHAR(255),
    FOREIGN KEY (responden_mahasiswa_id) REFERENCES t_responden_mahasiswa(responden_mahasiswa_id),
    FOREIGN KEY (soal_id) REFERENCES m_survey_soal (soal_id)
);

CREATE TABLE t_jawaban_alumni (
    jawaban_alumni_id INT AUTO_INCREMENT PRIMARY KEY,
    responden_alumni_id INT,
    soal_id INT,
    jawaban VARCHAR(255),
    FOREIGN KEY (responden_alumni_id) REFERENCES t_responden_alumni(responden_alumni_id),
    FOREIGN KEY (soal_id) REFERENCES m_survey_soal (soal_id)
);

CREATE TABLE t_jawaban_ortu (
    jawaban_ortu_id INT AUTO_INCREMENT PRIMARY KEY,
    responden_ortu_id INT,
    soal_id INT,
    jawaban VARCHAR(255),
    FOREIGN KEY (responden_ortu_id) REFERENCES t_responden_ortu(responden_ortu_id),
    FOREIGN KEY (soal_id) REFERENCES m_survey_soal (soal_id)
);

CREATE TABLE t_jawaban_industri (
    jawaban_industri_id INT AUTO_INCREMENT PRIMARY KEY,
    responden_industri_id INT,
    soal_id INT,
    jawaban VARCHAR(255),
    FOREIGN KEY (responden_industri_id) REFERENCES t_responden_industri(responden_industri_id),
    FOREIGN KEY (soal_id) REFERENCES m_survey_soal (soal_id)
);

INSERT INTO m_user (nama, username, password, role) VALUES 
('admin', 'admin', ('iniadminya'), 'admin');

INSERT INTO m_survey (survey_nama) VALUES 
('pengajaran'),
('fasilitas'),
('lulusan'),
('pelayanan');

INSERT INTO m_kategori (kategori_nama) VALUES
('mahasiswa'),
('alumni'),
('orangtua'),
('dosen'),
('tendik'),
('industri');

INSERT INTO dimensi (dimensi_nama, dimensi_bobot)
VALUES
    ('tangibles', 20),
    ('reliability', 20),
    ('responsiveness', 20),
    ('assurance', 20),
    ('empathy', 20);

INSERT INTO m_survey_soal (survey_id, dimensi_id, kategori_id, no_urut, soal_nama) VALUES
-- pengajaran mahasiswa
(1, 1, 1, 1, 'Apakah fasilitas fisik seperti ruang kelas, proyektor, dan perlengkapan belajar lainnya memadai untuk mendukung proses belajar?'),
(1, 2, 1, 2, 'Seberapa konsisten dosen dalam memberikan materi kuliah sesuai dengan jadwal?'),
(1, 3, 1, 3, 'Seberapa cepat dosen menanggapi pertanyaan dan memberikan bantuan saat dibutuhkan?'),
(1, 4, 1, 4, 'Seberapa yakin Anda dengan kompetensi dan pengetahuan dosen dalam bidang yang diajarkan?'),
(1, 5, 1, 5, 'Seberapa peduli dosen terhadap kebutuhan dan masalah akademik Anda?'),
-- fasilitas mahasiswa
(2, 1, 1, 1, 'Bagaimana penilaian Anda terhadap kondisi fisik ruang kelas dan laboratorium di kampus?'),
(2, 2, 1, 2, 'Seberapa sering fasilitas kampus seperti perpustakaan dan laboratorium tersedia dan dapat diakses saat dibutuhkan?'),
(2, 3, 1, 3, 'Seberapa cepat staf kampus merespons dan memperbaiki masalah terkait fasilitas?'),
(2, 4, 1, 4, 'Seberapa aman Anda merasa saat menggunakan fasilitas kampus seperti ruang kelas, perpustakaan, dan laboratorium?'),
(2, 5, 1, 5, 'Seberapa peduli pihak kampus terhadap kenyamanan dan kebutuhan fasilitas mahasiswa?'),
-- pelayanan mahasiswa
(4, 1, 1, 1, 'Bagaimana penilaian Anda terhadap penampilan dan kebersihan area layanan administrasi kampus?'),
(4, 2, 1, 2, 'Seberapa sering staf administrasi memberikan informasi yang akurat dan dapat diandalkan?'),
(4, 3, 1, 3, 'Seberapa cepat staf administrasi merespons permintaan dan keluhan mahasiswa?'),
(4, 4, 1, 4, 'Seberapa percaya Anda terhadap kemampuan staf administrasi dalam menyelesaikan masalah administratif?'),
(4, 5, 1, 5, 'Seberapa peduli staf administrasi terhadap kebutuhan dan keluhan Anda sebagai mahasiswa?'),

-- pengajaran alumni
(1, 1, 2, 1, 'Seberapa baik pendidikan selama Anda kuliah dalam mendukung proses belajar?'),
(1, 2, 2, 2, 'Seberapa konsisten pendidikan di Polinema mempersiapkan Anda untuk karier Anda?'),
(1, 3, 2, 3, 'Seberapa cepat dosen dan staf akademik merespons kebutuhan akademik Anda selama kuliah?'),
(1, 4, 2, 4, 'Seberapa yakin Anda dengan kompetensi dosen dalam mengajar dan membimbing Anda?'),
(1, 5, 2, 5, 'Seberapa peduli dosen terhadap perkembangan akademik dan karier Anda?'),
-- fasilitas alumni
(2, 1, 2, 1, 'Bagaimana penilaian Anda terhadap kondisi fisik dan kebersihan fasilitas kampus saat Anda kuliah?'),
(2, 2, 2, 2, 'Seberapa sering Anda dapat mengakses fasilitas seperti perpustakaan dan laboratorium saat diperlukan?'),
(2, 3, 2, 3, 'Seberapa cepat masalah terkait fasilitas ditangani oleh pihak kampus?'),
(2, 4, 2, 4, 'Seberapa aman Anda merasa saat menggunakan fasilitas kampus seperti ruang kelas dan laboratorium?'),
(2, 5, 2, 5, 'Seberapa peduli pihak kampus terhadap kebutuhan dan kenyamanan fasilitas mahasiswa?'),
-- lulusan alumni
(3, 1, 2, 1, 'Bagaimana penilaian Anda terhadap fasilitas dan sumber daya yang digunakan POLINEMA dalam mendukung kelulusan Anda?'),
(3, 2, 2, 2, 'Seberapa relevan pengetahuan dan keterampilan yang Anda peroleh di POLINEMA dengan pekerjaan Anda saat ini?'),
(3, 3, 2, 3, 'Seberapa cepat POLINEMA merespons kebutuhan dan umpan balik Anda sebagai alumni yang telah lulus?'),
(3, 4, 2, 4, 'Seberapa yakin Anda dengan kemampuan dan kompetensi yang Anda peroleh dari POLINEMA untuk bersaing di dunia kerja?'),
(3, 5, 2, 5, 'Seberapa peduli POLINEMA terhadap perkembangan karier dan kebutuhan profesional Anda setelah lulus?'),
-- pelayanan alumni
(4, 1, 2, 1, 'Bagaimana penilaian Anda terhadap penampilan dan kebersihan area layanan administrasi kampus?'),
(4, 2, 2, 2, 'Seberapa konsisten staf administrasi memberikan informasi yang akurat dan dapat diandalkan?'),
(4, 3, 2, 3, 'Seberapa cepat staf administrasi merespons permintaan dan keluhan mahasiswa?'),
(4, 4, 2, 4, 'Seberapa percaya Anda terhadap kemampuan staf administrasi dalam menyelesaikan masalah administratif?'),
(4, 5, 2, 5, 'Seberapa peduli staf administrasi terhadap kebutuhan dan keluhan Anda sebagai mahasiswa?'),

-- pengajaran orangtua
(1, 1, 3, 1, 'Bagaimana penilaian Anda terhadap fasilitas pembelajaran yang digunakan oleh mahasiswa di POLINEMA?'),
(1, 2, 3, 2, 'Bagaimana kualitas kurikulum dan sistem pembelajaran di POLINEMA?'),
(1, 3, 3, 3, 'Seberapa cepat dosen menanggapi pertanyaan dan memberikan bantuan saat dibutuhkan?'),
(1, 4, 3, 4, 'Seberapa baik kualitas pengajaran dan kompetensi dosen di POLINEMA?'),
(1, 5, 3, 5, 'Seberapa peduli dosen terhadap kebutuhan dan masalah akademik mahasiswa?'),
-- fasilitas orangtua
(2, 1, 3, 1, 'Bagaimana penilaian Anda terhadap kondisi fisik dan kebersihan fasilitas kampus POLINEMA?'),
(2, 2, 3, 2, 'Seberapa sering fasilitas kampus seperti perpustakaan dan laboratorium tersedia dan dapat diakses saat dibutuhkan?'),
(2, 3, 3, 3, 'Seberapa cepat pihak kampus merespons dan memperbaiki masalah terkait fasilitas?'),
(2, 4, 3, 4, 'Seberapa yakin Anda bahwa fasilitas di kampus aman untuk digunakan oleh mahasiswa?'),
(2, 5, 3, 5, 'Seberapa peduli pihak kampus terhadap kebutuhan fasilitas yang mendukung kenyamanan belajar mahasiswa?'),
-- lulusan orangtua
(3, 1, 3, 1, 'Bagaimana penilaian Anda terhadap fasilitas dan sumber daya yang disediakan POLINEMA untuk mendukung kelulusan anak Anda?'),
(3, 2, 3, 2, 'Seberapa sesuai pengetahuan dan keterampilan yang diperoleh anak Anda di POLINEMA dengan tuntutan dunia kerja saat ini?'),
(3, 3, 3, 3, 'Seberapa cepat POLINEMA merespons pertanyaan atau kekhawatiran Anda terkait prospek kerja anak Anda setelah lulus?'),
(3, 4, 3, 4, 'Seberapa yakin Anda dengan kemampuan dan kompetensi yang dimiliki anak Anda setelah lulus dari POLINEMA?'),
(3, 5, 3, 5, 'Seberapa peduli POLINEMA terhadap kesiapan anak Anda untuk menghadapi tantangan di dunia kerja?'),
-- pelayanan orangtua
(4, 1, 3, 1, 'Bagaimana penilaian Anda terhadap penampilan dan kebersihan area layanan administrasi kampus?'),
(4, 2, 3, 2, 'Seberapa konsisten staf administrasi memberikan informasi yang akurat dan dapat diandalkan?'),
(4, 3, 3, 3, 'Seberapa cepat dan responsif pihak POLINEMA dalam menangani keluhan dari orang tua atau wali?'),
(4, 4, 3, 4, 'Seberapa ramah pegawai POLINEMA dalam memberikan layanan kepada mahasiswa dan orang tua?'),
(4, 5, 3, 5, 'Seberapa baik komunikasi yang diberikan pihak POLINEMA (khususnya Dosen Pembina Akademik/ Kaprodi/ Kajur) dengan orang tua atau wali mahasiswa?'),

-- pengajaran dosen
(1, 1, 4, 1, 'Bagaimana penilaian Anda terhadap fasilitas fisik yang digunakan untuk mengajar?'),
(1, 2, 4, 2, 'Seberapa sering Anda dapat mengakses sumber daya dan materi yang diperlukan untuk mengajar?'),
(1, 3, 4, 3, 'Seberapa cepat pihak kampus merespons kebutuhan dan permintaan Anda terkait pengajaran?'),
(1, 4, 4, 4, 'Seberapa yakin Anda dengan dukungan yang diberikan oleh pihak kampus dalam meningkatkan kompetensi mengajar?'),
(1, 5, 4, 5, 'Seberapa peduli pihak kampus terhadap kebutuhan dan masalah yang Anda hadapi dalam pengajaran?'),
-- fasilitas dosen
(2, 1, 4, 1, 'Bagaimana penilaian Anda terhadap kondisi fisik ruang kelas dan laboratorium yang Anda gunakan untuk mengajar?'),
(2, 2, 4, 2, 'Seberapa sering fasilitas yang Anda butuhkan untuk mengajar tersedia dan dapat diakses?'),
(2, 3, 4, 3, 'Seberapa cepat pihak kampus merespons masalah terkait fasilitas yang Anda gunakan?'),
(2, 4, 4, 4, 'Seberapa yakin Anda bahwa fasilitas yang tersedia aman untuk digunakan dalam pengajaran?'),
(2, 5, 4, 5, 'Seberapa peduli pihak kampus terhadap kebutuhan Anda terkait fasilitas pengajaran?'),
-- pelayanan dosen
(4, 1, 4, 1, 'Bagaimana penilaian Anda terhadap penampilan dan kebersihan area layanan administrasi kampus?'),
(4, 2, 4, 2, 'Seberapa sering staf administrasi memberikan informasi yang akurat dan dapat diandalkan?'),
(4, 3, 4, 3, 'Seberapa cepat staf administrasi merespons permintaan dan keluhan Anda sebagai dosen?'),
(4, 4, 4, 4, 'Seberapa percaya Anda terhadap kemampuan staf administrasi dalam menyelesaikan masalah administratif?'),
(4, 5, 4, 5, 'Seberapa peduli staf administrasi terhadap kebutuhan dan keluhan Anda sebagai dosen?'),

-- fasilitas tendik
(2, 1, 5, 1, 'Seberapa puas Anda dengan kondisi fasilitas kerja yang Anda gunakan sehari-hari?'),
(2, 2, 5, 2, 'Apakah fasilitas kerja selalu tersedia dan berfungsi dengan baik?'),
(2, 3, 5, 3, 'Seberapa cepat respons perbaikan jika ada kerusakan pada fasilitas kerja?'),
(2, 4, 5, 4, 'Seberapa memadai dukungan yang diberikan oleh manajemen terkait fasilitas kerja Anda?'),
(2, 5, 5, 5, 'Seberapa baik komunikasi dan pemahaman manajemen terhadap kebutuhan fasilitas kerja Anda?'),
-- pelayanan tendik
(4, 1, 5, 1, 'Bagaimana penilaian Anda terhadap layanan administrasi di Polinema?'),
(4, 2, 5, 2, 'Seberapa lancar proses pengajuan cuti atau izin?'),
(4, 3, 5, 3, 'Seberapa cepat dan tanggap pelayanan manajemen terhadap permasalahan yang Anda hadapi?'),
(4, 4, 5, 4, 'Seberapa memadai pelatihan untuk pengembangan profesional Anda?'),
(4, 5, 5, 5, 'Bagaimana penilaian Anda terhadap komunikasi internal di Polinema?'),

-- fasilitas industri
(2, 1, 6, 1, 'Seberapa memadai fasilitas kampus dalam mendukung kerja sama industri?'),
(2, 2, 6, 2, 'Bagaimana konsistensi POLINEMA dalam menyediakan fasilitas yang diperlukan untuk kolaborasi industri?'),
(2, 3, 6, 3, 'Seberapa cepat POLINEMA dalam memperbarui atau memperbaiki fasilitas yang digunakan dalam kerja sama proyek?'),
(2, 4, 6, 4, 'Seberapa yakin Anda dengan kualitas dan kondisi fasilitas laboratorium yang digunakan untuk penelitian dan proyek industri?'),
(2, 5, 6, 5, 'Seberapa baik POLINEMA memahami dan memenuhi kebutuhan fasilitas yang diperlukan oleh industri?'),
-- lulusan industri
(3, 1, 6, 1, 'Bagaimana penampilan profesional dan kesiapan kerja lulusan POLINEMA di tempat kerja Anda?'),
(3, 2, 6, 2, 'Seberapa konsisten lulusan POLINEMA dalam menunjukkan kompetensi teknis yang diperlukan di industri Anda?'),
(3, 3, 6, 3, 'Seberapa cepat lulusan POLINEMA dapat menyesuaikan diri dengan kebutuhan dan perubahan di tempat kerja?'),
(3, 4, 6, 4, 'Seberapa yakin Anda dengan kemampuan lulusan POLINEMA dalam bidang teknis dan non-teknis di industri Anda?'),
(3, 5, 6, 5, 'Seberapa baik lulusan POLINEMA memahami kebutuhan dan ekspektasi perusahaan Anda?'),
-- pelayanan industri
(4, 1, 6, 1, 'Bagaimana penilaian Anda terhadap layanan administrasi kampus dalam mendukung kerja sama industri?'),
(4, 2, 6, 2, 'Seberapa konsisten POLINEMA dalam memberikan layanan yang dijanjikan untuk mendukung kerja sama industri?'),
(4, 3, 6, 3, 'Seberapa cepat dan tanggap POLINEMA dalam menangani permintaan atau keluhan dari pihak industri?'),
(4, 4, 6, 4, 'Seberapa yakin Anda dengan kemampuan dan pengetahuan staf POLINEMA dalam mendukung kerja sama industri?'),
(4, 5, 6, 5, 'Seberapa peduli POLINEMA terhadap kebutuhan dan harapan industri dalam menjalin kerja sama?');

-- Insert sample users for mahasiswa
INSERT INTO m_user (username, nama, password, role) VALUES
('mahasiswa1', 'Mahasiswa Satu', '123', 'mahasiswa'),
('mahasiswa2', 'Mahasiswa Dua', '123', 'mahasiswa'),
('mahasiswa3', 'Mahasiswa Tiga', '123', 'mahasiswa');

-- Insert sample users for industri
INSERT INTO m_user (username, nama, password, role) VALUES
('industri1', 'Industri Satu', '123', 'industri'),
('industri2', 'Industri Dua', '123', 'industri'),
('industri3', 'Industri Tiga', '123', 'industri');

-- Insert sample users for dosen
INSERT INTO m_user (username, nama, password, role) VALUES
('dosen1', 'Dosen Satu', '123', 'dosen'),
('dosen2', 'Dosen Dua', '123', 'dosen'),
('dosen3', 'Dosen Tiga', '123', 'dosen');

-- Insert sample users for tendik
INSERT INTO m_user (username, nama, password, role) VALUES
('tendik1', 'Tendik Satu', '123', 'tendik'),
('tendik2', 'Tendik Dua', '123', 'tendik'),
('tendik3', 'Tendik Tiga', '123', 'tendik');

-- Insert sample users for alumni
INSERT INTO m_user (username, nama, password, role) VALUES
('alumni1', 'Alumni Satu', '123', 'alumni'),
('alumni2', 'Alumni Dua', '123', 'alumni'),
('alumni3', 'Alumni Tiga', '123', 'alumni');

-- Insert sample users for ortu
INSERT INTO m_user (username, nama, password, role) VALUES
('ortu1', 'Orang Tua Satu', '123', 'orangtua'),
('ortu2', 'Orang Tua Dua', '123', 'orangtua'),
('ortu3', 'Orang Tua Tiga', '123', 'orangtua');


-- Insert sample mahasiswa respondents
INSERT INTO t_responden_mahasiswa (user_id, responden_nim, responden_nama, responden_prodi, responden_email, responden_hp, tahun_masuk, responden_tanggal) VALUES
((SELECT user_id FROM m_user WHERE username = 'mahasiswa1'), 'NIM001', 'Mahasiswa Satu', 'SIB', 'mahasiswa1@example.com', '081234567890', 2021, NOW()),
((SELECT user_id FROM m_user WHERE username = 'mahasiswa2'), 'NIM002', 'Mahasiswa Dua', 'SIB', 'mahasiswa2@example.com', '081234567891', 2021, NOW()),
((SELECT user_id FROM m_user WHERE username = 'mahasiswa3'), 'NIM003', 'Mahasiswa Tiga', 'SIB', 'mahasiswa3@example.com', '081234567892', 2021, NOW());

-- Insert sample industri respondents
INSERT INTO t_responden_industri (user_id, responden_nama, responden_jabatan, responden_perusahaan, responden_email, responden_hp, responden_kota, responden_tanggal) VALUES
((SELECT user_id FROM m_user WHERE username = 'industri1'), 'Industri Satu', 'Manager', 'PT. Industri Satu', 'industri1@example.com', '081234567893', 'Jakarta', NOW()),
((SELECT user_id FROM m_user WHERE username = 'industri2'), 'Industri Dua', 'Supervisor', 'PT. Industri Dua', 'industri2@example.com', '081234567894', 'Surabaya', NOW()),
((SELECT user_id FROM m_user WHERE username = 'industri3'), 'Industri Tiga', 'Staff', 'PT. Industri Tiga', 'industri3@example.com', '081234567895', 'Bandung', NOW());

-- Insert sample dosen respondents
INSERT INTO t_responden_dosen (user_id, responden_nip, responden_nama, responden_unit, responden_tanggal) VALUES
((SELECT user_id FROM m_user WHERE username = 'dosen1'), 'NIP001', 'Dosen Satu', 'Fakultas Teknik', NOW()),
((SELECT user_id FROM m_user WHERE username = 'dosen2'), 'NIP002', 'Dosen Dua', 'Fakultas Teknik', NOW()),
((SELECT user_id FROM m_user WHERE username = 'dosen3'), 'NIP003', 'Dosen Tiga', 'Fakultas Teknik', NOW());

-- Insert sample tendik respondents
INSERT INTO t_responden_tendik (user_id, responden_nopeg, responden_nama, responden_unit, responden_tanggal) VALUES
((SELECT user_id FROM m_user WHERE username = 'tendik1'), 'NOPEG001', 'Tendik Satu', 'Bagian Administrasi', NOW()),
((SELECT user_id FROM m_user WHERE username = 'tendik2'), 'NOPEG002', 'Tendik Dua', 'Bagian Administrasi', NOW()),
((SELECT user_id FROM m_user WHERE username = 'tendik3'), 'NOPEG003', 'Tendik Tiga', 'Bagian Administrasi', NOW());

-- Insert sample alumni respondents
INSERT INTO t_responden_alumni (user_id, responden_nim, responden_nama, responden_prodi, responden_email, responden_hp, tahun_lulus, responden_tanggal) VALUES
((SELECT user_id FROM m_user WHERE username = 'alumni1'), 'NIM004', 'Alumni Satu', 'SIB', 'alumni1@example.com', '081234567896', 2020, NOW()),
((SELECT user_id FROM m_user WHERE username = 'alumni2'), 'NIM005', 'Alumni Dua', 'SIB', 'alumni2@example.com', '081234567897', 2020, NOW()),
((SELECT user_id FROM m_user WHERE username = 'alumni3'), 'NIM006', 'Alumni Tiga', 'SIB', 'alumni3@example.com', '081234567898', 2020, NOW());

-- Insert sample ortu respondents
INSERT INTO t_responden_ortu (user_id, responden_nama, responden_jk, responden_umur, responden_hp, responden_pendidikan, responden_pekerjaan, mahasiswa_nim, mahasiswa_nama, mahasiswa_prodi, responden_tanggal) VALUES
((SELECT user_id FROM m_user WHERE username = 'ortu1'), 'Orang Tua Satu', 'L', 45, '081234567899', 'S1', 'PNS', 'NIM007', 'Mahasiswa Empat', 'SIB', NOW()),
((SELECT user_id FROM m_user WHERE username = 'ortu2'), 'Orang Tua Dua', 'P', 40, '081234567800', 'SMA', 'Wiraswasta', 'NIM008', 'Mahasiswa Lima', 'SIB', NOW()),
((SELECT user_id FROM m_user WHERE username = 'ortu3'), 'Orang Tua Tiga', 'L', 50, '081234567801', 'D3', 'Pegawai Swasta', 'NIM009', 'Mahasiswa Enam', 'SIB', NOW());


INSERT INTO t_jawaban_mahasiswa (responden_mahasiswa_id, soal_id, jawaban) VALUES
-- insert jawaban pengajaran mahasiswa_1
(1, 1, 3),
(1, 2, 4),  
(1, 3, 3),
(1, 4, 4),
(1, 5, 4),
-- insert jawaban fasilitas mahasiswa_1
(1, 6, 2),
(1, 7, 2),
(1, 8, 3),
(1, 9, 3),
(1, 10, 3),
-- insert jawaban pelayanan mahasiswa_1
(1, 11, 2),
(1, 12, 4),
(1, 13, 2),
(1, 14, 3),
(1, 15, 2),
-- insert jawaban pengajaran mahasiswa_2
(2, 1, 3),
(2, 2, 4),
(2, 3, 4),
(2, 4, 3),
(2, 5, 2),
-- insert jawaban fasilitas mahasiswa_2
(2, 6, 4),
(2, 7, 2),
(2, 8, 2),
(2, 9, 2),
(2, 10, 3),
-- insert jawaban pelayanan mahasiswa_2
(2, 11, 2),
(2, 12, 4),
(2, 13, 2),
(2, 14, 3),
(2, 15, 4);

INSERT INTO t_jawaban_alumni (responden_alumni_id, soal_id, jawaban) VALUES
-- insert jawaban pengajaran alumni_1
(1, 16, 4),
(1, 17, 3),
(1, 18, 2),
(1, 19, 3),
(1, 20, 4),
-- insert jawaban fasilitas alumni_1
(1, 21, 4),
(1, 22, 3),
(1, 23, 2),
(1, 24, 4),
(1, 25, 3),
-- insert jawaban pelayanan alumni_1
(1, 31, 4),
(1, 32, 2),
(1, 33, 4),
(1, 34, 2),
(1, 35, 3),
-- insert jawaban lulusan alumni_1
(1, 26, 1),
(1, 27, 3),
(1, 28, 4),
(1, 29, 4),
(1, 30, 3),
-- insert jawaban pengajaran alumni_2
(2, 16, 4),
(2, 17, 2),
(2, 18, 3),
(2, 19, 4),
(2, 20, 2),
-- insert jawaban fasilitas alumni_2
(2, 21, 4),
(2, 22, 3),
(2, 23, 4),
(2, 24, 2),
(2, 25, 4),
-- insert jawaban pelayanan alumni_2
(2, 31, 3),
(2, 32, 4),
(2, 33, 1),
(2, 34, 2),
(2, 35, 3),
-- insert jawaban lulusan alumni_2
(2, 26, 4),
(2, 27, 3),
(2, 28, 3),
(2, 29, 4),
(2, 30, 2);

INSERT INTO t_jawaban_ortu (responden_ortu_id, soal_id, jawaban) VALUES
-- insert jawaban pengajaran orangtua_1
(1, 36, 1),
(1, 37, 3),
(1, 38, 3),
(1, 39, 1),
(1, 40, 4),
-- insert jawaban fasilitas orangtua_1
(1, 41, 1),
(1, 42, 2),
(1, 43, 2),
(1, 44, 1),
(1, 45, 3),
-- insert jawaban pelayanan orangtua_1
(1, 51, 2),
(1, 52, 3),
(1, 53, 3),
(1, 54, 1),
(1, 55, 2),
-- insert jawaban lulusan orangtua_1
(1, 46, 1),
(1, 47, 3),
(1, 48, 3),
(1, 49, 1),
(1, 50, 3),
-- insert jawaban pengajaran orangtua_2
(2, 36, 3),
(2, 37, 2),
(2, 38, 4),
(2, 39, 2),
(2, 40, 2),
-- insert jawaban fasilitas orangtua_2
(2, 41, 4),
(2, 42, 1),
(2, 43, 2),
(2, 44, 3),
(2, 45, 2),
-- insert jawaban pelayanan orangtua_2
(2, 51, 2),
(2, 52, 2),
(2, 53, 4),
(2, 54, 2),
(2, 55, 2),
-- insert jawaban lulusan orangtua_2
(2, 46, 3),
(2, 47, 2),
(2, 48, 4),
(2, 49, 2),
(2, 50, 3);

INSERT INTO t_jawaban_dosen (responden_dosen_id, soal_id, jawaban) VALUES
-- insert jawaban pengajaran dosen_1
(1, 56, 4),
(1, 57, 1),
(1, 58, 2),
(1, 59, 2),
(1, 60, 1),
-- insert jawaban fasilitas dosen_1
(1, 61, 3),
(1, 62, 3),
(1, 63, 1),
(1, 64, 3),
(1, 65, 3),
-- insert jawaban pelayanan dosen_1
(1, 66, 2),
(1, 67, 2),
(1, 68, 3),
(1, 69, 3),
(1, 70, 1),
-- insert jawaban pengajaran dosen_2
(2, 56, 2),
(2, 57, 4),
(2, 58, 1),
(2, 59, 2),
(2, 60, 3),
-- insert jawaban fasilitas dosen_2
(2, 61, 2),
(2, 62, 4),
(2, 63, 2),
(2, 64, 3),
(2, 65, 4),
-- insert jawaban pelayanan dosen_2
(2, 66, 4),
(2, 67, 2),
(2, 68, 2),
(2, 69, 4),
(2, 70, 2);

INSERT INTO t_jawaban_tendik (responden_tendik_id, soal_id, jawaban) VALUES
-- insert jawaban fasilitas tendik_1
(1, 71, 4),
(1, 72, 3),
(1, 73, 3),
(1, 74, 3),
(1, 75, 4),
-- insert jawaban pelayanan tendik_1
(1, 76, 3),
(1, 77, 2),
(1, 78, 3),
(1, 79, 4),
(1, 80, 2),
-- insert jawaban fasilitas tendik_2
(2, 71, 4),
(2, 72, 2),
(2, 73, 3),
(2, 74, 4),
(2, 75, 2),
-- insert jawaban pelayanan tendik_2
(2, 76, 3),
(2, 77, 4),
(2, 78, 2),
(2, 79, 1),
(2, 80, 4);

INSERT INTO t_jawaban_industri (responden_industri_id, soal_id, jawaban) VALUES
-- insert jawaban fasilitas industri_1
(1, 81, 4),
(1, 82, 2),
(1, 83, 3),
(1, 84, 3),
(1, 85, 1),
-- insert jawaban pelayanan industri_1
(1, 91, 3),
(1, 92, 3),
(1, 93, 2),
(1, 94, 3),
(1, 95, 4),
-- insert jawaban lulusan industri_1
(1, 86, 1),
(1, 87, 2),
(1, 88, 2),
(1, 89, 1),
(1, 90, 3),
-- insert jawaban fasilitas industri_2
(2, 81, 2),
(2, 82, 2),
(2, 83, 2),
(2, 84, 4),
(2, 85, 2),
-- insert jawaban pelayanan industri_2
(2, 91, 3),
(2, 92, 4),
(2, 93, 4),
(2, 94, 3),
(2, 95, 2),
-- insert jawaban lulusan industri_2
(2, 86, 4),
(2, 87, 1),
(2, 88, 2),
(2, 89, 3),
(2, 90, 2);

INSERT INTO m_history (user_id, survey_id, kategori_id, saran, survey_tanggal) VALUES
-- insert history pengajaran mahasiswa_1
(2, 1, 1, 'Saran Mahasiswa 1 Untuk Pengajaran', NOW()),
-- insert history fasilitas mahasiswa_1
(2, 2, 1, 'Saran Mahasiswa 1 Untuk Fasilitas', NOW()),
-- insert history pelayanan mahasiswa_1
(2, 4, 1, 'Saran Mahasiswa 1 Untuk Fasilitas', NOW()),
-- insert history pengajaran mahasiswa_2
(3, 1, 1, 'Saran Mahasiswa 2 Untuk Pengajaran', NOW()),
-- insert history fasilitas mahasiswa_2
(3, 2, 1, 'Saran Mahasiswa 2 Untuk Fasilitas', NOW()),
-- insert history pelayanan mahasiswa_2
(3, 4, 1, 'Saran Mahasiswa 1 Untuk Fasilitas', NOW()),

-- insert history pengajaran alumni_1
(14, 1, 2, 'Saran Alumni 1 Untuk Pengajaran', NOW()),
-- insert history fasilitas alumni_1
(14, 2, 2, 'Saran Alumni 1 Untuk Fasilitas', NOW()),
-- insert history lulusan alumni_1
(14, 3, 2, 'Saran Alumni 1 Untuk Lulusan', NOW()),
-- insert history pelayanan alumni_1
(14, 4, 2, 'Saran Alumni 1 Untuk Pelayanan', NOW()),
-- insert history pengajaran alumni_2
(15, 1, 2, 'Saran Alumni 2 Untuk Pengajaran', NOW()),
-- insert history fasilitas alumni_2
(15, 2, 2, 'Saran Alumni 2 Untuk Fasilitas', NOW()),
-- insert history lulusan alumni_2
(15, 3, 2, 'Saran Alumni 2 Untuk Lulusan', NOW()),
-- insert history pelayanan alumni_2
(15, 4, 2, 'Saran Alumni 2 Untuk Pelayanan', NOW()),

-- insert history pengajaran orangtua_1
(17, 1, 3, 'Saran Orangtua 1 Untuk Pengajaran', NOW()),
-- insert history fasilitas orangtua_1
(17, 2, 3, 'Saran Orangtua 1 Untuk Fasilitas', NOW()),
-- insert history lulusan orangtua_1
(17, 3, 3, 'Saran Orangtua 1 Untuk Lulusan', NOW()),
-- insert history pelayanan orangtua_1
(17, 4, 3, 'Saran Orangtua 1 Untuk Pelayanan', NOW()),
-- insert history pengajaran orangtua_2
(18, 1, 3, 'Saran Orangtua 2 Untuk Pengajaran', NOW()),
-- insert history fasilitas orangtua_2
(18, 2, 3, 'Saran Orangtua 2 Untuk Fasilitas', NOW()),
-- insert history lulusan orangtua_2
(18, 3, 3, 'Saran Orangtua 2 Untuk Lulusan', NOW()),
-- insert history pelayanan orangtua_2
(18, 4, 3, 'Saran Orangtua 2 Untuk Pelayanan', NOW()),

-- insert history pengajaran dosen_1
(8, 1, 4, 'Saran Dosen 1 Untuk Pengajaran', NOW()),
-- insert history fasilitas dosen_1
(8, 2, 4, 'Saran Dosen 1 Untuk Fasilitas', NOW()),
-- insert history pelayanan dosen_1
(8, 4, 4, 'Saran Dosen 1 Untuk Pelayanan', NOW()),
-- insert history pengajaran dosen_2
(9, 1, 4, 'Saran Dosen 2 Untuk Pengajaran', NOW()),
-- insert history fasilitas dosen_2
(9, 2, 4, 'Saran Dosen 2 Untuk Fasilitas', NOW()),
-- insert history pelayanan dosen_2
(9, 4, 4, 'Saran Dosen 2 Untuk Pelayanan', NOW()),

-- insert history fasilitas tendik_1
(11, 2, 5, 'Saran Tendik 1 Untuk Fasilitas', NOW()),
-- insert history pelayanan tendik_1
(11, 4, 5, 'Saran Tendik 1 Untuk Pelayanan', NOW()),
-- insert history fasilitas tendik_2
(12, 2, 5, 'Saran Tendik 2 Untuk Fasilitas', NOW()),
-- insert history pelayanan tendik_2
(12, 4, 5, 'Saran Tendik 2 Untuk Pelayanan', NOW()),

-- insert history fasilitas industri_1
(5, 2, 6, 'Saran Industri 1 Untuk Fasilitas', NOW()),
-- insert history lulusan industri_1
(5, 3, 6, 'Saran Industri 1 Untuk Lulusan', NOW()),
-- insert history pelayanan industri_1
(5, 4, 6, 'Saran Industri 1 Untuk Pelayanan', NOW()),
-- insert history fasilitas industri_2
(6, 2, 6, 'Saran Industri 2 Untuk Fasilitas', NOW()),
-- insert history lulusan industri_2
(6, 3, 6, 'Saran Industri 2 Untuk Lulusan', NOW()),
-- insert history pelayanan industri_2
(6, 4, 6, 'Saran Industri 2 Untuk Pelayanan', NOW());

-- mencari rata rata
CREATE VIEW average AS
SELECT
    survey.survey_nama AS Kriteria,
    AVG(CASE WHEN dimensi.dimensi_nama = 'tangibles' THEN jawaban.jawaban END) AS Tangibles,
    AVG(CASE WHEN dimensi.dimensi_nama = 'reliability' THEN jawaban.jawaban END) AS Reliability,
    AVG(CASE WHEN dimensi.dimensi_nama = 'responsiveness' THEN jawaban.jawaban END) AS Responsiveness,
    AVG(CASE WHEN dimensi.dimensi_nama = 'assurance' THEN jawaban.jawaban END) AS Assurance,
    AVG(CASE WHEN dimensi.dimensi_nama = 'empathy' THEN jawaban.jawaban END) AS Empathy
FROM
    m_survey survey
JOIN
    m_survey_soal soal ON survey.survey_id = soal.survey_id
JOIN
    dimensi ON soal.dimensi_id = dimensi.dimensi_id
LEFT JOIN
    t_jawaban_dosen jawaban_dosen ON soal.soal_id = jawaban_dosen.soal_id
LEFT JOIN
    t_jawaban_tendik jawaban_tendik ON soal.soal_id = jawaban_tendik.soal_id
LEFT JOIN
    t_jawaban_mahasiswa jawaban_mahasiswa ON soal.soal_id = jawaban_mahasiswa.soal_id
LEFT JOIN
    t_jawaban_alumni jawaban_alumni ON soal.soal_id = jawaban_alumni.soal_id
LEFT JOIN
    t_jawaban_ortu jawaban_ortu ON soal.soal_id = jawaban_ortu.soal_id
LEFT JOIN
    t_jawaban_industri jawaban_industri ON soal.soal_id = jawaban_industri.soal_id
CROSS JOIN
(
    SELECT jawaban, soal_id FROM t_jawaban_dosen
    UNION ALL
    SELECT jawaban, soal_id FROM t_jawaban_tendik
    UNION ALL
    SELECT jawaban, soal_id FROM t_jawaban_mahasiswa
    UNION ALL
    SELECT jawaban, soal_id FROM t_jawaban_alumni
    UNION ALL
    SELECT jawaban, soal_id FROM t_jawaban_ortu
    UNION ALL
    SELECT jawaban, soal_id FROM t_jawaban_industri
) AS jawaban
ON soal.soal_id = jawaban.soal_id
GROUP BY
    survey.survey_nama
ORDER BY
    survey.survey_nama;

-- mencari max rata rata
CREATE VIEW maxAverage AS
SELECT
    'MAX' AS Kriteria,
    MAX(Tangibles) AS Tangibles,
    MAX(Reliability) AS Reliability,
    MAX(Responsiveness) AS Responsiveness,
    MAX(Assurance) AS Assurance,
    MAX(Empathy) AS Empathy
FROM
    average;

-- normalisasi
CREATE VIEW normalisasi AS
SELECT
    avg.Kriteria,
    avg.Tangibles / max_avg.Tangibles AS Tangibles,
    avg.Reliability / max_avg.Reliability AS Reliability,
    avg.Responsiveness / max_avg.Responsiveness AS Responsiveness,
    avg.Assurance / max_avg.Assurance AS Assurance,
    avg.Empathy / max_avg.Empathy AS Empathy
FROM
    average avg,
    (SELECT 
         MAX(Tangibles) AS Tangibles, 
         MAX(Reliability) AS Reliability, 
         MAX(Responsiveness) AS Responsiveness, 
         MAX(Assurance) AS Assurance, 
         MAX(Empathy) AS Empathy 
     FROM average) max_avg;

-- normalisasi x bobot (total)
CREATE VIEW normalisasi_x_bobot AS
SELECT
    n.Kriteria,
    n.Tangibles * d1.dimensi_bobot AS Tangibles,
    n.Reliability * d2.dimensi_bobot AS Reliability,
    n.Responsiveness * d3.dimensi_bobot AS Responsiveness,
    n.Assurance * d4.dimensi_bobot AS Assurance,
    n.Empathy * d5.dimensi_bobot AS Empathy,
    (((n.Tangibles * d1.dimensi_bobot) +
     (n.Reliability * d2.dimensi_bobot) +
     (n.Responsiveness * d3.dimensi_bobot)+
     (n.Assurance * d4.dimensi_bobot) +
     (n.Empathy * d5.dimensi_bobot)) / 100) AS total
FROM
    normalisasi n,
    (SELECT dimensi_bobot FROM dimensi WHERE dimensi_nama = 'tangibles') d1,
    (SELECT dimensi_bobot FROM dimensi WHERE dimensi_nama = 'reliability') d2,
    (SELECT dimensi_bobot FROM dimensi WHERE dimensi_nama = 'responsiveness') d3,
    (SELECT dimensi_bobot FROM dimensi WHERE dimensi_nama = 'assurance') d4,
    (SELECT dimensi_bobot FROM dimensi WHERE dimensi_nama = 'empathy') d5;

-- Ranking
CREATE VIEW ranking AS
SELECT
    Kriteria AS Alternative,
    total AS Total,
    RANK() OVER (ORDER BY total DESC) AS Ranking
FROM
    normalisasi_x_bobot;
