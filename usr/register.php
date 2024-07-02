<?php 
include("../Admin/db.php");


if ($_POST) {
    $nombre = $_POST['nombre'] ?? "";
    $apellido = $_POST['apellido'] ?? "";
    $DNI = $_POST['DNI'] ?? "";
    $usuario = $_POST['usuario'] ?? "";
    $email = $_POST['email'] ?? "";
    $password = $_POST['password'] ?? "";
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    $verification_token = bin2hex(random_bytes(50)); // Generar token de verificación

    $stmt = $conexion->prepare("INSERT INTO `users` (`nombre`, `apellido`, `DNI`, `usuario`, `email`, `password`, `verification_token`) VALUES (:nombre, :apellido, :DNI, :usuario, :email, :password, :verification_token)");
    $stmt->bindParam(":nombre", $nombre);
    $stmt->bindParam(":apellido", $apellido);
    $stmt->bindParam(":DNI", $DNI);
    $stmt->bindParam(":usuario", $usuario);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":password", $password_hash);
    $stmt->bindParam(":verification_token", $verification_token);
    $stmt->execute();

    // Enviar correo de verificación
    $to = $email;
    $subject = "Confirma tu correo electrónico";
    $message = "Haz clic en el siguiente enlace para verificar tu correo: http://tudominio.com/verify.php?token=$verification_token";
    $headers = "From: no-reply@tudominio.com";

    mail($to, $subject, $message, $headers);

    echo "Registro exitoso. Por favor, verifica tu correo.";
}
?>




<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CPA - Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image">
                        <img  width="100%" height="100%" src="../assets/images/hero-1.jpg" alt="">
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create una Cuenta!</h1>
                                
                            </div>
                            <span id="error" class="text-danger"></span>
                            <form class="user" id="form" action="/submit" method="post">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="name" name="name"
                                            placeholder="Nombre *">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" name="lastName" id="lastName"
                                            placeholder="Apellido/s *">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="dni" name= "dni"
                                        placeholder="DNI sin espacios ni puntos *">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" name="email" id="email"
                                        placeholder="Email Address *">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="tel" class="form-control form-control-user"
                                            id="tel" name="tel"  placeholder="Telefono/Celular *">
                                    </div>
                                    <div class="col-sm-6">
                                    <input for="birthDate" type="text" class="form-control form-control-user" id="birthDate" name="birthDate" 
                                        placeholder="dd/mm/aaaa *" maxlength="14">
                                    </div>
                                    </div>
                                    <div class="form-group row">
                                        
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" name="pass"
                                            id="password" placeholder="password">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user" name="pass2"
                                            id="password2" placeholder="repetir password">
                                    </div>
                                </div>
                                <a href="#" class="btn btn-primary btn-user btn-block" id="btn">
                                    Registrar
                                </a>
                                <hr>
                                
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Olvidaste tu Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login.html">Ya tienes una cuenta? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

        <script src="js/registro.js"></script>

</body>

</html>