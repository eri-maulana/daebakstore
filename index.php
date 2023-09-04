<?php
require "koneksi.php";
$queryProduk = mysqli_query($con, "SELECT id, nama, harga, foto, detail FROM produk LIMIT 6");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daebak Store | Beranda</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/style2.css">
    <!-- AOS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

</head>

<body>
    <?php require "navbar.php"; ?>
    <?php require "banner.php"; ?>

    <!-- Breadcump -->
    <div class="container mt-5 ">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb" style="margin-top:70px ;">
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="#" class="no-decoration text-black-50"><i class="fa-solid fa-home me-3"></i> Home</a>
                </li>
            </ol>
        </nav>
    </div>

    <!-- Section Tentang Kami -->

    <div class="container-fluid  ps-0 pe-0 pt-5">
        <div class="container text-center">
            <h3 class="mb-5 font-viga">Tentang Kami</h3>
            <p class="fs-5 ">Daebak Store adalah akun resmi dari kolaborasi ketiga pemuda perintis bisnis fashion
                Kami menyediakan beberapa produk fashion yang tidak kalah unggul dari brand-brand ternama..
                Selain itu, produk kami berasal dari tangan mahakarya anak muda yang mengedepankan kualitas dan mengikuti kemajuan fashion yang berinovasi untuk bisa diterima dikancah nasional bahkan sampai internasional.<br>
            <h3 class="font-viga"> "Belanja fashion? Daebak Store aja" </h3>
            </p>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#4be39fbe" fill-opacity="1" d="M0,128L48,122.7C96,117,192,107,288,117.3C384,128,480,160,576,186.7C672,213,768,235,864,229.3C960,224,1056,192,1152,160C1248,128,1344,96,1392,80L1440,64L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
            </path>
        </svg>
    </div>
    </div>
    <!-- Highlighted Produk -->
    <div class="container-fluid warna ps-0 pe-0 pt-5">
        <div class="container text-center font-viga">
            <h3>Kategori Unggulan</h3>
            <div class="row mt-5 ">
                <div class="col-md-4 mb-3">
                    <a href="produk.php?kategori=Blouse" class="no-decoration text-white">
                        <div data-aos="fade-right" data-aos-easing="ease-out-cubic" data-aos-duration="1000" data-aos-delay="500" class=" blouse highlight-kategori d-flex justify-content-center align-items-center ">
                            <h3 class="no-decoration">Blouse</h3>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 mb-3">
                    <a href="produk.php?kategori=tunik" class="no-decoration text-white">
                        <div data-aos="flip-down" data-aos-easing="ease-out-cubic" data-aos-duration="1500" data-aos-delay="800" class="tunik highlight-kategori d-flex justify-content-center align-items-center">
                            <h3 class="no-decoration">Tunik</h3>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 mb-3">
                    <a href="produk.php?kategori=celana" class="no-decoration text-white">
                        <div data-aos="fade-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000" data-aos-delay="1000" class=" celana highlight-kategori d-flex justify-content-center align-items-center">
                            <h3 class="no-decoration">Celana</h3>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#fff" fill-opacity="1" d="M0,128L48,122.7C96,117,192,107,288,117.3C384,128,480,160,576,186.7C672,213,768,235,864,229.3C960,224,1056,192,1152,160C1248,128,1344,96,1392,80L1440,64L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
            </path>
        </svg>
    </div>


    <!-- Section Produk -->
    <div class="container-fluid ps-0 pe-0 pt-5">
        <div class="container text-center">
            <h3 class="mb-5 font-viga">Produk</h3>
            <div class="row my-3">
                <?php while ($data = mysqli_fetch_array($queryProduk)) {
                ?>
                    <div class="col-sm-6 col-md-4 mb-3">
                        <div class="card h-100">
                            <div data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000">
                                <img src="image/<?php echo $data['foto']; ?>" class="card-img-top" alt="...">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title font-viga"><?php echo $data['nama']; ?></h5>
                                <!-- <details>
                                    <p class="card-text text-truncate"><?php echo $data['detail']; ?></p>
                                </details> -->
                                <p class="fs-3 text-success font-viga">Rp.<?php echo $data['harga']; ?></p>
                                <a href="produk-detail.php?nama=<?php echo $data['nama']; ?>" class="btn btn-outline-success ">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <a href="produk.php" class="btn btn-outline-success ">Lihat Selengkapnya..</a>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#4be39f" fill-opacity="1" d="M0,128L48,122.7C96,117,192,107,288,117.3C384,128,480,160,576,186.7C672,213,768,235,864,229.3C960,224,1056,192,1152,160C1248,128,1344,96,1392,80L1440,64L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
            </path>
        </svg>
    </div>
    <?php
    require "footer.php";
    ?>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script>
    <!-- AOS SCRIPT -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>