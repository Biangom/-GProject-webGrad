<?php
session_start();
$id=$_POST['id'];
$pw=$_POST['pw'];
 $conn = mysqli_connect('localhost', 'root', 'qqwweerr', 'ngn_db');
//$conn=mysqli_connect("localhost", "root", "root", "test");
mysqli_query($conn,"set names utf8");


$query="select * from user where id='$id'";
$result=mysqli_query($conn, $query);

var_dump($result);
if($result->num_rows==1)
{
	$row=$result->fetch_array(MYSQLI_ASSOC);
	if($row['pw']==$pw)
	{
		$_SESSION['id'] = $id;
		if(isset($_SESSION['id']))
		{
			header('location: ./index.php?page=index');
		}
		else{
			echo "세션 저장 실패";
		}
	}
	else
	{
		echo "아이디 또는 비밀번호가 틀렸습니다.";
	}
}
else
{
	echo "아이도 또는 비밀번호가 틀렸습니다.";
}
?>