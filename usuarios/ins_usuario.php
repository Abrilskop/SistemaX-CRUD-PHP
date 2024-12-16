<?php 
include '../conexion/conexion.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$nick = $con->real_escape_string(htmlentities($_POST['nick']));
	$pass1 = $con->real_escape_string(htmlentities($_POST['pass1']));
	$nivel = $con->real_escape_string(htmlentities($_POST['nivel']));
	$nombre = $con->real_escape_string(htmlentities($_POST['nombre']));
	$correo = $con->real_escape_string(htmlentities($_POST['correo']));
	if (empty($nick) || empty($pass1) || empty($nivel) || empty($nombre)) {
		header('location:../extend/alerta.php?msj=Hay un campo sin especificar&c=us&p=in&t=error');
		exit;
	}
	if (!ctype_alpha($nick)) {
		header('location:../extend/alerta.php?msj=El nick no contiene solo letras&c=us&p=in&t=error');
		exit;
	}
	if (!ctype_alpha($nivel)) {
		header('location:../extend/alerta.php?msj=El nivel no contiene solo letras&c=us&p=in&t=error');
		exit;
	}
	$caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZ ";
	for ($i=0; $i <strlen($nombre) ; $i++) { 
		$buscar = substr($nombre,$i,1);
	if (strpos($caracteres, $buscar) === false) {
		header('location:../extend/alerta.php?msj=El nombre no contiene solo letras&c=us&p=in&t=error');
		exit;
	}
	}

$usuario = strlen($nick);
$contra = strlen($pass1);
if ($usuario < 1 || $usuario > 15) {
	header('location:../extend/alerta.php?msj=El nick debe contener entre 1 y 15 caracteres&c=us&p=in&t=error');
	exit;
}
if ($contra < 1 || $contra > 15) {
	header('location:../extend/alerta.php?msj=La contraseña debe contener entre 8 y 15 caracteres&c=us&p=in&t=error');
	exit;
}

if (!empty($correo)) {
	if (!filter_var($correo,FILTER_VALIDATE_EMAIL)) {
		header('location:../extend/alerta.php?msj=El email no es valido&c=us&p=in&t=error');
		exit;
	}
}

$extension = '';
$ruta = 'foto_perfil';
$archivo=$_FILES['foto']['tmp_name'];
$nombrearchivo=$_FILES['foto']['name'];
$info = pathinfo($nombrearchivo);
if ($archivo !='') {
	$extension =$info['extension'];
	if ($extension == "png" || $extension == "PNG" || $extension == "jpg" || $extension == "JPG") {
		move_uploaded_file($archivo, 'foto_perfil/'.$nick.'.'.$extension);
		$ruta = $ruta."/".$nick.'.'.$extension;
	}else{
		header('location:../extend/alerta.php?msj=El formato no es valido&c=us&p=in&t=error');
		exit;
	}
}else{
	$ruta = "foto_perfil/perfil.png";
}

$pass1 = sha1($pass1);
$ins = $con->query("INSERT INTO usuario VALUES('','$nick','$nombre','$pass1','$correo','$nivel',1,'$ruta') ");
if ($ins) {
	header('location:../extend/alerta.php?msj=Usuario registrado con exito!&c=us&p=in&t=success');
}else {
	header('location:../extend/alerta.php?msj=El Usuario no pudo ser registrado&c=us&p=in&t=error');
}

$con->close();

}else{
	header('location:../extend/alerta.php?msj=Utiliza el formulario&c=us&p=in&t=error');
}

 ?>