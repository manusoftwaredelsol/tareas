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



<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <h1>Ficha de tarea</h1>
            <br/>
            <form method="post" action="" name="registroTarea">
            <div class="form-label-group">
                Estado  <select name="estado">
		<option selected="selected">- Estados -</option>
		<option>No iniciada</option>
                <option>En curso</option>
		<option>Completada</option>
                </select>
            </div>
            <br>
            <div class="form-label-group">
            Inicio <input type="date" class="form-control" id="fecha_inicio" name="inicio_tarea"/> 
            <input type="time" class="form-control" name="hora_inicio"/>
            <br><br>
            Fin <input type="date" class="form-control" id="fecha_fin" name="fin_tarea"/> 
            <input type="time" class="form-control" name="hora_fin"/>
            </div>
            <br>
            <br>
            <div class="form-label-group">
            Descripcion
            <br>
            <textarea id="descripcion" class="form-control" name="descripcion" rows="5" cols="60"></textarea>
            </div>
            <br>
            <br>
            <button class="btn btn-primary text-center" type="submit" name="crearTarea" value="Registrar tarea">Registrar tarea</button>
            <a class="btn btn-primary text-center" href="/tareas">Ver tareas</a>
            </form>
        </div>
    </div>   
</div>





