<?php 
include("../../db.php");//inclusion de la base de datos.
// Seleccionar los registros de la base de datos
$sentencia = $conexion->prepare("SELECT * FROM `tbl_users`");
$sentencia->execute();
$lista_usuarios = $sentencia->fetchAll(PDO::FETCH_ASSOC);
include("../../templates/header.php")?>
<br>
<div class="card">
    <div class="card-header">
    <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Agregar Registro</a>
    </div>
    <div class="card-body">
<div
    class="table-responsive-sm"
>
    <table
        class="table"
    >
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">D.N.I</th>
                <th scope="col">Tel/Cel</th>
                <th scope="col">Correo</th>
            </tr>
        </thead>
        <tbody>
            <tr class="">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                <a href="editar.php?txtID=<?php echo $registro['ID']; ?>" class="btn btn-info" role="button"><i class="ri-list-settings-line"></i></a>
                <a href="index.php?txtID=<?php echo $registro['ID']; ?>" onclick="return confirmarEliminacion()" class="btn btn-danger" role="button"><i class="ri-delete-bin-6-line"></i></a>
                </td>
            </tr>
        </tbody>
    </table>
</div>

    </div>
    <div class="card-footer text-muted"></div>
</div>

<?php include("../../templates/footer.php")?>