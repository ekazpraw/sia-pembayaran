<br><h2><span>Cetak Laporan Keuangan</span></h2>
<form method="POST" action="modul/mod_cetaklaporankeuangan/export_to_pdf.php">
<table>
	<tr>
		<td width=150>Pilih Tahun Ajaran</td>
		<td width=5>:</td>
		<td> <?php include "ajax.php"; ?>
		</td>
	</tr>
	<tr>
		<th colspan=3> <input type='submit' value='Export to PDF'><a href='javascript:history.go(-1)'></a></th>
	</tr>
</table>
</form>
<form method="POST" action="modul/mod_cetaklaporankeuangan/proses_laporan.php">