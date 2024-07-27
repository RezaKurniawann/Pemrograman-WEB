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

$crud = new surveyCRUD();
?>
<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <!-- Preloader -->
    <!-- <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="../../../../public/image/polinema-logo.png" alt="AdminLTELogo" height="60" width="60">
    </div> -->

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
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title mt-2">Bobot</h3>
                  <div class="card-tools">
                  <!-- edit bobot -->
                  <button type="button" class="btn btn-sm btn-primary mr-2" data-toggle="modal" data-target="#modalEdit" onclick="fillEditBobot">
                                    <i class="fas fa-edit"></i> Edit
                                  </button>
                  </div>
                </div>
                <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                      <thead>
                          <tr>
                              <th>No</th>
                              <th>Kriteria</th>
                              <th>Bobot</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php
                          // Ambil data dimensi dari database menggunakan fungsi readkriteria()
                          $kriteriaList = $crud->readkriteria();
                          $no = 1;
                          $kriteria_id = array(); 

                          // Loop untuk menampilkan setiap baris dimensi
                          foreach ($kriteriaList as $kriteria) {
                              echo "<tr>";
                              echo "<td class='text-center'>" . $no . "</td>"; // Use $no without incrementing here
                              echo "<td class='text-center'>" . $kriteria['dimensi_nama'] . "</td>";
                              echo "<td class='text-center'>" . $kriteria['dimensi_bobot'] . "</td>";
                              echo "</tr>";
                              
                              // Mengisi array dua dimensi
                              $kriteria_id[] = array('bobot' => $kriteria['dimensi_bobot']);
                              $no++; 
                          }

                          ?>
                      </tbody>
                  </table>

                </div>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Analisis</h3>
                </div>
                <div class="card-body">
           
                <table id="example2" class="table table-bordered table-hover text-center">
                  <thead>
                    <tr>
                      <th>Survey</th>
                      <th>Total</th>
                      <th>Ranking</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
            
                    $rankingList = $crud->readRanking();

                    // Loop through the ranking data to display each row
                    foreach ($rankingList as $ranking) {
                      echo "<tr>";
                      echo "<td>" . $ranking['Alternative'] . "</td>";
                      echo "<td>" . $ranking['Total'] . "</td>"; 
                      echo "<td>" . $ranking['Ranking'] . "</td>"; 
                      echo "</tr>";
                    }
                    ?>
                  </tbody>
                </table>


                </div>
              </div>
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
  <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header" style="background-color: #2c4182; color: white;">
          <h5 class="modal-title" id="modalEditLabel" style="color: white;">Edit Survey</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white;">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="../../../controller/survey/update_bobot.php" method="POST">
          <div class="modal-body">
            <input type="hidden" id="edit_soal_id" name="soal_id">
            <!-- Isi form edit survey di sini -->
            <div class="form-group">
              <label for="edit_tangibles">Tangibles</label>
              <input type="text" class="form-control" id="edit_tangibles" name="tangibles" value="<?php echo $kriteria_id[0]['bobot'];?>">
            </div>
            <!-- Reliability -->
            <div class="form-group">
                <label for="edit_reliability">Reliability</label>
                <input type="text" class="form-control" id="edit_reliability" name="reliability" value="<?php echo $kriteria_id[1]['bobot'];?>">
            </div>

            <!-- Responsiveness -->
            <div class="form-group">
                <label for="edit_responsiveness">Responsiveness</label>
                <input type="text" class="form-control" id="edit_responsiveness" name="responsiveness" value="<?php echo $kriteria_id[2]['bobot'];?>">
            </div>

            <!-- Assurance -->
            <div class="form-group">
                <label for="edit_assurance">Assurance</label>
                <input type="text" class="form-control" id="edit_assurance" name="assurance" value="<?php echo $kriteria_id[3]['bobot'];?>">
            </div>

            <!-- Empathy -->
            <div class="form-group">
                <label for="edit_empathy">Empathy</label>
                <input type="text" class="form-control" id="edit_empathy" name="empathy" value="<?php echo $kriteria_id[4]['bobot'];?>">
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


