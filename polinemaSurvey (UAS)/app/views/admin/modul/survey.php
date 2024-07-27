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
?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="../../../../public/image/polinema-logo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <?php
  require_once("../template/navbar.php");
  ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php
  require_once("../template/sidebar.php");
  ?>
  <!-- /.sidebar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <h1 class="m-0" style = "color : #2c4182">Survey</h1>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title mt-2">Daftar Soal</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-success mr-2" data-toggle="modal" data-target="#modalTambah">
                    <i class="fas fa-plus mr-1"></i> Tambah
                  </button>
                </div>
              </div>
              <div class="card-body">
                <!-- Filters and Search -->
                <div class="row mb-3">
                  <div class="col-md-3">
                    <select id="filterKategori" class="form-control">
                      <option value="">Filter by Kategori</option>
                      <option value="mahasiswa">Mahasiswa</option>
                      <option value="alumni">Alumni</option>
                      <option value="orangtua">Orangtua</option>
                      <option value="dosen">Dosen</option>
                      <option value="tendik">Tendik</option>
                      <option value="industri">Industri</option>
                    </select>
                  </div>
                  <div class="col-md-3">
                    <select id="filterSurvey" class="form-control">
                      <option value="">Filter by Survey</option>
                      <option value="pengajaran">Pengajaran</option>
                      <option value="fasilitas">Fasilitas</option>
                      <option value="lulusan">Lulusan</option>
                      <option value="pelayanan">Pelayanan</option>
                    </select>
                  </div>
                  <div class="col-md-3">
                    <select id="filterDimensi" class="form-control">
                      <option value="">Filter by Dimensi</option>
                      <option value="tangibles">Tangibles</option>
                      <option value="reliability">Reliability</option>
                      <option value="responsiveness">Responsiveness</option>
                      <option value="assurance">Assurance</option>
                      <option value="empathy">Empathy</option>
                    </select>
                  </div>
                  <div class="col-md-3">
                    <input type="text" id="searchSoal" class="form-control" placeholder="Search Soal">
                  </div>
                </div>

                <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Kategori</th>
                    <th>Survey</th>
                    <th>Dimensi</th>
                    <th>No Urut</th>
                    <th>Soal</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                  $crud = new surveyCRUD();
                  $surveyList = $crud->readSurvey();
                  $no = 1; // Nomor urut
                  foreach ($surveyList as $survey) {
                      echo "<tr>";
                      echo "<td style='width: 5%;'>" . $no++ . "</td>";
                      echo "<td style='width: 10%;' class='kategori'>" . $survey['kategori_nama'] . "</td>";
                      echo "<td style='width: 10%;' class='survey'>" . $survey['survey_nama'] . "</td>";
                      echo "<td style='width: 10%;' class='dimensi'>" . $survey['dimensi_nama'] . "</td>";
                      echo "<td style='width: 10%; text-align: center; vertical-align: middle'>" . $survey['no_urut'] . "</td>";
                      echo "<td style='width: 35%;' class='soal'>" . $survey['soal_nama'] . "</td>";
                      echo '<td class="text-center align-middle">
                                <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modalEdit" onclick="fillEditSoal(' . htmlspecialchars(json_encode($survey)) . ')">
                                  <i class="fas fa-edit"></i> Edit
                                </button>
                                <form action="../../../controller/survey/soal_delete.php" method="POST" style="display:inline-block;">
                                  <input type="hidden" name="soal_id" value="' . $survey['soal_id'] . '">
                                  <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm(\'Apakah Anda yakin ingin menghapus data ini?\')">
                                    <i class="fas fa-trash"></i> Delete
                                  </button>
                                </form>
                              </td>';
                      echo "</tr>";
                  }
                ?>
                </tbody>
              </table>

              </div>
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

  <!-- Modal Tambah -->
  <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="modalTambahLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header" style="background-color: #2c4182; color: white;">
          <h5 class="modal-title" id="modalTambahLabel" style="color: white;">Tambah Soal</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white;">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="../../../controller/survey/soal_create.php" method="post">
          <div class="modal-body">
            <!-- Isi form tambah survey di sini -->
            <div class="form-group">
              <label for="survey">Survey</label>
              <select id="survey" name="survey" class="form-control" required>
                <option value="pengajaran">Pengajaran</option>
                <option value="fasilitas">Fasilitas</option>
                <option value="lulusan">Lulusan</option>
                <option value="pelayanan">Pelayanan</option>
              </select>
            </div>
            <div class="form-group">
              <label for="dimensi">Dimensi</label>
              <select id="dimensi" name="dimensi" class="form-control" required>
                <option value="1">Tangibles</option>
                <option value="2">Reliability</option>
                <option value="3">Responsiveness</option>
                <option value="4">Assurance</option>
                <option value="5">Empathy</option>
              </select>
            </div>
            <div class="form-group">
              <label for="kategori">Kategori</label>
              <select id="kategori" name="kategori" class="form-control" required>
                <option value="mahasiswa">Mahasiswa</option>
                <option value="alumni">Alumni</option>
                <option value="orangtua">Orangtua</option>
                <option value="dosen">Dosen</option>
                <option value="tendik">Tendik</option>
                <option value="industri">Industri</option>
              </select>
            </div>
            <div class="form-group">
              <label for="soal">Soal</label>
              <input type="text" class="form-control" id="soal" name="soal" placeholder="" style="height: 60px;" required>
            </div>
          </div>
          <div class="modal-footer">
            <input type="submit" class="btn btn-primary" style="background-color: #2c4182; color: white;" name="tambahSoal" value="Tambah">
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- /.modal -->

  <!-- Modal Edit -->
  <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header" style="background-color: #2c4182; color: white;">
          <h5 class="modal-title" id="modalEditLabel" style="color: white;">Edit Survey</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white;">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="../../../controller/survey/soal_edit.php" method="POST">
          <div class="modal-body">
            <input type="hidden" id="edit_soal_id" name="soal_id">
            <!-- Isi form edit survey di sini -->
            <div class="form-group">
              <label for="edit_soal">Soal</label>
              <input type="text" class="form-control" id="edit_soal" name="soal_nama" style="height: 60px;">
            </div>
          </div>
          <div class="modal-footer">
            <input type="submit" class="btn btn-primary" style="background-color: #2c4182; color: white;" value="Simpan Perubahan">
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- /.modal -->

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
