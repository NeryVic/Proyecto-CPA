<?php
include("../Admin/db.php");

if (isset($_GET['token'])) {
    $token = $_GET['token'];
    $stmt = $conexion->prepare("SELECT * FROM `users` WHERE `verification_token` = :token");
    $stmt->bindParam(":token", $token);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $stmt = $conexion->prepare("UPDATE `users` SET `is_verified` = 1, `verification_token` = NULL WHERE `ID` = :id");
        $stmt->bindParam(":id", $user['ID']);
        $stmt->execute();

        echo "Correo verificado exitosamente.";
    } else {
        echo "Token no válido.";
    }
}
?>
