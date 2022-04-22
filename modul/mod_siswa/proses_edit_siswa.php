<?php
if(isset($_POST['edit'])){
$No_calonsiswa		= $_POST['No_calonsiswa'];
$Thn_ajaran 		= $_POST['Thn_ajaran'];
$Nm_pembeli 		= $_POST['Nm_pembeli'];
$Nm_calonsiswa		= $_POST['Nm_calonsiswa'];
$Jenkel 			= $_POST['Jenkel'];
if (empty($Thn_ajaran) || empty($Nm_pembeli) || empty($Nm_calonsiswa) || empty($Jenkel)){
	echo "<script language=\"JavaScript\">alert('Isikan Formulir secara lengkap Tanda *');</script>";
	echo "<script language='javascript'> document.location='index.php?module=edit_siswa&No_calonsiswa=$No_calonsiswa'</script>";
}else{
	$lastUpdateDate = date('Y-m-d H:i:s');
	$sql="UPDATE calon_siswa SET Thn_ajaran='$Thn_ajaran', Nm_pembeli='$Nm_pembeli', Nm_calonsiswa='$Nm_calonsiswa', Jenkel='$Jenkel' WHERE No_calonsiswa='$No_calonsiswa'";
	mysql_query($sql) or die(mysql_error());
{
	echo "<script language=\"JavaScript\">alert('Nomor Calon Siswa, Nomor = $No_calonsiswa Berhasil Diubah dan Disimpan');</script>";
	echo "<script language='javascript'> document.location='index.php?module=masterdata_siswa'</script>";}}}
?>