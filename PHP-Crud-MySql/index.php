<?php
	include("db.php")
?>
<?php 
	include("includes/header.php")
?>
<div class="container p-4">
	<div class="row">
		<div class="col-md-4">
			<div class="card card-body">
				<form action="index.php" method="POST">
					<div class="form-group">
						<input type="text" name="busqueda" class="form-control" placeholder="Busqueda" autofocus>
					</div>
					<input type="submit"   name="buscar" class="btn btn-success" value="Buscar">
				</form>
			</div>
		</div>
		<div class="col-md-8">
			<table class="table table-bordered" name="e">
				<thead>
					<th>Nit</th>
					<th>Nombre</th>
					<th>Direccion</th>
					<th>Contacto</th>
				</thead>
				<tbody>
					<?php 
						include("busqueda.php");
						while ($fila = mysqli_fetch_array($sql_query)){
					?>	
					<tr>
						<td>
							<?php 
								echo $fila['dis_nit']; 
							?>	
						</td>
						<td>
							<?php 
								echo $fila['dis_nombre']; 
							?>	
						</td>
						<td>
							<?php 
								echo $fila['dis_direccion']; 
							?>	
						</td>
						<td>
							<?php 
								echo $fila['dis_contacto']; 
							?>	
						</td>
						<td>
							<a href="update.php?id=<?php echo $fila['dis_nit'] ?>" class="btn btn-secondary">
								<i class="fas fa-marker">
								</i>
							</a>
							<a href="delete.php?id=<?php echo $fila['dis_nit'] ?>" class="btn btn-danger">
								<i class="far fa-trash-alt">
								</i>
							</a>
						</td>
					</tr>
					<?php 
						}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<div class="container p-4">
	<div class="row">
		<div class="col-md-4">
			<?php 
				if(isset($_SESSION['mensaje'])){ 
			?>
					<div class="alert alert-<?= $_SESSION['tipo_mensaje']?> alert-dismissible fade show" role="alert">
  						<?= $_SESSION['mensaje'] ?>
  						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    						<span aria-hidden="true">&times;</span>
  						</button>
					</div>
			<?php
				session_unset();
				}
			?>
			<div class="card card-body">
				<form action="insert.php" method="POST">
					<div class="form-group">
						<input type="text" name="nit" class="form-control" placeholder="Nit" autofocus>
					</div>
					<div class="form-group">
						<input type="text" name="nombre" class="form-control" placeholder="Nombre" autofocus>
					</div>
					<div class="form-group">
						<input type="text" name="direccion" class="form-control" placeholder="Direccion" autofocus>
					</div>
					<div class="form-group">
						<input type="text" name="contacto" class="form-control" placeholder="Contacto" autofocus>
					</div>
					<input type="submit" class="btn btn-success btn-block" name="insert" value="Insertar">
				</form>
			</div>
		</div>
		<div class="col-md-8">
			<table class="table table-bordered">
				<thead>
					<th>Nit</th>
					<th>Nombre</th>
					<th>Direccion</th>
					<th>Contacto</th>
				</thead>
				<tbody>
					<?php 
						$query = "SELECT * FROM distribuidor;";
						$resultado = mysqli_query($conexion, $query);

						while ($fila = mysqli_fetch_array($resultado)){
					?>	
					<tr>
						<td>
							<?php 
								echo $fila['dis_nit']; 
							?>	
						</td>
						<td>
							<?php 
								echo $fila['dis_nombre']; 
							?>	
						</td>
						<td>
							<?php 
								echo $fila['dis_direccion']; 
							?>	
						</td>
						<td>
							<?php 
								echo $fila['dis_contacto']; 
							?>	
						</td>
						<td>
							<a href="update.php?id=<?php echo $fila['dis_nit'] ?>" class="btn btn-secondary">
								<i class="fas fa-marker">
								</i>
							</a>
							<a href="delete.php?id=<?php echo $fila['dis_nit'] ?>" class="btn btn-danger">
								<i class="far fa-trash-alt">
								</i>
							</a>
						</td>
					</tr>
					<?php 
						}
					?>
				</tbody>
			</table>
		</div>
	</div>
	<?php
		$query="SELECT COUNT(*) as total FROM distribuidor"; 
		$resultado = mysqli_query($conexion, $query);
		$resultadof = mysqli_fetch_array($resultado);
		$total = $resultadof['total']; 
		$paginacion = 5;
		$paginas = $total/5;
		$paginas = ceil($paginas);
	?>
	<nav aria-label="Page navigation example">
  		<ul class="pagination">
    		<li class="page-item <?php echo $_GET['pagina']==$i+1 ? 'active':'' ?>">
      			<a class="page-link" href="index.php?pagina=<?php echo $_GET['pagina']-1 ?>" aria-label="Previous">
        			<span aria-hidden="true">&laquo;</span>
      			</a>
    		</li>
    		<?php 
    			for ($i=0; $i < $paginas; $i++): 
    		?>
   			<li class="page-item">
   				<a class="page-link" href="index.php?pagina=<?php 
   																echo $i+1;
   															?>">
   															<?php 
   																echo $i+1;
   															?>
   				</a>
   			</li>
   			<?php 
   				endfor
   			?>
			<li class="page-item <?php
									 echo $_GET['pagina']>=$paginas ? 'disable':''
								 ?>" >
      		<a class="page-link" href="index.php?pagina=<?php echo $_GET['pagina']+1 ?>" aria-label="Next">
        		<span aria-hidden="true">&raquo;</span>
      		</a>
    		</li>
  		</ul>
	</nav>
</div>

<?php 
	include("includes/footer.php")
?>
	