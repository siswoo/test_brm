<?php
	if (empty($_POST['edit_id'])){
		$errors[] = "ID está vacío.";
	} elseif (!empty($_POST['edit_id'])){
	require_once ("../conexion.php");
    $nombre = mysqli_real_escape_string($con,(strip_tags($_POST["edit_nombre"],ENT_QUOTES)));
	$cantidad = mysqli_real_escape_string($con,(strip_tags($_POST["edit_cantidad"],ENT_QUOTES)));
	$lote = mysqli_real_escape_string($con,(strip_tags($_POST["edit_lote"],ENT_QUOTES)));
	$fecha_v = mysqli_real_escape_string($con,(strip_tags($_POST["edit_fecha_v"],ENT_QUOTES)));
	$precio = floatval($_POST["edit_precio"]);
	$id=intval($_POST['edit_id']);
	
    $sql = "UPDATE productos SET nombre='".$nombre."', cantidad='".$cantidad."', lote='".$lote."', fecha_v='".$fecha_v."',  precio='".$precio."' WHERE id='".$id."' ";
    $query = mysqli_query($con,$sql);
    if ($query) {
        $messages[] = "El producto ha sido actualizado con éxito.";
    } else {
        $errors[] = "Lo sentimos, la actualización falló. Por favor, regrese y vuelva a intentarlo.";
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