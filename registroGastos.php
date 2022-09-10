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
	<form action="registrar.php" method="post" class="form-horizontal">
	<div class="input-group mb-3">
		<input type="text" id="nombre" name="nombre" class="form-control" placeholder="Concepto" required>
		<span class="input-group-text" id="IEestado">Egreso</span>
		<div class="form-check form-switch" style="display: flex;flex-wrap: wrap;align-content: center;margin-left:5px">
		  <input class="form-check-input" type="checkbox" id="IE" name="IE" checked>
		</div>
	</div>
	
	<script>
		var inputBtn = document.getElementById("IE");

		inputBtn.addEventListener("change", (event)=>{
			if(inputBtn.checked === true) {
			document.getElementById("IEestado").innerText="Egreso";
		} else {
			document.getElementById("IEestado").innerText="Ingreso";
		}
		});
	</script>
	
	<input type="number" step="any" id="importe" name="importe" class="form-control" placeholder="Importe" required>
	
	<?php include "conectar.php";?>
	<?php
		$conn = NEW MySQLi($servername, $username, $password, $dbname);
		$categoriaSet = $conn->query("SELECT categoriaId, categoriaNombre FROM categoria");
		$carteraSet = $conn->query("SELECT carteraId, carteraNombre FROM cartera");
		$conn -> close();
	?>

		<br>
		<select name="categoria" class="form-control" required>
			<option value="" selected disabled hidden>Categoria</option>
			<?php
				while($rows = $categoriaSet->fetch_assoc())
				{
					$cat_id = $rows['categoriaId'];
					$cat_nombre = $rows['categoriaNombre'];
					echo "<option value='$cat_id'>$cat_nombre</option>";
				}
			?>
		</select><br>
		<select name="cartera" class="form-control" required>
			<option value="" selected disabled hidden>Cartera</option>
			<?php
				while($rows = $carteraSet->fetch_assoc())
				{
					$car_id = $rows['carteraId'];
					$car_nombre = $rows['carteraNombre'];
					echo "<option value='$car_id'>$car_nombre</option>";
				}
			?>
		</select><br>

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
			$resultSet = $conn->query("SELECT gasto.gastoNombre, gasto.gastoImporte, categoria.categoriaNombre, cartera.carteraNombre, gasto.gastoFechaHora FROM gasto INNER JOIN categoria ON gasto.gastoCategoriaId=categoria.categoriaId INNER JOIN cartera ON gasto.gastoCarteraId=cartera.carteraId ORDER BY gasto.gastoFechaHora desc");
			$conn -> close();
		?>

		<table name="listado" class="table table-striped">
			<tr>
				<th>Gasto</th>
				<th>Importe</th>
				<th>Categoria</th>
				<th>Cartera</th>
				<th>Fecha</th>
			</tr>
		<?php
			while($rows = $resultSet->fetch_assoc())
			{
				$gasto_nombre = $rows['gastoNombre'];
				$gasto_importe = $rows['gastoImporte'];
				$gasto_categoriaNombre = $rows['categoriaNombre'];
				$gasto_carteraNombre = $rows['carteraNombre'];
				$gasto_fechaHora = $rows['gastoFechaHora'];

				echo "<tr><td>$gasto_nombre</td><td>$gasto_importe</td><td>$gasto_categoriaNombre</td><td>$gasto_carteraNombre</td><td>$gasto_fechaHora</td><tr>";
			}
		?>
		</table><br><br>
	</div>
</body>
</html>