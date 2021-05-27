<?php
if (isset($_POST['crearTarea'])) {
 
        $estado = $_POST['estado'];
        $inicio = $_POST['inicio_tarea'].' '.$_POST['hora_inicio'];
        $fin = $_POST['fin_tarea'].' '.$_POST['hora_fin'];
        $descripcion = $_POST['descripcion'];      
        $id_user = $_SESSION['user']['id_user'];

        $query = $connection->prepare("INSERT INTO tareas(estado,inicio,fin,descripcion,id_user) VALUES (:estado,:inicio,:fin,:descripcion,:id_user)");
        $query->bindParam("estado", $estado, PDO::PARAM_STR);
        $query->bindParam("inicio", $inicio, PDO::PARAM_STR);
        $query->bindParam("fin", $fin, PDO::PARAM_STR);
        $query->bindParam("descripcion", $descripcion, PDO::PARAM_STR);
        $query->bindParam("id_user", $id_user, PDO::PARAM_STR);
        $result = $query->execute();
 
            if ($result) {
                echo '<p class="success">Registro de tarea completado correctamente</p>';
            } else {
                echo '<p class="error">Algo no ha ido bien...</p>';
            }
}
?>


<h1>Ficha de tarea</h1>
<div>
    <form method="post" action="" name="registroTarea">
        <div class="form-element">
            Estado  <select name="estado">
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
            <textarea id="descripcion" name="descripcion" rows="5" cols="60"></textarea>
        </div>
        <input type="submit" name="crearTarea" value="Registrar tarea">
    </form>
</div>





