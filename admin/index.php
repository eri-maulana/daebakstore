<!DOCTYPE html>
<?php
// penghubung ke session php, agar ketika sebelum akses index di antar ke page login
require "session.php";
// pengambilan data dari database
require "../koneksi.php";

// pengambilan data jumlah kategori yang tersedia di database mysql
$queryKategori = mysqli_query($con, "SELECT * FROM kategori");
$jumlahKategori = mysqli_num_rows($queryKategori);
// pengambilan data jumlah produk yang tersedia di database mysql
$queryProduk = mysqli_query($con, "SELECT * FROM produk");
$jumlahProduk = mysqli_num_rows($queryProduk);
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- linked boostrap css -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <!-- linked fontawesome css -->
    <link rel="stylesheet" href="../fontawesome/css/fontawesome.min.css">
    <!-- linked ke file css buatan sendiri -->
    <link rel="stylesheet" href="../css/style.css">

    <title>Home|Beranda</title>

</head>

<body>
    <!-- include/pengambilan tampilan navbar dari navbar.php -->
    <?php
    require "navbar.php"
    ?>
    <!-- pembuatan icon home -->
    <div class="container mt-lg-5 ">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb" style="margin-top:70px ;">
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="#" class="no-decoration text-black-50"><i class="fa-solid fa-home me-3"></i> Home</a>
                </li>
            </ol>
        </nav>
        <!-- pembuatan kolom untuk dashboard -->
        <div class="container mt-5">
        </div>
        <!-- pemanggilan sesion username yang di masukan pada kolom login username -->
        <h1>Hii <?php echo $_SESSION['username'] ?></h1>
    </div>
    <div class="row  text-center d-flex align-align-items-center justify-content-center">
        <!-- kotak kategori -->
        <div class="  col-lg-5 col-md-6 col-12 mb-2 kotak summery-kategori p-3 me-4 shadow dashboard-kategori">
            <div class="row">
                <div class="col-6">
                    <i class=" fas fa-align-justify fa-8x text-black-50"></i>
                </div>
                <div class="col-6 text-white">
                    <h3 class="fs-2">KATEGORI</h3>
                    <!-- pengambilan data dari variabel $jumlahKategori di baris pertama -->
                    <p class="fs-4"><?php echo $jumlahKategori ?> Kategori</p>
                    <p><a href="kategori.php" class=".text-info-emphasis no-decoration">lihat details </a></p>
                </div>
            </div>
        </div>
        <!-- akhir kotak kategori -->
        <!-- kotak produk -->
        <div class="col-lg-5 col-md-6 col-12 mb-2 kotak summery-kategori p-3 shadow">
            <div class="row">
                <div class="col-6">
                    <i class=" fas fa-box fa-8x text-black-50"></i>
                </div>
                <div class="col-6 text-white">
                    <h3 class="fs-2">PRODUK</h3>
                    <!-- pengambilan data dari variabel $jumlahProduk di baris pertama -->
                    <p class="fs-4"><?php echo $jumlahProduk ?> Produk</p>
                    <p><a href="produk.php" class=".text-info-emphasis no-decoration">lihat details </a></p>
                </div>
            </div>
        </div>
        <!-- akhir kotak produk -->
    </div>
    </div>
    <!-- linked javascript bootstrap -->
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- linked javascript fontawesome -->
    <script src="../fontawesome/js/all.js"></script>
</body>

</html>