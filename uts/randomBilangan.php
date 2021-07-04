<?php 
    session_start();
    // menset angka random untuk ditebak
    if(!isset($_SESSION['angkaRandom'])){
        $_SESSION['angkaRandom'] = rand(0, 100);
    } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tebak Angka</title>
</head>
<body>
    <h3>Hallo, nama saya Mr. PHP. Saya telah memilih secara random sebuah bilangan bulat. Silakan 
Anda menebak ya!</h3>

    <!-- form input angka tebakan anda -->
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
        <label for="inputTebakan">Bilangan tebakan anda: </label>
        <input type="number" name="angkaTebakan" id="inputTebakan" placeholder="tebakan anda" required>

        <button type="submit" name="submitTebakan">Tebak</button>
    </form>

<?php 
    // jika ada angka random
    if (isset($_SESSION['angkaRandom'])) {
        // jika ada tebakan sudah tersubmit dan terdapat angka tebakan user
        if (isset($_POST['submitTebakan']) && isset($_POST['angkaTebakan'])) {
            $angkaTebakan = intval($_POST['angkaTebakan']);
            // mencek apakah angka tebakan benar, terlalu besar atau terlalu kecil
            if ($angkaTebakan === $_SESSION['angkaRandom']) {
                // angka tebakan benar
                $_SESSION['statusTebakan'] = 'Benar';
                echo "Selamat Anda benarr ". $_SESSION['angkaRandom'] ."<br>";
                echo "<a href='resetRandom.php'>ulangi lagi</a>";
            } else {
                // angka tebakan terlalu besar atau terlalu kecil
                $_SESSION['statusTebakan'] = ($angkaTebakan > $_SESSION['angkaRandom'])
                ? 'Terlalu Besar' : 'Terlalu Kecil';
                echo $_SESSION['statusTebakan'];
            }
        }
    } else {
        echo "Menset angka random";
    };

    

?>
</body>
</html>