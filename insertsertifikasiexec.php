<?php
session_start();
if(!isset($_SESSION["Email"])){
header("location:index.php");
}
?>
<?php
include("db.php");
include("tulislog.php");
$id= mysqli_real_escape_string($con, $_POST["id"]);
$NIM= mysqli_real_escape_string($con, $_POST["NIM"]);
$Kode= mysqli_real_escape_string($con, $_POST["Kode"]);
$Tanggal_Daftar= mysqli_real_escape_string($con, $_POST["Tanggal_Daftar"]);
$Tanggal_Ujian= mysqli_real_escape_string($con, $_POST["Tanggal_Ujian"]);
$Hasil_Ujian= mysqli_real_escape_string($con, $_POST["Hasil_Ujian"]);
$Keterangan= mysqli_real_escape_string($con, $_POST["Keterangan"]);

if (isset($id) && isset($NIM) && isset($Kode) && isset($Tanggal_Daftar) && isset($Tanggal_Ujian) && isset($Hasil_Ujian) && isset($Keterangan)){
mysqli_query($con, "INSERT INTO sertifikasi(id,NIM,Kode,Tanggal_Daftar,Tanggal_Ujian,Hasil_Ujian,Keterangan) VALUES (null,'$NIM','$Kode','$Tanggal_Daftar','$Tanggal_Ujian','$Hasil_Ujian','$Keterangan')");
}

tulislog("insert into sertifikasi", $con); 
header("Location: listsertifikasi.php");
mysqli_close($con)
?>
