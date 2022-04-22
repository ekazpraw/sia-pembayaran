<?php
   	$No_calonsiswa = $_GET['No_calonsiswa']; 
	$query = mysql_query("delete from calon_siswa where No_calonsiswa='$No_calonsiswa'") or die(mysql_error());
	echo "<script language='javascript'> document.location='index.php?module=masterdata_siswa'</script>";
?>