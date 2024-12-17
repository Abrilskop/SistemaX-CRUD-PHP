<?php include '../conexion/conexion.php';
$id = $con->real_escape_string(htmlentities($_GET['prod']));
$bloqueo = $con->real_escape_string(htmlentities($_GET['bl']));

if ($bloqueo == 1) {
	$up = $con->query("UPDATE productos SET Bloqueo=0 WHERE idProductos='$id' ");
	if ($up) {
		header('location:../extend/alerta.php?msj=El producto ha sido bloqueado&c=prod&p=in&t=success');
	}else{
		header('location:../extend/alerta.php?msj=El producto no ha sido bloqueado&c=prod&p=in&t=error');
	}
}
else{
	$up = $con->query("UPDATE productos SET Bloqueo=1 WHERE idProductos='$id' ");
	if ($up) {
		header('location:../extend/alerta.php?msj=El producto ha sido desbloqueado&c=prod&p=in&t=success');
	}else{
		header('location:../extend/alerta.php?msj=El producto no ha sido bloqueado&c=prod&p=in&t=error');
	}
}
$con->close();
 ?>