<br>
<?php
$calon_siswa_param = false;
if(isset($_GET['act'])){
	$calon_siswa_param = $_GET['act'];
}
switch($calon_siswa_param){
	default:
	include "fungsi/class_paging.php";
	$Num_Rows = mysql_num_rows(mysql_query("SELECT * FROM calon_siswa"));
?>
	<h2><span>Informasi Kelas, Total Data: (<?php echo $Num_Rows; ?>) Calon Siswa.</span></h2>

	<div class="module-table-body">
		<form method="post" action="index.php?module=cari_siswa">
		<table id="myTable" class="tablesorter">
			<tr>
				<th>
				
					<?php echo "<input type='button' value='Tambah Siswa' onclick=\"window.location.href='?module=entry_siswa';\">"; ?>
					&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
					&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
					&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
					&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
					<img src="images/Cari.png" border="0" style="padding-right:3px;" title="Cari"/><input type="text" name="search" id="search" size="25"> <input type="submit" name="submit" value="Cari">
				</th>
			</tr>
		</form>
			<tr>	
				<td>
					<div style="font-family: arial; overflow: scroll; width: 100%; height: 350px;">
						<div style="text-align: center; width: 100%; padding: 0 px; overflow: hidden;">
							<table>
								<tr>
									<td style="width:5%" align="center">No</td>
									<td style="width:10%" align="center">No Calon Siswa</td>
									<td style="width:20%" align="center">Nama Pembeli</td>
									<td style="width:20%" align="center">Nama Calon Siswa</td>
									<td style="width:20%" align="center">Kode Gelombang</td>
									<td style="width:10%" align="center">Tahun Ajaran</td>
									<td style="width:10%" align="center">Jenis Kelamin</td>
									<td style="width:5%" align="center">Aksi</td>
								</tr>
								<?php
								$p      = new PagingPendaftaran;
								$batas  = 10;
								$posisi = $p->cariPosisi($batas);
								$sql = mysql_query("SELECT * FROM calon_siswa");
								$no = $posisi+1;
								while ($data = mysql_fetch_array($sql)){
									?>
									<tr>
										<td align="center"><?php echo $no; ?></td>
										<td align="center"><?php echo $data['No_calonsiswa']; ?></td>
										<td align="center"><?php echo $data['Nm_pembeli']; ?></td>
										<td align="center"><?php echo $data['Nm_calonsiswa']; ?></td>
										<td align="center"><?php echo $data['Kd_gel']; ?></td>
										<td align="center"><?php echo $data['Thn_ajaran']; ?></td>
										<td align="center"><?php echo $data['Jenkel']; ?></td>
										<td align="center"><a href="?module=edit_siswa&No_calonsiswa=<?php echo $data['No_calonsiswa']; ?>"><img src="images/edit.png" border="0" style="padding-right:4px;" title="Edit"/></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="?module=hapus_siswa&No_calonsiswa=<?php echo $data[No_calonsiswa]; ?>&Nm_pembeli=<?php echo $data[Nm_pembeli]; ?>" onclick="return confirm('Anda yakin ingin menghapus Pendaftar <?php echo $data[Nm_pembeli]; ?>?');"><img src="images/delete.png" border="0" style="padding-right:3px;" title="Hapus"/></a> </td>
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
							$jmldata = mysql_num_rows(mysql_query("SELECT * FROM calon_siswa"));
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