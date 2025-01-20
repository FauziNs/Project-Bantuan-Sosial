<?php

require 'function.php';

if(isset($_SESSION['login'])){
    //SUDAH LOGIN
} else {
    //BELUM LOGIN
    header('location:login.php');
}



?>