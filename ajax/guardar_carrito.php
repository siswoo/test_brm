<?php
	if (empty($_POST['add_producto'])){
		$errors[] = "Ingresa el producto.";
	} elseif (!empty($_POST['add_producto'])){
	require_once ("../conexion.php");

    $id = $_POST["add_producto"];
	$cantidad = $_POST["add_cantidad"];

	$consulta_producto = "SELECT * FROM productos WHERE id = $id";
	$query_producto = mysqli_query($con,$consulta_producto);

	while($row_producto = mysqli_fetch_array($query_producto)){
		$nombre=$row_producto['nombre'];
		$lote=$row_producto['lote'];
		$fecha_v=$row_producto['fecha_v'];
		$precio=$row_producto['precio']*$cantidad;
		$cantidad_producto=$row_producto['cantidad'];
	}

	$consulta_producto2 = "SELECT * FROM carrito WHERE nombre = '$nombre'";
	$query_producto2 = mysqli_query($con,$consulta_producto2);
	$cuenta1=0;
	while($row_producto2 = mysqli_fetch_array($query_producto2)){
		$cuenta1=1;
	}

	if($cantidad>$cantidad_producto){
		$errors[] = "Ha superado el limite de stock de ese producto, vuelva a intentarlo."; ?>
		<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Error!</strong> 
					<?php
						foreach ($errors as $error) {
								echo $error;
							}
						?>
			</div>
	<?php exit; }

	if($cuenta1==1){
		$sql = "DELETE FROM carrito WHERE nombre = '$nombre'";
    	$query = mysqli_query($con,$sql);
    	?>
    	<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>¡Se ha sustituido la cantidad del producto!</strong>
				</div>
	<?php }

    $sql = "INSERT INTO carrito(nombre, cantidad, lote, fecha_v, precio) VALUES ('$nombre','$cantidad','$lote','$fecha_v','$precio')";
    $query = mysqli_query($con,$sql);

    if ($query) {
        $messages[] = "El producto ha sido guardado con éxito.";
    } else {
        $errors[] = "Lo sentimos, el registro falló. Por favor, regrese y vuelva a intentarlo.";
    }
		
	} else 
	{
		$errors[] = "desconocido.";
	}
if (isset($errors)){
			
			?>
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Error!</strong> 
					<?php
						foreach ($errors as $error) {
								echo $error;
							}
						?>
			</div>
			<?php
			}
			if (isset($messages)){
				
				?>
				<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>¡Bien hecho!</strong>
						<?php
							foreach ($messages as $message) {
									echo $message;
								}
							?>
				</div>
				<?php
			}
?>			