<?php
require_once ("../conexion.php");

$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
if($action == 'ajax'){	
	$query = mysqli_query($con,"SELECT * FROM carrito");
			
	?>
		<div class="table-responsive">
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th class='text-center'>Producto </th>
						<th class='text-center'>Cantidad </th>
						<th class='text-center'>Vencimiento</th>
						<th class='text-center'>Precio</th>
						<th class='text-center' nowrap>Borrar del listado</th>
					</tr>
				</thead>
				<tbody>	
						<?php 
						$finales=0;
						$total=0;

						while($row = mysqli_fetch_array($query)){	
							$id=$row['id'];
							$nombre=$row['nombre'];
							$cantidad=$row['cantidad'];
							$lote=$row['lote'];
							$fecha_v=$row['fecha_v'];
							$precio=$row['precio'];
							$finales++;
							$total=$total+$precio;
						?>	
						<tr class="<?php echo $text_class;?>">
							<td class='text-center'><?php echo $nombre;?></td>
							<td class='text-center'><?php echo $cantidad;?></td>
							<td class='text-center'><?php echo $fecha_v; ?></td>
							<td class='text-center'><?php echo number_format($precio,2);?></td>
							<td class='text-center'>
								<a href="#deleteProductModal" class="delete" data-toggle="modal" data-id="<?php echo $id;?>"><i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i></a>
                    		</td>
						</tr>
						<?php }?>
						<?php if($total==0){ ?>
							<tr>
							<td colspan="5" class="text-center" style="font-weight: bold; font-size: 16px;">SIN PRODUCTOS EN CARRITO</td>
						</tr>
						<?php }else{?>
						<tr>
							<td colspan="2" style="font-weight: bold; font-size: 16px;">Total: <?php echo number_format($total,2); ?></td>
							<td colspan="3" class="text-right" style="font-weight: bold; font-size: 16px;">
								<a href="#addGenerarModal" data-toggle="modal">
									<input type="submit" value="Generar Factura" class="btn btn-info">
								</a>
							</td>
						</tr>
						<?php } ?>
				</tbody>			
			</table>
		</div>	

	
	
	<?php	
}
?>          
		  
