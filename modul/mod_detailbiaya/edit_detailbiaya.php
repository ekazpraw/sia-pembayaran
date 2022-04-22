<html>
<head>
<title></title>
<style>
.tulisan:link,.tulisan:visited
{ color:black; text-decoration:none;}

.tulisan:hover,.tulisan:active{
color:blue;}
</style>

<script type="text/javascript">

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
	else if(document.forms[0].Biaya.value==""){
			alert ("Biaya belum di isi!");
			document.forms[0].Biaya.focus();
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

<?php
$Kd_biaya = $_GET['Kd_biaya'];
$hasil = mysql_query("select * from Biaya where Kd_biaya='$Kd_biaya'") or die(mysql_error());
$row = mysql_fetch_array($hasil);
?>
<br><h2><span>Ubah Jenis Detail Biaya</span></h2>
<div><?php include 'proses_edit_detailbiaya.php'; ?></div>
<form method="POST" action="">
<input type="hidden" name="Kd_biaya" value="<?php echo $Kd_biaya; ?>">
	<div class="module-table-body">
		<table id="myTable" class="tablesorter">
                <tr>
					<td> Kode biaya </td>
					<td>:</td>
                    <td>
                        <input type="text" name="Kd_biaya" id="Kd_biaya" value="<?php echo $row['Kd_biaya'] ;?>" value="<?php echo "$finalAutoNum" ?>" size="6" maxlength="6" title="Harap Di isi!" readonly="true"/>
                    *)</td>
                </tr>
                <tr>
					<td> Nama biaya </td>
					<td>:</td>
					<td><input type="text" name='Nm_biaya' id="Nm_biaya" value="<?php echo $row['Nm_biaya'] ;?>" size='40' maxlength='100' title='Harap Di isi!'> *)</td>
				</tr>
				<tr>
                    <td> Jumlah Biaya </td>
                    <td>:</td>
                    <td><input type="text" name='Biaya' id="Biaya" size='20' value="<?php echo $row['Biaya'] ;?>" onKeyUp="angka(event)" title='Harap Di isi!'> *)</td>
                </tr>
				<tr>
                    <td> Status </td>
                    <td>:</td>
                    <td><input type="text" name='Status' id="Status" size='20' value="<?php echo $row['Status'];?>" title='Harap Di isi!'> *)</td>
                </tr>
				<tr>
					<td colspan=3>*) Isikan secara lengkap </td>
				</tr>
                  <tr>
                    <th colspan='6'><input name="edit" type="submit" value="Ubah" onFocus="return ubah('a')" onclick="return confirm('Anda yakin ingin merubah data ini?');">&nbsp;<a href="index.php?module=jenis_bayar" class="tulisan"><img src="images/home.png" border="0" style="padding-right:3px;" align="right" title="Back"/></a>
                    </th>
                  </tr>
                </table>
				</form><br/>
        	<div style="clear: both"></div>
		</div> <!-- End .module-table-body -->
</body>
</html>	