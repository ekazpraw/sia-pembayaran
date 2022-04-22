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

$sql = mysql_fetch_array(mysql_query("SELECT * FROM kelas"));
$Nm_kelas = addslashes(strip_tags($_POST['Nm_kelas']));
$data = mysql_fetch_array(mysql_query("SELECT DISTINCT Thn_ajaran FROM pendaftaran"));
$Thn_ajaran = addslashes(strip_tags($_POST['Thn_ajaran']));

// Teks di tengah atas untuk judul header
$pdf->addText(350, 580, 13,'<b>LAPORAN DATA KELAS</b>');
$pdf->addText(345, 563, 14,'<b>MTS. MANBAUL KHAIR</b>');
$pdf->addText(330, 550, 12,'<b>TAHUN PELAJARAN '.$data[Thn_ajaran].'</b>');

// Teks di tengah untuk nama kelas
$pdf->addText(80, 520, 12,'<b>Data Kelas:'.$Nm_kelas.'</b>');

// Garis atas untuk header
$pdf->line(50, 538, 780, 538);

// Garis bawah untuk footer
$pdf->line(50, 50, 780, 50);
// Teks kiri bawah
$pdf->addText(60,34,8,'Dicetak tanggal:' . date('d-m-Y, H:i:s'));

$pdf->closeObject();

// Tampilkan object di semua halaman
$pdf->addObject($all, 'all');

$sql = mysql_query("select * from pendaftaran");
$numRows = mysql_num_rows($sql);
if ($Nm_kelas == '++')
  		{
	  		echo "<script language='javascript'>alert('Pilih Kelas');
			  window.location = '../../index.php?module=masterdata_cetaklaporankelas'</script>";
   	}elseif ($Thn_ajaran == 0)
  		{
	  		echo "<script language='javascript'>alert('Pilih Tahun Ajaran');
			  window.location = '../../index.php?module=masterdata_cetaklaporankelas'</script>";
   	}elseif($numRows > 0){
	$i = 1;
	while ($data = mysql_fetch_array($sql)){
		$dataa[$i]=array('<b>NO</b>'=>$i, 
						'<b>NO PENDAFTARAN</b>'=>$data[No_calonsiswa], 
						'<b>NO INDUK</b>'=>$data[No_induk], 
						'<b>NAMA SISWA</b>'=>$data[Nm_lengkap], 
						'<b>L/P</b>'=>$data[Jenkel],
						'<b>TANGGAL LAHIR</b>'=>$data[Tgl_lahir],
						'<b>ALAMAT</b>'=>$data[Alamat_siswa]);
		$i++;
	}
	$pdf->ezTable($dataa, '', '', '');

	$pdf->ezText("\n\nTotal Siswa : {$numRows}");

	// Penomoran halaman
	$pdf->ezStartPageNumbers(425, 15, 8);
	$pdf->ezStream();
}elseif($numRows == 0)
  		{
	  		echo "<script language='javascript'>alert('Data Tidak Ada');
			  window.location = '../../index.php?module=masterdata_cetaklaporankelas'</script>";
   	}
?>