<?php
session_start();
if(!isset($_SESSION["Email"])){
header("location:index.php");
}
?>
 <?php 
include("db.php");  
include("header.php"); 
include("menu.php"); 
include("tulislog.php"); 
?> 
<div id="page-wrapper">  
<div class="container-fluid"> 
<?php
//cek otoritas
$q = "SELECT * FROM tw_hak_akses where tabel='jenis_sertifikasi' and user = '". $_SESSION['Email'] ."' and viewData='1'";
$r = mysqli_query($con, $q);
if ( $obj = @mysqli_fetch_object($r) )
 {
?>
<html>
<head>
<title>SIM Sertifikasi</title>
<link rel="stylesheet" type="text/css" href="tag.css">
<script type="text/javascript" src="tag.js"></script>
<script type="text/javascript" src="kalender/calendar.js"></script>
<link href="kalender/calendar.css" rel="stylesheet" type="text/css" media="screen">
</head>
<body topmargin=0 leftmargin=0 marginwidth=0 marginheight=0 bgcolor =FFFFFF>
<?php
echo "<td bgcolor=F5F5F5 valign=top>";
echo "<div class='table-responsive'> "; 
echo "<table class='table table-striped'>"; 
echo "<tr><td colspan=2><font face=Verdana color=black size=1>jenis_sertifikasi</font></td></tr>";
$result = mysqli_query($con, "SELECT * FROM jenis_sertifikasi where Kode = '". mysqli_real_escape_string($con, $_GET['Kode']) . "'");
while($row = mysqli_fetch_array($result))
{
echo "<tr><td bgcolor=CCCCCC><font face=Verdana color=black size=1>Kode</font></td>";
echo "<td bgcolor=CCEEEE><font face=Verdana color=black size=1>" . $row['Kode'] . "</font></td>";
echo "<tr><td bgcolor=CCCCCC><font face=Verdana color=black size=1>Sertifikasi</font></td>";
echo "<td bgcolor=CCEEEE><font face=Verdana color=black size=1>" . $row['Sertifikasi'] . "</font></td>";
echo "<tr><td colspan=2 align=center><a href=listjenis_sertifikasi.php><button type='button' class='btn btn-warning'><font face=Verdana size=1><i class='fa fa-check'></i>&nbsp;Back</font></button></a></td></tr>";
echo "</table><br>";
echo "</div>"; 
}
 tulislog("view jenis_sertifikasi", $con); 
 ?>   
 </div> 
 <?php 
include("footer.php");
?>
<?php
} else {
 //header("Location:content.php");
}
?>
