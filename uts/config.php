<?php
    $servername = "localhost";
    $username = "id17184547_alvinkrwn";
    $password = "]o+qx^S5jq/Bgq~c";
    $dbname = "id17184547_gametebakangka";
    

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    // echo "Connected successfully";
    
?>