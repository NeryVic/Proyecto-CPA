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
                                        <input type="text" class="form-control form-control-user" id="name"
                                            placeholder="Nombre *">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="lastName"
                                            placeholder="Apellido/s *">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="dni" name= "dni"
                                        placeholder="DNI sin espacios ni puntos *">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="email"
                                        placeholder="Email Address *">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user"
                                            id="tel" placeholder="Telefono/Celular *">
                                    </div>
                                    <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-user" id="birthDate" name="birthDate" 
                                        placeholder="dd/mm/aaaa *" maxlength="14">
                                    </div>
                                    </div>
                                    <div class="form-group row">
                                        
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="password">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="password2">
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

        <script src="js/registro.js"></script>

</body>

</html>