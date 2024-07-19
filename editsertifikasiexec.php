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
$id = mysqli_real_escape_string($con, $_POST["id"]);
$NIM = mysqli_real_escape_string($con, $_POST["NIM"]);
$Kode = mysqli_real_escape_string($con, $_POST["Kode"]);
$Tanggal_Daftar = mysqli_real_escape_string($con, $_POST["Tanggal_Daftar"]);
$Tanggal_Ujian = mysqli_real_escape_string($con, $_POST["Tanggal_Ujian"]);
$Hasil_Ujian = mysqli_real_escape_string($con, $_POST["Hasil_Ujian"]);
$Keterangan = mysqli_real_escape_string($con, $_POST["Keterangan"]);

mysqli_query($con, "update sertifikasi set id='$id', NIM='$NIM', Kode='$Kode', Tanggal_Daftar='$Tanggal_Daftar', Tanggal_Ujian='$Tanggal_Ujian', Hasil_Ujian='$Hasil_Ujian', Keterangan='$Keterangan' where id=$pk");
 tulislog("update sertifikasi", $con); 
header("Location: listsertifikasi.php");
mysqli_close($con);
?>
