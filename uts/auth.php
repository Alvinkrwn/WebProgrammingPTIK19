<?php 

    function login(){
        session_start();
        include_once('config.php');
        if (isset($_POST['submit'])){
            $nama = $_POST['username'];
            $email = $_POST['email'];
            
            $cek = $conn->query("SELECT * FROM player WHERE email = '$email'");
            // $result = mysqli_num_rows($cek);
            $result = $cek->num_rows;
    
            echo $result;
    
            if ( $result < 1 ){
                $sql = $conn->query("INSERT INTO player (nama, email) VALUES ('$nama', '$email')") or die(mysqli_error($conn));

                setcookie("username", $nama, time() + 3600, "/");
                setcookie("email", $email, time() + 3600, "/");
                $_SESSION['skor'] = 0;
                $_SESSION['live'] = 5;
                $_SESSION['is_login'] = TRUE;

                
                header('Location: index.php');
            }
            else {
                $sql = "UPDATE player SET nama='$nama' WHERE email='$email'";
               
                if ($conn->query($sql) === TRUE) {
                    echo "Record updated successfully";
                } else {
                    echo "Error updating record: " . $conn->error;
                }
                setcookie("username", $nama, time() + 3600, "/");
                setcookie("email", $email, time() + 3600, "/");
                $_SESSION['skor'] = 0;
                $_SESSION['live'] = 5;
                $_SESSION['is_login'] = TRUE;
                header('Location: index.php');
            }
        }
    }


    function auth(){
        if(!isset($_COOKIE['username'])){
            echo "<p>Belum masuk akun,</p>";
            echo "<p><a href='login.php'>Login</a> dulu ya...</p>";
            // $_COOKIE['email'];

            // setelah memunculkan pesan di atas, selanjutnya di break dengan exit()

            exit();
        }
        
    }
?>
