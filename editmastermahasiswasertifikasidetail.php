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
<div id="page-wrapper">
<div class="container-fluid"> 
<?php
?>
<link href="standar.css" rel="stylesheet" type="text/css">

<!-- calendar -->
<script src="php_calendar/scripts.js" type="text/javascript"></script>
<!-- TinyMCE -->
<script type="text/javascript" src="tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		mode : "textareas",
		theme : "advanced",
		plugins : "youtube,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,zoom,flash,searchreplace,print,paste,directionality,fullscreen,noneditable,contextmenu",
		theme_advanced_buttons1_add_before : "save,newdocument,separator",
		theme_advanced_buttons1_add : "fontselect,fontsizeselect",
		theme_advanced_buttons2_add : "separator,insertdate,inserttime,preview,zoom,separator,forecolor,backcolor,liststyle",
		theme_advanced_buttons2_add_before: "cut,copy,paste,pastetext,pasteword,separator,search,replace,separator",
		theme_advanced_buttons3_add_before : "tablecontrols,separator,youtube,separator",
		theme_advanced_buttons3_add : "emotions,iespell,flash,advhr,separator,print,separator,ltr,rtl,separator,fullscreen",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		plugin_insertdate_dateFormat : "%Y-%m-%d",
		plugin_insertdate_timeFormat : "%H:%M:%S",
		extended_valid_elements : "hr[class|width|size|noshade]",
		file_browser_callback : "fileBrowserCallBack",
		paste_use_dialog : false,
		theme_advanced_resizing : true,
		theme_advanced_resize_horizontal : false,
		theme_advanced_link_targets : "_something=My somthing;_something2=My somthing2;_something3=My somthing3;",
		media_strict : false,
		apply_source_formatting : true
	});

	function fileBrowserCallBack(field_name, url, type, win) {
		var connector = "../../filemanager/browser.html?Connector=connectors/php/connector.php";
		var enableAutoTypeSelection = true;

		var cType;
		tinymcpuk_field = field_name;
		tinymcpuk = win;

		switch (type) {
			case "image":
				cType = "Image";
				break;
			case "flash":
				cType = "Flash";
				break;
			case "file":
				cType = "File";
				break;
		}

		if (enableAutoTypeSelection && cType) {
			connector += "&Type=" + cType;
		}

		window.open(connector, "tinymcpuk", "modal,width=600,height=400");
	}
</script>
<!-- /TinyMCE -->
<?php
echo "<td bgcolor=F5F5F5>";
echo "<table class='table table-striped'>";
echo "<tr><td colspan=2><font face=Verdana color=black size=1>sertifikasi</font></td></tr>";
echo "<form action=editmastermahasiswasertifikasidetailexec.php method=post>";
$result = mysqli_query($con, "SELECT * FROM sertifikasi where id = ". $_GET['id'] . "");
while($row = mysqli_fetch_array($result))
{
echo "<td bgcolor=CCEEEE><input type=hidden name=pk value='" . $row['id'] . "'></td>";
echo "<tr><td bgcolor=CCCCCC><font face=Verdana color=black size=1>&nbsp;&nbsp;id&nbsp;&nbsp;</font></td>";
echo "<td bgcolor=CCEEEE>&nbsp;&nbsp;<input type=text  class='form-control' name='id' value='" . $row['id'] . "'></td>";
echo "<tr><td bgcolor=CCCCCC><font face=Verdana color=black size=1>&nbsp;&nbsp;NIM&nbsp;&nbsp;</font></td>";
echo "<td bgcolor=CCEEEE><font face=Verdana color=black size=1>&nbsp;&nbsp;" . $row['NIM'] . "&nbsp;&nbsp;</font></td>";
echo "<input type=hidden name='NIM' value='" . $row['NIM'] . "'</td>";
echo "<tr><td bgcolor=CCCCCC><font face=Verdana color=black size=1>&nbsp;&nbsp;Kode&nbsp;&nbsp;</font></td>";
echo "<td bgcolor=CCEEEE>";
echo "<select class='form-control' name='Kode'>";
$result = mysqli_query($con, "select * from jenis_sertifikasi"); 
while($r = mysqli_fetch_array($result)){
if ($r['Kode'] == $row['Kode']) {
echo "<option value='". $r['Kode'] ."' selected>". $r['Kode'] ." | ". $r['Sertifikasi'] ."</option>";
}else{
echo "<option value='". $r['Kode'] ."'>". $r['Kode'] ." | ". $r['Sertifikasi'] ."</option>";
}
}
echo "</select>";
echo "</td></tr>";
echo "<tr><td bgcolor=CCCCCC><font face=Verdana color=black size=1>&nbsp;&nbsp;Tanggal_Daftar&nbsp;&nbsp;</font></td>";
echo "<td bgcolor=CCEEEE>&nbsp;&nbsp;<input type=text id='Tanggal_Daftar' name='Tanggal_Daftar' value='" . $row['Tanggal_Daftar'] . "'><script type='text/javascript'>calendar.set('Tanggal_Daftar');</script></td>";
echo "<tr><td bgcolor=CCCCCC><font face=Verdana color=black size=1>&nbsp;&nbsp;Tanggal_Ujian&nbsp;&nbsp;</font></td>";
echo "<tr><td bgcolor=CCCCCC><font face=Verdana color=black size=1>&nbsp;&nbsp;Hasil_Ujian&nbsp;&nbsp;</font></td>";
echo "<td bgcolor=CCEEEE><input type=text  class='form-control' name='Hasil_Ujian' value='" . $row['Hasil_Ujian'] . "' size = 100></td></tr>";
echo "<tr><td bgcolor=CCCCCC><font face=Verdana color=black size=1>&nbsp;&nbsp;Keterangan&nbsp;&nbsp;</font></td>";
echo "<td bgcolor=CCEEEE>&nbsp;&nbsp;<textarea <textarea class='form-control' name='Keterangan' cols=70 rows=5 >". $row['Keterangan'] ."</textarea></td>";
echo "<tr><td colspan=2 align=center><button type='submit' class='btn btn-primary'><font face=Verdana size=1><i class='fa fa-edit'></i>&nbsp;Edit</font></button></td></tr>";
echo "</form>";
echo "</table></td></tr>";
}
?>
</div> 
<?php 
include("footer.php");
?>
