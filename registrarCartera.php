<?php include "conectar.php";?>
<?php
	$sql = "INSERT INTO cartera (carteraId, carteraNombre, carteraMonto)
	if ($conn->query($sql) === TRUE) {