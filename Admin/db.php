<?php   
$server = "localhost";
$dataBase = "club_pabellon_argentino";
$SuperUser = "root";
$Password = "";

try {
$conexion = new PDO("mysql:host=$server;dbname=$dataBase", $SuperUser, $Password);
echo "Conexion realizada con exito";
// Establecer el modo de error PDO para que lance excepciones
$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $error){
    echo "Error en la conexión: " . $error->getMessage();
}
?>