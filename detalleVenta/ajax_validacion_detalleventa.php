<?php  
	include '../conexion/conexion.php';

	$cantidad=$con->real_escape_string($_POST['cantidad']);

	$sel=$con->query("SELECT idDetalleVenta FROM detalleventa WHERE Cantidad='$cantidad' ");
	$row=mysqli_num_rows($sel);
	if($row !=0)
	{
		echo"<label style='color:red;'>El numero de la cantidad ya existe</label>";
	}
	else
	{
		echo"<label style='color:green;'>El numero de la cantidad esta disponible</label>";
	}
	$con->close();	
?>