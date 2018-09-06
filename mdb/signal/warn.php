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
