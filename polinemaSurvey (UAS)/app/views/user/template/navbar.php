<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<nav class="main-header navbar navbar-expand navbar-white">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="../modul/index.php" class="nav-link">Home</a>
      </li> -->
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
    <?php if(isset($_SESSION['nama']) && isset($_SESSION['role'])): ?>
        <li class="nav-item d-none d-sm-inline-block">
            <span class="nav-link">
                <i class="fas fa-user mr-3"> </i><?php echo $_SESSION['nama']; ?>
            </span>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <span class="nav-link">|</span>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <span class="nav-link"><?php echo $_SESSION['role']; ?></span>
        </li>
    <?php else: ?>
        <li class="nav-item d-none d-sm-inline-block">
            <i class="fas fa-user mr-3"> <span class="nav-link">Guest</span>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <span class="nav-link">|</span>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <span class="nav-link">Role</span>
        </li>
    <?php endif; ?>
    </ul>

  </nav>