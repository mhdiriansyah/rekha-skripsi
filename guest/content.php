<?php 
if (isset($_GET['page'])) $page=$_GET['page'];
else $page="beranda";

if ($page == "beranda")                     include("page/beranda.php");
elseif ($page == "logout")                  include("page/logout.php");

    // -------------------------- buku --------------------------
    elseif ($page == "buku")                include("page/buku/buku.php");
    elseif ($page == "bukulihat")           include("page/buku/bukulihat.php");
    elseif ($page == "formpinjam")          include("page/buku/formpinjam.php");
    elseif ($page == "formpinjampro")       include("page/buku/formpinjampro.php");
    
    // -------------------------- profil --------------------------
    elseif ($page == "profil")              include("page/profil/profil.php");
    elseif ($page == "profildosen")         include("page/profildosen/profil.php");
    elseif ($page == "profilaktivasi")      include("page/profil/profilaktivasi.php");

    // -------------------------- peminjaman --------------------------
    elseif ($page == "peminjaman")          include("page/peminjaman/peminjaman.php");
    elseif ($page == "peminjamandosen")     include("page/peminjaman/peminjamandosen.php");

    // -------------------------- cari buku --------------------------
    elseif ($page == "caribuku")            include("page/buku/caribuku.php");
    

    else include("page/404.php");
?>