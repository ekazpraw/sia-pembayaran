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
$data2 = mysql_fetch_array(mysql_query("SELECT Nm_kelas FROM pembagian_kelas"));
$Thn_ajaran = addslashes(strip_tags($_POST['Thn_ajaran']));

// Teks di tengah atas untuk judul header
$pdf->addText(325, 570, 13,'<b>LAPORAN PENDAFTARAN SISWA</b>');
$pdf->addText(345, 555, 14,'<b>MTS. MANBAUL KHAIR</b>');
$pdf->addText(330, 540, 12,'<b>TAHUN PELAJARAN '.$data['Thn_ajaran'].'</b>');

// Garis atas untuk header
$pdf->line(50, 520, 780, 520);

// Garis bawah untuk footer
$pdf->line(50, 50, 780, 50);
// Teks kiri bawah
$pdf->addText(60,34,8,'Dicetak tgl:' . date('d-m-Y, H:i:s'));

$pdf->closeObject();

// Tampilkan object di semua halaman
$pdf->addObject($all, 'all');

$sql = mysql_query("select * from pendaftaran order by No_induk asc");
$numRows = mysql_num_rows($sql);
if ($Thn_ajaran == 0)
  		{
	  		echo "<script language='javascript'>alert('Pilih Tahun Ajaran');
			  window.location = '../../index.php?module=laporan_pendaftaran'</script>";
   	}elseif($numRows > 0){
	$i = 1;
	while ($data = mysql_fetch_array($sql)){
		$dataa[$i]=array('<b>NO</b>'=>$i, 
						'<b>NO PENDAFTARAN</b>'=>$data['No_calonsiswa'], 
						'<b>NO INDUK</b>'=>$data['No_induk'], 
						'<b>NAMA SISWA</b>'=>$data['Nm_lengkap'], 
						'<b>L/P</b>'=>$data['Jenkel'],
						'<b>TANGGAL LAHIR</b>'=>$data['Tgl_lahir'],
						'<b>KELAS</b>'=>$data2['Nm_kelas']);
		$i++;
	}
	$pdf->ezTable($dataa, '', '', '');
	$pdf->ezText("\n\nTotal Siswa : {$numRows}");
	// Penomoran halaman
	$pdf->ezStartPageNumbers(425, 15, 8);
	$pdf->ezStream();
}
?>