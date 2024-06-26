
<?php
include("../Admin/db.php");

if ($_POST) {
    $email = $_POST['email'] ?? "";
    $stmt = $conexion->prepare("SELECT * FROM `users` WHERE `email` = :email");
    $stmt->bindParam(":email", $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $token = bin2hex(random_bytes(50));
        $stmt = $conexion->prepare("UPDATE `users` SET `password_reset_token` = :token WHERE `email` = :email");
        $stmt->bindParam(":token", $token);
        $stmt->bindParam(":email", $email);
        $stmt->execute();

        // Enviar correo de recuperación
        $to = $email;
        $subject = "Recupera tu contraseña";
        $message = "Haz clic en el siguiente enlace para restablecer tu contraseña: http://tudominio.com/reset_password.php?token=$token";
        $headers = "From: no-reply@tudominio.com";

        mail($to, $subject, $message, $headers);

        echo "Se ha enviado un enlace de recuperación a tu correo.";
    } else {
        echo "Correo no encontrado.";
    }
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

    <title>CPA - Forgot Password</title>

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

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-password-image">
                                <img  width="100%" height="100%" src="../assets/images/hero-1.jpg" alt="">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">Olvidaste tu contraseña?</h1>
                                        <p class="mb-4">Lo entendemos, suceden cosas. ¡Simplemente ingrese su dirección de correo electrónico 
                                            a continuación y le enviaremos un enlace para restablecer su contraseña!</p>
                                    </div>
                                    <form class="user">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Ingrese su correo...">
                                        </div>
                                        <a href="login.html" class="btn btn-primary btn-user btn-block">
                                            Restablecer
                                        </a>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="register.html">Create an Account!</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="login.html">Already have an account? Login!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>