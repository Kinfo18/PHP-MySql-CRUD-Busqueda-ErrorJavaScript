<?php
	include ("db.php");

	if(isset($_POST['insert'])){
		$nit = $_POST['nit'];
		$nombre = $_POST['nombre'];
		$direccion = $_POST['direccion'];
		$contacto = $_POST['contacto'];

		$query = "INSERT INTO distribuidor VALUES ($nit, '$nombre', '$direccion', '$contacto')";

		$resultado = mysqli_query($conexion, $query);

		if(!$resultado){
			die("Query Failed");
		}

		$_SESSION['mensaje'] = 'Registro satisfactorio';
		$_SESSION['tipo_mensaje'] = 'success';

		header("Location: index.php");
	}
?>