<?php 
include("../../db.php");
$nuevaImagen = "";//inicializa la variable nueva imagen
$titulo = "";
$descripcion = "";
$imagen = "";

if(isset($_GET['txtID'])){
    // Recuperar los datos del id correspondiente
    $txtID = $_GET['txtID'];
    $sentencia = $conexion->prepare("SELECT * FROM `tbl_blog` WHERE ID=:ID");
    $sentencia->bindParam(":ID", $txtID);
    $sentencia->execute();
    $registro = $sentencia->fetch(PDO::FETCH_ASSOC);

    // Asignar los valores del registro a las variables.
    $titulo = $registro['titulo'];
    $descripcion = $registro['descripcion'];
    $imagen = $registro['imagen'];
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Recuperar los datos del formulario
    $txtID = $_POST['txtID'];
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];

    // Actualizar los datos del blog sin la imagen
    $sentencia = $conexion->prepare("UPDATE `tbl_blog` SET titulo=:titulo, descripcion=:descripcion WHERE ID=:ID");
    $sentencia->bindParam(":titulo", $titulo);
    $sentencia->bindParam(":descripcion", $descripcion);
    $sentencia->bindParam(":ID", $txtID);
    $sentencia->execute();

    // Verificar si se ha subido una nueva imagen
    if(isset($_FILES["imagen"]["name"]) && !empty($_FILES["imagen"]["name"])){
        $nuevaImagen = $_FILES["imagen"]["name"];
        $tmp_imagen = $_FILES["imagen"]["tmp_name"];
        $nombre_archivo_imagen = date("YmdHis") . "_" . $nuevaImagen;
        move_uploaded_file($tmp_imagen, "../../../assets/img/blog/" . $nombre_archivo_imagen);

        // Eliminar imagen anterior si existe
        if(file_exists("../../../assets/img/blog/" . $imagen)){
            unlink("../../../assets/img/blog/" . $imagen);
        }

        // Actualizar la tabla con la nueva imagen
        $sentencia = $conexion->prepare("UPDATE `tbl_blog` SET imagen=:imagen WHERE ID=:ID");
        $sentencia->bindParam(":imagen", $nombre_archivo_imagen);
        $sentencia->bindParam(":ID", $txtID);
        $sentencia->execute();
    }

    // Redirigir después de la actualización
    header("Location: index.php?mensaje=Registro modificado con éxito");
    exit();
}
include("../../templates/header.php");
?>

<br>
<div class="card">
    <div class="card-header">Editar blog</div>
    <div class="card-body">
        <form action="" enctype="multipart/form-data" method="post">
            <input type="hidden" name="txtID" value="<?php echo $txtID; ?>">
            <div class="mb-3">
                <label for="titulo" class="form-label">Titulo:</label>
                <input type="text" class="form-control" name="titulo" id="titulo" value="<?php echo $titulo; ?>" placeholder="Titulo">
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripcion:</label>
                <input type="text" class="form-control" name="descripcion" id="descripcion" value="<?php echo $descripcion; ?>" placeholder="Descripcion">
            </div>
            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen:</label>
                <input type="file" class="form-control" name="imagen" id="imagen" placeholder="Imagen">
                <?php if($imagen != ""): ?>
                    <br>
                    <img src="../../../assets/img/blog/<?php echo $imagen; ?>" width="150" alt="Imagen del blog">
                <?php endif; ?>
            </div>
            <button type="submit" class="btn btn-success">Actualizar</button>
            <a href="index.php" class="btn btn-primary">Cancelar</a>
        </form>
    </div>
    <div class="card-footer text-muted"></div>
</div>

<?php include("../../templates/footer.php"); ?>
