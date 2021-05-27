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
    <?php while ($row   = $query->fetch(PDO::FETCH_ASSOC)) { ?>
        <tr>
            <td><?php echo $row["estado"]; ?></td>
            <td><?php echo $row["inicio"]; ?></td>
            <td><?php echo $row["fin"]; ?></td>
            <td><?php echo $row["descripcion"]; ?></td>
        </tr>
    <?php } ?>
</table>

<br/>
<a href="/userpage"> Volver a la página de usuario </a>