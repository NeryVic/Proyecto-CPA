<?php 
include("../../db.php");//inclusion de la base de datos.

if($_SERVER["REQUEST_METHOD"] == "POST"){
$titulo = (isset($_POST['titulo']) )? $_POST['titulo'] : "";
$descripcion = (isset($_POST['descripcion']) )? $_POST['descripcion'] : "";

//Insercion de los datos en la base.
$sentencia = $conexion->prepare("INSERT INTO `tbl_servicios`(`titulo` ,`descripcion`) 
    VALUES (:titulo, :descripcion)");

    $sentencia->bindParam(":titulo", $titulo);
    $sentencia->bindParam(":descripcion", $descripcion);

    $sentencia->execute();

    $mensaje="Registro agregado con éxito.";
    header("Location:index.php?mensaje=".$mensaje);
    exit();

}
include("../../templates/header.php")?>
</br>
<div class="card">
    <div class="card-header">Servicios</div>
    <div class="card-body">
        <form action="" method="post">
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
        <button type="submit" class="btn btn-success">Agregar</button>
        <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
        </form>
    </div>
    <div class="card-footer text-muted"></div>
</div>
<?php include("../../templates/footer.php")?>