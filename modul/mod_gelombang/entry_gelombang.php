<?php
$sql="SELECT Kd_gel FROM gelombang ORDER BY Kd_gel DESC LIMIT 0,1";
	$hasil=mysql_query($sql);
	$dataNum = mysql_fetch_array($hasil);
	$idNum = substr($dataNum[0],-4);
	$autoNum = $idNum+1;
if($autoNum<10)
	$autoNum = "KG000".$autoNum;
	elseif($autoNum<100)
	$autoNum = "KG00".$autoNum;
	elseif($autoNum<1000)
	$autoNum = "KG0".$autoNum;
	$finalAutoNum = $autoNum;
$sql2="SELECT Kd_gel FROM Gelombang ORDER BY Nm_gel DESC LIMIT 0,1";
	$hasil2=mysql_query($sql2);
	$dataNum2 = mysql_fetch_array($hasil2);
	$idNum2 = substr($dataNum2[0],-4);
	$autoNum2 = $idNum2+1;
if($autoNum2<10)
	$autoNum2 = "Gelombang-".$autoNum2;
	elseif($autoNum2<100)
	$autoNum2 = "Gelombang-1".$autoNum2;
	elseif($autoNum<1000)
	$autoNum2 = "Gelombang-11".$autoNum2;
	$finalAutoNum2 = $autoNum2;
?>
<html>
<head>
<link rel="stylesheet" href="css/table.css" type="text/css"/>
<link rel="stylesheet" type="text/css" href="css/table.css" />
<link rel="stylesheet" href="css/calendar.css" type="text/css">
<script type="text/javascript" src="js/calendar.js"></script>
<script type="text/javascript" src="js/calendar2.js"></script>
<script type="text/javascript" src="js/jquery-1.2.3.pack.js"></script>
<script type="text/javascript" src="js/jquery.validate.pack.js"></script>
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
	if(document.forms[0].Kd_gel.value==""){
			alert ("Nomor kode gelombang belum di isi!");
			document.forms[0].Kd_gel.focus();
		}
	else if(document.forms[0].Nm_gel.value==""){
			alert ("Nama gelombang belum di isi!");
			document.forms[0].Nm_gel.focus();
		}
	}
}
</script>
</head>
<body>
	<br><h2><span>Formulir gelombang</span></h2>
    <div>
		<div><?php include 'proses_gelombang.php';?></div>
	</div>	
	<form method="POST" action="">
	<div class="module-table-body" align="center">
	<table border="1">
		<tr>
			<td><img src="images/Header2.png" align="center" width="800px"></img></td>
		</tr>
	</table>
		<table id="myTable" class="tablesorter">
                <tr>
                    <td width='150'>Kode Gelombang</td>
					<td width='15'>:</td>
                    <td>
                        <input type="text" name="Kd_gel" value="<?php echo "$finalAutoNum"?>" size="10" maxlength="8" title="Harap Di isi!" readonly="true" />
                    *)</td>
                </tr>
                <tr>
                    <td>Nama Gelombang</td>
					<td>:</td>
                    <td>
                        <input type="text" name="Nm_gel" value="<?php echo "$finalAutoNum2"?>" maxlength="100" size="40" title="Harap Di isi!">
					*)</td>
                </tr>
				<tr>
					<td colspan=3>*) Isikan secara lengkap </td>
				</tr>
                  <tr>
                    <th colspan='6'><input name="save" type="submit" value="Simpan" onFocus="return simpan('a')">&nbsp;<a onClick='history.go(-1)'><input type="reset" value="Batal" name="reset"></a><a href="index.php?module=masterdata_gelombang" class="tulisan"><img src="images/home.png" border="0" style="padding-right:3px;" align="right" title="Back"/></a>
                    </th>
                  </tr>
                </table>
				</form><br/>
        	<div style="clear: both"></div>
		</div> <!-- End .module-table-body -->
</body>
</html>