<?php
if(isset($_POST['edit'])){
$Kd_kelas 	= $_POST['Kd_kelas'];
$Nm_kelas 	= $_POST['Nm_kelas'];
$Kuota	 	= $_POST['Kuota'];
if (empty($Nm_kelas)){
	echo "<script language=\"JavaScript\">alert('Isikan Data secara lengkap (Tanda *)');</script>";
	echo "<script language='javascript'>document.location='index.php?module=edit_kelas&Kd_kelas=$Kd_kelas'</script>";	  
}else{
	$lastUpdateDate = date('Y-m-d H:i:s');
	$sql="UPDATE kelas SET Nm_kelas='$Nm_kelas', Kuota='$Kuota' WHERE Kd_kelas='$Kd_kelas'";
	mysql_query($sql) or die(mysql_error());
{
	echo "<script language=\"JavaScript\">alert('Kode Kelas Siswa, Kode = $Kd_kelas Berhasil Diubah dan Disimpan');</script>";
	echo "<script language='javascript'> document.location='index.php?module=masterdata_kelas'</script>";
}
}
}
?>