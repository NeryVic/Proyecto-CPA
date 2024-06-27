<?php 
include("../../db.php"); // Inclusión de la base de datos.
$titulo = "";
$descripcion = "";

if (isset($_GET['txtID'])) {
    // Recuperar los datos del ID correspondiente
    $txtID = $_GET['txtID'];
    $sentencia = $conexion->prepare("SELECT * FROM `tbl_servicios` WHERE ID = :ID");
    $sentencia->bindParam(":ID", $txtID);
    $sentencia->execute();
    $registro = $sentencia->fetch(PDO::FETCH_ASSOC);

    // Asignar los valores del registro a las variables.
    $titulo = $registro['titulo'];
    $descripcion = $registro['descripcion'];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar los datos del formulario
    $txtID = $_POST['txtID'];
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];

    // Actualizar los datos
    $sentencia = $conexion->prepare("UPDATE `tbl_servicios` SET titulo = :titulo, descripcion = :descripcion WHERE ID = :ID");
    $sentencia->bindParam(":titulo", $titulo);
    $sentencia->bindParam(":descripcion", $descripcion);
    $sentencia->bindParam(":ID", $txtID);
    $sentencia->execute();

    // Redirigir después de la actualización
    header("Location: index.php?mensaje=Registro modificado con éxito");
    exit();
}

include("../../templates/header.php");?>
</br>
<div class="card">
    <div class="card-header">Servicios</div>
    <div class="card-body">
        <form method="post" action="">
            <input type="hidden" name="txtID" value="<?php echo $txtID; ?>">
            <div class="mb-3">
                <label for="titulo" class="form-label">Titulo:</label>
                <input
                    type="text"
                    class="form-control"
                    name="titulo"
                    id="titulo"
                    value="<?php echo $titulo; ?>"
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
                    value="<?php echo $descripcion; ?>"
                    aria-describedby="helpId"
                    placeholder="Descripcion"
                />
            </div>
            <button type="submit" class="btn btn-success">Actualizar</button>
            <a href="index.php" class="btn btn-primary">Cancelar</a>
        </form>
    </div>
    <div class="card-footer text-muted"></div>
</div>
<?php include("../../templates/footer.php"); ?>
