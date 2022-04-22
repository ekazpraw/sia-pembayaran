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
function simpan(save){
var check = (save=="a") ? true : false;
if(check){
	if(document.forms[0].Kd_kelas.value==""){
			alert ("Kode Kelas belum di isi!");
			document.forms[0].Kd_kelas.focus();
		}
	else if(document.forms[0].Nm_kelas.value==""){
			alert ("Nama Kelas belum di isi!");
			document.forms[0].Nm_kelas.focus();
		}
	else if(document.forms[0].Kuota.value==""){
			alert ("Nama Kelas belum di isi!");
			document.forms[0].Kuota.focus();
		}
	}
}
</script>
</head>
<body>
<?php
$Kd_kelas = $_GET['Kd_kelas'];
$hasil = mysql_query("select * from kelas where Kd_kelas='$Kd_kelas'") or die(mysql_error());
$row = mysql_fetch_array($hasil);
?>
<br><h2><span>Ubah kelas</span></h2>
<div><?php include 'proses_edit_kelas.php'; ?></div>
<form method="POST" action="">
<input type="hidden" name="Kd_kelas" value="<?php echo $Kd_kelas; ?>">
	<div class="module-table-body">
		<table id="myTable" class="tablesorter">
                 <tr>
					<td width='150'> Kode Kelas </td>
					<td width='15'>:</td>
                    <td>
                        <input type="text" name="Kd_kelas" value="<?php echo $row['Kd_kelas']; ?>" size="6" maxlength="6" title="Harap Di isi!" disabled="disabled"/>
                    *)</td>
                 </tr>
                 <tr>
					<td> Nama Kelas </td>
					<td>:</td>
					<td><input type='text' name='Nm_kelas' size='30' maxlength='100' value="<?php echo $row['Nm_kelas'] ;?>" title="Harap Di isi!"> *)</td>
				</tr>
				<tr>
					<td> Kuota </td>
					<td>:</td>
					<td><input type='text' name='Kuota' size='30' maxlength='100' value="<?php echo $row['Kuota'] ;?>" title="Harap Di isi!"> *)</td>
				</tr>
				<tr>
					<td colspan=3>*) Isikan secara lengkap </td>
				</tr>
                <tr>
                    <th colspan='6'><input name="edit" type="submit" value="Ubah" onFocus="return ubah('a')" onclick="return confirm('Anda yakin ingin merubah data ini?');">&nbsp;<a href="index.php?module=proses_edit_kelas" class="tulisan"><img src="images/home.png" border="0" style="padding-right:3px;" align="right" title="Back"/></a>
                </th>
                  </tr>
                </table>
				</form><br/>
        	<div style="clear: both"></div>
		</div> <!-- End .module-table-body -->
</body>
</html>	