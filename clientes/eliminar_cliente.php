<?php include '../conexion/conexion.php';
$id = $con->real_escape_string(htmlentities($_GET['id']));

$del = $con->query("DELETE FROM clientes WHERE idClientes='$id' ");

if ($del) {
	header('location:../extend/alerta.php?msj=Cliente eliminado&c=cli&p=in&t=success');
}else{
	header('location:../extend/alerta.php?msj=El cliente no puede ser eliminado&c=cli&p=in&t=error');
}

$con->close();
 ?>