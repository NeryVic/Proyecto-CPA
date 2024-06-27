<?php 
include("../../db.php"); // Inclusión de la base de datos.

if (isset($_GET['txtID'])) {
    // Borrar registros
    $txtID = (isset($_GET['txtID'])) ? $_GET['txtID'] : "";

    // Obtener nombre de la imagen para eliminarla
    $sentencia = $conexion->prepare("SELECT imagen FROM tbl_portfolio WHERE ID=:ID");
    $sentencia->bindParam(":ID", $txtID);
    $sentencia->execute();
    $registro_imagen = $sentencia->fetch(PDO::FETCH_LAZY);

    // Verificar si la imagen existe y eliminarla
    if (isset($registro_imagen["imagen"])) {
        if (file_exists("../../../assets/img/portfolio/" . $registro_imagen["imagen"])) {
            unlink("../../../assets/img/portfolio/" . $registro_imagen["imagen"]);
        }
    }

    // Eliminar el registro de la base de datos
    $sentencia = $conexion->prepare("DELETE FROM tbl_portfolio WHERE `tbl_portfolio`.`ID`=:ID");
    $sentencia->bindParam(":ID", $txtID);
    $sentencia->execute();
}

// Seleccionar los registros
$sentencia = $conexion->prepare("SELECT * FROM `tbl_portfolio`");
$sentencia->execute();
$lista_portfolio = $sentencia->fetchAll(PDO::FETCH_ASSOC);

include("../../templates/header.php");
?>
</br>
<div class="card">
    <div class="card-header">
        <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Agregar Registro</a>
    </div>
    <div class="card-body">
        <div class="table-responsive-sm">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($lista_portfolio as $registro) { ?>
                    <tr>
                        <td><?php echo $registro['ID']; ?></td>
                        <td><img width="75" height="75" src="../../../assets/img/portfolio/<?php echo $registro['imagen']; ?>" alt="Imagen del portfolio"></td>
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

<script>
function confirmarEliminacion() {
    return confirm("¿Estás seguro de que deseas eliminar este registro?");
}
</script>

<?php include("../../templates/footer.php"); ?>


















<?php include("../../templates/footer.php")?>