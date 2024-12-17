<?php include '../conexion/conexion.php';
$id = $con->real_escape_string(htmlentities($_GET['cli']));
$bloqueo = $con->real_escape_string(htmlentities($_GET['bl']));

if ($bloqueo == 1) {
	$up = $con->query("UPDATE clientes SET Bloqueo=0 WHERE idClientes='$id' ");
	if ($up) {
		header('location:../extend/alerta.php?msj=El cliente ha sido bloqueado&c=cli&p=in&t=success');
	}else{
		header('location:../extend/alerta.php?msj=El cliente no ha sido bloqueado&c=cli&p=in&t=error');
	}
}
else{
	$up = $con->query("UPDATE clientes SET Bloqueo=1 WHERE idClientes='$id' ");
	if ($up) {
		header('location:../extend/alerta.php?msj=El cliente ha sido desbloqueado&c=cli&p=in&t=success');
	}else{
		header('location:../extend/alerta.php?msj=El cliente no ha sido bloqueado&c=cli&p=in&t=error');
	}
}
$con->close();
 ?>