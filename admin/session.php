<?php
    session_start();
    // nilai session awal (salah/belum di verifasi)
    if($_SESSION['login'] == false){
        // pengarahan / di tendang ke page login.php
        header('location: login.php');
    }
?>