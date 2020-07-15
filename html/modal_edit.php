<div id="editProductModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form name="edit_product" id="edit_product">
					<div class="modal-header">						
						<h4 class="modal-title">Editar Producto</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Nombre</label>
							<input type="text" name="edit_nombre"  id="edit_nombre" class="form-control" required>
							<input type="hidden" name="edit_id" id="edit_id" >
						</div>
						<div class="form-group">
							<label>Cantidad</label>
							<input type="number" name="edit_cantidad" id="edit_cantidad" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Nº de lote</label>
							<input type="text" name="edit_lote" id="edit_lote" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Fecha de vencimiento</label>
							<input type="date" name="edit_fecha_v" id="edit_fecha_v" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Precio</label>
							<input type="text" name="edit_precio" id="edit_precio" class="form-control" required>
						</div>					
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
						<input type="submit" class="btn btn-info" value="Guardar datos">
					</div>
				</form>
			</div>
		</div>
	</div>