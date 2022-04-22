<?php
set_time_limit(1800);
$namaFile = "Laporan Keuangan - Tanggal Cetak ".date('Y-m-d').".xls";
header("Pragma: public");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");
header("Content-Disposition: attachment; filename=$namaFile");
header("Content-Transfer-Encoding: binary ");

include "../../koneksi/koneksi.php";
$Thn_ajaran = addslashes(strip_tags($_POST['Thn_ajaran']));
$sql = mysql_query("select * from pembayaran s, detil_bayar a, siswa i where a.Kd_jurusan=s.Kd_jurusan and s.No_pendaftaran=i.No_pendaftaran AND i.Thn_ajaran='$Thn_ajaran' order by i.No_pendaftaran asc");
$numRows = mysql_num_rows($sql);

echo "<table border=0 cellpadding=0 cellspacing=0 align=center>
		<tr>
			<td colspan=2 style='border: none';></td>
		</tr>
		<tr>
			<td colspan=2 style='border: none';><b>LAPORAN KEUANGAN</b></td>
		</tr>
		<tr>
			<td colspan=2 style='border: none';><b>MTS. MANBA'UL KHAIR</b></td>
		</tr>
		<tr>
			<td colspan=2 style='border: none';><b>TAHUN PELAJARAN $Thn_ajaran</b></td>
		</tr>
		</table>
		<br/>
		<table border=1 cellpadding=0 cellspacing=0>
		<tr height=40>
			<th bgcolor=#1aa8e9 align=center>NO</th>
			<th bgcolor=#1aa8e9 align=center>NOMOR PEMBAYARAN</th>
			<th bgcolor=#1aa8e9 align=center>NOMOR PENDAFTARAN</th>
			<th bgcolor=#1aa8e9 align=center>NAMA SISWA</th>
			<th bgcolor=#1aa8e9 align=center>JENIS KELAMIN</th>
			<th bgcolor=#1aa8e9 align=center>TANGGAL BAYAR</th>
			<th bgcolor=#1aa8e9 align=center>NOMINAL</th>
		</tr>";
			
		$no = 1;
		while ($data = mysql_fetch_array($sql)){
			echo "<tr valign=top>
					<td align=center>$no</td>
					<td align=center>$data[No_pembayaran]</td>
					<td align=center>$data[No_pendaftaran]</td>
					<td align=center>$data[Nm_lengkap]</td>
					<td align=center>$data[Jenkel]</td>
					<td align=center>$data[tgl_bayar]</td>
					<td align=center>$data[Nominal]</td>
				</tr>";
			$no++;
		}
	echo "</table>";
?>
