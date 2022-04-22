<?php
if(isset($_POST['save'])){   
 	$Kd_gel = ($_POST['Kd_gel']);
	$Nm_gel = ($_POST['Nm_gel']);
if(empty($Nm_gel) || empty($Kd_gel)){
  	echo "<script language=\"JavaScript\">alert('Isikan formulir secara lengkap Tanda *');</script>";
	echo "<script language='javascript'> document.location='index.php?module=siswa'</script>";
}elseif($Kd_gel == 'KG0000'){
	echo "<script language=\"JavaScript\">alert('Kode gelombang Belum Ditentukan');</script>";
	echo "<script language='javascript'> document.location='index.php?module=entry_gelombang'</script>";	  
}else{
	$sql = "SELECT Nm_gel FROM gelombang WHERE Nm_gel='$Nm_gel' ";
	$hasil = mysql_query($sql);
	$row = mysql_fetch_row($hasil);
if(!empty($row[0])){
	echo "<script language=\"JavaScript\">alert('Nama gelombang $row[0] Sudah Ada');</script>";
	echo "<script language='javascript'> document.location='index.php?module=entry_gelombang'</script>";
}else{		
	$sql="INSERT INTO Gelombang (Kd_gel, Nm_gel)							
	VALUES('$Kd_gel', '$Nm_gel')";
	$perintah=mysql_query($sql) or die(mysql_error());
{echo "<script language='javascript'> document.location='index.php?module=masterdata_gelombang'</script>";}}}}
?>