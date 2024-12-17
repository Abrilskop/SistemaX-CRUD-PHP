<?php include '../conexion/conexion.php';
$id = $con->real_escape_string(htmlentities($_GET['id']));

$del = $con->query("DELETE FROM productos WHERE idProductos='$id' ");

if ($del) {
	header('location:../extend/alerta.php?msj=Producto eliminado&c=prod&p=in&t=success');
}else{
	header('location:../extend/alerta.php?msj=El producto no puede ser eliminado&c=prod&p=in&t=error');
}

$con->close();
 ?>