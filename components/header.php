<nav class="navbar navbar-expand-lg navbar-dark   py-2">
  <div class="container-fluid">
    
    <!-- Hamburger -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar"
      aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!-- Menu -->
    <div class="collapse navbar-collapse" id="mainNavbar">
      <ul class="navbar-nav text-center mx-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link px-3 <?php if($page=='index') echo 'active  '; ?>" href="./index.php">
            <i class="bi bi-house-door"></i> หน้าหลัก
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle px-3 <?php if($page=='reservation') echo 'active text-warning'; ?>" href="#" id="bookingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-calendar2-week"></i> การจอง
          </a>
          <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="bookingDropdown">
            <li><a class="dropdown-item" href="reservation.php"><i class="bi bi-calendar-check me-2"></i>จองคิวตัดผม</a></li>
            <li><a class="dropdown-item" href="view.php"><i class="bi bi-info-circle me-2"></i>ข้อมูลการจอง</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link px-3 <?php if($page=='haircut') echo 'active text-warning'; ?>" href="./haircut.php">
            <i class="bi bi-scissors"></i> ทรงผมยอดฮิต
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link px-3 <?php if($page=='address') echo 'active text-warning'; ?>" href="./address.php">
            <i class="bi bi-geo-alt"></i> ที่อยู่
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link px-3 <?php if($page=='about') echo 'active text-warning'; ?>" href="./about.php">
            <i class="bi bi-people"></i> เกี่ยวกับเรา
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle px-3" href="#" id="otherDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-three-dots"></i> อื่นๆ
          </a>
          <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="otherDropdown">
            <li><a class="dropdown-item" href="#"><i class="bi bi-person-fill me-2"></i>โปรไฟล์</a></li>
            <li><a class="dropdown-item" href="#"><i class="bi bi-gear-fill me-2"></i>ตั้งค่า</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="controls/signout.php"><i class="bi bi-box-arrow-right me-2"></i>ออกจากระบบ</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
<style>
  .navbar-nav .nav-link {
    font-size: 1.1rem;
    font-weight: 500;
    transition: color 0.2s, background 0.2s, text-shadow 0.2s;
  }
  .navbar-nav .nav-link.active,
  .navbar-nav .nav-link:hover {
    color: #ffc107 !important;
    text-shadow: 0 0 8px #fff3;
  }
  .dropdown-menu-dark {
    background: linear-gradient(135deg, #23272b 80%, #ffc10722 100%);
    border-radius: 1.2rem;
    border: none;
    box-shadow: 0 4px 24px 0 rgba(0,0,0,0.25);
    font-size: 1rem;
  }
  .dropdown-item {
    color: #fff;
    transition: background 0.2s, color 0.2s;
    border-radius: 0.7rem;
    margin: 2px 0;
  }
  .dropdown-item:hover, .dropdown-item:focus {
    background: #ffc107;
    color: #23272b !important;
  }
  @media (max-width: 991.98px) {
    .navbar-nav .nav-link {
      text-align: left;
      padding-left: 1.5rem !important;
    }
  }
=======

<nav class="navbar navbar-expand-lg navbar-dark   py-2">
  <div class="container-fluid">
    
    <!-- Hamburger -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar"
      aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!-- Menu -->
    <div class="collapse navbar-collapse" id="mainNavbar">
      <ul class="navbar-nav text-center mx-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link px-3 <?php if($page=='index') echo 'active  '; ?>" href="./index.php">
            <i class="bi bi-house-door"></i> หน้าหลัก
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle px-3 <?php if($page=='reservation') echo 'active text-warning'; ?> <?php if($page=='view') echo 'active text-warning'; ?>" href="#" id="bookingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-calendar2-week"></i> การจอง
          </a>
          <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="bookingDropdown">
            <li><a class="dropdown-item" href="reservation.php"><i class="bi bi-calendar-check me-2"></i>จองคิวตัดผม</a></li>
            <li><a class="dropdown-item" href="view.php"><i class="bi bi-info-circle me-2"></i>ข้อมูลการจอง</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link px-3 <?php if($page=='haircut') echo 'active text-warning'; ?>" href="./haircut.php">
            <i class="bi bi-scissors"></i> ทรงผมยอดฮิต
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link px-3 <?php if($page=='address') echo 'active text-warning'; ?>" href="./address.php">
            <i class="bi bi-geo-alt"></i> ที่อยู่
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link px-3 <?php if($page=='about') echo 'active text-warning'; ?>" href="./about.php">
            <i class="bi bi-people"></i> เกี่ยวกับเรา
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle px-3" href="#" id="otherDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-three-dots"></i> อื่นๆ
          </a>
          <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="otherDropdown">
            <li><a class="dropdown-item" href="#"><i class="bi bi-person-fill me-2"></i>โปรไฟล์</a></li>
            <?php if(isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
            <li><a href="backend/index.php" class="dropdown-item">ตั้งค่า</a></li>
            <?php endif; ?>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="controls/signout.php"><i class="bi bi-box-arrow-right me-2"></i>ออกจากระบบ</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
<style>
  .navbar-nav .nav-link {
    font-size: 1.1rem;
    font-weight: 500;
    transition: color 0.2s, background 0.2s, text-shadow 0.2s;
  }
  .navbar-nav .nav-link.active,
  .navbar-nav .nav-link:hover {
    color: #ffc107 !important;
    text-shadow: 0 0 8px #fff3;
  }
  .dropdown-menu-dark {
    background: linear-gradient(135deg, #23272b 80%, #ffc10722 100%);
    border-radius: 1.2rem;
    border: none;
    box-shadow: 0 4px 24px 0 rgba(0,0,0,0.25);
    font-size: 1rem;
  }
  .dropdown-item {
    color: #fff;
    transition: background 0.2s, color 0.2s;
    border-radius: 0.7rem;
    margin: 2px 0;
  }
  .dropdown-item:hover, .dropdown-item:focus {
    background: #ffc107;
    color: #23272b !important;
  }
  @media (max-width: 991.98px) {
    .navbar-nav .nav-link {
      text-align: left;
      padding-left: 1.5rem !important;
    }
  }
>>>>>>> fc641ee (update project)
</style>