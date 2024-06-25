<?php 
include("../../db.php");//inclusion de la base de datos.

if($_SERVER["REQUEST_METHOD"] == "POST"){

    //Recepcionamos los valores del formulario.
    $titulo = (isset($_POST['titulo'])) ? $_POST['titulo']  :   "";
    $descripcion = (isset($_POST['descripcion'])) ? $_POST['descripcion']  :   "";
    $imagen = (isset($_FILES["imagen"]["name"])) ?  $_FILES["imagen"]   :   "";

    $fecha_imagen=new   DateTime();
    $nombre_archivo_imagen=($imagen !="")?$fecha_imagen->getTimestamp()."_".$imagen: "";

    $tmp_imagen = $_FILES["imagen"]["tmp_name"];
    if($tmp_imagen!=""){
        move_uploaded_file($tmp_imagen, "../../../assets/img/blog/").$nombre_archivo_imagen;
    }
//Insercion de los datos en la base.
$sentencia = $conexion->prepare("INSERT INTO `tabla_blog` (`titulo`,`descripcion` ,`imagen`) 
    VALUES (NULL, :titulo,  :descripcion, :imagen)");

    $sentencia->bindParam(":titulo", $titulo);
    $sentencia->bindParam(":descripcion", $descripcion);
    $sentencia->bindParam(":imagen", $nombre_archivo_imagen);

    $sentencia->execute();

    $mensaje="Registro agregado con éxito.";
    header("Location:index.php?mensjae=".$mensaje);
    exit();
}
include("../../templates/header.php");
?>
</br>
<div class="card">
    <div class="card-header">
        Blog
    </div>
    <div class="card-body">
        <form action="" enctype="multipart/form-data" method="post">
    
        <div class="mb-3">
            <label for="" class="form-label">Título:</label>
            <input
                type="text"
                class="form-control"
                name="titulo"
                id="titulo"
                aria-describedby="helpId"
                placeholder="Título"
            />
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Imágen:</label>
            <input
                type="file"
                class="form-control"
                name="imagen"
                id="imagen"
                aria-describedby="helpId"
                placeholder="Imágen"
            />
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Descripción:</label>
            <input
                type="text"
                class="form-control"
                name="descripcion"
                id="descripcion"
                aria-describedby="helpId"
                placeholder="Descripcion"
            />
        </div>
        <button type="submit" class="btn btn-success">Agregar</button>
        <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
    </div>
    <div class="card-footer text-muted"></div>

</div>
<?php include("../../templates/footer.php"); ?>
