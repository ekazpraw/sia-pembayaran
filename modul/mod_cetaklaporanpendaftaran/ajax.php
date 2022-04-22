<script type="text/javascript">
function GetXmlHttpObject() 
{ 
var xmlHttp=null; 
try 
 	{ 
 	// Firefox, Opera 8.0+, Safari 
 	xmlHttp=new XMLHttpRequest(); 
 	} 
	catch (e) 
 	{ 
 	//Internet Explorer 
 	try 
 	{ 
 	xmlHttp=new ActiveXObject("Msxml2.XMLHTTP"); 
  	} 
 	catch (e) 
  	{ 
  	xmlHttp=new ActiveXObject("Microsoft.XMLHTTP"); 
  	} 
 	} 
return xmlHttp; 
}
</script>

 <select name='Thn_ajaran'>
<option value='0'>- Pilih -</option>
<?php
$sql = mysql_query("SELECT DISTINCT Thn_ajaran FROM pendaftaran");
while ($data = mysql_fetch_array($sql)){
	 echo "<option value=".$data['Thn_ajaran'].">".$data['Thn_ajaran']."</option>";
}
?>

</select>