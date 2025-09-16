
<nav class="navbar navbar-expand-lg navbar-dark py-2 mt-3">
  
  <div class="container">
    <a class="navbar-brand" href="#">Admin</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar"
      aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="mainNavbar">
      <ul class="navbar-nav text-center mx-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link px-3 <?php if($page=='index') echo 'active  '; ?>" href="../backend/index.php">
             หน้าหลัก</a>
        </li>
        <li class="nav-item">
          <a class="nav-link px-3 <?php if($page=='haircut') echo 'active text-warning'; ?>" href="../backend/haircut.php"> จัดการทรงผม</a>
        </li>
        <li class="nav-item">
          <a class="nav-link px-3 <?php if($page=='view') echo 'active text-warning'; ?>" href="../backend/view.php">
             จัดการข้อมูลการจอง</a>
        </li>
        <li class="nav-item">
          <a class="nav-link px-3 <?php if($page=='user') echo 'active text-warning'; ?>" href="../backend/user.php">
             จัดการข้อมูลผู้ใช้</a>
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
    color: #e63946 !important;
    text-shadow: 0 0 8px #fff3;
  }
  .dropdown-menu-dark {
    background: linear-gradient(135deg, #23272b 80%, #ff070722 100%);
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
    background: #e63946;
    color: #23272b !important;
  }
  @media (max-width: 991.98px) {
    .navbar-nav .nav-link {
      text-align: left;
      padding-left: 1.5rem !important;
    }
  }
</style>