<?php
require "koneksi.php";

$nama = htmlspecialchars($_GET['nama']);
$queryProduk = mysqli_query($con, "SELECT * FROM produk WHERE nama='$nama'");
$produk = mysqli_fetch_array($queryProduk);
$queryProdukTerkait = mysqli_query($con, "SELECT * FROM produk WHERE kategori_id='$produk[kategori_id]' AND id!='$produk[id]' LIMIT 3");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daebak Store | Detail Produk</title>
    <!-- AOS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>

<body>
    <?php require "navbar.php"; ?>



    <!-- detail Produk -->
    <div class="container-fluid ps-0 pe-0 mt-5">
        <div class="container py-5">
            <h1 class="text-center mb-5 font-viga">Detail Produk</h1>
            <div class="row">
                <div class="col-lg-5 mb-4" data-aos="fade-down" data-aos-easing="ease-out-cubic" data-aos-duration="2000">
                    <img class="w-100 rounded-5" src="image/<?php echo $produk['foto'] ?>" alt="">
                </div>
                <div class="col-lg-6 offset-lg-1   ">
                    <h3 class="font-viga"><?php echo $produk['nama']; ?></h2>
                        <p><?php echo $produk['detail']; ?><br></p>
                        <p class="text-color fs-3 font-viga">Rp. <?php echo $produk['harga']; ?></p>
                        <p>Ketersediaan Stok : <strong class="font-viga"><?php echo $produk['ketersediaan_stok']; ?></strong></p>
                </div>
            </div>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#4be39f" fill-opacity="1" d="M0,128L48,122.7C96,117,192,107,288,117.3C384,128,480,160,576,186.7C672,213,768,235,864,229.3C960,224,1056,192,1152,160C1248,128,1344,96,1392,80L1440,64L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
            </path>
        </svg>
    </div>

    <!-- produk terkait -->
    <div class="container-fluid warna1 ps-0 pe-0 pb-5">
        <div class="container">
            <h3 class="text-center mb-4 font-viga">Produk Terkait</h3>
            <div class="row">
                <?php while ($data = mysqli_fetch_array($queryProdukTerkait)) {
                ?>
                    <div class="col-lg-4 col-md-6 mb-3 " data-aos="fade-up" data-aos-easing="ease-out-cubic" data-aos-duration="2000">
                        <a href="produk-detail.php?nama=<?php echo $data['nama']; ?>">
                            <img src="image/<?php echo $data['foto']; ?>" class="img-fluid img-thumbnail image-terkait" alt="">
                        </a>
                    </div>
                <?php }  ?>
            </div>
        </div>
    </div>


    <?php require "footer.php" ?>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script>
    <!-- AOS SCRIPT -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>