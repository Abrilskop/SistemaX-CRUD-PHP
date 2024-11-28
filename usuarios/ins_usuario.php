<?php
include './conexion/conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nick = $con->real_escape_string(htmlentities($_POST['nick']));
    $pass1 = $con->real_escape_string(htmlentities($_POST['pass1']));
    $nivel = $con->real_escape_string(htmlentities($_POST['nivel']));
    $nombre = $con->real_escape_string(htmlentities($_POST['nombre']));
    $correo = $con->real_escape_string(htmlentities($_POST['correo']));

    if (empty($nick) || empty($pass1) || empty($nivel) || empty($nombre)) {
        header("Location: ../extend/alerta.php?msj=Hay un campo sin especificar&c=us&p=in&t=error");
        exit;
    }

    if (!ctype_alpha($nick)) {
        header('Location: ../extend/alerta.php?msj=El nick no contiene solo letras&c=us&p=in&t=error');
        exit;
    }

    if (!ctype_alpha($nivel)) {
        header('Location: ../extend/alerta.php?msj=El nivel no contiene solo letras&c=us&p=in&t=error');
        exit;
    }

    $caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZ ";
    for ($i = 0; $i < strlen($nombre); $i++) {
        $buscar = substr($nombre, $i, 1);
        if (strpos($caracteres, $buscar) === false) {
            header('Location: ../extend/alerta.php?msj=El nombre no contiene solo letras&c=us&p=in&t=error');
            exit;
        }
    }

    if (strlen($nick) < 8 || strlen($nick) > 15) {
        header("Location: ../extend/alerta.php?msj=El nick debe contener entre 8 y 15 caracteres&c=us&p=in&t=error");
        exit;
    }

    if (strlen($pass1) < 8 || strlen($pass1) > 15) {
        header('Location: ../extend/alerta.php?msj=La contraseña debe contener entre 8 y 15 caracteres&c=us&p=in&t=error');
        exit;
    }

    if (empty($correo) || !filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        header('Location: ../extend/alerta.php?msj=El email no es válido&c=us&p=in&t=error');
        exit;
    }

    if ($_FILES['foto']['tmp_name']) {
        $archivo = $_FILES['foto']['tmp_name'];
        $nombrearchivo = $_FILES['foto']['name'];
        $info = pathinfo($nombrearchivo);
        $extension = strtolower($info['extension']);

        if ($extension == 'png' || $extension == 'jpg') {
            $ruta = 'foto_perfil/' . $nick . '.' . $extension;
            move_uploaded_file($archivo, $ruta);
        } else {
            header('Location: ../extend/alerta.php?msj=El formato no es válido&c=us&p=in&t=error');
            exit;
        }
    } else {
        $ruta = 'foto_perfil/perfil.png';
    }

    $pass1 = password_hash($pass1, PASSWORD_DEFAULT);

    $ins = $con->query("INSERT INTO usuario (nick, nombre, pass, correo, nivel, foto) VALUES ('$nick', '$nombre', '$pass1', '$correo', '$nivel', '$ruta')");

    if ($ins) {
        header('Location: ../extend/alerta.php?msj=El usuario ha sido registrado&c=us&p=in&t=success');
    } else {
        header('Location: ../extend/alerta.php?msj=El usuario no pudo ser registrado&c=us&p=in&t=error');
    }

    $con->close();
} else {
    header("Location: ../extend/alerta.php?msj=Utiliza el formulario&c=us&p=in&t=error");
}
?>
