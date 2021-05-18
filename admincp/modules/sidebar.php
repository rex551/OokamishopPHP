<?php ob_start() ; ob_flush() ?>
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion sticky-top" id="accordionSidebar" width="100">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="TrangChu">
  <div class="sidebar-brand-icon rotate-n-15">
    <i class="fas fa-laugh-wink"></i>
  </div>
  <div class="sidebar-brand-text mx-3">Admin Manager</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
  <a class="nav-link" href="../trangchu">
    <i class="fas fa-sign-out-alt"></i>    
    <span>Quay về trang User</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  Giao diện
</div>

<!-- Nav Item - Nguoidung Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
    <i class="fas fa-user"></i>
    <span>Người dùng</span>
  </a>
  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Quản Lý</h6>
      <a class="collapse-item" href="Profile">Profile</a>
      <a class="collapse-item" href="Add/Accounts">Tài khoản</a>
    </div>
  </div>
</li>

<!-- Nav Item - Slider and Banner Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
    <i class="fas fa-images"></i>
    <span>Slider và Banner</span>
  </a>
  <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">quản lý</h6>
      <a class="collapse-item" href="Add/Sliders">Slider</a>
      <a class="collapse-item" href="Add/Banners">Banner</a>
    </div>
  </div>
</li>
<!-- Nav Item - Blog Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
    <i class="fas fa-newspaper"></i>
    <span>Blog</span>
  </a>
  <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Quản Lý</h6>
      <a class="collapse-item" href="Add/Blogs">Bài viết</a>
      <a class="collapse-item" href="Add/Title/Blogs">Danh mục bài viết</a>
    </div>
  </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  Bán Hàng
</div>

<!-- Nav Item - Producs Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
   <i class="fas fa-tshirt"></i>
    <span>Sản Phẩm</span>
  </a>
  <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">quản lý:</h6>
            <a class="collapse-item" href="Add/Collections">Danh mục sản phẩm</a>
            <a class="collapse-item" href="Add/SubCollections">Danh mục sản phẩm con</a>
            <a class="collapse-item" href="Add/Products">Sản phẩm</a>
  </div>
</li>

<!-- Nav Item - Charts -->
<li class="nav-item">
  <a class="nav-link" href="Cart">
    <i class="fas fa-shopping-cart"></i>
    <span>Đơn hàng</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->
