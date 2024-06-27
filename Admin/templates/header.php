<?php 
$url_base="http://localhost/proyecto-CPA/admin/";

?>
<!doctype html>
<html lang="en">
    <head>
        <title>Administrador del sitio</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />
        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        
        <!-- Incluye Remix Icon desde un CDN -->
        <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <script src="http://localhost/proyecto-CPA/assets/js/expirador3000.js"></script>
    </head>
    <body data=bs=theme="light">
        <header>
            <!-- place navbar here -->
            <nav class="navbar navbar-expand-lg lg-body-tertiary text-white">
                <div class="nav navbar-nav d-flex ">
                <button onclick="cambiarModo()" class="btn bg-primary rounded-fill"><i id="dl-icon" class="bi bi-moon-fill"></i></button>
                    <a class="nav-item nav-link active" href="<?php echo $url_base;?>index.php" aria-current="page"
                        >Administrador <span class="visually-hidden">(current)</span></a
                    >
                    
                    <a class=" nav-link active" href="<?php echo $url_base;?>secciones/servicios/">Servicios</a>
                    <a class=" nav-link active" href="<?php echo $url_base;?>secciones/portfolio/">Portfolio</a>
                    <a class=" nav-link active" href="<?php echo $url_base;?>secciones/blog/">Blog</a>
                    <a class=" nav-link active" href="<?php echo $url_base;?>secciones/socios/">Usuarios</a>
                    <a class=" nav-link active" href="<?php echo $url_base;?>cerrar.php" >Cerrar sesión</a>
                </div>
                
            </nav>
            
        </header>
        <main class="container">
        </br>
        <script>
            // JavaScript para alternar el modo oscuro
            const darkMode = () => {
            document.querySelector('body').setAttribute('data-bs-theme', 'dark');
            document.querySelector('#dl-icon').setAttribute('class', 'bi bi-sun-fill');
            localStorage.setItem('theme', 'dark');
            }
            const lightMode = () => {
            document.querySelector('body').setAttribute('data-bs-theme', 'light');
            document.querySelector('#dl-icon').setAttribute('class', 'bi bi-moon-fill');
            localStorage.setItem('theme', 'light');
            }

            const cambiarModo = () => {
            document.querySelector('body').getAttribute('data-bs-theme') === 'light' ? darkMode() : lightMode();
            }
             // Comprobar la preferencia del modo almacenada en localStorage
            document.addEventListener('DOMContentLoaded', () => {
            const theme = localStorage.getItem('theme');
            if (theme === 'dark') {
                darkMode();
            } else {
                lightMode();
            }
        });
        </script>
    </body>
    </html>
