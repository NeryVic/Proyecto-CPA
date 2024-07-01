<?php 
include("../../db.php");//inclusion de la base de datos.
// Seleccionar los registros de la base de datos
$sentencia = $conexion->prepare("SELECT * FROM `tbl_users`");
$sentencia->execute();
$lista_usuarios = $sentencia->fetchAll(PDO::FETCH_ASSOC);
include("../../templates/header.php")?>
<br>
<head>
    <link rel="stylesheet" href="../../../usr/css/sbd-admin-2.css">
    <style>
      
    </style>
</head>

       <div class="container-fluid">

                    <!-- Page Heading -->
                

                    <!-- DataTales Exampleeee -->
                    <div class="card shadow mb-4">
                    <div class="card-header">
                        <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Agregar Registro</a>
                    </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Apellido</th>
                                            <th>D.N.I</th>
                                            <th>Fecha_Inicio</th>
                                            <th>Fecha_fin</th>
                                            <th>Plan</th>
                                            <th>Acciones</th>
                                            
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Apellido</th>
                                            <th>D.N.I</th>
                                            <th>Fecha_Inicio</th>
                                            <th>Fecha_fin</th>
                                            <th>Plan</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Pablo Pedro </td>
                                            <td>Perez Pereira</td>
                                            <td>33.333.333</td>
                                            <td>28/06/2024</td>
                                            <td>28/07/2024</td>
                                            <td>1 mes</td>
                                            <td>
                                            <a href="editar.php?txtID=<?php echo $registro['ID']; ?>" class="btn btn-info" role="button"><i class="ri-list-settings-line"></i></a>
                                            <a href="index.php?txtID=<?php echo $registro['ID']; ?>" onclick="return confirmarEliminacion()" class="btn btn-danger" role="button"><i class="ri-delete-bin-6-line"></i></a>
                                            </td>
                                        </tr>                                      
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
                </div>
            <!-- End of Main Content -->
<!-- Bootstrap core JavaScript-->
<script src="../../../usr/vendor/jquery/jquery.js"></script>
    <script src="../../../usr/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../../usr/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../../usr/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../../../usr/vendor/datatables/jquery.dataTables.js"></script>
    <script src="../../../usr/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../../../usr/js/demo/datatables-demo.js"></script>
    </div>
    <div class="card-footer text-muted"></div>
</div>

<?php include("../../templates/footer.php")?>
