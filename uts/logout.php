<?php 

    setcookie("namauser", "", time() - 3600, "/");

    header("Location:login.php");
?>