<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="/css/menu.css" type="text/css" id="" media="print, projection, screen" />
<script type='text/javascript' src='css/jquery-latest.js'></script>
<script type='text/javascript' src='css/jquery.tablesorter.js'></script>
<script type="text/javascript" src="css/ui/development-bundle/ui/jquery.ui.core.js"></script>  
<script type="text/javascript" src="css/ui/development-bundle/ui/jquery.ui.datepicker.js"></script> 
<script type="text/javascript" src="css/ui/development-bundle/ui/jquery.ui.widget.js"></script> 
<script type="text/javascript" src="css/ui/development-bundle/ui/jquery.ui.datepicker-id.js"></script> 
<title></title>
<style>
.tulisan:link,.tulisan:visited
{ color:black; text-decoration:none;}
.tulisan:hover,.tulisan:active{
color:blue;}
</style>
<script language="JavaScript">
var gAutoPrint = true; // Flag for whether or not to automatically call the print function
function printSpecial()
{
	if (document.getElementById != null)
	{
		var html = '<HTML>\n<HEAD>\n';

		if (document.getElementsByTagName != null)
		{
			var headTags = document.getElementsByTagName("head");
			if (headTags.length > 0)
				html += headTags[0].innerHTML;
		}
		
		html += '\n</HE' + 'AD>\n<BODY>\n';
		
		var printReadyElem = document.getElementById("printReady");
		
		if (printReadyElem != null)
		{
				html += printReadyElem.innerHTML;
		}
		else
		{
			alert("Could not find the printReady section in the HTML");
			return;
		}
			
		html += '\n</BO' + 'DY>\n</HT' + 'ML>';
		
		var printWin = window.open("","printSpecial");
		printWin.document.open();
		printWin.document.write(html);
		printWin.document.close();
		if (gAutoPrint)
			printWin.print();
	}
	else
	{
		alert("Sorry, the print ready feature is only available in modern browsers.");
	}
}
</script>
</head>
<body>
<br><h2><span>Cetak Kwitansi Pendaftaran</span></h2>
<form method="POST" action="modul/mod_cetakkwitansipendaftaran/masterdata_cetakkwitansipendaftaran.php">
<table>
	<tr>
		<td width=150>Kode Pembayaran</td>
		<td width=5>:</td>
		<td> <input name="No_pembayaran" id="No_pembayaran" type="text" size="6" value="<?php $No_pembayaran;?>" /></td>
	</tr>
	<tr>
		<th colspan=3> <input name="tampil" type="submit" value="Tampilkan Data" ></input> </th>
	</tr>
</table>
</form>
</br>
<?php
$hostname	= "localhost";
$username	= "root";
$password	= "";
$database	= "db_mtsmanbaul";
mysql_connect($hostname,$username,$password) or die('Koneksi Gagal');
mysql_select_db($database) or die('Database tidak ditemukan');
//di proses jika sudah klik tombol Tampilkan Data
if(isset($_POST['tampil'])){
	//menangkap nilai form
	$No_pembayaran=$_POST['No_pembayaran'];
	if(empty($No_pembayaran)){
	  				echo "<script language=\"JavaScript\">alert('Masukkan No Pembayaran !');</script>";
   	  				echo "<script language='javascript'> document.location='../../index.php?module=masterdata_cetakkwitansipendaftaran'</script>";	  
   			}else{
		
?>
	<table id="tabel" width="600" cellspacing="0">
  <tr class="alts" >
    <th scope="col" colspan="1"><?php echo "<a href='javascript:void(printSpecial())'  class='tulisan' title='Cetak'><img src='../../images/print.png' border='0' style='padding-right:3px;'/> Cetak</a>"?>&nbsp;&nbsp;&nbsp;&nbsp;<a href="../../index.php?module=masterdata_cetakkwitansipendaftaran" class="tulisan" title="Back"><img src="../../images/home.png" border="0" style="padding-right:3px;" title="Back"/>Back</a>
	</th>
	</tr>
</table>
			<fieldset>			
	<?php
	$query=mysql_query("Select No_pembayaran from pembayaran_formulir;")
	or die("Query failed with error: ".mysql_error());
	$row=mysql_fetch_array($query);
		$query2=mysql_query("Select Nm_lengkap FROM pendaftaran;")
		or die("Query failed with error: ".mysql_error());
		$row2=mysql_fetch_array($query2);
			$query3=mysql_query("Select Biaya FROM pembayaran_formulir;")
			or die("Query failed with error: ".mysql_error());
			$row3=mysql_fetch_array($query3);
				$query4=mysql_query("Select Nm_biaya FROM biaya;")
				or die("Query failed with error: ".mysql_error());
				$row4=mysql_fetch_array($query4);
					$query5=mysql_query("Select Status FROM biaya;")
					or die("Query failed with error: ".mysql_error());
					$row5=mysql_fetch_array($query5);
		}
	?>
<div  id='printReady'>
<div class="module-table-body" align="center">
<table align="center" border="0" width="100%">
<tr>
  <td>
  <img src="../../images/Kwitansi_Diri.jpg" align="left" height="700"></img><br/>
  <font size="15" color="#3f6399"><h3 align="center" size="20"><b>MTS MANBAUL KHAIR</b></h3></font><br/>
  <pre style="font-size:13px;">
  <font size="6" color="#3f6399"><b> No. Pembayaran   	:</font><font size="6"> <?php echo $row['No_pembayaran'];?></font></b><br/>
  <font size="6" color="#3f6399"><b> Nama Siswa 		:</font><font size="6"> <?php echo $row2['Nm_lengkap'];?></font></b><br/>
  <font size="6" color="#3f6399"><b> Uang Sejumlah 	:</font><font size="6"> Rp.<?php echo $row3['Biaya'];?>,-</font></b><br/>
  <font size="6" color="#3f6399"><b> Untuk Pembayaran 	:</font><font size="6"> <?php echo $row4['Nm_biaya'];?></font><br/>
  <font size="6" color="#3f6399"><b> Keterangan 		:</font><font size="6"> <?php echo $row5['Status'];?></font></b>
	</pre>
	<pre style="font-size:16px;">
	<font size="20" color=""><p align="right" ><b>Tangerang,</font><?php $hari_ini=date("d-F-Y"); echo($hari_ini);?> &nbsp; &nbsp; &nbsp;</b>
	<div align="left"> &nbsp; <font size="10"><img src="../../images/rp.jpg">:<b><u><?php echo $row3['Biaya'];?>,-</u></font></b></div>
	</pre>
	</td>
</tr>
</table>
</div> <!-- End .module-table-body -->
</div style="clear: both">
<?php
}
?>
<?php

function Terbilang($x)
{
  $abil = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
  if ($x < 12)
    return " " . $abil[$x];
  elseif ($x < 20)
    return Terbilang($x - 10) . "Belas";
  elseif ($x < 100)
    return Terbilang($x / 10) . " Puluh" . Terbilang($x % 10);
  elseif ($x < 200)
    return " Seratus" . Terbilang($x - 100);
  elseif ($x < 1000)
    return Terbilang($x / 100) . " Ratus" . Terbilang($x % 100);
  elseif ($x < 2000)
    return " Seribu" . Terbilang($x - 1000);
  elseif ($x < 1000000)
    return Terbilang($x / 1000) . " Ribu" . Terbilang($x % 1000);
  elseif ($x < 1000000000)
    return Terbilang($x / 1000000) . " Juta" . Terbilang($x % 1000000);
}
?>
</form>
</body>
</html>