<?php
if(isset($_POST['edit'])){
 	$Kd_gel = ($_POST['Kd_gel']);
	$Nm_gel = ($_POST['Nm_gel']);
if(empty($Nm_gel) || empty($Kd_gel)){
  	echo "<script language=\"JavaScript\">alert('Isikan formulir secara lengkap Tanda *');</script>";
	echo "<script language='javascript'> document.location='index.php?module=siswa'</script>";
}elseif($Kd_gel == 'KG0000'){
	echo "<script language=\"JavaScript\">alert('Kode gelombang Belum Ditentukan');</script>";
	echo "<script language='javascript'> document.location='index.php?module=entry_gelombang'</script>";	  
}else{
	$lastUpdateDate = date('Y-m-d H:i:s');
	$sql="UPDATE calon_siswa SET Thn_ajaran='$Thn_ajaran', Nm_pembeli='$Nm_pembeli', Nm_calonsiswa='$Nm_calonsiswa', Jenkel='$Jenkel' WHERE No_calonsiswa='$No_calonsiswa'";
	mysql_query($sql) or die(mysql_error());{
	echo "<script language='javascript'> document.location='index.php?module=masterdata_siswa'</script>";}}}
?>