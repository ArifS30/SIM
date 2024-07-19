<?php
session_start();
if(!isset($_SESSION["Email"])){
header("location:index.php");
}
?>
<?php
include("db.php");
$id= mysqli_real_escape_string($con, $_POST["id"]);
$NIM= mysqli_real_escape_string($con, $_POST["NIM"]);
$Kode= mysqli_real_escape_string($con, $_POST["Kode"]);
$Tanggal_Daftar= mysqli_real_escape_string($con, $_POST["Tanggal_Daftar"]);
$Tanggal_Ujian= mysqli_real_escape_string($con, $_POST["Tanggal_Ujian"]);
$Hasil_Ujian= mysqli_real_escape_string($con, $_POST["Hasil_Ujian"]);
$Keterangan= mysqli_real_escape_string($con, $_POST["Keterangan"]);

 mysqli_query($con, "INSERT INTO sertifikasi(id,NIM,Kode,Tanggal_Daftar,Tanggal_Ujian,Hasil_Ujian,Keterangan) VALUES (null,'$NIM','$Kode','$Tanggal_Daftar','$Tanggal_Ujian','$Hasil_Ujian','$Keterangan')");
header("Location: listmastermahasiswasertifikasidetail.php?NIM=$NIM");
mysqli_close($con)
?>
