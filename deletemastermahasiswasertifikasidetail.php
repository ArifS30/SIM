<?php
session_start();
if(!isset($_SESSION["Email"])){
header("location:index.php");
}
?>
<?php
include("db.php");
$id = mysqli_real_escape_string($con, $_REQUEST["id"]);
$result = mysqli_query($con, "DELETE FROM sertifikasi WHERE id = '". $id . "'");
header("Location:listmastermahasiswasertifikasidetail.php?NIM=$_GET[NIM]");
mysqli_close($con);
?>
