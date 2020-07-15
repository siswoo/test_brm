<?php
require_once ("../conexion.php");

$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
if($action == 'ajax'){
	$query = mysqli_real_escape_string($con,(strip_tags($_REQUEST['query'], ENT_QUOTES)));

	$tables="productos";
	$campos="*";
	$sWhere=" productos.nombre LIKE '%".$query."%'";
	$sWhere.=" order by productos.nombre";
	
	include 'pagination.php';
	$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
	$per_page = intval($_REQUEST['per_page']);
	$adjacents  = 4;
	$offset = ($page - 1) * $per_page;
	$count_query   = mysqli_query($con,"SELECT count(*) AS numrows FROM $tables where $sWhere ");
	if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}
	else {echo mysqli_error($con);}
	$total_pages = ceil($numrows/$per_page);
	$query = mysqli_query($con,"SELECT $campos FROM  $tables where $sWhere LIMIT $offset,$per_page");
	
	if ($numrows>0){
		
	?>
		<div class="table-responsive">
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th class='text-center'>ID</th>
						<th class='text-center'>Producto </th>
						<th class='text-center'>Cantidad </th>
						<th class='text-center'>Lote</th>
						<th class='text-center'>Vencimiento</th>
						<th class='text-center'>Precio</th>
						<th>Opciones</th>
					</tr>
				</thead>
				<tbody>	
						<?php 
						$finales=0;
						while($row = mysqli_fetch_array($query)){	
							$id=$row['id'];
							$nombre=$row['nombre'];
							$cantidad=$row['cantidad'];
							$lote=$row['lote'];
							$fecha_v=$row['fecha_v'];
							$precio=$row['precio'];
							$finales++;
						?>	
						<tr class="<?php echo $text_class;?>">
							<td class='text-center'><?php echo $id;?></td>
							<td class='text-center'><?php echo $nombre;?></td>
							<td class='text-center'><?php echo $cantidad;?></td>
							<td class='text-center'><?php echo $lote;?></td>
							<td class='text-center'><?php echo $fecha_v; ?></td>
							<td class='text-center'><?php echo number_format($precio,2);?></td>
							<td>
								<a href="#"  data-target="#editProductModal" class="edit" data-toggle="modal" data-nombre="<?php echo $nombre?>" data-cantidad="<?php echo $cantidad?>" data-precio="<?php echo $precio;?>" data-id="<?php echo $id; ?>" data-fecha_v="<?php echo $fecha_v; ?>" data-lote="<?php echo $lote; ?>"><i class="material-icons" data-toggle="tooltip" title="Editar" >&#xE254;</i></a>
								<a href="#deleteProductModal" class="delete" data-toggle="modal" data-id="<?php echo $id;?>"><i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i></a>
                    		</td>
						</tr>
						<?php }?>
						<tr>
							<td colspan='8'> 
								<?php
									$inicios=$offset+1;
									$finales+=$inicios -1;
									echo "Mostrando $inicios al $finales de $numrows registros";
									echo paginate( $page, $total_pages, $adjacents);
								?>
							</td>
						</tr>
				</tbody>			
			</table>
		</div>	

	
	
	<?php	
	}	
}
?>          
		  
