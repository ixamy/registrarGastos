<?php include "conectar.php";?>
<?php
	$sql = "INSERT INTO categoria (categoriaId, categoriaNombre)
	if ($conn->query($sql) === TRUE) {