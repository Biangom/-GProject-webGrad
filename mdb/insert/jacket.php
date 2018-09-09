<<<<<<< HEAD
<?
include '../condb.php';

$serial = $_POST["serial"];


$result = mysqli_query($link, "INSERT INTO lifejacket(SN, EmergencyOn, warningOn) values ('$serial', 0, 0)");

if($result == false) {
    echo '<script>
    alert("이미 있는 SN이거나 SN길이가 5자 초과되었습니다.");
    </script>';

}

// echo "<script>";
// echo "console.log($serial)";
// echo "</script>";

mysqli_close($conn);

?>

<script>
    location.href = "../index.php?page=jacketInfo";
</script>
=======
<?php
	$SN = $_POST['SN'];
	$hp = $_POST['hp'];
	$user = $_POST['user'];
	$wearer = $_POST['wearer'];
	$WearerAge = $_POST['WearerAge'];
	
	$renttime = date('Y-m-d H:i:s');
	
	if(!$SN & !$hp & !$user & !$wearer & !$WearerAge){
		$msg = "전부 입력해주세요!!";
	}
	else{
		$conn = mysqli_connect('localhost', 'root', 'root', 'test');
		$query = 'insert into rent (RentNo, SN, hp, user, renttime, wearer, WearerAGe) values(null, "' . $SN . '", "' . $hp . '", "' . $user . '" ,"' . $renttime . '" ,"' . $wearer . '" ,"'. $WearerAge . '")';
		$result1 =mysqli_query($conn, $query);

		$query = 'insert into lifejacket (SN, EmergencyOn, warningOn) values("' . $SN . '", "0", "0")';
		$result2 =mysqli_query($conn, $query);


		if($result1 & $result2) { 
			$msg = "등록되었습니다.";
		} else {
			$msg = "실패했습니다. 다시 시도해주세요.";
		}

	}  

?>


<script>
	alert("<?php echo $msg?>");
	location.href="../index.php?page=userInfo";

</script>
>>>>>>> bb80f589aa1006472b23d06001780c566425a9d5
