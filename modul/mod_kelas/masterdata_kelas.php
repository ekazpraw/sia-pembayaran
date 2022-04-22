<br>
<?php
$kelas_param = false;
if(isset($_GET['act'])){
	$kelas_param = $_GET['act'];
}
switch($kelas_param){
	default:
	include "fungsi/class_paging.php";
	$Num_Rows = mysql_num_rows(mysql_query("SELECT * FROM kelas"));
?>
	<h2><span>Informasi Kelas, Total Data: (<?php echo $Num_Rows; ?>) Kelas.</span></h2>
	<div class="module-table-body">
		<table id="myTable" class="tablesorter">
			<tr>
				<th><?php echo "<input type='button' value='Tambah Kelas' onclick=\"window.location.href='?module=entry_kelas';\">"; ?></th>
			</tr>
			<tr>	
				<td>
					<div style="font-family: arial; overflow: scroll; width: 100%; height: 350px;">
						<div style="text-align: center; width: 100%; padding: 0 px; overflow: hidden;">
							<table>
								<tr>
									<td style="width:5%" align="center">No</td>
									<td style="width:5%" align="center">Kode Kelas</td>
									<td style="width:10%" align="center">Nama Kelas</td>
									<td style="width:10%" align="center">Kapasitas Siswa / Siswi</td>
									<td style="width:5%" align="center">Aksi</td>
								</tr>
								<?php
								$p      = new PagingKelas;
								$batas  = 10;
								$posisi = $p->cariPosisi($batas);
								
								$sql = mysql_query("SELECT * FROM kelas ORDER BY Kd_kelas ASC LIMIT $posisi,$batas");
								$no = $posisi+1;
								while ($data = mysql_fetch_array($sql)){
									?>
									<tr>
										<td align="center"><?php echo $no; ?></td>
										<td align="center"><?php echo $data['Kd_kelas'];?></td>
										<td align="center">Kelas&nbsp;<?php echo $data['Nm_kelas'];?></td>
										<td align="center"><?php echo $data['Kuota'];?>&nbsp;Anak</td>
										<td align="center"><a href="?module=edit_kelas&Kd_kelas=<?php echo $data['Kd_kelas'];?>"><img src="images/Edit.png"></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="?module=hapus_kelas&Kd_kelas=<?php echo $data['Kd_kelas'];?>" onclick="return confirm('Anda yakin ingin menghapus Kelas <?php echo $data[Nm_kelas];?>?');"><img src="images/Delete.png"/></a></td>
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
							$jmldata = mysql_num_rows(mysql_query("SELECT * FROM kelas"));
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