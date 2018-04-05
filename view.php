<!DOCTYPE HTML>
<html>
    <head>
    </haed>

    <body>
        <?
                // mysqli_connet로 해야지 잘 접속이 된다.
            $con = new mysqli("localhost","root","123456",yjacket);

            if(mysqli_connect_errno()) {
                echo "connect failed";
            }

            $sql="SELECT * FROM user";
            $result = $con->query($sql);
            //$result = mysqli_query($con,$sqi);


            while( $row = mysqli_fetch_array($result, MYSQLI_ASSOC) ) {
                printf("%s %s</br>", $row["serial"], $row["hp"]);
            }

            mysqli_free_result($result);
            mysqli_close($con);
        ?>


    </body>


</html>
