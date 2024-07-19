<?php
session_start();
if(!isset($_SESSION["Email"])){
header("location:index.php");
}
?>
<?php
include("db.php");
include("tulislog.php");
$pk = mysqli_real_escape_string($con, $_POST["pk"]);
$Kode = mysqli_real_escape_string($con, $_POST["Kode"]);
$Sertifikasi = mysqli_real_escape_string($con, $_POST["Sertifikasi"]);

mysqli_query($con, "update jenis_sertifikasi set Kode='$Kode', Sertifikasi='$Sertifikasi' where Kode='$pk'");
 tulislog("update jenis_sertifikasi", $con); 
header("Location: listjenis_sertifikasi.php");
mysqli_close($con);
?>
