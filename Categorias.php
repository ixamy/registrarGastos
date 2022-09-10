<head>
    <title>Registro de Gastos</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

	<nav class="navbar navbar-light bg-light justify-content-between" style="padding:10px">
	  <div class="form-inline">
	  <span class="navbar-brand h1">FP</span>
		<span h2>Movimientos</span>
	  </div>
	  <span h3>Usuario</span>
	</nav>

</head>

<body>
	<div class="container" style="margin-top:5px">
	<form action="registrarCategoria.php" method="post" class="form-horizontal">
	<input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre" required><br>
		
	<input type="submit" value="Registrar" class="btn btn-primary">
	<input type="reset" value="Limpiar" class="btn btn-primary">
	</form>
	
	<a href="registroGastos.php"><button class="btn btn-success">Gastos</button></a>
	<a href="Categorias.php"><button class="btn btn-success">Categorias</button></a>
	<a href="Carteras.php"><button class="btn btn-success">Carteras</button></a>
	
	</div><br>
	
    <div class="container">
		<?php include "conectar.php";?>
		<?php
			$conn = NEW MySQLi($servername, $username, $password, $dbname);
			$resultSet = $conn->query("SELECT categoriaNombre FROM categoria");
			$conn -> close();
		?>

		<table name="listado" class="table table-striped">
			<tr>
				<th>Categoria</th>
			</tr>
		<?php
			while($rows = $resultSet->fetch_assoc())
			{
				$cat_nombre = $rows['categoriaNombre'];
				echo "<tr><td>$cat_nombre</td><tr>";
			}
		?>
		</table><br><br>
	</div>
</body>
</html>