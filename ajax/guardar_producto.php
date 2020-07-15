<?php
	if (empty($_POST['nombre'])){
		$errors[] = "Ingresa el nombre del producto.";
	} elseif (!empty($_POST['nombre'])){
	require_once ("../conexion.php");
    $nombre = mysqli_real_escape_string($con,(strip_tags($_POST["nombre"],ENT_QUOTES)));
	$cantidad = mysqli_real_escape_string($con,(strip_tags($_POST["cantidad"],ENT_QUOTES)));
	$lote = mysqli_real_escape_string($con,(strip_tags($_POST["lote"],ENT_QUOTES)));
	$fecha_v = mysqli_real_escape_string($con,(strip_tags($_POST["fecha_v"],ENT_QUOTES)));
	$precio = floatval($_POST["precio"]);

    $sql = "INSERT INTO productos(nombre, cantidad, lote, fecha_v, precio) VALUES ('$nombre','$cantidad','$lote','$fecha_v','$precio')";
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