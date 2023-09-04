<?php
// penghubung ke session php, agar ketika sebelum akses index di antar ke page login
require "session.php";
// pengambilan data dari database
require "../koneksi.php";

$id = $_GET['p'];
$query = mysqli_query($con, "SELECT * FROM kategori WHERE id='$id'");
$data = mysqli_fetch_array($query);
?>


<!DOCTYPE html>
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
    <title>Detail Kategori</title>
</head>

<body>
    <?php
    require "navbar.php"
    ?>
    <div class="mt-5 container  mx-auto">
        <h2 class="d-flex justify-content-center align-content-center py-5">Detail Kategori</h2>
        <div class="col-lg-6 mx-auto text-center">
            <form action="" method="post">
                <div>
                    <label for="kategori" class="fs-3 fw-bold">Kategori</label>
                    <input type="text" name="kategori" id="kategori" class="form-control mt-1" value="<?php echo $data['nama']; ?>">
                </div>
                <div class="mt-5 d-flex justify-content-between ">
                    <button type="submit" class="btn btn-primary" name="editBtn">Edit</button>
                    <button type="submit" class="btn btn-danger" name="deleteBtn">Hapus</button>
                </div>
            </form>

            <?php
            if (isset($_POST['editBtn'])) {


                $kategori = htmlspecialchars($_POST['kategori']);


                if ($data['nama'] == $kategori) {
            ?>
                    <meta http-equiv="refresh" content="0, url=kategori.php">
                    <?php
                } else {
                    $query = mysqli_query($con, "SELECT * FROM kategori WHERE nama='$kategori'");
                    $jumlahData = mysqli_num_rows($query);
                    if ($jumlahData > 0) {
                    ?>
                        <div class="alert alert-warning mt-3" role="alert">
                            Kategori Sudah Tersedia
                        </div>
                        <?php
                    } else {
                        // peringatan jika kategori berhasil disimpan/belum ada data yang sama sebelumnya
                        $querySimpan = mysqli_query($con, "UPDATE kategori SET nama='$kategori' WHERE id='$id'");
                        if ($querySimpan) {
                        ?>
                            <div class="alert alert-succes mt-3" role="alert">
                                Kategori Berhasil Diupdate
                            </div>
                            <meta http-equiv="refresh" content="1, url=kategori.php">
                    <?php
                        } else {
                            echo mysqli_error($con);
                        }
                    }
                }
            }
            if (isset($_POST['deleteBtn'])) {
                $queryCheck = mysqli_query($con, "SELECT * FROM produk WHERE kategori_id='$id'");
                $queryCount = mysqli_num_rows($queryCheck);
                if ($queryCount > 0) {
                    ?>
                    <div class="alert alert-danger mt-3" role="alert">
                        Kategori Tidak Bisa dihapus Karena telah tersimpan sebagai wadah produk
                    </div>
                <?php
                    die();
                }

                $queryDelete = mysqli_query($con, "DELETE FROM kategori WHERE id='$id'");

                if ($queryDelete) {
                ?>
                    <div class="alert alert-succes mt-3" role="alert">
                        Kategori Berhasil Dihapus
                    </div>
                    <meta http-equiv="refresh" content="1, url=kategori.php">
            <?php
                } else {
                    echo mysqli_error($con);
                }
            }
            ?>




        </div>

    </div>

    <!-- linked javascript bootstrap -->
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- linked javascript fontawesome -->
    <script src="../fontawesome/js/all.js"></script>
</body>

</html>