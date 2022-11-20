<?php include"header.php"; ?>
    <!-- Side Navbar -->
    <nav class="side-navbar">
      <!-- Sidebar Header    -->
      <div class="sidebar-header d-flex align-items-center justify-content-center p-3 mb-3">
        <!-- User Info-->
        <div class="sidenav-header-inner text-center"><img class="img-fluid rounded-circle avatar mb-3" src="img/user.png" alt="person">
          <h2 class="h5 text-white text-uppercase mb-0">Name Name</h2>
          <p class="text-sm mb-0 text-muted">Editor</p>
        </div>
        <!-- Small Brand information, appears on minimized sidebar-->
        <a class="brand-small text-center text-decoration-none" href="index.php"><p class="h1 m-0 text-light">NJ</p></a>
      </div>
      <!-- Sidebar Navigation Menus--><span class="text-uppercase text-gray-500 text-sm fw-bold letter-spacing-0 mx-lg-2 heading">Main</span>
      <ul class="list-unstyled">                  
        <li class="sidebar-item"><a class="sidebar-link fs-5" href="#"> <i class="fa-solid fa-house-chimney me-2 fs-3"></i> Home </a></li>        
        <li class="sidebar-item"><a class="sidebar-link fs-5" href="#"> <i class="fa-solid fa-house-chimney me-2 fs-3"></i> Home </a></li>        
        <li class="sidebar-item"><a class="sidebar-link fs-5" href="#"> <i class="fa-solid fa-house-chimney me-2 fs-3"></i> Home </a></li>        
        <li class="sidebar-item"><a class="sidebar-link fs-5" href="#"> <i class="fa-solid fa-house-chimney me-2 fs-3"></i> Home </a></li>        
        <li class="sidebar-item"><a class="sidebar-link fs-5" href="#"> <i class="fa-solid fa-house-chimney me-2 fs-3"></i> Home </a></li>        
      </ul>
    </nav>
    <div class="page">
      <!-- navbar-->
      <header class="header">
        <nav class="navbar">
          <div class="container-fluid">
            <div class="d-flex align-items-center justify-content-between w-100">
              <div class="d-flex align-items-center">
                <a class=" btn btn-light d-flex align-items-center justify-content-center p-2" id="toggle-btn" href="#"><span class="navbar-toggler-icon"></span></a>
                <a class="navbar-brand ms-2">
                  <div class="brand-text d-none d-md-inline-block text-capitalize letter-spacing-0 text-white fs-5"> <span class="fw-bolder fs-4">Editor</span>  Dashboard</div></a>
              </div>
              <ul class="nav-menu mb-0 list-unstyled d-flex flex-md-row align-items-md-center">
                <!-- Log out-->
                <li class="nav-item"><a class="nav-link text-white text-sm p-2 btn btn-dark" href=""> <span class="d-none d-sm-inline-block me-2">Logout</span><i class="fa-solid fa-right-from-bracket"></i></a></li>
              </ul>
            </div>
          </div>
        </nav>
      </header>

      <footer class="main-footer w-100 position-absolute bottom-0 start-0 py-2" style="background: #333">
        <div class="container-fluid">
          <div class="row text-center gy-3">
            <div class="col-sm-12 text-sm-start">
              <p class="mb-0 text-sm text-light">NJ &copy; <?php echo date('Y') ?></p>
            </div>
            
          </div>
        </div>
      </footer>
    </div>
    <?php include "footer.php"; ?>