<?php 
include("../../db.php");//inclusion de la base de datos.

if(isset($_GET['txtID']) ){
    //Borrar los registros
    $txtID = (isset($_GET['txtID']) )? $_GET['txtID'] : "";
    
    $sentencia = $conexion->prepare("DELETE FROM tbl_servicios WHERE `tbl_servicios`.`ID`=:ID");
    $sentencia->bindParam(":ID", $txtID);
    $sentencia->execute();
}
//Seleccionar los registros de la base de datos
$sentencia = $conexion->prepare("SELECT * FROM `tbl_servicios`");
$sentencia->execute();
$lista_servicios = $sentencia->fetchAll(PDO::FETCH_ASSOC);

include("../../templates/header.php")?>
</br>
<div class="card">
    <div class="card-header"><a name="" id="" class="btn btn-primary" href="crear.php" role="button">Agregar Registro</a>

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
                <th scope="col">Titulo</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($lista_servicios as $registro) { ?>
            <tr class="">
                <td><?php echo $registro['ID']; ?></td>
                <td><?php echo $registro['titulo']; ?></td>
                <td><?php echo $registro['descripcion']; ?></td>
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


<?php include("../../templates/footer.php")?>