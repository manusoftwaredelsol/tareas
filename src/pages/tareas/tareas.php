<?php
$servername = "192.168.12.10";
$database = "tareas";
$username = "tareas";
$password = "tareas";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
    die("Fallo conexión: " . mysqli_connect_error());
}
echo "Conectado correctamente";
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
<style>
table, td, th {
  border: 1px solid black;
}

table {
  width: 100%;
  border-collapse: collapse;
  text-align: center;
}
</style>
</head>
<body>

<h2>Tareas</h2>
<div>
    <label>Ver</label><br/>
	<select>
		<option selected="selected">- Estados -</option>
		<option>No iniciada</option>
                <option>En curso</option>
		<option>Completada</option>
	</select>
</div>
<br/>
<table>
  <tr>
    <th>Estado</th>
    <th>Inicio</th>
    <th>Fin</th>
    <th>Descripción</th>
  </tr>
  <tr>
    <td>aaa</td>
    <td>aaa</td>
    <td>aaa</td>
    <td>aaa</td>
  </tr>
  <tr>
    <td>bbb</td>
    <td>bbb</td>
    <td>bbb</td>
    <td>bbb</td>
  </tr>
  <tr>
    <td>ccc</td>
    <td>ccc</td>
    <td>ccc</td>
    <td>ccc</td>
  </tr>
</table>
<br><br>
<a href="/userpage"> Volver a la página de usuario </a>
</body>
</html>