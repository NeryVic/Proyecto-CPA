<?php 
include("../../db.php");// Inclusión de la base de datos.

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Recepción de la imagen del formulario
    $imagen = (isset($_FILES["imagen"]["name"])) ? $_FILES["imagen"]["name"] : "";

    $fecha_imagen = new DateTime();
    $nombre_archivo_imagen = ($imagen != "") ? $fecha_imagen->getTimestamp() . "_" . $imagen : "";

    $tmp_imagen = $_FILES["imagen"]["tmp_name"];
    if ($tmp_imagen != "") {
        move_uploaded_file($tmp_imagen, "../../../assets/img/portfolio/" . $nombre_archivo_imagen);
    }

    // Inserción de la imagen en la base de datos
    $sentencia = $conexion->prepare("INSERT INTO `tbl_portfolio` (`imagen`) VALUES (:imagen)");

    $sentencia->bindParam(":imagen", $nombre_archivo_imagen);

    $sentencia->execute();
    
    $mensaje = "Registro agregado con éxito.";
    header("Location:index.php?mensaje=" . $mensaje);
    exit();
}
include("../../templates/header.php");
?>
</br>
<div class="card">
    <div class="card-header">
        Portfolio
    </div>
    <div class="card-body">
        <form action="" enctype="multipart/form-data" method="post">
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
            <button type="submit" class="btn btn-success">Agregar</button>
            <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
        </form>
    </div>
    <div class="card-footer text-muted"></div>
</div>

<?php include("../../templates/footer.php"); ?>
