<?php
   	$Kd_biaya = $_GET['Kd_biaya']; 
	$query = mysql_query("delete from detail_biaya where Kd_biaya='$Kd_biaya'") or die(mysql_error());
	echo "<script language='javascript'> document.location='index.php?module=masterdata_detailbiaya'</script>";
?>