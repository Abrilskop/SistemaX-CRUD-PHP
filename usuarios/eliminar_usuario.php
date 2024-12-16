<?php include '../conexion/conexion.php';
$id = $con->real_escape_string(htmlentities($_GET['id']));

$del = $con->query("DELETE FROM usuario WHERE idUsuario='$id' ");

if ($del) {
	header('location:../extend/alerta.php?msj=Usuario eliminado&c=us&p=in&t=success');
}else{
	header('location:../extend/alerta.php?msj=Usuario no puede ser eliminado&c=us&p=in&t=error');
}

$con->close();
 ?>