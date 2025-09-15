<nav class="navbar navbar-expand-lg navbar-dark bg-transparent custom-navbar">
  <div class="container">
    <?php if (isset($_SESSION['name'])): ?>
      <a class="navbar-brand" href="#"><i class="bi bi-person-circle me-2"></i> <?= htmlspecialchars($_SESSION['name']) ?>
      </a>
    <?php else: ?>
      <a class="navbar-brand text-white text-decoration-none" href="signin.php"><i class="bi bi-person-circle me-2"></i> เข้าสู่ระบบ</a>
    <?php endif; ?>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
      data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
      aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">

      <!-- ปุ่มกากะบาด (เฉพาะ mobile) -->
      <button type="button" class="btn-close d-lg-none" data-bs-toggle="collapse"
        data-bs-target="#navbarNav" aria-label="Close"></button>

      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link px-3 <?php if ($page == 'index') echo 'active'; ?>" href="./index.php">
            หน้าหลัก
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle px-3 <?php if ($page == 'reservation') echo 'active'; ?>"
            href="#" id="bookingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            การจอง
          </a>
          <ul class="dropdown-menu" aria-labelledby="bookingDropdown">
            <li>
              <a class="dropdown-item" href="reservation.php">
                <i class="bi bi-scissors me-2"></i> จองคิวตัดผม
              </a>
            </li>
            <li>
              <a class="dropdown-item" href="view.php">
                <i class="bi bi-calendar-check me-2"></i> ข้อมูลการจอง
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link px-3 <?php if ($page == 'address') echo 'active'; ?>" href="./address.php">
            ที่อยู่
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link px-3 <?php if ($page == 'about') echo 'active'; ?>" href="./about.php">
            เกี่ยวกับเรา
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle px-3 <?php if ($page == 'profile') echo 'active'; ?>" href="#" id="otherDropdown" role="button"
            data-bs-toggle="dropdown" aria-expanded="false">
            อื่นๆ
          </a>
          <ul class="dropdown-menu" aria-labelledby="otherDropdown">
            <li>
              <a class="dropdown-item" href="profile.php"><i class="bi bi-person-fill me-2"></i>โปรไฟล์</a>
            </li>

            <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
              <li>
                <a class="dropdown-item" href="backend/index.php">
                  <i class="bi bi-gear-fill me-2"></i>ตั้งค่า
                </a>
              </li>
            <?php endif; ?>

            <li><hr class="dropdown-divider"></li>
            <li>
              <a class="dropdown-item <?= isset($_SESSION['name']) ? '' : 'disabled text-muted' ?>" 
                href="<?= isset($_SESSION['name']) ? 'controls/signout.php' : '#' ?>" 
                tabindex="<?= isset($_SESSION['name']) ? '0' : '-1' ?>" 
                aria-disabled="<?= isset($_SESSION['name']) ? 'false' : 'true' ?>">
                <i class="bi bi-box-arrow-right me-2"></i>ออกจากระบบ
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

<style>
  .custom-navbar {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    z-index: 1000;
    margin-top: 0 !important;
  }

  @media (max-width: 991px) {
    .navbar-collapse {
      position: fixed;
      top: 0;
      right: 0;
      height: 100vh;
      width: 280px;
      background: #fff;
      padding: 2rem 1.5rem;
      box-shadow: -2px 0 8px rgba(0, 0, 0, 0.15);
      transition: transform 0.3s ease-in-out;
      transform: translateX(100%);
      z-index: 1050;
    }

    .navbar-collapse.show {
      transform: translateX(0);
    }

    .navbar-collapse .btn-close {
      position: absolute;
      top: 1rem;
      right: 1rem;
      filter: invert(0);
      z-index: 1100;
    }

    .navbar-nav .nav-link {
      color: #333 !important;
      font-size: 1.1rem;
      margin-bottom: 1rem;
    }

    .navbar-nav .nav-link.active {
      color: #e63946 !important;
    }

    .navbar-collapse::before {
      content: "";
      position: fixed;
      top: 0;
      left: 0;
      width: 100vw;
      height: 100vh;
      z-index: -1;
    }
  }

  @media (min-width: 992px) {
    .navbar-nav .nav-link {
      color: #fff !important;
    }

    .navbar-nav .nav-link.active {
      color: #e63946 !important;
    }
  }

  .dropdown-menu {
    border-radius: 12px;
    padding: 0.5rem;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
    min-width: 200px;
  }

  .dropdown-item {
    border-radius: 8px;
    padding: 0.6rem 1rem;
    transition: background 0.2s, transform 0.1s;
    display: flex;
    align-items: center;
  }

  .dropdown-item:hover {
    background: #f8f9fa;
    transform: translateX(4px);
  }

  .dropdown-item i {
    font-size: 1.1rem;
  }

  .dropdown-item.disabled {
    pointer-events: none;
    opacity: 0.5;
    cursor: default;
  }

  .hero-section {
    padding-top: 120px;
  }
</style>