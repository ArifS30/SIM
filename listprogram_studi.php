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
$q = "SELECT * FROM tw_hak_akses where tabel='program_studi' and user = '". $_SESSION['Email'] ."' and listData='1'";
$r = mysqli_query($con, $q);
if ( $obj = @mysqli_fetch_object($r) )
 {
?>
<?php
echo "<br><font face=Verdana color=black size=1>program_studi</font><br><br>";
echo "<a href=insertprogram_studi.php><button type='button' class='btn btn-light'><font face=Verdana color=black size=1><i class='fa fa-plus'></i>&nbsp;Insert</font></button></a>";
echo "&nbsp;&nbsp;<a href='printprogram_studi.php' target=_blank><button type='button' class='btn btn-light'><font face=Verdana color=black size=1><i class='fa fa-print'></i>&nbsp;Print</font></button></a>";
//cari tabel
echo "<br><br><form action=listprogram_studi.php method=post>
<font face=Verdana color=black size=2>Search By :</font>&nbsp;&nbsp;";
echo "<select class='form-control' name=select id=select>";
echo "<option value='Kode'>Kode</option>";
echo "<option value='Program_Studi'>Program Studi</option>";
echo "<option value='Kaprodi'>Kaprodi</option>";
echo "<option value='NIDN_Kaprodi'>NIDN Kaprodi</option>";
echo "</select>
<input type=text class='form-control' id=cari name=cari placeholder=NIM>

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
if(isset($_POST["cari"])){ $cari = mysqli_real_escape_string($con, $_POST["cari"]); }
if (isset($_POST["cari"]) && ($_POST["cari"] != "")){
//hasil pencarian tabel
$dd = "SELECT * FROM program_studi where "  . $_POST["select"] . " like '%" . $cari . "%'";
$resultcari = mysqli_query($con, $dd);
if ( $obj = mysqli_fetch_object($resultcari) )
{
$result = mysqli_query($con, $dd);
echo "<font face=Verdana color=black size=1>Hasil Pencarian</font>"; 
echo "<div class='table-responsive'> "; 
echo "<table class='table table-bordered border-primary'> 
<tr bgcolor=D3DCE3> 
<th><font face=Verdana color=black size=1>Kode</font></th>
<th><font face=Verdana color=black size=1>Program_Studi</font></th>
<th><font face=Verdana color=black size=1>Kaprodi</font></th>
<th><font face=Verdana color=black size=1>NIDN_Kaprodi</font></th>
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
  echo "<td><font face=Verdana color=black size=1>" . $row['Kode'] . "</font></td>";
  echo "<td><font face=Verdana color=black size=1>" . $row['Program_Studi'] . "</font></td>";
  echo "<td><font face=Verdana color=black size=1>" . $row['Kaprodi'] . "</font></td>";
  echo "<td><font face=Verdana color=black size=1>" . $row['NIDN_Kaprodi'] . "</font></td>";
  echo "<td><a class=linklist href=viewprogram_studi.php?Kode=".$row['Kode']."><button type='button' class='btn btn-warning'><font face=Verdana size=1><i class='fa fa-check'></i></font></button></a></td>";
  echo "<td><a class=linklist href=editprogram_studi.php?Kode=".$row['Kode']."><button type='button' class='btn btn-primary'><font face=Verdana size=1><i class='fa fa-edit'></i></font></button></a></td>";
  echo "<td><a class=linklist href=deleteprogram_studi.php?Kode=".$row['Kode']." onclick=\"return confirm('Are you sure you want to delete this data?')\"><button type='button' class='btn btn-danger'><font face=Verdana size=1><i class='fa fa-trash'></i></font></button></a></td>";
  echo "</tr>";
  }
echo "</table><br><br>";
echo "</div>";
} else {
	echo "<font size=2 face=Verdana color=#FF0000>Data program_studi not found - try again!</font><br><br>";
}
}
if((!isset($_POST["cari"])) or ($_POST["cari"] == "")){
// Langkah 1: Tentukan batas,cek halaman & posisi data
$batas   = 100;
if(isset($_GET["halaman"])){ $halaman = $_GET['halaman']; }
if(empty($halaman)){
	$posisi  = 0;
	$halaman = 1;
}
else{
	$posisi = ($halaman-1) * $batas;
}
$result = mysqli_query($con, "SELECT * FROM program_studi LIMIT $posisi,$batas");
echo "<div class='table-responsive'> "; 
echo "<table class='table table-bordered'>"; 
$firstColumn = 1;
$warna = 0;
while($row = mysqli_fetch_array($result))
  {
  if ($firstColumn == 1) {
echo "<tr bgcolor=D3DCE3>
<th><font face=Verdana color=black size=1>Kode</font></th>
<th><font face=Verdana color=black size=1>Program_Studi</font></th>
<th><font face=Verdana color=black size=1>Kaprodi</font></th>
<th><font face=Verdana color=black size=1>NIDN_Kaprodi</font></th>
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
  echo "<td><font face=Verdana color=black size=1>" . $row['Kode'] . "</font></td>";
  echo "<td><font face=Verdana color=black size=1>" . $row['Program_Studi'] . "</font></td>";
  echo "<td><font face=Verdana color=black size=1>" . $row['Kaprodi'] . "</font></td>";
  echo "<td><font face=Verdana color=black size=1>" . $row['NIDN_Kaprodi'] . "</font></td>";
  echo "<td><a class=linklist href=viewprogram_studi.php?Kode=".$row['Kode']."><button type='button' class='btn btn-warning'><font face=Verdana size=1><i class='fa fa-check'></i></font></button></a></td>";
  echo "<td><a class=linklist href=editprogram_studi.php?Kode=".$row['Kode']."><button type='button' class='btn btn-primary'><font face=Verdana size=1><i class='fa fa-edit'></i></font></button></a></td>";
  echo "<td><a class=linklist href=deleteprogram_studi.php?Kode=".$row['Kode']." onclick=\"return confirm('Are you sure you want to delete this data?')\"><button type='button' class='btn btn-danger'><font face=Verdana size=1><i class='fa fa-trash'></i></font></button></a></td>";
  echo "</tr>";
  }
echo "</table><br>";
echo "</div>";
//Langkah 3: Hitung total data dan halaman
$tampil2 = mysqli_query($con, "SELECT * FROM program_studi");
$jmldata = mysqli_num_rows($tampil2);
$jmlhal  = ceil($jmldata/$batas);
echo "<div class=paging>";
// Link ke halaman sebelumnya (previous)
if($halaman > 1){
	$prev=$halaman-1;
	echo "<span class=prevnext><a href=$_SERVER[PHP_SELF]?halaman=$prev><font face=Verdana color=black size=1><< Prev</font></a></span> ";
}
else{
	echo "<span class=disabled><font face=Verdana color=black size=1><< Prev</font></span> ";
}
// Tampilkan link halaman 1,2,3 ...
for($i=1;$i<=$jmlhal;$i++)
if ($i != $halaman){
	echo " <a href=$_SERVER[PHP_SELF]?halaman=$i><font face=Verdana color=black size=1>$i</font></a> ";
}
else{
	echo " <span class=current><font face=Verdana color=black size=1>$i</font></span> ";
}
// Link kehalaman berikutnya (Next)
if($halaman < $jmlhal){
	$next=$halaman+1;
	echo "<span class=prevnext><a href=$_SERVER[PHP_SELF]?halaman=$next><font face=Verdana color=black size=1>Next >></font></a></span>";
}
else{
	echo "<span class=disabled><font face=Verdana color=black size=1>Next >></font></span>";
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