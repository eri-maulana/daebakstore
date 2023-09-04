<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style2.css">
    <title>Navbar</title>
</head>

<body>
    <!-- pembuatan navbar yang berisi brand, home, kategori, produk, tentang kami, dan pencarian dari bootstrap -->
    <nav class="navbar navbar-expand-lg my-auto warna1 text-black pt-3 shadow-sm fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand me-5 ms-2" href="../daebakstore/">
                <h4>Daebak Store</h4>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarTogglerDemo02">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item me-2">
                        <a class="nav-link" href="../daebakstore/">Home</a>
                    </li>
                    <li class="nav-item me-2">
                        <a class="nav-link" href="produk.php">Produk</a>
                    </li>
                    <li class="nav-item me-2">
                        <a class="nav-link" href="tentang.php">Tentang Kami</a>
                    </li>
                </ul>
                <form class="d-flex" role="search" method="get" action="produk.php">
                    <input class="form-control me-2 " type="search" placeholder="Search" aria-label="Search" name="keyword">
                    <button class="btn btn-light " type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>

</html>