<?php 
if (isset($_GET['page'])) $page=$_GET['page'];
else $page="beranda";

if ($page == "beranda")                 include("page/beranda.php");
elseif ($page == "logout")              include("page/logout.php");

    //-------------------------- profil --------------------------
    elseif ($page == "profil")                     include("page/profil/profil.php");

    //-------------------------- buku --------------------------
    elseif ($page == "bukulist")                 include("page/buku/bukulist.php");

    //-------------------------- data training buku --------------------------
    elseif ($page == "trainingbuku")             include("page/buku/training/buku.php");
    elseif ($page == "trainingbukutambah")       include("page/buku/training/bukutambah.php");
    elseif ($page == "trainingbukutambahpro")    include("page/buku/training/bukutambahpro.php");
    elseif ($page == "trainingbukuedit")         include("page/buku/training/bukuedit.php");
    elseif ($page == "trainingbukueditpro")      include("page/buku/training/bukueditpro.php");
    elseif ($page == "trainingbukulihat")        include("page/buku/training/bukulihat.php");
    elseif ($page == "trainingbukuhapus")        include("page/buku/training/bukuhapus.php");

    //-------------------------- data manajemen buku --------------------------
    elseif ($page == "manajemenbuku")            include("page/buku/manajemen/buku.php");
    elseif ($page == "manajemenbukutambah")      include("page/buku/manajemen/bukutambah.php");
    elseif ($page == "manajemenbukutambahpro")   include("page/buku/manajemen/bukutambahpro.php");
    elseif ($page == "manajemenbukuedit")        include("page/buku/manajemen/bukuedit.php");
    elseif ($page == "manajemenbukueditpro")     include("page/buku/manajemen/bukueditpro.php");
    elseif ($page == "manajemenbukulihat")       include("page/buku/manajemen/bukulihat.php");
    elseif ($page == "manajemenbukuhapus")       include("page/buku/manajemen/bukuhapus.php");

    //-------------------------- data manajemen buku --------------------------
    elseif ($page == "buku")                     include("page/buku/buku.php");
    elseif ($page == "bukutambah")               include("page/buku/bukutambah.php");
    elseif ($page == "bukutambahpro")            include("page/buku/bukutambahpro.php");
    elseif ($page == "bukuedit")                 include("page/buku/bukuedit.php");
    elseif ($page == "bukueditpro")              include("page/buku/bukueditpro.php");
    elseif ($page == "bukulihat")                include("page/buku/bukulihat.php");
    elseif ($page == "bukuhapus")                include("page/buku/bukuhapus.php");

    //-------------------------- kategori --------------------------
    elseif ($page == "kategori")                 include("page/kategori/kategori.php");
    elseif ($page == "kategoritambah")           include("page/kategori/kategoritambah.php");
    elseif ($page == "kategoritambahpro")        include("page/kategori/kategoritambahpro.php");
    elseif ($page == "kategoriedit")             include("page/kategori/kategoriedit.php");
    elseif ($page == "kategorieditpro")          include("page/kategori/kategorieditpro.php");
    elseif ($page == "kategorilihat")            include("page/kategori/kategorilihat.php");
    elseif ($page == "kategorihapus")            include("page/kategori/kategorihapus.php");

    //-------------------------- mahasiswa --------------------------
    elseif ($page == "mahasiswa")                include("page/mahasiswa/mahasiswa.php");
    elseif ($page == "mahasiswatambah")          include("page/mahasiswa/mahasiswatambah.php");
    elseif ($page == "mahasiswatambahpro")       include("page/mahasiswa/mahasiswatambahpro.php");
    elseif ($page == "mahasiswaedit")            include("page/mahasiswa/mahasiswaedit.php");
    elseif ($page == "mahasiswaeditpro")         include("page/mahasiswa/mahasiswaeditpro.php");
    elseif ($page == "mahasiswahapus")           include("page/mahasiswa/mahasiswahapus.php");

    //-------------------------- dosen --------------------------
    elseif ($page == "dosen")                    include("page/dosen/dosen.php");
    elseif ($page == "dosentambah")              include("page/dosen/dosentambah.php");
    elseif ($page == "dosentambahpro")           include("page/dosen/dosentambahpro.php");
    elseif ($page == "dosenedit")                include("page/dosen/dosenedit.php");
    elseif ($page == "doseneditpro")             include("page/dosen/doseneditpro.php");
    elseif ($page == "dosenhapus")               include("page/dosen/dosenhapus.php");

    //-------------------------- peminjaman --------------------------
    elseif ($page == "peminjaman")               include("page/peminjaman/peminjaman.php");
    elseif ($page == "peminjamanlihat")          include("page/peminjaman/peminjamanlihat.php");
    elseif ($page == "peminjamanlihatdosen")     include("page/peminjaman/peminjamanlihatdosen.php");
    elseif ($page == "peminjamanupdate")         include("page/peminjaman/peminjamanupdate.php");
    elseif ($page == "updateacc")                include("page/peminjaman/updateacc.php");

    //-------------------------- denda --------------------------
    elseif ($page == "denda")                    include("page/denda/denda.php");
    elseif ($page == "dendatambah")              include("page/denda/dendatambah.php");
    elseif ($page == "dendatambahpro")           include("page/denda/dendatambahpro.php");
    elseif ($page == "dendaedit")                include("page/denda/dendaedit.php");
    elseif ($page == "dendaeditpro")             include("page/denda/dendaeditpro.php");
    elseif ($page == "dendahapus")               include("page/denda/dendahapus.php");

    //-------------------------- testing --------------------------
    elseif ($page == "testing")                  include("page/appstesting/testing.php");

    //-------------------------- report --------------------------
    elseif ($page == "report")                   include("page/report/report.php");
    

    else include("page/404.php");
?>