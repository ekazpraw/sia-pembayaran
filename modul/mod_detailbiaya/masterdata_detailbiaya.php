<br>
<?php
$biaya_param = false;
if(isset($_GET['act'])){
	$biaya_param = $_GET['act'];
}
switch($biaya_param){
	default:
	//session_start();
	include "fungsi/class_paging.php";
	$Num_Rows = mysql_num_rows(mysql_query("SELECT * FROM biaya"));
?>
	<h2><span>Informasi Entry Detail Biaya, Total Data: (<?php echo $Num_Rows;?>) Detail Biaya Siswa</span></h2>
	<div class="module-table-body">
		<table id="myTable" class="tablesorter">
			<tr>
				<th><?php echo "<input type='button' value='Tambah Bayar' onclick=\"window.location.href='?module=entry_detailbiaya';\">"; ?></th>
			</tr>
			<tr>	
				<td>
					<div style="font-family: arial; overflow: scroll; width: 100%; height: 350px;">
						<div style="text-align: center; width: 100%; padding: 0 px; overflow: hidden;">
							<table>
								<tr>
									<th style="width:5%">No</th>
									<th style="width:7%">Kode Bayar</th>
									<th style="width:20%">Nama Bayar</th>
									<th style="width:12%">Nominal</th>
									<th style="width:10%">Status</th>
									<th style="width:10%">Aksi</th>
								</tr>
								<?php
								$p      = new PagingBiaya;
								$batas  = 10;
								$posisi = $p->cariPosisi($batas);
								$sql = mysql_query("SELECT * FROM biaya ORDER BY Kd_biaya ASC LIMIT $posisi, $batas");
								$no = $posisi+1;
								while ($data = mysql_fetch_array($sql)){
								?>
									<tr>
										<td align="center"><?php echo $no; ?></td>
										<td align="center"><?php echo $data['Kd_biaya'];?></td>
										<td align="center"><?php echo $data['Nm_biaya'];?></td>
										<td align="center">Rp. <?php echo $data['Biaya'];?>,-</td>
										<td align="center"><?php echo $data['Status'];?></td>
										<td align="center"><a href="?module=edit_detailbiaya&Kd_biaya=<?php echo $data['Kd_biaya']; ?>"><img src="images/edit.png" border="0" style="padding-right:3px;" title="Edit"/></a> | <a href="?module=hapus_detailbiaya&Kd_biaya=<?php echo $data[Kd_biaya]; ?>&Nm_biaya=<?php echo $data[Nm_biaya]; ?>" onclick="return confirm('Anda yakin ingin menghapus Jenis Bayar <?php echo $data[Nm_biaya]; ?>?');"><img src="images/delete.png" border="0" style="padding-right:3px;" title="Hapus"/></a></td>
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
							$jmldata = mysql_num_rows(mysql_query("SELECT * FROM biaya"));
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