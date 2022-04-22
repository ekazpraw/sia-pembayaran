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

function kirim(id) 
{ 
var xmlHttp=GetXmlHttpObject()	 
var url="modul/mod_cetaklaporankelas/ajax2.php"; 
url1=url+"?id="+id; 
xmlHttp.onreadystatechange=hasil; 
function hasil() 
	{ 
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete") 
 	              {	     
                      document.getElementById("tampil").innerHTML=xmlHttp.responseText; 
 	              } 
	else 
    	              { 
    	               alert("Problem retrieving data:" + xmlhttp.statusText); 
    	               }	 
	} 
	xmlHttp.open("GET",url1,true); 
	xmlHttp.send(null); 	 
}
</script>
<select name="Nm_kelas" OnChange="kirim(this.value)">
<option value='++'>- Pilih Kelas -</option>
<?php
$sql = mysql_query("SELECT * FROM kelas");
while ($data = mysql_fetch_array($sql)){
	echo "<option value='$data[Nm_kelas]'>$data[Nm_kelas]</option>";
}
?>
</select>
<div id="tampil"> </div> 