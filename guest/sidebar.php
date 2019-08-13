
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
  <div class="sidebar-brand-icon rotate-n-15">
    <i class="fas fa-book"></i>
  </div>
  <div class="sidebar-brand-text mx-3">Perpustakaan</div>
</a>


<hr class="sidebar-divider my-0">

 
<li class="nav-item active">
  <a class="nav-link" href="?page=beranda">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Beranda</span></a>
</li>

<hr class="sidebar-divider">

<div class="sidebar-heading">
  Interface
</div>

<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
    <i class="fas fa-fw fa-cog"></i>
    <span>Manajemen</span>
  </a>
  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">item</h6>
      <a class="collapse-item" href="?page=buku">Buku</a>
      <?php if($role == 1){ ?>
        <a class="collapse-item" href="?page=peminjaman">Riwayat Peminjaman</a>
      <?php } else { ?>
        <a class="collapse-item" href="?page=peminjamandosen">Riwayat Peminjaman</a>
      <?php } ?>
    </div>
  </div>
</li>
<li class="nav-item">
  <a class="nav-link" href="?page=caribuku">
    <i class="fas fa-fw fa-book"></i>
    <span>Cari Buku</span></a>
</li>
<hr class="sidebar-divider">
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>