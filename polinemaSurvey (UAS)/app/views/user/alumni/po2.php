<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if (!isset ($_SESSION ["role"])) {
    header("Location: ../../login.php");
    exit;
}
require_once("../template/header.php");
require_once __DIR__ . ("/../../../modal/survey/survey_crud.php");
require_once("../template/navbar.php");

$user_id = $_SESSION['user_id'];
$kategori_id = 2;
$survey_id = 2;

$crud = new surveyCRUD();
$row = $crud->takeHistory($user_id, $kategori_id, $survey_id);

if ($row > 0) {
    echo '<script>alert("Anda Sudah Mengisi Survey Ini"); window.location.href = "dashboard.php";</script>';
    exit();
}
?>
<head>
  
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="../../../../public/image/polinema-logo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Main Sidebar Container -->
  <?php
  require_once("../template/sidebar.php");
  ?>
  <!-- /.sidebar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <header>Pengisian Survei</header>
                <h4>P02 Fasilitas Politeknik Negeri Malang</h4>
                <h5>Kategori ini berfokus pada penilaian terhadap fasilitas fisik yang disediakan oleh kampus Polinema, seperti ruang kelas, laboratorium, perpustakaan, akses internet, serta fasilitas penunjang lainnya. Kualitas dan ketersediaan fasilitas yang memadai sangat penting untuk menciptakan lingkungan belajar yang kondusif dan mendukung kegiatan akademik maupun penelitian. Kategori ini membantu mengidentifikasi area yang perlu ditingkatkan dalam hal infrastruktur dan sarana prasarana.
</h5>
                <br>
                <br>
                <br>
                <div class="instruction-container">
                <div class="instruction-sidebar"></div>
                <div class="instruction-content">
                    <h1>Petunjuk Pengisian</h1>
                    <p1>Pada bagian jawaban terdapat empat pilihan keterangan berikut:</p1>
                    <ol>
                        <li>Sangat Tidak Setuju</li>
                        <li>Tidak Setuju</li>
                        <li>Setuju</li>
                        <li>Sangat Setuju</li>
                    </ol>
                </div>
              </div>
              </div>
              <br>
              <br>
              <form action ="../../../controller/responden/alumni/tambahJawaban.php" method="post">
              <div class="question-container">
             <div>
             <div class = "question-navbar">P02 Fasilitas Politeknik Negeri Malang</div>
                      <input type="hidden" name="survey_id" value="<?php echo $survey_id; ?>">
                      <input type="hidden" name="kategori_id" value="<?php echo $kategori_id; ?>">
                      <?php
                      $soalList = $crud -> readSoalAlumni ($survey_id, $kategori_id);
                      $no = 1; // Nomor urut
                      foreach ($soalList as $soal): ?>
                        <div class="question">
                            <label for="q<?php echo $no; ?>"><?php echo $no . ". " . $soal['soal_nama']; ?></label>
                            <div class="options">
                                <label>1.<input type="radio" name="jawaban_<?php echo $soal['soal_id']; ?>" value="1"></label>
                                <label>2.<input type="radio" name="jawaban_<?php echo $soal['soal_id']; ?>" value="2"></label>
                                <label>3.<input type="radio" name="jawaban_<?php echo $soal['soal_id']; ?>" value="3"></label>
                                <label>4.<input type="radio" name="jawaban_<?php echo $soal['soal_id']; ?>" value="4"></label>
                            </div>
                        </div>
                        <?php $no++; endforeach;?>
                        <div class="saran-container">
                      <label for="saran">Kritik dan Saran</label>
                      <textarea id="saran" name="saran" rows="3" placeholder="Masukkan kritik dan saran Anda di sini" required></textarea>
                    </div>
              <div class = "question-footer"></div>
             </div>
              </div>
              <div class="button-container">
                  <button type="button" class="kembali" onclick="history.back();" >Kembali</button>
                  <button type= "submit" class="kirim">Kirim</button>
              </div>
              </form>
              <br>
              <br>
                 
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
  </div>
  <!-- /.content-wrapper -->


  <!-- footer -->
  <?php
  require_once("../template/footer.php");
  ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
</body>
</html>
