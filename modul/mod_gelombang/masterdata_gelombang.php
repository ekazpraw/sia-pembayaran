<br>
<?php
$Kd_gel_param = false;
if(isset($_GET['act'])){
	$Kd_gel_param = $_GET['act'];
}
switch($Kd_gel_param){
	default:
	include "fungsi/class_paging.php";
	$Num_Rows = mysql_num_rows(mysql_query("SELECT * FROM gelombang"));?>
	<h2><span>Informasi Entry Gelombang Siswa, Total Data: (<?php echo $Num_Rows; ?>)</span></h2>
	<div class="module-table-body">
		<form method="post" action="index.php?module=cari_gelombang">
		<table id="myTable" class="tablesorter">
			<tr>
				<th>
					<?php echo "<input type='button' value='Tambah Gelombang' onclick=\"window.location.href='?module=entry_gelombang';\">"; ?>
					&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
					&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
					&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
					&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
					<img src="images/Cari.png" border="0" style="padding-right:3px;" title="Cari"/><input type="text" name="search" id="search" size="25"> <input type="submit" name="submit" value="Cari">
				</th>
			</tr>
		</form>
			<tr>	
				<td>
					<div style="font-family: arial; overflow: scroll; width: 100%; height: 350px;">
						<div style="text-align: center; width: 100%; padding: 0 px; overflow: hidden;">
							<table>
								<tr color="grey">
									<td style="width:4%" align="center">No</td>
									<td style="width:10%" align="center">Kode Gelombang</td>
									<td style="width:20%" align="center">Nama Gelombang</td>
									<td style="width:5%" align="center">Aksi</td>
								</tr>
								<?php
								$p      = new PagingPendaftaran;
								$batas  = 10;
								$posisi = $p->cariPosisi($batas);
								$sql = mysql_query("SELECT * FROM gelombang");
								$no = $posisi+1;
								while ($data = mysql_fetch_array($sql)){
									?>
									<tr>
										<td align="center"><?php echo $no; ?></td>
										<td align="center"><?php echo $data['Kd_gel'];?></td>
										<td align="center"><?php echo $data['Nm_gel'];?></td>
										<td align="center"><a href="?module=edit_gelombang&Kd_Gel=<?php echo $data['Kd_gel']; ?>"><img src="images/edit.png" border="0" style="padding-right:4px;" title="Edit"/></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="?module=hapus_gelombang&Kd_gel=<?php echo $data['Kd_gel'];?>&Nm_Gel=<?php echo $data['Nm_gel']; ?>" onclick="return confirm('Anda yakin ingin menghapus Gelombang <?php echo $data['Nm_gel']; ?>?');"><img src="images/delete.png" border="0" style="padding-right:3px;" title="Hapus"/></a> </td>
									</tr>
									<?php
									$no++;
								}
								echo "</table>";
								?>
								</div>
							</div>
						</td>
					</tr>
				</table>
				<table>
					<tr>
						<td>
							<?php
							$jmldata = mysql_query("SELECT * FROM biaya, gelombang WHERE gelombang.Kd_gel = gelombang.Kd_gel AND biaya.Kd_biaya = biaya.Kd_biaya AND gelombang.Kd_gel='$Kd_gel' ORDER BY Kd_gel") or die(mysql_error());
							$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
							$linkHalaman = $p->navHalaman($_GET['halaman'], $jmlhalaman);
							echo "<div id='paging'>Hal: $linkHalaman </div>";
							?>
						</td>
					</tr>
				</table>
			<div style="clear: both"></div>
		</div> <!-- End .module-table-body -->
<?php
}
?>