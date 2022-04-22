<?php
$sql="SELECT Kd_kelas FROM kelas ORDER BY Kd_kelas DESC LIMIT 0,1";
	$hasil=mysql_query($sql);
	$dataNum = mysql_fetch_array($hasil);
	$idNum = substr($dataNum[0],-2);
	$autoNum = $idNum+1;
if($autoNum<10)
	$autoNum = "K0".$autoNum;
	elseif($autoNum<100)
	$autoNum = "K00".$autoNum;
	$finalAutoNum = $autoNum;
?>
<html>
	<head>
<style>
.tulisan:link,.tulisan:visited
{ color:black; text-decoration:none;}

.tulisan:hover,.tulisan:active{
color:blue;}
</style>

<script language='JavaScript'>
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
	}
}
</script>
	</head>
<body>
	<br><h2><span>Tambah Kelas</span></h2>
    <div>
		<div><?php include 'proses_kelas.php';?></div>
	</div>	
	<form method="POST" action="">
	<div class="module-table-body">
		<table id="myTable" class="tablesorter">
                  <tr>
					<td width='150'> Kode Kelas </td>
					<td width='15'>:</td>
                    <td>
                        <input type="text" name="Kd_kelas" value="<?php echo "$finalAutoNum" ?>" size="6" maxlength="6" title="Harap Di isi!" readonly="true"/>
                    *)</td>
                  </tr>
                  <tr>
					<td> Nama Kelas </td>
					<td>:</td>
					<td><input type='text' name='Nm_kelas' size='30' maxlength='100'> *)</td>
				</tr>
				<tr>
					<td> Kuota </td>
					<td>:</td>
					<td><input type='text' name='Kuota' size='30' maxlength='100'> *)</td>
				</tr>
				<tr>
					<td colspan=3>*) Isikan secara lengkap </td>
				</tr>
                  <tr>
                    <th colspan='6'><input name="save" type="submit" value="Simpan" onFocus="return simpan('a')">&nbsp;<a onClick='history.go(-1)'><input type="reset" value="Batal" name="reset"></a><a href="index.php?module=masterdata_kelas" class="tulisan"><img src="images/home.png" border="0" style="padding-right:3px;" align="right" title="Back"/></a>
                    </th>
                  </tr>
                </table>
				</form><br/>
        	<div style="clear: both"></div>
		</div> <!-- End .module-table-body -->
</body>
</html>