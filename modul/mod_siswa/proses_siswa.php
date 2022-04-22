<?php
if(isset($_POST['save'])){   
 	$Thn_ajaran = ($_POST['Thn_ajaran']);
	$No_calonsiswa = ($_POST['No_calonsiswa']);
	$Nm_pembeli = ($_POST['Nm_pembeli']);
	$Nm_calonsiswa = ($_POST['Nm_calonsiswa']);
	$Jenkel = ($_POST['Jenkel']);
	$Kd_Gel = ($_POST['Kd_Gel']);
if(empty($No_calonsiswa) || empty($Thn_ajaran) || empty($Nm_pembeli) || empty($Nm_calonsiswa) || empty($Jenkel)){
  	echo "<script language=\"JavaScript\">alert('Isikan Formulir secara lengkap Tanda *');</script>";
	echo "<script language='javascript'> document.location='index.php?module=entry_siswa'</script>";
}elseif($Thn_ajaran == '20  /20  '){
	echo "<script language=\"JavaScript\">alert('Tahun Ajaran Belum Ditentukan');</script>";
	echo "<script language='javascript'> document.location='index.php?module=entry_siswa'</script>";	  
}else{
	$sql = "SELECT No_calonsiswa FROM calon_siswa WHERE No_calonsiswa='$No_calonsiswa'";
	$hasil = mysql_query($sql);
	$row = mysql_fetch_row($hasil);
if(!empty($row[0])){
	echo "<script language=\"JavaScript\">alert('Nomor Calon Siswa $row[0] Sudah Ada');</script>";
	echo "<script language='javascript'> document.location='index.php?module=entry_siswa'</script>";
}else{		
	$sql="INSERT INTO calon_siswa (No_calonsiswa, Thn_ajaran, Nm_pembeli, Nm_calonsiswa, Jenkel, Kd_Gel)							
	VALUES('$No_calonsiswa','$Thn_ajaran','$Nm_pembeli','$Nm_calonsiswa','$Jenkel','$Kd_Gel')";
	$perintah=mysql_query($sql) or die(mysql_error());
{echo "<script language='javascript'> document.location='index.php?module=masterdata_siswa'</script>";}}}}
?>