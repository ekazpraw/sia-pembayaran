<?php
if(isset($_POST['save']))
{   
 	$Kd_kelas = addslashes($_POST['Kd_kelas']);
   	$Nm_kelas = addslashes($_POST['Nm_kelas']);
	$Kuota = addslashes($_POST['Kuota']);
   if (empty($Kd_kelas) || empty($Nm_kelas) || empty($Kuota))
  		{
	  				echo "<script language=\"JavaScript\">alert('Isikan Data secara lengkap (Tanda *)');</script>";
   	 				echo "<script language='javascript'> document.location='index.php?module=masterdata_kelas'</script>";	  
   			}else{
					$sql = "SELECT Kd_kelas FROM kelas WHERE Kd_kelas='$Kd_kelas' ";
					$hasil = mysql_query($sql);
					$row = mysql_fetch_row($hasil);
						if (!empty($row[0])) 
								{
									echo "<script language=\"JavaScript\">alert('Kode Kelas $row[0] Sudah Ada');</script>";
   	  								echo "<script language='javascript'> document.location='index.php?module=masterdata_kelas'</script>";
								}
						else{		
								$sql="INSERT INTO kelas	(Kd_kelas, Nm_kelas, Kuota)							
									  VALUES('$Kd_kelas', '$Nm_kelas', '$Kuota') ";
								$perintah=mysql_query($sql) or die(mysql_error());
										{
											//echo "<script language=\"JavaScript\">alert('Kelas $Nm_kelas dengan Kode Kelas = $Kd_kelas berhasil ditambahkan / disimpan');</script>";
   	  										echo "<script language='javascript'> document.location='index.php?module=masterdata_kelas'</script>";
										}
							}
					}
			}
	
?>