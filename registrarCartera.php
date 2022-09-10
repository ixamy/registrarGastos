<?php include "conectar.php";?>
<?php	$txtNombre = $_POST['nombre'];	$txtMonto = $_POST['monto'];
	$sql = "INSERT INTO cartera (carteraId, carteraNombre, carteraMonto)	VALUES (0, '$txtNombre', $txtMonto)";
	if ($conn->query($sql) === TRUE) {		header("Location: Carteras.php");		$conn->close();	} else {	  echo "Error: " . $sql . "<br><br>" . $conn->error;	}?>