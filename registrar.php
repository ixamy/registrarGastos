<?php include "conectar.php";?>
<?php
	$sql = "INSERT INTO gasto (gastoId, gastoNombre, gastoImporte, gastoCategoriaId, gastoCarteraId, gastoFechaHora) VALUES (0, '$txtNombre', $txtImporte, $txtCategoria, $txtCartera, current_timestamp())";
	if ($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE) {