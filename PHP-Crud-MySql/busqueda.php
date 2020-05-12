<?php 
	include("db.php");

	if (isset($_POST['buscar'])) {
		$busqueda = $_POST['buscar'];
		
	$query = "SELECT * FROM distribuidor WHERE dis_nombre LIKE '%$busqueda%' OR dis_nit LIKE '%$busqueda%'";
	$sql_query = mysqli_query($conexion, $query);

	if(!$sql_query){
			$_SESSION['mensaje'] = 'Registro no encontrado';
			$_SESSION['tipo_mensaje'] = 'warnig';
	}

	$_SESSION['mensaje'] = 'Registro encontrado';
	$_SESSION['tipo_mensaje'] = 'success';
	header("Location: index.php");
?>