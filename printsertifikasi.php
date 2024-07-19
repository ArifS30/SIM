<style> 
#laporan td, #laporan th {  
  border: 1px solid #ddd;  
  padding: 4px; 
}   
</style> 
<?php     
include("db.php");  
?>      
<div id="page-wrapper">
<div class="container-fluid"> 
<?php
//ambil data setting  
$hset = mysqli_query($con ,"select * from setting");  
while($rset = mysqli_fetch_array($hset)){ 
	$Nama = $rset["Nama"]; 
	$Alamat = $rset["Alamat"]; 
	$Telepon = $rset["Telepon"];   
	$Logo = $rset["Logo"];  
} 
?> 
  
<table width=100%>  
<thead> 
  <tr>  
    <td rowspan="3" width=20% align=center><?php echo "<img src='images/" . $Logo . "' width=100 height=100><br>"; ?></td> 
    <td><font face=verdana size=5><?php echo $Nama; ?></font></td> 
  </tr> 
  <tr> 
    <td><font face=Verdana color=black size=1><?php echo $Alamat; ?></font></td> 
  </tr> 
  <tr> 
    <td><font face=Verdana color=black size=1>Telepon : <?php echo $Telepon; ?></font></td> 
  </tr>  
</thead>  
</table>  
<hr> 

<?php
echo "<font face=Verdana color=black size=1>sertifikasi</font><br><br>";
$result = mysqli_query($con, "SELECT * FROM sertifikasi");
echo "<div class='table-responsive'> "; 
echo "<table id=laporan width=100%>"; 
echo "<tr bgcolor=D3DCE3>
<th><font face=Verdana color=black size=1>id</font></th>
<th><font face=Verdana color=black size=1>NIM</font></th>
<th><font face=Verdana color=black size=1>Kode</font></th>
<th><font face=Verdana color=black size=1>Tanggal_Daftar</font></th>
<th><font face=Verdana color=black size=1>Tanggal_Ujian</font></th>
<th><font face=Verdana color=black size=1>Hasil_Ujian</font></th>
<th><font face=Verdana color=black size=1>Keterangan</font></th>
</tr>";
while($row = mysqli_fetch_array($result))
  {
  echo "<td><font face=Verdana color=black size=1>" . $row['id'] . "</font></td>";
  echo "<td><font face=Verdana color=black size=1>" . $row['NIM'] . "<br>";
  $l = mysqli_query($con, "select Nama from mahasiswa where NIM = '". $row['NIM'] ."'"); 
  while($rl = mysqli_fetch_array($l)){  
    echo $rl[0];    
  } 
  echo "</font></td>";
  echo "<td><font face=Verdana color=black size=1>" . $row['Kode'] . "<br>";
  $l = mysqli_query($con, "select Sertifikasi from jenis_sertifikasi where Kode = '". $row['Kode'] ."'"); 
  while($rl = mysqli_fetch_array($l)){  
    echo $rl[0];    
  } 
  echo "</font></td>";
  echo "<td><font face=Verdana color=black size=1>" . $row['Tanggal_Daftar'] . "</font></td>";
  echo "<td><font face=Verdana color=black size=1>" . $row['Tanggal_Ujian'] . "</font></td>";
  echo "<td><font face=Verdana color=black size=1>" . $row['Hasil_Ujian'] . "</font></td>";
  echo "<td><font face=Verdana color=black size=1>" . $row['Keterangan'] . "</font></td>";
  echo "</tr>";
  }
echo "</table><br>";
echo "</div>";
mysqli_close($con);
echo "</td></tr>";
 ?>   
 </div> 
