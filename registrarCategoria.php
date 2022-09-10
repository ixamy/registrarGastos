<?php include "conectar.php";?>
<?php	$txtNombre = $_POST['nombre'];
	$sql = "INSERT INTO categoria (categoriaId, categoriaNombre)	VALUES (0, '$txtNombre')";
	if ($conn->query($sql) === TRUE) {		header("Location: Categorias.php");		$conn->close();	} else {	  echo "Error: " . $sql . "<br><br>" . $conn->error;	}?>