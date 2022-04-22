<?php
$sql="SELECT No_calonsiswa FROM calon_siswa ORDER BY No_calonsiswa DESC LIMIT 0,1";
	$hasil=mysql_query($sql);
	$dataNum = mysql_fetch_array($hasil);
	$idNum = substr($dataNum[0],-4);
	$autoNum = $idNum+1;
if($autoNum<10)
	$autoNum = "PSB000".$autoNum;
	elseif($autoNum<100)
	$autoNum = "PSB00".$autoNum;
	elseif($autoNum<1000)
	$autoNum = "PSB0".$autoNum;
	$finalAutoNum = $autoNum;
?>
<html>
<head>
		<link rel="stylesheet" href="css/calendar.css" type="text/css">
		<script type="text/javascript" src="js/calendar.js"></script>
		<script type="text/javascript" src="js/calendar2.js"></script>

<style>
.tulisan:link,.tulisan:visited
{ color:black; text-decoration:none;}

.tulisan:hover,.tulisan:active{
color:blue;}
</style>

<script language='JavaScript'>

function angka(e){
	var el=e.target;
	if(el.value.toString().match(/^[0-9]+$/)==null){
		el.value=el.value.substring(0,el.value.length-1);
	}
}

function simpan(save){
var check = (save=="a") ? true : false;
if(check){
	if(document.forms[0].Thn_ajaran.value==""){
			alert ("Tahun ajaran belum di isi!");
			document.forms[0].Thn_ajaran.focus();
		}
	else if(document.forms[0].No_calonsiswa.value==""){
			alert ("Nomor calon siswa belum di isi!");
			document.forms[0].No_calonsiswa.focus();
		}
	else if(document.forms[0].Nm_pembeli.value==""){
			alert ("Nama pembeli belum di isi!");
			document.forms[0].Nm_pembeli.focus();
		}
	else if(document.forms[0].Nm_calonsiswa.value==""){
			alert ("Nama calon siswa belum di isi!");
			document.forms[0].Nm_calonsiswa.focus();
		}
	else if(document.forms[0].Jenkel.value==""){
			alert ("Jenis kelamin belum di pilih!");
			document.forms[0].Jenkel.focus();
		}
	}
}
</script>
</head>

<body>
	<br><h2><span>Formulir Siswa</span></h2>
    
    <div>
		<div><?php include 'proses_siswa.php';?></div>
	</div>	
	<form method="POST" action="">
	<div class="module-table-body" align="center">
	<table border="1">
		<tr>
			<td><img src="images/Header2.png" align="center" width="800px"></img></td>
		</tr>
		<tr class="alts" align="center">
			<th scope="col" colspan="9">
				&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
				&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
				&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
				&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
				&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
				Tahun Ajaran : <input name="Thn_ajaran" id="Thn_ajaran" type="text" size="10" value="20/20" title="Harap Di isi!"> *)
			</th>
		</tr>
	</table>
		<table id="myTable" class="tablesorter">
                  <tr rows="2">
                    <td width='150' align="left">Nomor Calon Siswa</td>
					<td width='15' align="center">:</td>
                    <td><input type="text" name="No_calonsiswa" value="<?php echo "$finalAutoNum"?>" size="10" maxlength="8" title="Harap Di isi!" readonly="true" /> *)</td>
					<td width='150' align="left">Kode Gelombang</td>
					<td width='15' align="center">:</td>
                    <td><select name='Kd_Gel'>
					<option value='0'>- Pilih -</option>
						<?php $sql = mysql_query("SELECT Kd_Gel FROM Gelombang");
						while ($data = mysql_fetch_array($sql)){
						echo "<option value=".$data['Kd_Gel'].">".$data['Kd_Gel']."</option>";}?>
					</select> *)</td>
                  </tr>
                  <tr>
                    <td align="left">Nama Pembeli</td>
					<td align="center">:</td>
                    <td><input type="text" name="Nm_pembeli" maxlength="100" size="40" title="Harap Di isi!"> *)</td>
                  </tr>
				  <tr>
                    <td align="left">Nama Calon Siswa</td>
					<td align="center">:</td>
                    <td><input type="text" name="Nm_calonsiswa" maxlength="100" size="40" title="Harap Di isi!"> *)</td>
                  </tr>
                  <tr>
                    <td align="left">Jenis Kelamin </td>
                    <td align="center">:</td>
                    <td><input type='radio' name='Jenkel' value='Laki-laki' title="Harap Di isi!">Laki-Laki /<input type='radio' name='Jenkel' value='Perempuan' title="Harap Di isi!">Perempuan *)</td>
                </tr>
				<tr>
					<td colspan=3>*) Isikan secara lengkap </td>
				</tr>
                  <tr>
                    <th colspan='6'><input name="save" type="submit" value="Simpan" onFocus="return simpan('a')">&nbsp;<a onClick='history.go(-1)'><input type="reset" value="Batal" name="reset"></a><a href="index.php?module=masterdata_siswa" class="tulisan"><img src="images/home.png" border="0" style="padding-right:3px;" align="right" title="Back"/></a>
                    </th>
                  </tr>
        </table>
				</form><br/>
        	<div style="clear: both"></div>
		</div> <!-- End .module-table-body -->
</body>
</html>