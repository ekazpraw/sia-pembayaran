<?php 
include "../../koneksi/koneksi.php";
echo "<br/> Tahun Ajaran : ";
echo "<select name='Thn_ajaran'>";
echo "<option value='0'>- Pilih -</option>";
$sql = mysql_query("SELECT DISTINCT Thn_ajaran FROM pendaftaran"); 
while ($data = mysql_fetch_array($sql)){
	echo "<option value='$data[Thn_ajaran]'>$data[Thn_ajaran]</option>";
}
echo "</select>";
?>