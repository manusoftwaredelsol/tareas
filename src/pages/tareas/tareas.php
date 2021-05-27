<?php
if (empty($_SESSION['user']['id_user'])) {
    header('Location:/login');
    exit;
}

$query = $connection->prepare("SELECT * FROM tareas WHERE id_user = :id_user;");
$query->bindParam("id_user", $_SESSION['user']['id_user'], PDO::PARAM_INT);
$query->execute();
?>

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

<div class="container">
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
            <caption>
                <button class="btn btn-primary" onclick="location.href='http://localhost/crearTarea'" >Agregar Tarea  
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                        </svg>
                    </span>
                </button>
            </caption>
    <br></br>
    <div class="row">
    <div class="col-sm-12">
        <table class="table table-hover table-condensed table-bordered">
    <tr>
        <th>Estado</th>
        <th>Inicio</th>
        <th>Fin</th>
        <th>Descripción</th>
        <th>Editar</th>
        <th>Eliminar</th>
    </tr>
    <?php while ($row = $query->fetch(PDO::FETCH_ASSOC)) { ?>
        <tr>
            <td><?php echo $row["estado"]; ?></td>
            <td><?php echo $row["inicio"]; ?></td>
            <td><?php echo $row["fin"]; ?></td>
            <td><?php echo $row["descripcion"]; ?></td>
            <td>
                <button class="btn btn-warning">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                    </svg>
                </button>
            </td>
            <td>
                <button class="btn btn-danger">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                    </svg>
                </button>
            </td>
        </tr>
    <?php } ?>
</table>
</div>
</div>
    <br/>
    <a href="/userpage"> Volver a la página de usuario </a>
</div>