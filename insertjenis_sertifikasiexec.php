<?php
session_start();
if(!isset($_SESSION["Email"])){
header("location:index.php");
}
?>
<?php
include("db.php");
include("tulislog.php");
$Kode= mysqli_real_escape_string($con, $_POST["Kode"]);
$Sertifikasi= mysqli_real_escape_string($con, $_POST["Sertifikasi"]);

if (isset($Kode) && isset($Sertifikasi)){
mysqli_query($con, "INSERT INTO jenis_sertifikasi(Kode,Sertifikasi) VALUES ('$Kode','$Sertifikasi')");
}

tulislog("insert into jenis_sertifikasi", $con); 
header("Location: listjenis_sertifikasi.php");
mysqli_close($con)
?>
