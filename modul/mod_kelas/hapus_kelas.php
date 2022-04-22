<?php
   	$Kd_kelas = $_GET['Kd_kelas']; 
	$query = mysql_query("delete from kelas where Kd_kelas='$Kd_kelas'") or die(mysql_error());
	echo "<script language='javascript'> document.location='index.php?module=masterdata_kelas'</script>";
?>