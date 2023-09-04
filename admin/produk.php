<?php
// penghubung ke session php, agar ketika sebelum akses index di antar ke page login
require "session.php";
// pengambilan data dari database
require "../koneksi.php";
//var $queryProduk adalah var pengambilan nama kategori untuk list produk 
$queryProduk = mysqli_query($con, "SELECT a.*, b.nama AS nama_kategori FROM produk 
a JOIN kategori b ON a.kategori_id=b.id");
$jumlahProduk = mysqli_num_rows($queryProduk);

$queryKategori = mysqli_query($con, "SELECT * FROM kategori");

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
    <title>Produk</title>
</head>

<body>
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
                    <a href="#" class="no-decoration text-black-50"><i class=" "></i> Produk</a>
                </li>
            </ol>
        </nav>
    </div>
    <!-- Tambah Produk -->
    <div class="mt-1 col-md-6 mx-auto text-center">
        <h3 class="text-center pb-5">Tambah Produk</h3>

        <form action="" method="post" enctype="multipart/form-data">
            <div>
                <label for="nama">Nama</label>
                <input name="nama" type="text" id="nama" placeholder="Nama Produk" class="form-control" required>
            </div>
            <div>
                <label for="kategori">Kategori</label>
                <select name="kategori" id="kategori" class="form-control" required>
                    <option value="">Pilih Satu Kategori</option>
                    <?php
                    while ($data = mysqli_fetch_array($queryKategori)) {
                    ?>
                        <option value="<?php echo $data['id']; ?>"><?php echo $data['nama']; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div>
                <label for="harga">Harga</label>
                <input type="number" name="harga" id="harga" placeholder="Isi Dengan Angka Saja" class="form-control" required>
            </div>
            <div>
                <label for="foto">Foto</label>
                <input type="file" id="foto" class="form-control" name="foto">
            </div>
            <div>
                <label for="detail">Detail</label>
                <textarea name="detail" id="detail" cols="30" rows="8" class="form-control"></textarea>
            </div>
            <div>
                <label for="ketersediaan_stok">Ketersediaan Stok</label>
                <select name="ketersediaan_stok" id="ketersediaan_stok" class="form-control">
                    <option value="tersedia">Tersedia</option>
                    <option value="habis">Habis</option>
                </select>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary mt-2" name="simpan">Simpan</button>
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
                        ?>
                            <div class="alert alert-success mt-3" role="alert">
                                Data Berhasil Disimpan ^_^
                            </div>
                    <?php
                        }
                    }
                }
                // query insert to produk table
                $queryTambah = mysqli_query($con, "INSERT INTO produk (kategori_id, nama, harga, foto, detail, ketersediaan_stok) 
                        VALUES ('$kategori','$nama', '$harga', '$new_name', '$detail','$ketersediaan_stok')");

                if ($queryTambah) {
                    ?>
                    <div class="alert alert-success mt-3" role="alert">
                        Data Berhasil Disimpan ^_^
                    </div>
                    <meta http-equiv="refresh" content="1, url=" produk.php">
        <?php
                } else {
                    echo mysqli_errno($con);
                }
            }
        }
        ?>
    </div>
    <div class="mt-3">
        <h2>List Produk</h2>
    </div>
    <div class="table-table-responsive mt-4">
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Foto</th>
                    <th>Detail</th>
                    <th>Ketersediaan Stok</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- pemeriksaan jumlah baris/data di database yang namanya "kategori" -->
                <?php
                if ($jumlahProduk == 0) {
                ?>
                    <tr>
                        <td colspan="8" class="text-center">Tidak Ada Data Produk Pada Database</td>
                    </tr>
                    <!-- Pengambilang Data nama Produk dari database -->
                    <?php
                } else {
                    $number = 1;
                    while ($data = mysqli_fetch_array($queryProduk)) {
                    ?>
                        <tr>
                            <td><?php echo $number; ?></td>
                            <td><?php echo $data['nama']; ?></td>
                            <td><?php echo $data['nama_kategori']; ?></td>
                            <td><?php echo $data['harga']; ?></td>
                            <td><?php echo $data['foto']; ?></td>
                            <td><?php echo $data['detail']; ?></td>
                            <td><?php echo $data['ketersediaan_stok']; ?></td>
                            <td>
                                <a href="produk-detail.php?p=<?php echo $data['id']; ?>" class="btn btn-info"><i class="fas fa-search"></i></a>
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