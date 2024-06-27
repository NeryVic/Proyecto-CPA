<?php 
include("../../db.php"); // Inclusión de la base de datos.
$nuevaImagen = "";
$imagen = "";

if (isset($_GET['txtID'])) {
    // Recuperar los datos del formulario
    $txtID = $_GET['txtID'];
    $sentencia = $conexion->prepare("SELECT * FROM `tbl_portfolio` WHERE ID=:ID");

    $sentencia->bindParam(":ID", $txtID);
    $sentencia->execute();
    $registro = $sentencia->fetch(PDO::FETCH_ASSOC);
    // Asignar los valores nuevos
    $imagen = $registro['imagen'];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se ha subido una nueva imagen
    if (isset($_FILES["imagen"]["name"]) && !empty($_FILES["imagen"]["name"])) {
        $nuevaImagen = $_FILES["imagen"]["name"];
        $tmp_imagen = $_FILES["imagen"]["tmp_name"];
        $nombre_archivo_imagen = date("YmdHis") . "_" . $nuevaImagen;
        move_uploaded_file($tmp_imagen, "../../../assets/img/portfolio/" . $nombre_archivo_imagen);

        // Eliminar imagen anterior si existe
        if (file_exists("../../../assets/img/portfolio/" . $imagen)) {
            unlink("../../../assets/img/portfolio/" . $imagen);
        }

        // Actualizar la tabla con la nueva imagen
        $sentencia = $conexion->prepare("UPDATE `tbl_portfolio` SET imagen=:imagen WHERE ID=:ID");
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
</br>
<div class="card">
    <div class="card-header">
        Editar portfolio
    </div>
    <div class="card-body">
        <form action="" enctype="multipart/form-data" method="post">
            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen:</label>
                <input type="file" class="form-control" name="imagen" id="imagen" placeholder="Imagen">
                <?php if ($imagen != ""): ?>
                    <br>
                    <img src="../../../assets/img/portfolio/<?php echo $imagen; ?>" width="150" alt="Imagen del portfolio">
                <?php endif; ?>
            </div>
            <button type="submit" class="btn btn-success">Actualizar</button>
            <a href="index.php" class="btn btn-primary">Cancelar</a>
        </form>
    </div>
    <div class="card-footer text-muted"></div>
</div>
<?php include("../../templates/footer.php"); ?>
