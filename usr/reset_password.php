<?php
include("../../db.php");

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    if ($_POST) {
        $password = $_POST['password'] ?? "";
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $conexion->prepare("UPDATE `users` SET `password` = :password, `password_reset_token` = NULL WHERE `password_reset_token` = :token");
        $stmt->bindParam(":password", $password_hash);
        $stmt->bindParam(":token", $token);
        $stmt->execute();

        echo "Contraseña actualizada exitosamente.";
    }
} else {
    echo "Token no válido.";
}
?>
<form method="post">
    <div class="mb-3">
        <label for="password" class="form-label">Nueva Contraseña:</label>
        <input type="password" class="form-control" name="password" id="password" placeholder="Nueva Contraseña" required>
    </div>
    <button type="submit" class="btn btn-success">Restablecer Contraseña</button>
</form>
