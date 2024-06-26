<?php 
include("../../db.php");

if(isset($_GET['txtID'])){
    $txtID = (isset($_GET['txtID'])) ? $_GET['txtID'] : "";

    // Comprobar si el ID existe en la base de datos antes de eliminar
    $sentencia = $conexion->prepare("SELECT * FROM tbl_admins WHERE ID = :ID");
    $sentencia->bindParam(":ID", $txtID);
    $sentencia->execute();
    $registro = $sentencia->fetch(PDO::FETCH_ASSOC);

    if ($registro) {
        // Eliminar el registro de la base de datos
        $sentencia = $conexion->prepare("DELETE FROM tbl_admins WHERE `tbl_admins`.`ID`=:ID");
        $sentencia->bindParam(":ID", $txtID);
        $sentencia->execute();
    } else {
        $mensaje = "ID no encontrado.";
        header("Location:index.php?mensaje=".$mensaje);
    }
}
// Seleccionar los registros
$sentencia = $conexion->prepare("SELECT * FROM `tbl_admins`");
$sentencia->execute();
$lista_admins = $sentencia->fetchAll(PDO::FETCH_ASSOC);

include("../../templates/header.php");?>
</br>
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
                <th scope="col">Usuario</th>
                <th scope="col">Contraseña</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($lista_admins as $registro){ ?>
            <tr class="">
                <td><?php echo $registro['ID']; ?></td>
                <td><?php echo $registro['usuario']; ?></td>
                <td><?php echo $registro['password']; ?></td>
                <td>
                <a href="editar.php?txtID=<?php echo $registro['ID']; ?>" class="btn btn-info" role="button"><i class="ri-list-settings-line"></i></a>
                <a href="index.php?txtID=<?php echo $registro['ID']; ?>" onclick="return confirmarEliminacion()" class="btn btn-danger" role="button"><i class="ri-delete-bin-6-line"></i></a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

    </div>
    <div class="card-footer text-muted"></div>
</div>

<?php include("../../templates/footer.php");?>
