
<!-- main sidebar -->
<aside class="main-sidebar elevation-4">
    <!-- Brand Logo -->
    <a class="brand-link">
        <img src="../../../../public/image/polinema-logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3">
        <span class="brand-text">Polinema Survey</span>
    </a>
    <!-- sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <?php
                if(isset($_SESSION['role'])) {
                    $userRole = $_SESSION['role'];
                    if($userRole == 'mahasiswa') {
                        echo '<li class="nav-item">
                        <a href="../mahasiswa/dashboard.php" class="nav-link">
                            <i class="nav-icon fas fa-clipboard-list"></i>
                            <p>
                                Isi Survey
                            </p>
                        </a>
                        
                    </li>
                    <li class="nav-item">
                                <a href="../mahasiswa/survey.php" class="nav-link">
                                    <i class="nav-icon fas fa-history"></i>
                                    <p>
                                        Riwayat Survey
                                    </p>
                                </a>
                    </li>';
                    }elseif($userRole == 'alumni') {
                        echo '<li class="nav-item">
                        <a href="../alumni/dashboard.php" class="nav-link">
                            <i class="nav-icon fas fa-clipboard-list"></i>
                            <p>
                                Isi Survey
                            </p>
                        </a>
                        
                    </li>
                    <li class="nav-item">
                                <a href="../alumni/survey.php" class="nav-link">
                                    <i class="nav-icon fas fa-history"></i>
                                    <p>
                                        Riwayat Survey
                                    </p>
                                </a>
                    </li>';
                    }elseif($userRole == 'dosen') {
                        echo '<li class="nav-item">
                        <a href="../dosen/dashboard.php" class="nav-link">
                            <i class="nav-icon fas fa-clipboard-list"></i>
                            <p>
                                Isi Survey
                            </p>
                        </a>
                        
                    </li>
                    <li class="nav-item">
                                <a href="../dosen/survey.php" class="nav-link">
                                    <i class="nav-icon fas fa-history"></i>
                                    <p>
                                        Riwayat Survey
                                    </p>
                                </a>
                    </li>';
                    }elseif($userRole == 'industri') {
                        echo '<li class="nav-item">
                        <a href="../industri/dashboard.php" class="nav-link">
                            <i class="nav-icon fas fa-clipboard-list"></i>
                            <p>
                                Isi Survey
                            </p>
                        </a>
                        
                    </li>
                    <li class="nav-item">
                                <a href="../industri/survey.php" class="nav-link">
                                    <i class="nav-icon fas fa-history"></i>
                                    <p>
                                        Riwayat Survey
                                    </p>
                                </a>
                    </li>';
                    }elseif($userRole == 'orangtua') {
                        echo '<li class="nav-item">
                        <a href="../orangtua/dashboard.php" class="nav-link">
                            <i class="nav-icon fas fa-clipboard-list"></i>
                            <p>
                                Isi Survey
                            </p>
                        </a>
                        
                    </li>
                    <li class="nav-item">
                                <a href="../orangtua/survey.php" class="nav-link">
                                    <i class="nav-icon fas fa-history"></i>
                                    <p>
                                        Riwayat Survey
                                    </p>
                                </a>
                    </li>';
                    }elseif($userRole == 'tendik') {
                        echo '<li class="nav-item">
                        <a href="../tendik/dashboard.php" class="nav-link">
                            <i class="nav-icon fas fa-clipboard-list"></i>
                            <p>
                                Isi Survey
                            </p>
                        </a>
                        
                    </li>
                    <li class="nav-item">
                                <a href="../tendik/survey.php" class="nav-link">
                                    <i class="nav-icon fas fa-history"></i>
                                    <p>
                                        Riwayat Survey
                                    </p>
                                </a>
                    </li>';
                    }
                }
                ?>
            </ul>
        </nav>
        <div class="logout">
            <ul class="nav nav-pills nav-sidebar">
            <li class="nav-item">
                    <a href="../../logout.php" class="nav-link" style="background-color: white;">
                        <i class="nav-icon fas fa-sign-out-alt" style="color: red;"> </i>
                        <p style="color: red; ">
                        Logout
                        </p>
                    </a>
              </li>
            </ul>

        </div>    
        <!-- /.sidebar-menu -->
    </div>
</aside>
