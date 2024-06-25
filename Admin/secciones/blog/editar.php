<?php 
include("../../db.php");
$nuevaImagen = "";//iniciailiza la variable nueva imagen
$titulo =   "";
if(isset($_GET['txtID'])    ){
    //Recuperar los datos del id correspondiente
    $txtID =    $_GET['txtID'];
    $sentencia = $conexion->prepare("SELECT * FROM `tabla_blog` WHERE ID=:ID");
    $sentencia->bindParam(":ID", $txtID);
    $sentencia->execute();
    $registro   =   $sentencia->fetch(PDO::FETCH_ASSOC);

    //Asignar los valores del registro a las variables.
    $titulo = $registro['titulo'];

    $imagen = $registro['imagen'];
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    //Recuperar los datos del formulario
    $txtID = $_POST['txtID'];
    $titulo = $_POST['titulo'];
    $descripcion    =   $_POST['descripcion'];
    //verificar si se ha subido una nueva imagen
    if(isset($_FILES["imagen"]["name"]) && !empty($_FILES["imagen"]["name"])){
        $nuevaImagen = $_FILES["imagen"]["name"];
        $tmp_imagen =   $_FILES["imagen"]["tmp_name"];
        $nombre_archivo_imagen  =   date("YmdHis")  .   "_".$nuevaImagen;
        move_uploaded_file($tmp_imagen, "../../../assets/img/blog/".$nombre_archivo_imagen);

        //Eliminar imagen anterior si existe
        if(file_exists("../../../assets/img/blog/".$imagen)){
            unlink("../../../assets/img/blog/".$imagen);
        }

        //Actualizar la tabla con  la nueva imagen
        $sentencia = $conexion->prepare("UPDATE `tabla_blog` SET imagen=:imagen WHERE ID=:ID");
        $sentencia->bindParam(":imagen", $nombre_archivo_imagen);
        $sentencia->bindParam(":ID", $txtID);
        $sentencia->execute();
    }

    //Redigir despues de la actualizacion
    header("Location: index.php?mensaje=Registro modificado con éxito");
    exit();
}
include("../../templates/header.php"); ?>
</br>

<div class="card">
    <div class="card-header">Editar blog</div>
    <div class="card-body">
    <form action="" enctype="multipart/form-data" method="post">
    <div class="mb-3">
        <label for="titulo" class="form-label">Titulo:</label>
        <input
            type="text"
            class="form-control"
            name="titulo"
            id="titulo"
            aria-describedby="helpId"
            placeholder="Titulo"
        />
    </div>
    <div class="mb-3">
        <label for="descripcion" class="form-label">Descripcion:</label>
        <input
            type="text"
            class="form-control"
            name="descripcion"
            id="descripcion"
            aria-describedby="helpId"
            placeholder="Descripcion"
        />
    </div>
    <div class="mb-3">
        <label for="imagen" class="form-label">Imagen:</label>
        <input
            type="file"
            class="form-control"
            name="imagen"
            id="imagen"
            aria-describedby="helpId"
            placeholder="Imagen"
        />
    </div>
    <button type="submit" class="btn btn-success">Actualizar</button>
            <a href="index.php" class="btn btn-primary">Cancelar</a>
    </form>
    </div>
    <div class="card-footer text-muted"></div>
</div>






















<?php include("../../templates/footer.php"); ?>