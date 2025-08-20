<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<style>
  .navbar-nav .nav-link {
    transition: all 0.3s ease;
    font-size: 20px;
    font-weight: 400;
}

  .navbar-nav .nav-link:hover {
    text-shadow: 0 0 10px rgba(255, 255, 255, 0.8);
  }
</style>
<nav class="navbar navbar-expand-lg navbar-dark rounded ">
  <div class="container">
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
      data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
      aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link text-white" href="./index.php">หน้าหลัก</a></li>
        <li class="nav-item dropdown">
    <a href="#" class="nav-link dropdown-toggle text-white" id="navbarDropdown" role="button"
       data-bs-toggle="dropdown" aria-expanded="false">
       การจอง
    </a>
    <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="background: linear-gradient(to top, rgba(95, 95, 95, 1), rgba(29, 29, 29, 1));">
        <li><a href="reservation.php" class="dropdown-item text-white">จองคิวตัดผม</a></li>
        <li><a href="view.php" class="dropdown-item text-white">ข้อมูลการจอง</a></li>
    </ul>
</li>



        <li class="nav-item"><a class="nav-link text-white" href="./haircut.php">ทรงผมยอดฮิต</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="./address.php">ที่อยู่</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="#">เกี่ยวกับเรา</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="controls/signout.php">ออกจากระบบ</a></li>
      </ul>
    </div>
    </div>
  </div>
</nav>
