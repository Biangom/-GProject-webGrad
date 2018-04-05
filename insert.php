
<?
    // mysqli_connet로 해야지 잘 접속이 된다.
    $con = new mysqli("localhost","root","123456",yjacket);

    if(mysqli_connect_errno()) {
        echo "connect failed";
    }

    $serial = $_POST[serialNum];
    $hp = $_POST[hp];

    printf("%s %s\n",$serial, $hp);

    // $sql="SELECT * FROM user"; 이거는 잘됐음

    $sql="INSERT INTO user(serial, hp) VALUES( '$serial', '$hp' )";
    //$sql="INSERT INTO user(serial, hp) VALUES ('12412421','124124')";

    if(!$con->query($sql))
    {
        die('Error: mysqli Select12 '.mysqli_error());
    }

    echo "1 record added";

    mysql_close($con);
    echo "<script>
        location.href = './index.php';
   </script>"; 
?>