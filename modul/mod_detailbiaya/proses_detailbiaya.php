<?php

if(isset($_POST['save']))
{   
 	$Kd_biaya = addslashes($_POST['Kd_biaya']);
   	$Nm_biaya = addslashes($_POST['Nm_biaya']);
	$Thn_ajaran = addslashes($_POST['Thn_ajaran']);
	$Nominal = addslashes($_POST['Biaya']);
	$Kd_kelas = addslashes($_POST['Kd_kelas']);
	$Status = addslashes($_POST['Status']);
    if (empty($Kd_biaya) || empty($Nm_biaya) || empty($Nominal) )
  		{
	  				echo "<script language=\"JavaScript\">alert('Isikan Data secara lengkap (Tanda *)');</script>";
   	  				echo "<script language='javascript'> document.location='index.php?module='masterdata_detailbiaya'</script>";	  
   			}elseif ($Kd_kelas == '++'){
					echo "<script language=\"JavaScript\">alert('Kelas belum dipilih');</script>";
					echo "<script language='javascript'> document.location='index.php?module='masterdata_detailbiaya'</script>";	  
				}else{
					$sql = "SELECT Kd_biaya FROM biaya WHERE Kd_biaya='$Kd_biaya' ";
					$hasil = mysql_query($sql);
					$row = mysql_fetch_row($hasil);
					$createdDate = date('Y-m-d H:i:s');
						if (!empty($row[0])) 
								{
									echo "<script language=\"JavaScript\">alert('Kode biaya $row[0] Sudah Ada');</script>";
   	  								echo "<script language='javascript'> document.location='index.php?module=entry_detailbiaya'</script>";
								}
						else{		
								$sql="INSERT INTO biaya (Kd_biaya,
														Nm_biaya,
														Thn_ajaran,
														Biaya,
														Kd_kelas
														Status)							
									  VALUES('$Kd_biaya','$Nm_biaya','$Thn_ajaran','$Nominal','$Kd_kelas','$Status') ";
								$perintah=mysql_query($sql) or die(mysql_error());
										{
											echo "<script language='javascript'> document.location='index.php?module=masterdata_detailbiaya'</script>";
										}
							}
					}
			}
	
?>