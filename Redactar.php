<!-- **REDACTAR:** -->
<!-- **REDACTAR:** -->

<?php
$USUARIO=$_SESSION["USUARIO"];
$query = mysql_query("SELECT * FROM mensaje WHERE receptor = '$USUARIO' ORDER BY id DESC");
if(mysql_num_rows($query)){
while($row = mysql_fetch_array($query)){

echo "<table>
<tr><td>
De: $row[emisor]
</td></tr>
<tr><td>
Asunto: $row[titulo]
</td></tr>
<tr><td>
Para: $row[receptor]
</td></tr>
<tr><td style='color: #999;'>
Fecha: $row[fecha], $row[hora]
</td></tr>


<!-- ACCIONES ENVIO: -->
<tr><td>
[<a href='/menu.php?id=$row[id]'>Leer mensaje</a>
| <a style='color: #EA57A3;' href='/menu.php?
borrar=$fetch[id]'>Eliminar</a> ]
</td></tr>
</table>
<hr>";
}
}else{
echo 'No hay mensajes<hr>';
}
?>

[ <a style='color: #45B39D;' href="#" >Enviar Mensaje</a> ]

<?php } ?>
<!-- //ACCIONES ENVIO -->





<!-- **FORMULARIO ENVIAR** -->

<div tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div style="background-color:#222;">
<div style='color: grey;' class="apps">
<div class="modal-header">
<h2 style='color: white;'>
<i class="glyphicon glyphicon-envelope"></i>Enviar<span> Mensaje</span></h2>
<h5 style='color: grey;'>

<!-- Proceso de envio:-->
<?php
if(isset($_POST["enviar"])){
$titulo = $_POST["titulo"];
$receptor = $_POST["receptor"];
$emisor = $_POST["emisor"];
$emisorusuario = $_SESSION["USUARIO"];
$mensaje = $_POST["mensaje"];
$hora= date ("H:i:s");
$fecha= date ("j/n/Y");

$query = mysql_query("INSERT INTO mensaje (titulo, receptor, emisor, emisorusuario, mensaje, fecha, hora) 
VALUES ('$titulo','$receptor','$emisor','$emisorusuario','$mensaje','$fecha','$hora')") or die(mysql_error());

echo '<script>alert("El mensaje se envio exitosamente a '.$_POST["receptor"].'")</script>

<!-- Aqui se redirecciona al menu de user, tras el envio -->
<script language="JavaScript" type="text/javascript">
var pagina="/menu.php"
function redireccionar()
{
location.href=pagina
}
setTimeout ("redireccionar()", 200);
</script>';
}
?>
<!-- //Proceso de envio:-->


<!-- el formulario de envio: -->
<?php
$USUARIO=$_SESSION["USUARIO"];
$hora= date ("H:i:s");
$fecha= date ("j/n/Y");

echo'<form name="mp" method="post" action=""><br>

<p>De:<br>
<input type="text" name="emisor" id="emisor">
<input type="hidden" value "'; echo $user; echo'" name="emisorusuario" id="emisorusuario">
</p><br>
<p>Para:<br>
<input type="text" name="receptor" id="receptor">
</p><br>
<p>Asunto:<br>
<input type="text" name="titulo" id="titulo">
</p><br>
<p>Mensaje:<br>
<textarea name="mensaje" id="mensaje" cols="45" rows="5"></textarea>
</p><br><p>';

echo'
<input type="hidden" value="'; echo $fecha; echo'titulo" id="fecha">
<input type="hidden" value="'; echo $hora; echo'titulo" id="hora">
<input type="submit" name="enviar" id="enviar" value="Enviar">
</p>
</form>';
?>
<!-- //el formulario de envio -->

</h5>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- //**FORMULARIO ENVIAR** -->


<!-- **//REDACTAR:** -->
<!-- **//REDACTAR:** -->
