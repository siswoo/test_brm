	<!DOCTYPE html>
	<html lang="en">
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tienda Test</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="css/custom.css">
	</head>
	<body>
		<?php 
			$active='clientes';
			include('header.php'); 
		?> 

	    <div class="container">
	        <div class="table-wrapper">
	            <div class="table-title">
	                <div class="row">
	                    <div class="col-sm-6">
							<h2>Lista de productos en carrito</h2>
						</div>
						<div class="col-sm-6">
							<a href="#addCarritoModal" class="btn btn-success" data-toggle="modal"><i class="fa fa-shopping-cart"></i> <span>Agregar al Carrito</span></a>
						</div>
	                </div>
	            </div>
				<div id="loader"></div><!-- Carga de datos ajax aqui -->
				<div id="resultados"></div><!-- Carga de datos ajax aqui -->
				<div class='outer_div'></div><!-- Carga de datos ajax aqui -->
	        </div>
	    </div>
		<!-- ADD Modal HTML -->
		<?php include("html/add_carrito.php");?>
		<?php include("html/modal_delete_carrito.php");?>
		<?php include("html/modal_generar.php");?>
		<script src="js/script2.js"></script>
	</body>
	</html>