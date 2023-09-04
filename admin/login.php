<?php
// pengambilan data dari database
session_start();
require "../koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
</head>
<style>
    /* style untuk container kolom login */
    .main {
        height: 100vh;
    }

    .login-box {
        width: 500px;
        height: 240px;
        box-sizing: border-box;
        border-radius: 10px;
    }
</style>

<body>
    <!-- container -->
    <div class="main d-flex flex-column justify-content-center align-items-center ">
        <div class="login-box shadow p-4">
            <form action="" method="post">
                <!-- kolom login username -->
                <div>
                    <label for="username" class="d-flex justify-content-center">Username</label>
                    <input type="text" class="form-control" name="username" id="username">
                </div>
                <!-- akhir kolom login username -->
                <!-- kolom login password -->
                <div>
                    <label for="password" class="d-flex justify-content-center">Password</label>
                    <input type="password" class="form-control" name="password" id="password">
                </div>
                <!-- akhir kolom login password -->
                <!-- tombol login -->
                <div>
                    <button class="btn btn-primary form-control mt-3" type="submit" name="loginbtn">LOGIN</button>
                </div>
                <!-- akhir tombol login -->
            </form>
        </div>
        <div class="mt-3 text-center" style="width: 500px;">
            <?php
            // pemanggilan data username dan password dari database "users"
            if (isset($_POST['loginbtn'])) {
                $username = htmlspecialchars($_POST['username']);
                $password = htmlspecialchars($_POST['password']);

                // variabel selekting , pemilihan data username di database "users" 
                $query = mysqli_query($con, "SELECT * FROM users WHERE username='$username'");
                // variabel untuk kondisi percabangan akun login
                $count = mysqli_num_rows($query);
                // variabel verifikasi  data akun benar atau salah
                $data = mysqli_fetch_array($query);

                // percabangan login
                if ($count > 0) {
                    // aksi/perilaku ketika nilai nya benar atau akun memang sudah terdaftar
                    // dilakukan percabangan dalam percabangan untuk memastikan password sesuai dengan database "users"
                    if (password_verify($password, $data['password'])) {
                        // aksi/perilaku password sesuai/benar
                        $_SESSION['username'] = $data['username'];
                        $_SESSION['login'] = true;
                        header('location: ../admin');
                    } else {
                        // aksi/perilaku ketika password salah, akan muncul alert/pesan notifikasi password salah
            ?>
                        <div class="alert alert-danger" role="alert">
                            Password salah !!
                        </div>
                    <?php
                    }
                } else {
                    // aksi/perilaku ketika nilai salah / akun belum di daftarkan di database "users"
                    ?>
                    <div class="alert alert-danger" role="alert">
                        Akun Tidak Ditemukan
                    </div>
            <?php
                }
            } else {
            }
            ?>
        </div>
    </div>
    <!-- akhir container -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>

</html>