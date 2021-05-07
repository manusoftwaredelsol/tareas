<?php

?>

<head>
    <meta charset="UTF-8">
    <title>title</title>
    <link rel="stylesheet" href="../../test.css">
</head>

<h1>Ficha de tarea</h1>
<div>
    <form method="post" action="" name="register">
        <div class="form-element">
        Estado  <select>
		<option selected="selected">- Estados -</option>
		<option>No iniciada</option>
                <option>En curso</option>
		<option>Completada</option>
	</select>
        </div>
        <br>
        <div class="form-element">
            Inicio <input type="date" id="fecha_inicio" name="inicio_tarea"/> 
            <input type="time" name="hora_inicio"/>
            <br><br>
            Fin <input type="date" id="fecha_fin" name="fin_tarea"/> 
            <input type="time" name="hora_fin"/>
        </div>
        <br>
        <br>
        <div class="form-element">
            Descripcion
            <br>
            <textarea id="descripcion" rows="5" cols="60"></textarea>
        </div>
        <input type="submit" value="Registrar tarea">
    </form>
</div>





