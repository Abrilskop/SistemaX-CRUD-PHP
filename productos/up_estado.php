<?php 
include '../conexion/conexion.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$producto = $con->real_escape_string(htmlentities($_POST['id']));
	$estado = $con->real_escape_string(htmlentities($_POST['Estado']));
$up = $con->query("UPDATE productos SET Estado='$estado' WHERE idProductos='$producto' ");
if ($up) {
		header('location:../extend/alerta.php?msj=Estado actualizado&c=prod&p=in&t=success');
	}else{
		header('location:../extend/alerta.php?msj=El esatdo del producto no puede ser actualizado&c=prod&p=in&t=error');
	}
}else{
		header('location:../extend/alerta.php?msj=Actualiza el formulario&c=prod&p=in&t=error');
}
$con->close();
 ?>