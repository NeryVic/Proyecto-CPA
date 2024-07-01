<?php 
include("../../db.php");//inclusion de la base de datos.
if($_SERVER["REQUEST_METHOD"] == "POST"){

    //Recepcionamos los valores del formulario.
    $imagen	 = (isset($_FILES["imagen"]["name"])) ?  $_FILES["imagen"]["name"]   :   "";
    $nombre = (isset($_POST['nombre'])) ? $_POST['nombre']  :   "";
    $apellido = (isset($_POST['apellido'])) ? $_POST['apellido']  :   "";
    $DNI = (isset($_POST['DNI'])) ? $_POST['DNI']  :   "";
    $telefono = (isset($_POST['telefono'])) ? $_POST['telefono']  :   "";
    $correo = (isset($_POST['correo'])) ? $_POST['correo']  :   "";


    $fecha_imagen=new   DateTime();
    $nombre_archivo_imagen=($imagen != "")? $fecha_imagen->getTimestamp() ."_". $imagen: "";

    $tmp_imagen = $_FILES["imagen"]["tmp_name"];
    if($tmp_imagen!=""){
        move_uploaded_file($tmp_imagen, "../../../assets/img/usuarios/" . $nombre_archivo_imagen);
    }
//Insercion de los datos en la base.
$sentencia = $conexion->prepare("INSERT INTO `tbl_users`(`imagen`,`nombre` ,`apellido`,`DNI`,`telefono`,`correo`) 
    VALUES (:imagen,  :nombre, :apellido, :DNI, :telefono, :correo)");

    $sentencia->bindParam(":imagen", $nombre_archivo_imagen);
    $sentencia->bindParam(":nombre", $nombre);
    $sentencia->bindParam(":apellido", $apellido);
    $sentencia->bindParam(":DNI", $DNI);
    $sentencia->bindParam(":telefono", $telefono);
    $sentencia->bindParam(":correo", $correo);

    $sentencia->execute();

    $mensaje="Registro agregado con éxito.";
    header("Location:index.php?mensaje=".$mensaje);
    exit();
}
include("../../templates/header.php")?>
<br>
<div class="card">
    <div class="card-header">
        Usuarios
    </div>
    <div class="card-body">
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
            type="text"
            class="form-control"
            name="DNI"
            id="DNI"
            aria-describedby="helpId"
            placeholder="D.N.I"
        />
    </div>
    
<div class="mb-3">
    <label for="fecha_inicio" class="form-label">Fecha_Inicio:</label>
    <input
        type="text"
        class="form-control"
        name="fecha_inicio"
        id="fecha_inicio"
        aria-describedby="helpId"
        placeholder="fecha_inicio"
    />
</div>

    
    <div class="mb-3">
        <label for="fecha_fin" class="form-label">Fecha_fin:</label>
        <input
            type="text"
            class="form-control"
            name="fecha_fin"
            id="fecha_fin"
            aria-describedby="helpId"
            placeholder="Fecha_fin"
        />
    </div>

    <div class="mb-3">
        <label for="plan" class="form-label">Plan:</label>
        <input
            type="text"
            class="form-control"
            name="plan"
            id="plan"
            aria-describedby="helpId"
            placeholder="plan"
        />
    </div>
    
    <div class="mb-3">
        <label for="" class="form-label">Imagen:</label>
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
    </div>
    <div class="card-footer text-muted"></div>
</div>

<?php include("../../templates/footer.php")?>