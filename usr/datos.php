<?php 
include("template/header.php");
?>

                <!-- Begin Page Content -->
                <div class="container">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800 border-left-primary border-bottom-primary">Club Pabellón Argentino</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generar carnet</a>
                    </div>
                </div>

                <div class="container">

<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            
            <div class="col-lg-7">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Modificar datos</h1>
                    </div>
                    <form class="user">
                        <div class="text-center">
                            <label for="" class="form-label"></label>
                            <img class="img-fluid rounded-sm rounded-circle " width="75" height="75" src="../assets/images/person-1.jpg" alt="profile">
                            <hr>
                            
                            <input
                                type="file"
                                class="form-control"
                                name=""
                                id=""
                                placeholder=""
                                aria-describedby="fileHelpId"
                            />
                            <div id="fileHelpId" class="form-text">Completar campos</div>
                        </div>
                        
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                    placeholder="Nombre">
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control form-control-user" id="exampleLastName"
                                    placeholder="Apellido">
                            </div>
                        </div>
                        <div id="fileHelpId" class="form-text">-Para cambiar nombre y apellido debe contactar al administrador</div>
                        <hr>
                        <div class="form-group">
                            <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                placeholder="Email">
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="number" class="form-control form-control-user"
                                    id="" placeholder="Telefono/Celular">
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control form-control-user"
                                    id="exampleRepeatPassword" placeholder="Calle">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label"></label>
                                <select
                                    class="form-select form-select-lg"
                                    name=""
                                    id=""
                                >
                                    <option selected>Ciudad</option>
                                    <option value="">El Colorado</option>
                                    <option value="">Villa 213</option>
                                    <option value="">Villafañe</option>
                                    <option value="">Pirané</option>
                                    <option value="">Formosa</option>
                                </select>
                            </div>
                            
                        </div>
                        <a href="login.html" class="btn btn-primary btn-user btn-block">
                            Guardar
                        </a>
                        <a href="index.php" class="btn btn-danger btn-user btn-block">
                            Cancelar
                        </a>
                        <hr>
                        
                    </form>
                    <hr>
                    <div class="text-center">
                        <a class="small" href="forgot-password.html"></a>
                    </div>
                    <div class="text-center">
                        <a class="small" href="login.html"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
            <?php 
include("template/footer.php");
?>