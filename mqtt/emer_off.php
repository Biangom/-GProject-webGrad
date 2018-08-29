<?
    $link = mysqli_connect("localhost", "root", "123456", "ngn_db");

    if (!$link) {
        echo "Error: Unable to connect to MySQL." . PHP_EOL;
        echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
        echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }
    
    $sql = "UPDATE lifejacket set EmergencyOn = 0 WHERE SN = '12e11'";
    $result = mysqli_query($link, $sql);
    echo "hello php";
?>";