<!DOCTYPE html>
<html lang="en">

<?php
session_start();
if (!isset ($_SESSION ["role"])) {
    header("Location: ../../login.php");
    exit;
}
  require_once ("../template/header.php");
  require_once __DIR__ . ("../../../../modal/survey/survey_crud.php");
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
          <h1 class="m-0">Alumni</h1>
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
              <div class="card-header">
                <h3 class="card-title">Riwayat Survey</h3>
              </div>
              <div class="card-body">
              <table id="example1" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Kategori Survey</th>
                      <th>Tanggal Pengisian</th>
                      <th>Status</th>

                    </tr>
                  </thead>
                  <tbody>
                      <?php
                     $crud = new surveyCRUD();
                     $user_id = $_SESSION['user_id'];
                     $surveyList = $crud->readKategori4($user_id);

                     $no = 1;
                     foreach ($surveyList as $survey) {
                       echo "<tr>";
                       echo "<td>" . $no++ . "</td>";
                       echo "<td>" . $survey['survey_nama'] . "</td>";
                       echo "<td>" . ($survey['survey_tanggal'] ? $survey['survey_tanggal'] : '') . "</td>";
                       echo "<td class='text-center align-middle'>";
                       if ($survey['survey_tanggal']) {
                           echo "sudah terisi";
                       } else {
                           echo '<a href="dashboard.php" class="btn btn-primary">Isi Survey</a>';
                       }
                       echo "</td>";
                       echo"</tr>";
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
