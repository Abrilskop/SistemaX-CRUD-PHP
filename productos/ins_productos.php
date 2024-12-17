<?php 
include '../conexion/conexion.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$nombre = $con->real_escape_string(htmlentities($_POST['producto']));
	$estado = $con->real_escape_string(htmlentities($_POST['Estado']));
	$stock = $con->real_escape_string(htmlentities($_POST['stock']));
	$precio = $con->real_escape_string(htmlentities($_POST['precio']));
	if (empty($nombre) || empty($estado) || empty($stock)|| empty($precio)) {
		header('location:../extend/alerta.php?msj=Hay un campo sin especificar&c=prod&p=in&t=error');
		exit;
	}
	if (!ctype_alpha($nombre)) {
		header('location:../extend/alerta.php?msj=El nombre del producto no contiene solo letras&c=prod&p=in&t=error');
		exit;
	}
	$caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZ ";
	for ($i=0; $i <strlen($nombre) ; $i++) { 
		$buscar = substr($nombre,$i,1);
	if (strpos($caracteres, $buscar) === false) {
		header('location:../extend/alerta.php?msj=El nombre del producto no contiene solo letras&c=prod&p=in&t=error');
		exit;
	}
	}
$productos = strlen($nombre);
if ($productos < 1 || $productos > 15) {
	header('location:../extend/alerta.php?msj=El nombre del producto debe contener entre 1 y 15 caracteres&c=prod&p=in&t=error');
	exit;
}

$ins = $con->query("INSERT INTO productos VALUES('','$nombre','$estado','$stock', '$precio', 1) ");
if ($ins) {
	header('location:../extend/alerta.php?msj=El producto fue registrado con exito&c=prod&p=in&t=success');
}else {
	header('location:../extend/alerta.php?msj=El producto no pudo ser registrado&c=prod&p=in&t=error');
}

$con->close();

}else{
	header('location:../extend/alerta.php?msj=Utiliza el formulario&c=prod&p=in&t=error');
}

 ?>