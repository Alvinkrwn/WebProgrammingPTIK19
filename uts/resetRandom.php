<?php 

session_start();
unset($_SESSION['angkaRandom']);
header("Location:randomBilangan.php");

?>