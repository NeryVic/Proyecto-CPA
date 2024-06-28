<?php 
include("../../db.php");

// Inicializar variables
$nombre = "";
$apellido = "";
$DNI = "";
$usuario = "";
$password = "";

// Verificar si txtID está en la URL
if (isset($_GET['txtID'])) {
    $txtID = $_GET['txtID'];
    // Recuperar los datos del id correspondiente
    $sentencia = $conexion->prepare("SELECT * FROM `tbl_admins` WHERE ID = :ID");
    $sentencia->bindParam(":ID", $txtID);
    $sentencia->execute();
    $registro = $sentencia->fetch(PDO::FETCH_ASSOC);

    // Asignar los valores del registro a las variables
    $nombre = $registro['nombre'];
    $apellido = $registro['apellido'];
    $DNI = $registro['DNI'];
    $usuario = $registro['usuario'];
    $password = $registro['password'];
}

// Verificar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar los datos del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $DNI = $_POST['DNI'];
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    // Actualizar los valores
    $sentencia = $conexion->prepare("UPDATE `tbl_admins` SET nombre = :nombre, apellido = :apellido, DNI = :DNI, usuario = :usuario, password = :password WHERE ID = :ID");
    $sentencia->bindParam(":nombre", $nombre);
    $sentencia->bindParam(":apellido", $apellido);
    $sentencia->bindParam(":DNI", $DNI);
    $sentencia->bindParam(":usuario", $usuario);
    $sentencia->bindParam(":password", $password);
    $sentencia->bindParam(":ID", $txtID); // Asegúrate de vincular el ID también
    $sentencia->execute();

        // Redirigir después de la actualización
        header("Location: index.php?mensaje=Registro modificado con éxito");
        exit();
}

include("../../templates/header.php");
?>

<div class="card">
    <div class="card-header">
        Administrador/a
    </div>
    <div class="card-body">
        <form action="" enctype="multipart/form-data" method="post">
            <input type="hidden" name="txtID" value="<?php echo $txtID; ?>" /> <!-- Campo oculto para txtID -->
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input
                    value="<?php echo $nombre; ?>"
                    type="text"
                    class="form-control"
                    name="nombre"
                    id="nombre"
                    aria-describedby="helpId"
                    placeholder="Nombre"
                />
            </div>
            <div class="mb-3">
                <label for="apellido" class="form-label">Apellido:</label>
                <input
                    value="<?php echo $apellido; ?>"
                    type="text"
                    class="form-control"
                    name="apellido"
                    id="apellido"
                    aria-describedby="helpId"
                    placeholder="Apellido"
                />
            </div>
            <div class="mb-3">
                <label for="DNI" class="form-label">D.N.I:</label>
                <input
                    value="<?php echo $DNI; ?>"
                    type="number"
                    class="form-control"
                    name="DNI"
                    id="DNI"
                    aria-describedby="helpId"
                    placeholder="D.N.I"
                />
            </div>
            <div class="mb-3">
                <label for="usuario" class="form-label">Usuario:</label>
                <input
                    value="<?php echo $usuario; ?>"
                    type="text"
                    class="form-control"
                    name="usuario"
                    id="usuario"
                    aria-describedby="helpId"
                    placeholder="Usuario"
                />
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña:</label>
                <input
                    value="<?php echo $password; ?>"
                    type="password"
                    class="form-control"
                    name="password"
                    id="password"
                    aria-describedby="helpId"
                    placeholder="Contraseña" 
                />
            </div>
            <button type="submit" class="btn btn-success">Actualizar</button>
            <a href="index.php" class="btn btn-primary">Cancelar</a>
        </form>
    </div>
    <div class="card-footer text-muted"></div>
</div>

<?php include("../../templates/footer.php"); ?>
