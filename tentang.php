<?php
require "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daebak Store | Tentang Kami</title>
    <!--Import materialize.css-->
    <!-- <link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css" media="screen,projection" /> -->

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/style2.css">
    <!-- AOS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />


</head>

<body>
    <?php require "navbar.php"; ?>
    <?php require "banner3.php"; ?>

    <!-- <div class="container-fluid banner3 d-flex align-items-center ">
        <div class="container text-center text-white">
            <h1 style="font-family: viga;">Daebak Store</h1>
            <h3>Penyedia Fashion Wanita</h3>
        </div>
    </div>
    </div> -->

    <div class="container-fluid d-flex align-items-center mt-3 ">
        <div class="container text-center ">
            <div class="  col-md-8 offset-md-2">
                <h1 class="font-viga text-center">Daebak Store</h1>
                <p>Haiii Haiii EVERYONE...
                    Kamu bingung sama style fashion yang gitu-gitu aja?atau ga jago mix and match ootd? <br> Kamu ga perlu khawatir lagi karena sekarang Daebak Store hadir dengan produk terbaru yang berkolaborasi bersama brand-brand local.
                    <br><br>
                    Udah tau DAEBAKSTORE BELUM? <br>
                    Daebak Store adalah akun resmi dari kolaborasi ketiga pemuda perintis bisnis fashion
                    Kami menyediakan beberapa produk fashion yang tidak kalah unggul dari brand-brand ternama..
                    Selain itu, produk kami berasal dari tangan mahakarya anak muda yang mengedepankan kualitas dan mengikuti kemajuan fashion yang berinovasi untuk bisa diterima dikancah nasional bahkan sampai internasional.
                    <br><br>
                    Don't Forget
                    Di bulan JANUARI-DESEMBER 2023 ini Daebak Store mengadakan Promo besar-besaran mulai dari DISCOUNT' 20-50%, Buy 1 Get 1, dan masih banyak lagii jadi stay tune terus bersama kami daebakshop
                </p><br>
                <strong>
                    <h1 class="font-viga"> "Belanja fashion? Daebak Store aja" </h1>
                </strong>
            </div>


            <div class="row justify-content-center mt-5">
                <h5>Foto Anggota Kelompok III</h1>
                    <div class="col-lg-4 col-md-6 mt-0 d-flex justify-content-center">
                        <figure class="figure font-viga ">
                            <img src="image/anggota/putri.jpg" class="figure-img responsive-img rounded-circle materialboxed mt-5 " style="width: 200px; height: 200px;" alt="...">
                            <figcaption class="figure-caption">
                                <h5 class="text-color">Putri Narila</h5>
                                <span>Mahasiswa | IESK21</span>
                            </figcaption>
                            <!-- Tombol untuk membuka modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#gambarPutri">
                                Lihat Gambar
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="gambarPutri" tabindex="-1" aria-labelledby="gambarModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title font-viga" id="gambarModalLabel">PUTRI NARILA</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <img src="image/anggota/putri.jpg" class="img-fluid" alt="Gambar">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </figure>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <figure class="figure font-viga ">
                            <img src="image/anggota/maulana.jpg" class="figure-img rounded-circle mt-5 materialboxed responsive-img" style="width: 200px; height: 200px;" alt="...">
                            <figcaption class="figure-caption">
                                <h5 class="text-color">Eri Maulana</h5>
                                <span>Mahasiswa | IESK21</span>
                            </figcaption>
                            <!-- Tombol untuk membuka modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#gambarEri">
                                Lihat Gambar
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="gambarEri" tabindex="-1" aria-labelledby="gambarModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title font-viga" id="gambarModalLabel">ERI MAULANA</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <img src="image/anggota/eri.jpg" class="img-fluid" alt="Gambar">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </figure>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <figure class="figure font-viga ">
                            <img src="image/anggota/sela.jpeg" class="figure-img  rounded-circle mt-5 materialboxed responsive-img" style="width: 200px; height: 200px;" alt="...">
                            <figcaption class="figure-caption">
                                <h5 class="text-color">Siti Marsela</h5>
                                <span>Mahasiswa | IESK21</span>
                            </figcaption>
                            <!-- Tombol untuk membuka modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#gambarSela">
                                Lihat Gambar
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="gambarSela" tabindex="-1" aria-labelledby="gambarModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title font-viga" id="gambarModalLabel">SITI MARSELA</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <img src="image/anggota/sela.jpeg" class="img-fluid" alt="Gambar">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </figure>
                    </div>
            </div>
        </div>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#4be39f" fill-opacity="1" d="M0,128L48,122.7C96,117,192,107,288,117.3C384,128,480,160,576,186.7C672,213,768,235,864,229.3C960,224,1056,192,1152,160C1248,128,1344,96,1392,80L1440,64L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
        </path>
    </svg>


    <?php require "footer.php"; ?>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script>
    <!-- AOS SCRIPT -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <!-- <script src="materialize/js/materialize.min.js"></script> -->


    <script>
        const materialbox = document.querySelectorAll('.materialboxed');
        M.Materialbox.init(materialbox);
    </script>
</body>

</html>