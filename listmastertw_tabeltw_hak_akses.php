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
?>      
<div id="page-wrapper" style="background-image: url(images/7953.jpg)";> 
<div class="container-fluid"> 
<?php
//cek otoritas
$q = "SELECT * FROM tw_hak_akses where tabel='Manage_User_Access' and user = '". $_SESSION['Email'] ."' and listData='1'";
$r = mysqli_query($con, $q);
if ( $obj = @mysqli_fetch_object($r) )
 {
?>
<?php
echo "<td bgcolor=F5F5F5>";
?>
<?php
echo "<br><font face=Verdana color=black size=1>Manage User Access</font><br>";
echo "<br><br><a href=insertmastertw_tabeltw_hak_akses.php><button type='button' class='btn btn-light'><font face=Verdana color=black size=1><i class='fa fa-plus'></i>&nbsp;Insert</font></button></a><br>";

//cari tabel
echo "<br><br>
<form action=listmastertw_tabeltw_hak_akses.php method=post>
<font face=Verdana color=black size=2>Search By :</font>&nbsp;&nbsp;
  <select class='form-control' name=select id=select>
  <option value='tabel'>Tabel</option>
  </select>
  <input type=text class='form-control' id=cari name=cari placeholder=tabel>

  <script>
    document.getElementById('select').addEventListener('change', function() {
        var selectValue = this.value;
        document.getElementById('cari').setAttribute('placeholder', selectValue);
    });

    document.addEventListener('DOMContentLoaded', function() {
        var selectValue = document.getElementById('select').value;
        document.getElementById('cari').setAttribute('placeholder', selectValue);
    });
  </script>
  <button type='submit' class='btn btn-success'><font face=Verdana size=1><i class='fa fa-search-plus'></i>Search</font></button>
  </form><br>";
  if(isset($_POST["cari"])) { 
    $cari = mysqli_real_escape_string($con, $_POST["cari"]); 
  }

  if (isset($_POST["cari"]) && ($_POST["cari"] != "")) {

  //hasil pencarian tabel
  $dd = "SELECT * FROM tw_hak_akses where "  . $_POST["select"] . " like '%" . $cari . "%'";
  $resultcari = mysqli_query($con, $dd);
if ( $obj = mysqli_fetch_object($resultcari) )
{
$result = mysqli_query($con, $dd);
echo "<font face=Verdana color=black size=1>Hasil Pencarian</font>"; 
echo "<div class='table-responsive'> "; 
echo "<table class='table table-striped'>
<tr bgcolor=D3DCE3> 
<th>Tabel</th>
<th></th>
<th></th>
<th>Aksi</th>
<th></th>
</tr>";
$warna = 0;
while($row = mysqli_fetch_array($result))
  {
  if ($warna == 0){
  	echo "<tr bgcolor=E5E5E5 onMouseOver=\"this.bgColor='#8888FF';\" onMouseOut=\"this.bgColor='E5E5E5';\">";
	$warna = 1;
  }else{
  	echo "<tr bgcolor=D5D5D5 onMouseOver=\"this.bgColor='#8888FF';\" onMouseOut=\"this.bgColor='D5D5D5';\">";
	$warna = 0;
  }
  echo "<td><font face=Verdana color=black size=1>" . $row['tabel'] . "</font></td>";
  echo "<td><a class=linklist href=listmastertw_tabeltw_hak_aksesdetail.php?tabel=".$row['tabel']."><font face=Verdana color=black size=1>Detail</font></a></td>";
  echo "<td><a class=linklist href=viewmastertw_tabeltw_hak_akses.php?tabel=".$row['tabel']."><button type='button' class='btn btn-warning'><font face=Verdana size=1><i class='fa fa-check'></i></font></button></a></td>";
  echo "<td><a class=linklist href=editmastertw_tabeltw_hak_akses.php?tabel=".$row['tabel']."><button type='button' class='btn btn-primary'><font face=Verdana size=1><i class='fa fa-edit'></i></font></button></a></td>";
  echo "<td><a class=linklist href=deletemastertw_tabeltw_hak_akses.php?tabel=".$row['tabel']." onclick=\"return confirm('Are you sure you want to delete this data?')\"><button type='button' class='btn btn-danger'><font face=Verdana size=1><i class='fa fa-Trash'></i></font></button></a></td>";
  echo "</tr>";
  }
echo "</table><br><br>";
echo "</div>";
} else {
	echo "<font size=2 face=Verdana color=#FF0000>Data tw_tabel not found - try again!</font><br><br>";
}
}
if((!isset($_POST["cari"])) or ($_POST["cari"] == "")){
// Langkah 1: Tentukan batas,cek halaman & posisi data
$batas   = 100;
if(isset($_GET["halaman"])){ $halaman = $_GET['halaman'];}
if(empty($halaman)){
	$posisi  = 0;
	$halaman = 1;
}
else{
	$posisi = ($halaman-1) * $batas;
}
$result = mysqli_query($con, "SELECT * FROM tw_tabel LIMIT $posisi,$batas");
echo "<font face=Verdana color=black size=1></font>";
echo "<div class='table-responsive'> "; 
echo "<table class='table table-bordered'>";
$firstColumn = 1;
$warna = 0;
while($row = mysqli_fetch_array($result))
  {
  if ($firstColumn == 1) {
echo "<tr bgcolor=D3DCE3>
<th>Tabel</th>
<th>Keterangan</th>
<th></th>
<th>AKSI</th>
<th></th>
</tr>";
$firstColumn = 0;
  }
  if ($warna == 0){
  	echo "<tr bgcolor=E5E5E5 onMouseOver=\"this.bgColor='#8888FF';\" onMouseOut=\"this.bgColor='E5E5E5';\">";
	$warna = 1;
  }else{
  	echo "<tr bgcolor=D5D5D5 onMouseOver=\"this.bgColor='#8888FF';\" onMouseOut=\"this.bgColor='D5D5D5';\">";
	$warna = 0;
  }
  echo "<td><font face=Verdana color=black size=1>" . $row['tabel'] . "</font></td>";
  echo "<td><a class=linklist href=listmastertw_tabeltw_hak_aksesdetail.php?tabel=".$row['tabel']."><font face=Verdana color=black size=1>Detail</font></a></td>";
  echo "<td><a class=linklist href=viewmastertw_tabeltw_hak_akses.php?tabel=".$row['tabel']."><button type='button' class='btn btn-warning'><font face=Verdana size=1><i class='fa fa-check'></i></font></button></a></td>";
  echo "<td><a class=linklist href=editmastertw_tabeltw_hak_akses.php?tabel=".$row['tabel']."><button type='button' class='btn btn-primary'><font face=Verdana size=1><i class='fa fa-edit'></i></font></button></a></td>";
  echo "<td><a class=linklist href=deletemastertw_tabeltw_hak_akses.php?tabel=".$row['tabel']." onclick=\"return confirm('Are you sure you want to delete this data?')\"><button type='button' class='btn btn-danger'><font face=Verdana size=1><i class='fa fa-trash'></i></font></button></a></td>";
  echo "</tr>";
  }
echo "</table><br>";
//Langkah 3: Hitung total data dan halaman
$tampil2 = mysqli_query($con, "SELECT * FROM tw_tabel");
$jmldata = mysqli_num_rows($tampil2);
$jmlhal  = ceil($jmldata/$batas);
echo "<div class=paging>";
// Link ke halaman sebelumnya (previous)
if($halaman > 1){
	$prev=$halaman-1;
	echo "<span class=prevnext><a href=$_SERVER[PHP_SELF]?halaman=$prev><< Prev</a></span> ";
}
else{
	echo "<span class=disabled><< Prev</span> ";
}
// Tampilkan link halaman 1,2,3 ...
for($i=1;$i<=$jmlhal;$i++)
if ($i != $halaman){
	echo " <a href=$_SERVER[PHP_SELF]?halaman=$i>$i</a> ";
}
else{
	echo " <span class=current>$i</span> ";
}
// Link kehalaman berikutnya (Next)
if($halaman < $jmlhal){
	$next=$halaman+1;
	echo "<span class=prevnext><a href=$_SERVER[PHP_SELF]?halaman=$next>Next >></a></span>";
}
else{
	echo "<span class=disabled>Next >></span>";
}
echo "</div>";
echo "<p align=center><font face=Verdana color=black size=1><b>$jmldata</b> data</font></p>";
mysqli_close($con);
echo "</td></tr>";
}
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