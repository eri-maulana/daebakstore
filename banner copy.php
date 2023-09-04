<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banner</title>

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/style2.css">
    <!-- AOS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css" media="screen,projection" />
</head>

<body>
    <!-- banner -->
    <!-- <div class="container-fluid banner d-flex align-items-center ">
        <div class="container text-center text-white">
            <h1 class="font-viga text-color">Daebak Store</h1>
            <h3>Belanja Fashion? Daebak Store Aja ...</h3>
            <div class="  col-md-8 offset-md-2">
                <form class="d-flex my-3 input-group-lg " role="search" method="get" action="produk.php">
                    <input class="form-control  me-2  " type="search" placeholder="Search" aria-label="Search" name="keyword">
                    <button class="btn warna1 text-dark" type="submit">Search</button>
                </form>
            </div>
        </div>
    </div> -->
    <div class="slider">
        <ul class="slides my-auto-5">
            <li>
                <img src="image/Tunik.jpg"> <!-- random image -->
                <div class="caption left-align">
                    <h3>This is our big Tagline!</h3>
                    <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
                </div>
            </li>
            <li>
                <img src="image/Blouse.jpg"> <!-- random image -->
                <div class="caption right-align">
                    <h3>This is our big Tagline!</h3>
                    <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
                </div>
            </li>
            <li>
                <img src="image/Celana.jpg"> <!-- random image -->
                <div class="caption center-align">
                    <h3>This is our big Tagline!</h3>
                    <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
                </div>
            </li>
        </ul>
    </div>



    <script src="materialize/js/materialize.min.js"></script>
    <script>
        const slider = document.querySelectorAll('.slider')
        M.Slider.init(slider, {
            indicators: false,
            height: 500,
            transition: 500,
            interval: 3000
        })
    </script>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script>
    <!-- AOS SCRIPT -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>