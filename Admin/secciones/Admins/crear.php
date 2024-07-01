<?php 
include("../../db.php");

if($_POST){
    //Recepcionamos los valores del formulario.
    $nombre = (isset($_POST['nombre'])) ? $_POST['nombre']  :   "";
    $apellido = (isset($_POST['apellido'])) ? $_POST['apellido']  :   "";
    $DNI = (isset($_POST['DNI'])) ? $_POST['DNI']  :   "";
    $usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : "";
    $password = (isset($_POST['password'])) ? $_POST['password']  :   "";

    // Encriptar la contraseña
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

        // Insertar el usuario y la contraseña en la base de datos
        $sentencia = $conexion->prepare("INSERT INTO `tbl_admins` (`ID`, `nombre`, `apellido`, `DNI`, `password`, `usuario`) 
        VALUES (NULL, :nombre, :apellido, :DNI, :password, :usuario)");

        $sentencia->bindParam(":nombre", $nombre);
        $sentencia->bindParam(":apellido", $apellido);
        $sentencia->bindParam(":DNI", $DNI);
        $sentencia->bindParam(":usuario", $usuario); // Agregar este bindParam
        $sentencia->bindParam(":password", $password_hash);

        $sentencia->execute();

        $mensaje="Registro agregado con éxito,";
        header("Location:index.php?mensaje=".$mensaje);
}

include("../../templates/header.php");?>

<div class="card">
    <div class="card-header">
        Administrador/a
    </div>
    <div class="card-body">
    <form action="" enctype="multipart/form-data" method="post">
<div class="mb-3">
    <label for="" class="form-label">Nombre:</label>
    <input
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
        type="number"
        class="form-control"
        name="DNI"
        id="DNI"
        aria-describedby="helpId"
        placeholder="D.N.I"
    />
</div>
<div class="mb-3">
    <label for="" class="form-label">Usuario:</label>
    <input
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
        type="password"
        class="form-control"
        name="password"
        id="password"
        aria-describedby="helpId"
        placeholder="Contraseña"
    />
</div>
    <button type="submit" class="btn btn-success">Agregar</button>
    <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
    </form>
    </div>
    <div class="card-footer text-muted"></div>
</div>
<?php include("../../templates/footer.php");?>
