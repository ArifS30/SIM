<?php
session_start();
if(!isset($_SESSION["Email"])){
header("location:index.php");
}
?>
<?php include("db.php"); ?>
<?php
//cek otoritas
$q = "SELECT * FROM tw_hak_akses where tabel='jenis_sertifikasi' and user = '". $_SESSION['Email'] ."' and deleteData='1'";
$r = mysqli_query($con, $q);
if ( $obj = @mysqli_fetch_object($r) )
 {
?>
<?php
include("tulislog.php");
$Kode = mysqli_real_escape_string($con, $_REQUEST['Kode']);
$result = mysqli_query($con, "DELETE FROM jenis_sertifikasi WHERE Kode = '". $Kode . "'");
 tulislog("delete jenis_sertifikasi", $con); 
header("Location:listjenis_sertifikasi.php");
mysqli_close($con);
?>
<?php
} else {
 header("Location:content.php");
}
?>
