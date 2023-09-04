<?php
// penghubung ke session php, agar ketika sebelum akses index di antar ke page login
require "session.php";
// pengambilan data dari database
require "../koneksi.php";

$id = $_GET['p'];
$query = mysqli_query($con, "SELECT a.*, b.nama AS nama_kategori FROM produk a JOIN kategori b ON a.kategori_id=b.id WHERE a.id='$id'");
$data = mysqli_fetch_array($query);
$queryKategori = mysqli_query($con, "SELECT * FROM kategori WHERE id!='$data[kategori_id]'");

// function rename file , random string
function generateRandomString($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
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
    <title>Produk Detail</title>
</head>

<body>
    <?php
    require "navbar.php";
    ?>
    <div class="mt-5 container  ">
        <h2 class="text-center fs-1 fw-bold py-5">Detail Produk</h2>
        <div class="col-md-6 mb-5 mx-auto text-center ">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-2">
                    <label for="nama" class="fs-4 ">Nama</label>
                    <input type="text" name="nama" value="<?php echo $data['nama']; ?>" id="nama" class="form-control mt-1" value="<?php echo $data['nama']; ?>">
                </div>
                <div class="my-3">
                    <label for="kategori" class="fs-4 ">Kategori</label>
                    <select name="kategori" id="kategori" class="form-control " required>
                        <option value="<?php echo $data['kategori_id']; ?>"><?php echo $data['nama_kategori']; ?></option>
                        <?php
                        while ($dataKategori = mysqli_fetch_array($queryKategori)) {
                        ?>
                            <option value="<?php echo $dataKategori['id']; ?>"><?php echo $dataKategori['nama']; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div class="my-3">
                <div class="mb-2 d-block">
                    <label for="harga" class="fs-4 ">Harga</label>
                    <input type="number" name="harga" value="<?php echo $data['harga']; ?>" id="harga" class="form-control mt-1" value="<?php echo $data['nama']; ?>">
                </div>
                <div class="my-3">
                    <label for="curentFoto" class="mb-3 fs-4 ">Foto Produk</label>
                    <img src="../image/<?php echo $data['foto']; ?>" alt="" width="650px" class="d-flex align-items-center">
                </div>
                <div class="my-3">
                    <label for="foto" class="fs-4 ">Ubah Foto</label>
                    <input type="file" id="foto" class="form-control" name="foto">
                </div>
                <div>
                    <label for="detail" class="mb-3 fs-4 ">Detail</label>
                    <textarea name="detail" id="detail" cols="30" rows="8" class="form-control">
                        <?php echo $data['detail']; ?>
                    </textarea>
                </div>
                <div>
                    <label for="ketersediaan_stok" class="mb-3 fs-4 ">Ketersediaan Stok</label>
                    <select name="ketersediaan_stok" id="ketersediaan_stok" class="form-control">
                        <option value="<?php echo $data['ketersediaan_stok']; ?>"><?php echo $data['ketersediaan_stok']; ?></option>
                        <?php
                        if ($data['ketersediaan_stok'] == 'tersedia') {
                        ?>
                            <option value="habis">habis</option>
                        <?php
                        } else {
                        ?>
                            <option value="tersedia">tersedia</option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="d-flex justify-content-between mt-3">
                    <button type="submit" class="btn btn-primary mt-2" name="simpan">Simpan</button>
                    <button type="submit" class="btn btn-danger mt-2" name="hapus">Hapus</button>
                </div>
            </form>
            <?php
            if (isset($_POST['simpan'])) {
                $nama = htmlspecialchars($_POST['nama']);
                $kategori = htmlspecialchars($_POST['kategori']);
                $harga = htmlspecialchars($_POST['harga']);
                $detail = htmlspecialchars($_POST['detail']);
                $ketersediaan_stok = htmlspecialchars($_POST['ketersediaan_stok']);


                $target_dir = '../image/';
                $nama_file = basename($_FILES["foto"]["name"]);
                $target_file = $target_dir . $nama_file;
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                $image_size = $_FILES["foto"]["size"];
                $random_name = generateRandomString(20);
                $new_name = $random_name . "." . $imageFileType;

                if ($nama == '' || $kategori == '' || $harga == '') {
            ?>
                    <div class="alert alert-warning mt-3" role="alert">
                        Data anda tidak bisa disimpan .. <br> Mohon Isi Dengan Benar !
                    </div>
                <?php
                } else {
                    $queryUpdate = mysqli_query($con, "UPDATE produk SET kategori_id='$kategori', nama='$nama', harga='$harga', 
                    detail='$detail', ketersediaan_stok='$ketersediaan_stok' WHERE id='$id'");
                ?>
                    <meta http-equiv="refresh" content="1; url=produk.php">
                    <?php
                    if ($nama_file != '') {
                        if ($image_size > 1000000) {
                    ?>
                            <div class="alert alert-warning mt-3" role="alert">
                                Data Anda Melebihi Batas , Harap gunakan file size kurang dari 1MB!
                            </div>
                            <?php
                        } else {
                            if ($imageFileType != 'jpg' && $imageFileType != 'jpeg' && $imageFileType != 'png' && $imageFileType != 'gif') {
                            ?>
                                <div class="alert alert-warning mt-3" role="alert">
                                    File Harus Bertipe jpg/png/jpeg atau gif
                                </div>
                                <?php
                            } else {
                                move_uploaded_file($_FILES["foto"]["tmp_name"], $target_dir . $new_name);
                                $queryUpdate = mysqli_query($con, "UPDATE produk SET foto='$new_name' WHERE id='$id'");
                                if ($queryUpdate) {
                                ?>
                                    <div class="alert alert-success mt-3" role="alert">
                                        Data Berhasil Di Update ^_^
                                    </div>
                                    <meta http-equiv="refresh" content="1; url=produk.php">
                    <?php
                                } else {
                                    echo mysqli_errno($con);
                                }
                            }
                        }
                    }
                }
            }
            if (isset($_POST['hapus'])) {
                $queryHapus = mysqli_query($con, "DELETE FROM produk WHERE id='$id'");

                if ($queryHapus) {
                    ?>
                    <div class="alert alert-succes mt-3" role="alert">
                        Kategori Berhasil Dihapus
                    </div>

                    <meta http-equiv="refresh" content="1; url=produk.php">
            <?php
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