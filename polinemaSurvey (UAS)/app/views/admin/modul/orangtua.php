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
          <h1 class="m-0" style = "color : #2c4182">Orangtua</h1>
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
              <div class="card-header">
                <h3 class="card-title">Daftar Orangtua</h3>
              </div>
              <div class="card-body">
              <table id="example1" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Username</th>
                      <th>Password</th>
                      <th>Jenis Kelamin</th>
                      <th>Umur</th>
                      <th>Pekerjaan</th>
                      <th>No HP</th>
                      <th>Aksi</th> 
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $crud = new respondenCRUD();
                      $orangtuaList = $crud->readOrangtua();
                      $no = 1; // Nomor urut
                      foreach ($orangtuaList as $orangtua) {
                          echo "<tr>";
                          echo "<td>" . $no++ . "</td>";
                          echo "<td>" . $orangtua['nama'] . "</td>";
                          echo "<td>" . $orangtua['username'] . "</td>";
                          echo "<td>" . $orangtua['password'] . "</td>"; 
                          echo "<td>" . $orangtua['responden_jk']. "</td>";
                          echo "<td>" . $orangtua['responden_umur']. "</td>";
                          echo "<td>" . $orangtua['responden_pekerjaan']. "</td>";
                          echo "<td>" . $orangtua['responden_hp']. "</td>";
                          echo '<td class="text-center align-middle">
                                  <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modalEdit" onclick="fillEditFormOrangtua(' . htmlspecialchars(json_encode($orangtua)) . ')">
                                    <i class="fas fa-edit"></i> Edit
                                  </button>
                                  <form action="../../../controller/responden/orangtua/orangtua_delete.php" method="POST" style="display:inline-block;">
                                    <input type="hidden" name="user_id" value="' . $orangtua['user_id'] . '">
                                    <input type="hidden" name="responden_id" value="' . $orangtua['responden_ortu_id'] . '">
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
      <form id="editForm" action="../../../controller/responden/orangtua/orangtua_edit.php" method="POST">
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
            <label for="edit_jk">Jenis Kelamin</label>
            <select id="edit_jk" name="jk" class="form-control" required>
                  <option value="L">Laki-laki</option>
                  <option value="P">Perempuan</option>
            </select>
          </div>
          <div class="form-group">
            <label for="edit_umur">Umur</label>
            <input type="text" class="form-control" id="edit_umur" name="umur" required>
          </div>
          <div class="form-group">
            <label for="edit_pekerjaan">Pekerjaan</label>
            <input type="text" class="form-control" id="edit_pekerjaan" name="pekerjaan" required>
          </div>
          <div class="form-group">
            <label for="edit_no_hp">No HP</label>
            <input type="text" class="form-control" id="edit_no_hp" name="no_hp" required>
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
