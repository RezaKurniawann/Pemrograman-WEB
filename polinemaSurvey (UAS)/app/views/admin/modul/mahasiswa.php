<!DOCTYPE html>
<html lang="en">

<?php
session_start();
if (!isset ($_SESSION ["role"])) {
    header("Location: ../../login.php");
    exit;
}
  require_once ("../template/header.php");
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
          <h1 class="m-0" style = "color : #2c4182">Mahasiswa</h1>
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
              <div class="card-header">
                <h3 class="card-title">Daftar Mahasiswa</h3>
              </div>
              <div class="card-body">
              <table id="example1" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Username</th>
                      <th>Password</th>
                      <th>Nim</th>
                      <th>Prodi</th>
                      <th>No HP</th>
                      <th>Tahun Masuk</th>
                      <th>Aksi</th>  
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                      $crud = new respondenCRUD();
                      $mahasiswaList = $crud->readMahasiswa();
                      $no = 1; // Nomor urut
                      foreach ($mahasiswaList as $mahasiswa) {
                          echo "<tr>";
                          echo "<td>" . $no++ . "</td>";
                          echo "<td>" . $mahasiswa['nama'] . "</td>";
                          echo "<td>" . $mahasiswa['username'] . "</td>";
                          echo "<td>" . $mahasiswa['password'] . "</td>";
                          echo "<td>" . $mahasiswa['responden_nim'] . "</td>";
                          echo "<td>" . $mahasiswa['responden_prodi'] . "</td>"; 
                          echo "<td>" . $mahasiswa['responden_hp'] . "</td>"; 
                          echo "<td>" . $mahasiswa['tahun_masuk'] . "</td>"; 
                          echo '<td class="text-center align-middle">
                                  <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modalEdit" onclick="fillEditFormMahasiswa(' . htmlspecialchars(json_encode($mahasiswa)) . ')">
                                    <i class="fas fa-edit"></i> Edit
                                  </button>
                                  <form action="../../../controller/responden/mahasiswa/mahasiswa_delete.php" method="POST" style="display:inline-block;">
                                    <input type="hidden" name="user_id" value="' . $mahasiswa['user_id'] . '">
                                    <input type="hidden" name="responden_id" value="' . $mahasiswa['responden_mahasiswa_id'] . '">
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
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
    </div>
    <!-- /.content-wrapper -->
    <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #2c4182; color: white;">
        <h5 class="modal-title" id="modalEditLabel"  style = "color: white;">Edit Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white;">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="editForm" action="../../../controller/responden/mahasiswa/mahasiswa_edit.php" method="POST">
        <div class="modal-body">
          <input type="hidden" id="edit_id" name="id">
          <div class="form-group">
            <label for="edit_nama">Nama</label>
            <input type="text" class="form-control" id="edit_nama" name="nama" required>
          </div>
          <div class="form-group">
            <label for="edit_username">Username</label>
            <input type="text" class="form-control" id="edit_username" name="username" required>
          </div>
          <div class="form-group">
            <label for="edit_password">Password</label>
            <input type="text" class="form-control" id="edit_password" name="password" required>
          </div>


          <div class="form-group">
            <label for="edit_nim">NIM</label>
            <input type="text" class="form-control" id="edit_nim" name="nim" required>
          </div>
          <div class="form-group">
            <label for="edit_prodi">Prodi</label>
            <select id="edit_prodi" name="prodi" class="form-control" required>
              <option value="TI">D4 Teknik Informatika</option>
              <option value="SIB">D4 Sistem Informasi Bisnis</option>
              <option value="FastTrack">D2 Fast Track</option>
            </select>
          </div>
          <div class="form-group">
            <label for="edit_no_hp">No HP</label>
            <input type="text" class="form-control" id="edit_no_hp" name="no_hp" required>
          </div>
          <div class="form-group">
            <label for="edit_tahun_masuk">Tahun Masuk</label>
            <input type="number" class="form-control" id="edit_tahun_masuk" name="tahun_masuk" required>
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
