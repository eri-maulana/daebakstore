<?php
require "koneksi.php";
// query untuk menampilkan nama-nama kategori
$queryKategori = mysqli_query($con, "SELECT * FROM kategori");

// query mengambil berdasarkan nama produk/keyword
if (isset($_GET['keyword'])) {
    $fromProduk = mysqli_query($con, "SELECT * FROM produk WHERE nama LIKE '%$_GET[keyword]%'");
}
// query mengambil berdasarkan kategori
elseif (isset($_GET['kategori'])) {
    $queryGetKategoriId = mysqli_query($con, "SELECT * FROM kategori WHERE nama='$_GET[kategori]'");
    $kategoriId = mysqli_fetch_array($queryGetKategoriId);

    $fromProduk = mysqli_query($con, "SELECT * FROM produk WHERE kategori_id='$kategoriId[id]'");
}
// query mengambil berdasarkan default
else {
    $fromProduk = mysqli_query($con, "SELECT * FROM produk");
}

$countData = mysqli_num_rows($fromProduk);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daebak Store | Produk</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/style2.css">
    <!-- AOS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>

<body>
    <?php require "navbar.php"; ?>
    <?php require "banner2.php"; ?>

    <!-- Breadcump -->
    <div class="container mt-5 ">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb" style="margin-top:70px ;">
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="#" class="no-decoration text-black-50"><i class="fa-solid fa-home me-3"></i> Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="#" class="no-decoration text-black-50"><i class=" "></i> Produk</a>
                </li>
            </ol>
        </nav>
    </div>

    <div class="container-fluid my-5">
        <div class="container">
            <div class="row ">
                <div class=" col-lg-3 mb-3 font-viga">
                    <h3 class="text-center ">Kategori</h3>
                    <ul class="list-group">

                        <?php
                        while ($data = mysqli_fetch_array($queryKategori)) {
                        ?>
                            <a class="no-decoration" href="produk.php?kategori=<?php echo $data['nama']; ?>">
                                <li class="list-group-item"><?php echo $data['nama']; ?></li>
                            </a>
                        <?php
                        }
                        ?>

                    </ul>
                </div>
                <div class="  col-lg-9 text-center">
                    <h3 class="font-viga">Produk</h3>
                    <?php
                    if ($countData < 1) {
                    ?>
                        <div class="alert alert-danger mt-3" role="alert">
                            Produk Yang Dicari Tidak Tersedia <br> Untuk Lebih Jelas Nya Silahkan Lihat di Kategori Saja
                        </div>
                    <?php
                    }
                    ?>
                    <div class="row d-flex justify-content-center mb-3">
                        <?php while ($produk = mysqli_fetch_array($fromProduk)) { ?>
                            <div class="col-md-4 mb-4">
                                <div class="card h-100 rounded-5">
                                    <div data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000">
                                        <img src="image/<?php echo $produk['foto']; ?>" class="card-img-top rounded-5" alt="...">
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title font-viga"><?php echo $produk['nama']; ?></h5>
                                        <!-- <details>
                                        <p class="card-text text-truncate"><?php echo $produk['detail']; ?></p>
                                        </details> -->
                                        <p class="fs-3 text-success font-viga">Rp.<?php echo $produk['harga']; ?></p>
                                        <a href="produk-detail.php?nama=<?php echo $produk['nama']; ?>" class="btn btn-outline-success font-viga ">Lihat Detail</a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#4be39f" fill-opacity="1" d="M0,128L48,122.7C96,117,192,107,288,117.3C384,128,480,160,576,186.7C672,213,768,235,864,229.3C960,224,1056,192,1152,160C1248,128,1344,96,1392,80L1440,64L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
        </path>
    </svg>

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