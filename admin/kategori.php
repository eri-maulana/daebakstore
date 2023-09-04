<!DOCTYPE html>
<?php
// penghubung ke session php, agar ketika sebelum akses index di antar ke page login
require "session.php";
// pengambilan data dari database
require "../koneksi.php";

$queryKategori = mysqli_query($con, "SELECT * FROM kategori");
$jumlahKategori = mysqli_num_rows($queryKategori);
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
    <title>Kategori</title>
</head>

<body>
    <!-- include/pengambilan tampilan navbar dari navbar.php -->
    <?php
    require "navbar.php"
    ?>
    <!-- Breadcump -->
    <div class="container mt-5 ">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb" style="margin-top:70px ;">
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="#" class="no-decoration text-black-50"><i class="fa-solid fa-home me-3"></i> Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="#" class="no-decoration text-black-50"><i class=" "></i> Kategori  </a>
                </li>
            </ol>
        </nav>
    </div>
    <!-- Pembuatan Kolom Input nama kategori baru -->
    <div class="mb-3 col-lg-6 text-center mx-auto">
        <h3 class="text-center">Tambah Kategori</h3>
        <form action="" method="post">
            <div>
                <label for="kategori">Kategori</label>
                <input type="text" name="kategori" id="kategori" placeholder="Masukan Nama Kategori...." class="form-control mt-1">
            </div>
            <div class="mt-2 text-center">
                <button class="btn btn-primary" type="submit" name="simpan_kategori">Simpan</button>
            </div>
        </form>
        <?php
        // penyimpanan data var kategori ke database kategori
        if (isset($_POST['kategori'])) {
            $kategori = htmlspecialchars($_POST['kategori']);
            $queryExist = mysqli_query($con, "SELECT nama FROM kategori WHERE nama='$kategori'");
            $jumlahDataKategoriBaru = mysqli_num_rows($queryExist);

            // peringatan jika kategori sudah tersedia tidak bisa di tambahkan lagi
            if ($jumlahDataKategoriBaru > 0) {
        ?>
                <div class="alert alert-warning mt-3" role="alert">
                    Kategori Sudah Tersedia
                </div>
                <?php
            } else {
                // peringatan jika kategori berhasil disimpan/belum ada data yang sama sebelumnya
                $querySimpan = mysqli_query($con, "INSERT INTO kategori (nama) VALUES ('$kategori')");
                if ($querySimpan) {
                ?>
                    <div class="alert alert-succes mt-3" role="alert">
                        Kategori Berhasil Disimpan, mohon tunggu ...
                    </div>
                    <meta http-equiv="refresh" content="1, url=" kategori.php">
        <?php
                } else {
                    echo mysqli_error($con);
                }
            }
        }
        ?>

    </div>
    <div class="mt-3">
        <h2>List Kategori</h2>
    </div>
    <!-- pembuatan tabel kategori -->
    <div class="table-table-responsive mt-4">
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- pemeriksaan jumlah baris/data di database yang namanya "kategori" -->
                <?php
                if ($jumlahKategori == 0) {
                ?>
                    <tr>
                        <td colspan="3" class="text-center">Tidak Ada Data Kategori Pada Database</td>
                    </tr>
                    <!-- Pengambilang Data nama kategori dari database -->
                    <?php
                } else {
                    $number = 1;
                    while ($data = mysqli_fetch_array($queryKategori)) {
                    ?>
                        <tr>
                            <td><?php echo $number; ?></td>
                            <td><?php echo $data['nama']; ?></td>
                            <td>
                                <a href="kategori-detail.php?p=<?php echo $data['id']; ?>" class="btn btn-info"><i class="fas fa-search"></i></a>
                            </td>
                        </tr>
                <?php
                        $number++;
                    }
                }

                ?>
            </tbody>
        </table>
    </div>
    </div>

    <!-- linked javascript bootstrap -->
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- linked javascript fontawesome -->
    <script src="../fontawesome/js/all.js"></script>
</body>

</html>