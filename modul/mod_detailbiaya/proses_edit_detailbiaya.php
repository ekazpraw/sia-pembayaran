<?php
if(isset($_POST['edit']))
{
//tangkap data dari form edit jenis bayar
$Kd_biaya 		= $_POST['Kd_biaya'];
$Nm_biaya 		= $_POST['Nm_biaya'];
$Biaya 			= $_POST['Biaya'];
$Status	 		= $_POST['Status'];
if (empty($Kd_biaya) || empty($Nm_biaya) ||  empty($Biaya) ||  empty($Status))
  		{
	  				echo "<script language=\"JavaScript\">alert('Isikan Data secara lengkap (Tanda *)');</script>";
   	  				echo "<script language='javascript'> document.location='index.php?module=edit_detailbiaya&Kd_biaya=$Kd_biaya'</script>";	  
   			}elseif ($Kd_kelas == '++'){
					echo "<script language=\"JavaScript\">alert('Kelas belum dipilih');</script>";
					echo "<script language='javascript'> document.location='index.php?module=edit_detailbiaya&Kd_biaya=$Kd_biaya'</script>";	  
				}else{
						$lastUpdateDate = date('Y-m-d H:i:s');
						$sql="UPDATE biaya SET Nm_biaya='$Nm_biaya', Biaya='$Biaya', Status='$Status' WHERE Kd_biaya='$Kd_biaya'";
							mysql_query($sql) or die(mysql_error());
							{
							echo "<script language=\"JavaScript\">alert('Jenis Bayar Kode = $Kd_biaya berhasil Diubah dan Disimpan');</script>";
							echo "<script language='javascript'> document.location='index.php?module=masterdata_detailbiaya'</script>";
							}
			}
}
?>