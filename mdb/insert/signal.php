<?php
	$SN = $_POST['SN'];
	$pw = $_POST['pw'];

	if($pw != "admin" & !$SN){
		$msg = "비밀번호가 다르거나 시리얼번호를 입력하지 않았습니다!!";
	}
	else{
		 $conn = mysqli_connect('localhost', 'root', 'qqwweerr', 'yjacket');
		$query = 'update lifejacket set EmergencyOn = "1" where SN = "'. $SN . '"';
		$result =mysqli_query($conn, $query);


		if($result) { 
			$msg = "등록되었습니다.";
		} else {
			$msg = "실패했습니다. 다시 시도해주세요.";
		}

	}  

?>


<script>
	alert("<?php echo $msg?>");
	location.href="../index.php?page=jacketInfo";

</script>