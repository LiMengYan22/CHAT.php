
<!-- **BANDEJA DE ENTRADA** -->
<!-- **BANDEJA DE ENTRADA** -->


<!-- BORRAR MENSAJE: -->
<?php
if(isset($_GET["borrar"])){
mysql_query("DELETE FROM mensaje WHERE id = '$_GET[borrar]'");
echo " <script>alert('El mensaje número $_GET[borrar] ha sido eliminado'); document.location=('/menu.php')</script>";
}
?>
<!-- //BORRAR MENSAJE -->


<!-- RECIBIR: -->
<?php
if(isset($_GET["id"])){
$sql = mysql_query("SELECT * FROM mensaje WHERE id = '$_GET[id]'");
$fetch = mysql_fetch_array($sql);
$receptor =$fetch[receptor];
$emisor =$fetch[emisorusuario];

echo"<table>
<tr><td>
De: $fetch[emisor] <b style='color: #333;'> ID: $fetch[emisorusuario]</b>
</td></tr>
<tr><td> 
Para: $fetch[receptor] 
</td></tr>
<tr><td style='color: #999;'>
Fecha: $fetch[fecha] Hora: $fetch[hora]
</td></tr>
<tr><td>
Asunto: $fetch[titulo]
</td></tr>
<tr><td>
Mensaje: $fetch[mensaje]
</td></tr>
</table>
<!-- //RECIBIR -->


<!-- ACCIONES SIMPLES BUZÓN: -->
<hr>
[ <a style='color: #45B39D;' href='/menu.php'> Volver</a> | 
<a href='/menu.php?borrar=$fetch[id]'> Eliminar</a> | 
<a style='color: #;' href='#?receptor=$receptor&emisor=$emisor'> Responder</a> ]";
}else{ 
?>
<!-- //ACCIONES SIMPLES BUZÓN -->


<!-- **//BANDEJA DE ENTRADA** -->
<!-- **//BANDEJA DE ENTRADA** -->




