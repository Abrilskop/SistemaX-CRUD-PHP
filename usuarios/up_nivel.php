<?php 
include '../conexion/conexion.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$id = $con->real_escape_string(htmlentities($_POST['id']));
	$nivel = $con->real_escape_string(htmlentities($_POST['nivel']));
$up = $con->query("UPDATE usuario SET nivel='$nivel' WHERE idUsuario='$id' ");
if ($up) {
		header('location:../extend/alerta.php?msj=Nivel actualizado&c=us&p=in&t=success');
	}else{
		header('location:../extend/alerta.php?msj=El nicel del usuario no puede ser actualizado&c=us&p=in&t=error');
	}
}else{
		header('location:../extend/alerta.php?msj=Actualiza el formulario&c=us&p=in&t=error');
}
$con->close();
 ?>