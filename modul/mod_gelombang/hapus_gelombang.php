<?php
   	$Kd_gel = $_GET['Kd_gel']; 
	$query = mysql_query("delete from gelombang where Kd_gel='$Kd_gel'") or die(mysql_error());
	echo "<script language='javascript'> document.location='index.php?module=masterdata_gelombang'</script>";
?>