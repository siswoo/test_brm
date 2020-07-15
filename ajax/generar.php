<?php

$nombre=$_GET['cliente_nombre'];
$cedula=$_GET['cliente_cedula'];
$telefono=$_GET['cliente_telefono'];

require_once ("../conexion.php");
$sql = "SELECT * FROM carrito";
$query = mysqli_query($con,$sql);
$total=0;

require('../js/fpdf/fpdf.php');

// create document
$pdf = new FPDF();
$pdf->AddPage();

$pdf->SetFont('Arial', '', 16);
$pdf->Cell(0, 10, 'Factura numero: '.rand(1, 999), 0, 1, 'C');

$pdf->Ln();

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 10, 'Nombre de cliente: '.$nombre, 0, 1);
$pdf->Cell(0, 10, 'Cedula de cliente: '.$cedula, 0, 1);
$pdf->Cell(0, 10, 'Telefono de cliente: '.$telefono, 0, 1);

$pdf->Ln();

$pdf->Cell(45, 10, 'Nombre', 1, 0, 'C');
$pdf->Cell(45, 10, 'Cantidad', 1, 0, 'C');
$pdf->Cell(45, 10, 'Fecha V', 1, 0, 'C');
$pdf->Cell(45, 10, 'Precio', 1, 1, 'C');

while($row = mysqli_fetch_array($query)){
$nombre=$row['nombre'];
$cantidad=$row['cantidad'];
$lote=$row['lote'];
$fecha_v=$row['fecha_v'];
$precio=$row['precio'];
$total=$total+$precio;

$pdf->Cell(45, 10, $nombre, 1, 0, 'C');
$pdf->Cell(45, 10, $cantidad, 1, 0, 'C');
$pdf->Cell(45, 10, $fecha_v, 1, 0, 'C');
$pdf->Cell(45, 10, $precio, 1, 1, 'C');

/*
$sql4 = "SELECT * FROM productos WHERE nombre = '$nombre'";
$query4 = mysqli_query($con,$sql4);
while($row4 = mysqli_fetch_array($query4)){
	$cantidad_prod=$row['cantidad'];
	$id_prod=$row['id'];
}

$restar = $cantidad - $cantidad_prod;
$sql3 = "UPDATE productos SET cantidad='".$restar."' WHERE id_prod = $id_prod ";
$query3 = mysqli_query($con,$sql3);
*/

}
$pdf->Cell(180, 10, 'Total a pagar: '.$total, 1, 0, 'C');

$sql2 = "TRUNCATE carrito";
$query2 = mysqli_query($con,$sql2);


$pdf->Output('', 'basic.pdf');

?>