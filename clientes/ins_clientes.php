<?php 
include '../conexion/conexion.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$nombre = $con->real_escape_string(htmlentities($_POST['nombre']));
	$apellido = $con->real_escape_string(htmlentities($_POST['apellido']));
	$correo = $con->real_escape_string(htmlentities($_POST['correo']));
	$fecha = $con->real_escape_string(htmlentities($_POST['fecha']));
	$telefono = $con->real_escape_string(htmlentities($_POST['telefono']));
	$estado = $con->real_escape_string(htmlentities($_POST['Estado']));
	if (empty($nombre) || empty($apellido) || empty($fecha) || empty($telefono)) {
		header('location:../extend/alerta.php?msj=Hay un campo sin especificar&c=cli&p=in&t=error');
		exit;
	}
	if (!ctype_alpha($nombre)) {
		header('location:../extend/alerta.php?msj=El nombre no contiene solo letras&c=cli&p=in&t=error');
		exit;
	}
	if (!ctype_alpha($apellido)) {
		header('location:../extend/alerta.php?msj=El apellido no contiene solo letras&c=cli&p=in&t=error');
		exit;
	}
	$caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZ ";
	for ($i=0; $i <strlen($nombre) ; $i++) { 
		$bclicar = substr($nombre,$i,1);
	if (strpos($caracteres, $bclicar) === false) {
		header('location:../extend/alerta.php?msj=El nombre no contiene solo letras&c=cli&p=in&t=error');
		exit;
	}
	}
$cliuario = strlen($nombre);
$apell = strlen($apellido);
if ($cliuario < 1 || $cliuario > 15) {
	header('location:../extend/alerta.php?msj=El nombre debe contener entre 1 y 15 caracteres&c=cli&p=in&t=error');
	exit;
}
if ($apell < 1 || $apell > 15) {
	header('location:../extend/alerta.php?msj=El apellido debe contener entre 1 y 15 caracteres&c=cli&p=in&t=error');
	exit;
}

if (!empty($correo)) {
	if (!filter_var($correo,FILTER_VALIDATE_EMAIL)) {
		header('location:../extend/alerta.php?msj=El email no es valido&c=cli&p=in&t=error');
		exit;
	}
}
$ins = $con->query("INSERT INTO clientes VALUES('','$nombre','$apellido','$correo','$fecha','$telefono', '$estado',1) ");
if ($ins) {
	header('location:../extend/alerta.php?msj=El cliente ah sido registrado&c=cli&p=in&t=success');
}else {
	header('location:../extend/alerta.php?msj=El cliente no pudo ser registrado&c=cli&p=in&t=error');
}

$con->close();

}else{
	header('location:../extend/alerta.php?msj=Utiliza el formulario&c=cli&p=in&t=error');
}

 ?>