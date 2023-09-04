<?php
// Variabel $con adalah pemanggilan data dari database 
$con = new mysqli("localhost", "root", "", "daebakstore");
// Check connection / percabangan ketika data pada login salah
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}