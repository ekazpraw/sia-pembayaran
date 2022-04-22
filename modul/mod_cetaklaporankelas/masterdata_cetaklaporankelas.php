<br><h2><span>Cetak Laporan Kelas</span></h2>
<form method="POST" action="modul/mod_cetaklaporankelas/export_to_pdf.php">
<table>
	<tr>
		<td width=150>Pilih Kelas</td>
		<td width=5>:</td>
		<td> <?php include "ajax1.php"; ?>
		</td>
	</tr>
	<tr>
		<th colspan=3> <input type='submit' value='Export to PDF'><a href='javascript:history.go(-1)'></a></th>
	</tr>
</table>
</form>