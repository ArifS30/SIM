<style> 
#laporan td, #laporan th { 
  border: 1px solid #ddd; 
  padding: 4px; 
}
</style> 
<?php     
include("db.php");  
$TanggalAwal = mysqli_real_escape_string($con, $_POST['TanggalAwal']);  
$TanggalAkhir = mysqli_real_escape_string($con, $_POST['TanggalAkhir']);
$All = mysqli_real_escape_string($con, $_POST['All']);
  
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
 
echo "<font face=Verdana color=black size=1><b>Laporan mahasiswa/sertifikasi</b></font><br>";
if ($All == "Tidak"){  
 echo "<font face=Verdana color=black size=1>Tanggal : $TanggalAwal s.d. $TanggalAkhir</font><br>";
} 
 
echo "<table width=100%>";  
if ($All == "Tidak"){ 
$result = mysqli_query($con, "SELECT * FROM sertifikasi inner join mahasiswa on sertifikasi.NIM = mahasiswa.NIM where Tanggal_Daftar >= '$TanggalAwal' and Hasil_Ujian <= '$TanggalAkhir'");
} else { 
$result = mysqli_query($con, "SELECT * FROM sertifikasi inner join mahasiswa on sertifikasi.NIM = mahasiswa.NIM");
} 
while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td bgcolor=D3DCE3><font face=Verdana color=black size=1><b>NIM</b></font></td>";
echo "<td bgcolor=D3DCE3><font face=Verdana color=black size=1><b>Nama</b></font></td>";
echo "<td bgcolor=D3DCE3><font face=Verdana color=black size=1><b>Program_Studi</b></font></td>";
echo "<td bgcolor=D3DCE3><font face=Verdana color=black size=1><b>Foto</b></font></td>";
echo "</tr>";
echo "<tr>";
echo "<td bgcolor=E5E5E5><font face=Verdana color=black size=1>" . $row['NIM'] . "</font></td>";
echo "<td bgcolor=E5E5E5><font fac e=Verdana color=black size=1>" . $row['Nama'] . "</font></td>";
echo "<td bgcolor=E5E5E5><font face=Verdana color=black size=1>" . $row['Program_Studi'] . "<br>";
$l = mysqli_query($con, "select Program_Studi from program_studi where Kode = '". $row['Program_Studi'] ."'"); 
while($rl = mysqli_fetch_array($l)){  
  echo $rl[0];    
} 
echo "</font></td>";
echo "<td bgcolor=E5E5E5><font face=Verdana color=black size=1><a href='images/" . $row['Foto'] . "' target=_blank><img src='images/" . $row['Foto'] . "'  width=50 height=50></a></font></td>";
echo "</tr>"; 
echo "<tr>"; 
echo "<td colspan=4>"; 
// echo "<td>"; 
echo "<table id=laporan align=center width=100%>";  
echo "<tr>";
echo "<td><font face=Verdana color=black size=1><b>id</b></font></td>";
echo "<td><font face=Verdana color=black size=1><b>NIM</b></font></td>";
echo "<td><font face=Verdana color=black size=1><b>Kode</b></font></td>";
echo "<td><font face=Verdana color=black size=1><b>Tanggal_Daftar</b></font></td>";
echo "<td><font face=Verdana color=black size=1><b>Tanggal_Ujian</b></font></td>";
echo "<td><font face=Verdana color=black size=1><b>Hasil_Ujian</b></font></td>";
echo "<td><font face=Verdana color=black size=1><b>Keterangan</b></font></td>";
echo "</tr>";
$result2 = mysqli_query($con, "SELECT * FROM sertifikasi where NIM = '". $row['NIM'] ."'");
while($row2 = mysqli_fetch_array($result2))
{
  echo "<td bgcolor=E5E5E5><font face=Verdana color=black size=1>";
  if (isset($row['Foto'])) {
      echo "<a href='images/" . $row['Foto'] . "' target=_blank><img src='images/" . $row['Foto'] . "'  width=50 height=50></a>";
  } else {
      echo "Foto tidak tersedia";
  }
  echo "</font></td>";
  
echo "<td><font face=Verdana color=black size=1>" . $row2['id'] . "</font></td>";
  echo "<td><font face=Verdana color=black size=1>" . $row2['NIM'] . "<br>";
  $l = mysqli_query($con, "select Nama from mahasiswa where NIM = '". $row2['NIM'] ."'"); 
  while($rl = mysqli_fetch_array($l)){  
    echo $rl[0];    
  } 
  echo "</font></td>";
  echo "<td><font face=Verdana color=black size=1>" . $row2['Kode'] . "<br>";
  $l = mysqli_query($con, "select Sertifikasi from jenis_sertifikasi where Kode = '". $row2['Kode'] ."'"); 
  while($rl = mysqli_fetch_array($l)){  
    echo $rl[0];    
  } 
  echo "</font></td>";
echo "<td><font face=Verdana color=black size=1>" . $row2['Tanggal_Daftar'] . "</font></td>";
echo "<td><font face=Verdana color=black size=1>" . $row2['Tanggal_Ujian'] . "</font></td>";
echo "<td><font face=Verdana color=black size=1>" . $row2['Hasil_Ujian'] . "</font></td>";
echo "<td><font face=Verdana color=black size=1>" . $row2['Keterangan'] . "</font></td>";
echo "</tr>"; 
} 
echo "</table>"; 
} 
echo "</td>"; 
echo "</tr>"; 
echo "</table>"; 
mysqli_close($con);
?>
