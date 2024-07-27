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
<Head>
    <style>
         header {
            font-size: 50px;
            text-align: center;
            margin-bottom: 10px;
            margin-top: 40px;
            font-family: 'Poppins';
            color: #2C4182;
        }
        .kategori {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
        }
        .kategori a {
            flex: 0 0 25%; /* Setiap gambar memenuhi 30% lebar container */
            margin: 50px;
            text-align: center;
            transition: transform 0.5s ease;
        }
        img {
            width: 100%; 
            height: auto;
            max-width: 200px; /* Lebar maksimum gambar */
            box-shadow: 10px 10px 10px 10px rgba(0,0,0,0.1);
            border-radius: 15px;
        }
        .kategori a:hover {
            transform: scale(1.1); /* Membesarkan gambar saat dihover */
        }
    </style>
</Head>
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
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <header>Pilih Kategori Survey</header>
              </div>
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <tbody>
                  <div class="kategori">
                    <a href = "../../user/tendik/po1.php"> 
                        <img src="../../../../public/image/fasilitas.png">
                    </a>
                    <a href="../../user/tendik/po2.php">  
                        <img src="../../../../public/image/pelayanan.png">
                    </a>
                </div>  
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
