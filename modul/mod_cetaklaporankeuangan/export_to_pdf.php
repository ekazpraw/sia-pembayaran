<?php
include "class.ezpdf.php";
include "../../koneksi/koneksi.php";
include "../../fungsi/fungsi_indotgl.php";
$pdf = new Cezpdf();
// Set margin dan font
$pdf->ezSetCmMargins(3, 3, 3, 3);
$pdf->selectFont('fonts/Courier.afm');
$all = $pdf->openObject();
// Tampilkan logo
$pdf->setStrokeColor(0, 0, 0, 1);
$data = mysql_fetch_array(mysql_query("SELECT Thn_ajaran FROM pendaftaran"));
$Thn_ajaran = addslashes(strip_tags($_POST['Thn_ajaran']));
// Teks di tengah atas untuk judul header
$pdf->addText(360, 570, 13,'<b>LAPORAN KEUANGAN</b>');
$pdf->addText(350, 555, 14,'<b>MTS. MANBAUL KHAIR</b>');
$pdf->addText(325, 540, 12,'<b>TAHUN PELAJARAN '.$data['Thn_ajaran'].'</b>');
// Garis atas untuk header
$pdf->line(50, 520, 780, 520);
// Garis bawah untuk footer
$pdf->line(50, 50, 780, 50);
// Teks kiri bawah
$pdf->addText(60,34,8,'Dicetak Tgl:' . date( 'd-m-Y, H:i:s'));
$pdf->closeObject();
// Tampilkan object di semua halaman
$pdf->addObject($all, 'all');
$query1=mysql_query("Select * FROM pendaftaran;")
or die("Query failed with error: ".mysql_error());
$data1=mysql_fetch_array($query1);
	$query2=mysql_query("Select Biaya FROM Biaya;")
	or die("Query failed with error: ".mysql_error());
	$data2=mysql_fetch_array($query2);
$sql = mysql_query("select * from pembayaran order by No_pembayaran asc");
$numRows = mysql_num_rows($sql);
if ($Thn_ajaran == 0)
  		{
	  		echo "<script language='javascript'>alert('Pilih Tahun Ajaran');
			  window.location = '../../index.php?module=masterdata_cetaklaporankeuangan'</script>";
   	}elseif($numRows > 0){
	$i = 1;
	while ($data = mysql_fetch_array($sql)){
		$dataa[$i]=array('<b>NO</b>'=>$i, 
						'<b>NO PEMBAYARAN</b>'=>$data['No_pembayaran'],
						'<b>NO PENDAFTARAN</b>'=>$data1['No_calonsiswa'], 
						'<b>NAMA SISWA</b>'=>$data1['Nm_lengkap'], 
						'<b>L/P</b>'=>$data1['Jenkel'],
						'<b>TANGGAL BAYAR</b>'=>$data['Tgl_bayar'],
						'<b>NOMINAL</b>'=>$data2['Biaya']);
		$i++;
		$total += $data2['Biaya'];
	}
	$pdf->ezTable($dataa, '', '', '');
	//$pdf->ezText("\n\nTotal Siswa : {$numRows}");
	$pdf->ezText("\n\nTotal : Rp {$total}");
	// Penomoran halaman
	$pdf->ezStartPageNumbers(425, 15, 8);
	$pdf->ezStream();
}
?>