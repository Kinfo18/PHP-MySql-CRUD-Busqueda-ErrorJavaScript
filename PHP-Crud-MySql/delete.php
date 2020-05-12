<?php 
	include("db.php");

	if(isset($_GET['id'])){
		$nit = $_GET['id'];

		$query = "DELETE FROM distribuidor WHERE dis_nit = $nit";
		$resultado = mysqli_query($conexion, $query);
		if(!$resultado){
			die("fallo de eliminacion");
		}

		$_SESSION['mensaje']='Registro eliminado';
		$_SESSION['tipo_mensaje']='danger';
		header("Location: index.php");
	}
?>