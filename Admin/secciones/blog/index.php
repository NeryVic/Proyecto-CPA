<?php 
include("../../db.php");

if(isset($_GET['txtID']) ){
    //Borrar Registros
    $txtID=(isset ($_GET['txtID'])  )?  $_GET['txtID']: "";

    //Obtener nombre de la imagen para eliminarla
    $sentencia = $conexion->prepare("SELECT imagen FROM tabla_blog WHERE ID=:ID");
    $sentencia->bindParam(":ID",$txtID);
    $sentencia->execute();
    $registro_imagen = $sentencia->fetch(PDO::FETCH_LAZY);

    //Verificar si la imagen existe y eliminarla
    if(isset($registro_imagen["imagen"])){
        //$ruta_imagen = "../../../assets/img/portfolio/".$registro_imagen["imagen"];
        if(file_exists("../../../assets/img/blog/".$registro_imagen["imagen"])){
            unlink("../../../assets/img/blog/".$registro_imagen["imagen"]);
        }
    }
//Eliminar el registro de la base de datos
$sentencia = $conexion->prepare("DELETE FROM tabla_blog WHERE `tabla_blog`.`ID`=:ID");
$sentencia->bindParam(":ID", $txtID);
$sentencia->execute();
}
//Seleccionar los registros
$sentencia = $conexion->prepare("SELECT * FROM tabla_blog");
$sentencia->execute();
$lista_blog = $sentencia->fetchAll(PDO::FETCH_ASSOC);

include("../../templates/header.php");?> 
</br>
<div class="card">
    <div class="card-header">
        <a
            name=""
            id=""
            class="btn btn-primary"
            href="crear.php"
            role="button"
            >Agregar Registro</a
        >
        
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
                <th scope="col">Título</th>
                <th scope="col">Imágen</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($lista_blog as $registros){ ?>
            <tr class="">
                <td> <?php   echo $registro['ID']; ?></td>
                <td><?php   echo $registro['titulo']; ?></td>
                <td><?php   echo $registro['descripcion']; ?></td>
                <td><img width="75" height="75" src="../../../assets/img/blog/" alt="Imagen del blog"><?php   echo $registro['imagen']; ?></td>
                <td scope="col">
                    <a href="editar.php?txtID=<?php echo   $registro['ID']; ?>" class="btn btn-info" role="button"><i class="ri-list-settings-line"></i></a>
                    <script>
                        function confirmarEliminacion(){
                            return confrim("¿Estás seguro de que deseas eliminar este registro?");
                        }
                    </script>
                </td>
            
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>


    </div>
</div>
<?php   include("../../templates/footer.php");?>