<?php 

// users terdaftar
$users = array(
    array("alvin@gmail.com", "Alvin", "123456"),
    array("alvinn@gmail.com", "Alvinn", "123123"),
    array("alvin678@gmail.com", "Alvin Kurniawan", "234234")
);

// jika form login tersubmit
if (isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];

    // mengecek email & name apakah terdaftar
    foreach($users as $profile_user){
        if(($profile_user[0] == $email) && ($profile_user[2] == $name)){
            // jika terdaftar, set cookie
            setcookie("namauser", $profile_user[1], time() + 3600, "/");

            // redirect halaman ke page1.php
            header("Location:index.php");
        } else {
            setcookie("namauser", $name, time() + 3600, "/" );
            header("Location:index.php");
        }
    }

    // jika tidak akun terdaftar
    echo "<h3>Login gagal</h3>";
    echo "<p>Silakan <a href='login.php'>Login kembali</a></p>";

}

?>