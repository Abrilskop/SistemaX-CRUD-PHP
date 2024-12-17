<?php 
include '../conexion/conexion.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$cliente = $con->real_escape_string(htmlentities($_POST['id']));
	$estado = $con->real_escape_string(htmlentities($_POST['Estado']));
$up = $con->query("UPDATE clientes SET Estado='$estado' WHERE idClientes='$cliente' ");
if ($up) {
		header('location:../extend/alerta.php?msj=Estado actualizado&c=cli&p=in&t=success');
	}else{
		header('location:../extend/alerta.php?msj=El estado del cliente no puede ser actualizado&c=cli&p=in&t=error');
	}
}else{
		header('location:../extend/alerta.php?msj=Actualiza el formulario&c=cli&p=in&t=error');
}
$con->close();
 ?>