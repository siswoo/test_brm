<div id="addGenerarModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form name="addGenerar" id="addGenerar">
					<div class="modal-header">						
						<h4 class="modal-title">Datos del Cliente</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Nombre</label>
							<input type="text" name="cliente_nombre" id="cliente_nombre" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Cédula</label>
							<input type="number" name="cliente_cedula" id="cliente_cedula" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Teléfono</label>
							<input type="text" name="cliente_telefono" id="cliente_telefono" class="form-control" required>
						</div>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
						<input type="submit" class="btn btn-success" value="Generar Factura">
					</div>
				</form>
			</div>
		</div>
	</div>