<?php
    include "../data/ConectionDB.php";
    $con = new ConectionDB();
    $conn = $con->conection2();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Gestión de Administrador</title>

        <link rel="stylesheet" href="../JS/css/bootstrap.min.css">
        <link rel="stylesheet" href="../JS/Iconos/css/all.min.css">
	    
        <script src="../JS/js/jquery-2.1.4.min.js"></script>
    </head>

    <body onload="">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a  href="#" class="navbar-brand text-black">
                <img style="margin-top:20px; height:45px;" src="../Estilo/images/ford-logo.png" alt="Logo" />
                <br>Ford Motors
            </a>
            <button class="navbar-toggler" data-target="#menu" data-toggle="collapse" type="button">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav mr-auto  ml-auto">
                </ul>
                <span class="navbar-text">
                    <a class ="nav-link" href="Clientes.php">Atras</a>
                </span>                
            </div>
        </nav>
        
        <div class="card">
            <div class="card-header bg-info">
                <h3 class="text-white">Gestion de Ventas</h3>
            </div>
        </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <label for="cliente">Cliente:</label>
                        <input type="text" disabled class="form-control" id="cliente" name="cliente" value="<?php echo $_POST["VCedula"]; ?>" >
                    </div><div class="col-md-4">
                        <label for="vendedor">Vendedor:</label>
                        <input type="text" disabled class="form-control" name="vendedor" id="vendedor" value="<?php echo $_POST["Vusu"]; ?>" >
                    </div><div class="col-md-4">
                        <label for="auto">Automovil:</label>
                        <input type="text" disabled name="auto" id="auto"  class="form-control" placeholder="identifador del carro">
                </div>
            </div>
            <br><br>
            <center>
                <button type="button" class="btn btn-success" onclick="CrearV();">Registrar</button>
            </center>

            </div>
            <div class ="card-footer">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>Estilo</th>
                            <th>Color</th>
                            <th>Capacidad</th>
                            <th>Combustible</th>
                            <th>Transmision</th>
                            <th>Año</th>
                            <th>Stock</th>
                            <th>Precio</th>
                            <th>Detalles</th>
                        </tr>
                    </thead>
                    <tbody  id="datos" >
                        <?php
                            $query = "SELECT * FROM automovil";
                            $res = sqlsrv_query($conn,$query);
                            while($row=sqlsrv_fetch_array($res)){
                        ?>
                       <tr> 
                            <td> <?php echo $row[1] ?></td>
                            <td> <?php echo $row[2] ?></td>
                            <td> <?php echo $row[3] ?></td>
                            <td> <?php echo $row[4] ?></td>
                            <td> <?php echo $row[5] ?></td>
                            <td> <?php echo $row[6] ?></td>
                            <td> <?php echo $row[7] ?></td>
                            <td> <?php echo $row[8] ?></td>
                            <td> <?php echo $row[9] ?></td>
                            <td> <?php echo $row[10] ?></td>
                            <td> <?php echo $row[11] ?></td>

                            <td> 
                                <button type="button" class="btn btn-primary" onclick="PasarCar(<?php echo $row[0]?>)">Agregar</button>
                            </td>

                            <?php } ?>
                        </tr>
                </table>

            </card-footer>  
                       
    </body>
    <script src="../JS/Iconos/js/all.min.js"></script>
    <script src="../JS/js/bootstrap.min.js"></script>
    <script src="../JS/Cliente.js"></script>
    <script src="../JS/SweetAlert.js"></script>
    <script src="../JS/Validaciones.js"></script>

    <script>
        function PasarCar(id){
            document.getElementById("auto").value=id;
        }
    </script>
</html>