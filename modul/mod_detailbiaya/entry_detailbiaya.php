<?php
//session_start();
$sql="SELECT Kd_biaya FROM biaya ORDER BY Kd_biaya DESC LIMIT 0,1";
	$hasil=mysql_query($sql);
	$dataNum = mysql_fetch_array($hasil);
	$idNum = substr($dataNum[0],-3);
	$autoNum = $idNum+1;
if($autoNum<10)
	$autoNum = "KB00".$autoNum;
	elseif($autoNum<100)
	$autoNum = "KB0".$autoNum;
	elseif($autoNum<1000)
	$autoNum = "KB".$autoNum;
	$finalAutoNum = $autoNum;
?>
<html>
	<head>
		<title>Master Entry biaya</title>
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
	if(document.forms[0].Kd_biaya.value==""){
			alert ("Kode biaya belum di isi!");
			document.forms[0].Kd_biaya.focus();
		}
	else if(document.forms[0].Nm_biaya.value==""){
			alert ("Nama biaya belum di isi!");
			document.forms[0].Nm_biaya.focus();
		}
	else if(document.forms[0].Thn_ajaran.value==""){
			alert ("Tahun ajaran belum di isi!");
			document.forms[0].Thn_ajaran.focus();
		}
	else if(document.forms[0].Nominal.value==""){
			alert ("Nominal belum di isi!");
			document.forms[0].Nominal.focus();
		}
	else if(document.forms[0].Kd_kelas.value==""){
			alert ("Kode kelas belum di isi!");
			document.forms[0].Kd_kelas.focus();
		}
	else if(document.forms[0].Status.value==""){
			alert ("Status biaya belum di isi!");
			document.forms[0].Status.focus();
		}
	}
}
</script>
	</head>
<body>
	<br><h2><span>Entry biaya</span></h2>
    <div>
		<div><?php include 'proses_detailbiaya.php';?></div>
	</div>	
	<form id="input" name="input" method="POST" action="">
	<div class="module-table-body">
		<table id="myTable" class="tablesorter">
                <tr>
					<td> Kode biaya </td>
					<td>:</td>
                    <td>
                        <input type="text" name="Kd_biaya" id="Kd_biaya" value="<?php echo "$finalAutoNum" ?>" size="6" maxlength="6" title="Harap Di isi!" readonly="true"/>
                    *)</td>
                </tr>
                <tr>
					<td> Nama biaya </td>
					<td>:</td>
					<td><input type="text" name='Nm_biaya' id="Nm_biaya" size='40' maxlength='100' title='Harap Di isi!'> *)</td>
				</tr>
				<tr>
                    <td> Jumlah Biaya </td>
                    <td>:</td>
                    <td><input type="text" name='Biaya' id="Biaya" size='20' onKeyUp="angka(event)" title='Harap Di isi!'> *)</td>
                </tr>
				<tr>
                    <td> Status </td>
                    <td>:</td>
                    <td><input type="text" name='Status' id="Status" size='20' title='Harap Di isi!'> *)</td>
                </tr>
				</tr>
				<tr>
					<td colspan=3>*) Isikan secara lengkap </td>
				</tr>
                  <tr>
                    <th colspan='6'><input name="save" type="submit" value="Simpan" onFocus="return simpan('a')">&nbsp;<a onClick='history.go(-1)'><input type="reset" value="Batal" name="reset"></a><a href="index.php?module=masterdata_detailbiaya'>" class="tulisan"><img src="images/home.png" border="0" style="padding-right:3px;" align="right" title="Back"/></a>
                    </th>
                  </tr>
                </table>
				</form><br/>
        	<div style="clear: both"></div>
		</div> <!-- End .module-table-body -->
</body>
</html>