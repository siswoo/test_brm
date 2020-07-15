<div id="addCarritoModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form name="addCarrito" id="addCarrito">
					<div class="modal-header">						
						<h4 class="modal-title">Agregar al carrito</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<?php 	
							require_once ("conexion.php");
						    $sql = "SELECT * FROM productos";
						    $query = mysqli_query($con,$sql);
						    ?>
							<label>Producto</label>
							<select name="add_producto" class="form-control" required>
								<option value="">Seleccione</option>
								<?php
									while($row = mysqli_fetch_array($query)){
										echo '<option value="'.$row["id"].'">'.$row["nombre"].'</option>';
									}
								?>
							</select>
						</div>
						<div class="form-group">
							<label>Cantidad</label>
							<input type="number" name="add_cantidad" id="add_cantidad" class="form-control" required>
						</div>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
						<input type="submit" class="btn btn-success" value="Guardar datos">
					</div>
				</form>
			</div>
		</div>
	</div>