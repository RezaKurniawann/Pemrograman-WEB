<!DOCTYPE html>
<html lang="en">

<?php
session_start();
if (!isset ($_SESSION ["role"])) {
    header("Location: ../../login.php");
    exit;
}

  require_once ("../template/header.php");
  require_once __DIR__ . ("/../../../modal/survey/survey_crud.php");
  require_once __DIR__ . ("/../../../modal/responden/responden_crud.php");
?>
<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="../../../../public/image/polinema-logo.png" alt="AdminLTELogo" height="60" width="60">
    </div>

    <!-- Navbar -->
    <?php
      require_once ("../template/navbar.php");
    ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php
      require_once ("../template/sidebar.php");
    ?>
    <!-- /.sidebar -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <h1 class="m-0" style = "color : #2c4182">Dashboard</h1>
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- col -->
          <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box box-custom">
              <div class="inner">
              <h3>
                  <?php
                  $crudR = new respondenCRUD();
                  $jumlahMahasiswa = $crudR->jumlahMahasiswa();
                  echo $jumlahMahasiswa;
                  ?>
              </h3>
                <p style="font-size: 20px; font-weight: 400">Mahasiswa</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="mahasiswa.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box box-custom">
              <div class="inner">
                <h3>
                  <?php
                  $jumlahAlumni = $crudR->jumlahAlumni();
                  echo $jumlahAlumni
                  ?>
                </h3>

                <p style="font-size: 20px; font-weight: 400">Alumni</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="alumni.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box box-custom">
              <div class="inner">
              <h3>
                  <?php
                  $jumlahDosen = $crudR->jumlahDosen();
                  echo $jumlahDosen
                  ?>
                </h3>

                <p style="font-size: 20px; font-weight: 400">Dosen</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="dosen.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box box-custom">
              <div class="inner">
              <h3>
                  <?php
                  $jumlahTendik = $crudR->jumlahTendik();
                  echo $jumlahTendik
                  ?>
                </h3>

                <p style="font-size: 20px; font-weight: 400">Tendik</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="tendik.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box box-custom">
              <div class="inner">
              <h3>
                  <?php
                  $jumlahOrangtua = $crudR->jumlahOrangtua();
                  echo $jumlahOrangtua
                  ?>
                </h3>

                <p style="font-size: 20px; font-weight: 400">Orangtua</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="orangtua.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box box-custom">
              <div class="inner">
              <h3>
                  <?php
                  $jumlahIndustri = $crudR->jumlahIndustri();
                  echo $jumlahIndustri
                  ?>
                </h3>

                <p style="font-size: 20px; font-weight: 400">Industri</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="industri.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
            <div class="col-12">
              
              <div class="card">
              <div class="card-header">
                <h3 class="card-title">History </h3>
              </div>
              <div class="card-body">
              <table id="example1" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Username</th>
                      <th>Kategori</th>
                      <th>Survey </th>
                      <th>Tanggal Submit</th> 
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $crudS = new surveyCRUD();
                      $historyList = $crudS->readHistory();
                      $no = 1; // Nomor urut
                      
                      foreach ($historyList as $history) {
                          echo "<tr>";
                          echo "<td>" . $no++ . "</td>";
                          echo "<td>" . $history['nama'] . "</td>"; 
                          echo "<td>" . $history['username'] . "</td>"; 
                          echo "<td>" . $history['kategori_nama'] . "</td>";
                          echo "<td>" . $history['survey_nama'] . "</td>"; 
                          echo "<td class='text-center align-middle'>" . date ('d/m/Y', strtotime($history['survey_tanggal'])). "</td>";
                          echo '<td class="text-center align-middle">
                                  <button type="button" class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#modalSaran" onclick="fillSaran(' . htmlspecialchars(json_encode($history)) . ')">
                                      <i class="fas fa-exclamation-circle mr-1"></i> Detail
                                  </button>
                                </td>';
                          echo "</tr>";

                      }
                    ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
    </div>
    <!-- /.content-wrapper -->

    
  <!-- Modal Edit -->
  <div class="modal fade" id="modalSaran" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header" style="background-color: #2c4182; color: white;">
          <h5 class="modal-title" id="modalEditLabel" style="color: white;">Kritik dan Saran</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white;">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <!-- Isi form edit survey di sini -->
            <div class="form-group">
              <input type="text" class="form-control" id="saran" name="saran" style="background-color: white; border:none; color:#2c4182; font-size: 16px; margin:0;" readonly>
            </div>
          </div>
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
