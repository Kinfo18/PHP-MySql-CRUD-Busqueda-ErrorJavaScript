<?php 
	include("db.php");

	if(isset($_GET['id'])){
		$nit = $_GET['id'];

		$query = "SELECT* FROM distribuidor WHERE dis_nit = $nit";

		$resultado = mysqli_query($conexion, $query);
		if(mysqli_num_rows($resultado) == 1){
			$fila = mysqli_fetch_array($resultado);
			$nombre = $fila['dis_nombre'];
			$direccion = $fila['dis_direccion'];
			$contacto = $fila['dis_contacto'];
		}
	}

	if (isset($_POST['update'])) {
		$nit = $_GET['id'];
		$nombre = $_POST['nombre'];
		$direccion = $_POST['direccion'];
		$contacto = $_POST['contacto'];

		$query = "UPDATE distribuidor SET dis_nombre = '$nombre', dis_direccion = '$direccion', dis_contacto = '$contacto' WHERE dis_nit = $nit";

		mysqli_query($conexion, $query);
		$_SESSION['mensaje'] = 'Registro actualizado';
		$_SESSION['tipo_mensaje'] = 'primary';

		header("Location: index.php");
	}
?>

<?php 
	include("includes/header.php");
?>
<div class="container p-4">
	<div class="row">
		<div class="col-md-4 mx-auto">
			<div class="card card-body">
				<form action="update.php?id=<?php echo $_GET['id']; ?>" method = "POST">
					<div class="form-group">
						<input type="text" name="nombre" value="<?php 
																echo $nombre; 
															?>" 
															class="form-control" placeholder="Nombre">
					</div>
					<div class="form-group">
						<input type="text" name="direccion" value="<?php 
																echo $direccion; 
															?>" 
															class="form-control" placeholder="Direccion">
					</div>
					<div class="form-group">
						<input type="text" name="contacto" value="<?php 
																echo $contacto; 
															?>" 
															class="form-control" placeholder="Contacto">
					</div>
					<button class="btn btn-success" name = "update" >
						Actualizar
					</button>
				</form>
			</div>
		</div>
	</div>
</div>
<?php 
	include("includes/footer.php");
?>