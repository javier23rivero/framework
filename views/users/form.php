<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Formularios de HTML5</title>
</head>
<body>
	<h4>Agregar</h4>
	<form action="" method="POST">
		<label for="nombre">Nombre: </label>
		<input type="text" name="nombre" autofocus="autofocus" autocomplete="off"><br>
		<label for="correo">Correo electrónico: </label>
		<input type="email" name="correo"><br>
		<label for="busqueda">Busqueda: </label>
		<input type="search" name="busqueda"><br>
		<label for="edad">Edad:</label>
		<input type="number" name="edad" max="120" min="2016-12-06" max="2016-12-10"><br>
		<label for="fecha">Fecha: </label>
		<input type="date" name="fecha" min=""><br>
		<label for="pagina">Página</label>
		<input type="url" name="pagina"><br>
		<label for="telefono">Telefono: </label>
		<input type="tel" name="telefono"><br>
		<p><label for="browsers">Select browser:</label><br>
			<input list="browsers" placeholder="search">
			<datalist id="browsers">
				<option value="Internet Explorer">
				<option value="Firefox">
				<option value="Chrome">
				<option value="Opera">
				<option value="Safari">
			</datalist>
		</p>
		<p>
			<label for="cal">Calificación:</label>
			<input type="range" name="cal">
		</p>
		<p>
			<label for="cp">CP:</label>
			<input type="text" pattern="[0-9]{5}" title="Inserte un código postal valido">
		</p>
		<button type="button" onclick='alert("Hola mundo")'>Click</button>
		<input type="submit">
		<input type="reset">
	</form>
</body>
</html>