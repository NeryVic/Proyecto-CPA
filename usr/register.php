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
                            <form class="user">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="Nombre *">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="exampleLastName"
                                            placeholder="Apellido/s *">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleInputEmail" name= "dni"
                                        placeholder="DNI sin espacios ni puntos *">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Email Address *">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="number" class="form-control form-control-user"
                                            id="" placeholder="Telefono/Celular *">
                                    </div>
                                    <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-user" id="birthDate" name="birthDate" 
                                        placeholder="Fecha de Nacimiento *" maxlength="14">
                                    </div>
                                    </div>
                                    <div class="form-group row">
                                        
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Repeat Password">
                                    </div>
                                </div>
                                <a href="login.html" class="btn btn-primary btn-user btn-block">
                                    Register Account
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
    <script>
        document.getElementById('birthDate').addEventListener('input', function(e) {
            let input = e.target.value.replace(/\D/g, '').substring(0, 8); // Elimina todo lo que no sean dígitos y limita a 8 caracteres
            let day = input.substring(0, 2);
            let month = input.substring(2, 4);
            let year = input.substring(4, 8);

            if (input.length > 4) {
                e.target.value = `${day} / ${month} / ${year}`;
            } else if (input.length > 2) {
                e.target.value = `${day} / ${month}`;
            } else if (input.length > 0) {
                e.target.value = `${day}`;
            }
        });
    </script>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>