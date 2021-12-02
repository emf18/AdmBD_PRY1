<?php
    include '../data/ConectionDB.php';
    $con = new ConectionDB();
    $conn = $con->conection2();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Gestión de Vendedor</title>

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
                    <a class ="nav-link" href="login.php">Salir</a>
                </span>                
            </div>
        </nav>
        
        <div class="card">
            <div class="card-header bg-info">
                <h3 class="text-white">Gestion de Clientes</h3>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-sm-2" style="margin:1em;">
                <form action="FichasTecnicas.php" method="post">
                    <button type="submit" class="btn btn-primary" id="enviar">Ficha Tecnica</button>
                    <?php
                        $query="SELECT DISTINCT m.idModelo, m.modelo FROM modelo m inner join automovil a on m.idModelo=a.idModelo";
                        $res = sqlsrv_query($conn,$query);
                        $option = "";   
                    ?>                        
                    <select class="form-control" name="fModelo" id="fModelo">
                        <option value="Seleccione">Seleccione</option>
                        <?php 
                        while($row=sqlsrv_fetch_array($res)){ ?>
                            <option value="<?php echo $row[0] ?>"><?php echo $row[1] ?></option>
                        <?php } ?>
                    </select> 
                </form>
            </div>
            <form action="Ventas.php" method="post">
                <div style="margin:1em; padding-left:4em;">
                    <button type="submit" class="btn btn-primary" id="enviarV">Generar Venta</button>
                </div>
                <div style="float:left; margin:10px;">
                    <?php
                        $query="SELECT cedula FROM cliente";
                        $res = sqlsrv_query($conn,$query);
                    ?>
                    <label for="cedulaVenta">Cedula Cliente:</label>                   
                    <select class="form-control" name="VCedula" id="VCedula">
                        <?php 
                        while($row=sqlsrv_fetch_array($res)){ ?>
                            <option value="<?php echo $row[0] ?>"><?php echo $row[0] ?></option>
                        <?php } ?>
                    </select> 
                    </div>
                <div style="float:left; margin:10px;">
                    <?php
                        $query="SELECT usuario FROM usuario where tipo=2";
                        $res = sqlsrv_query($conn,$query);
                    ?>
                    <label for="usuVenta">Vendedor:</label>                   
                    <select class="form-control" name="Vusu" id="Vusu">
                        <?php 
                        while($row=sqlsrv_fetch_array($res)){ ?>
                            <option value="<?php echo $row[0] ?>"><?php echo $row[0] ?></option>
                        <?php } ?>
                    </select> 
                </div>                 
            </form>                
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <label for="cedula">Cedula:</label>
                    <input type="text" name="cedula" id="cedula" placeholder="Ingrese el Modelo" onkeypress="return Numeros(event)" class="form-control" autofocus> 
                </div>
                <div class="col-md-6">
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" id="nombre" placeholder="Ingrese el Estilo" onkeypress="return Letras(event)" class="form-control" autofocus> 
                </div>
                <div class="col-md-6">
                    <label for="direccion">Direccion:</label>
                    <input type="text" name="direccion" id="direccion" placeholder="Ingrese La Cantidad" class="form-control">
                </div>
                <div class="col-md-6">
                    <label for="telefono">Telefono</label>
                    <input type="text" name="telefono" id="telefono" placeholder="Ingrese La Capacidad de Pasajeros" onkeypress="return Numeros(event)" class="form-control">
                </div>
                <div class="col-md-6">
                    <label for="ocupacion">Ocupacion:</label>
                    <input type="text" name="ocupacion" id="ocupacion" placeholder="Ingrese La Cantidad" onkeypress="return Letras(event)" class="form-control">
                </div>
                <div class="col-md-6">
                    <label for="correo">Correo:</label>
                    <input type="text" name="correo" id="correo" placeholder="Ingrese La Cantidad" class="form-control">
                </div>
            </div>
            <br><br>
            <center>
                <button type="button" class="btn btn-success" onclick="Crear();">Registrar</button>
            </center>

        </div>
            <div class ="card-footer">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Cedula</th>
                            <th>Nombre</th>
                            <th>Direccion</th>
                            <th>Telefono</th>
                            <th>Ocupacion</th>
                            <th>Correo</th>
                        </tr>
                    </thead>
                    <tbody  id="datos" >
                        <?php
                            $query = "SELECT * FROM cliente";
                            $res = sqlsrv_query($conn,$query);
                            while($row=sqlsrv_fetch_array($res)){
                        ?>
                       <tr> 
                            <td> <?php echo $row[0] ?></td>
                            <td> <?php echo $row[1] ?></td>
                            <td> <?php echo $row[2] ?></td>
                            <td> <?php echo $row[3] ?></td>
                            <td> <?php echo $row[4] ?></td>
                            <td> <?php echo $row[5] ?></td>

                            <?php } ?>
                        </tr>
                    </tbody>
                </table>
            </div>  
        </div>         
    </body>
    <script src="../JS/Iconos/js/all.min.js"></script>
    <script src="../JS/js/bootstrap.min.js"></script>
    <script src="../JS/Cliente.js"></script>
    <script src="../JS/SweetAlert.js"></script>
    <script src="../JS/Validaciones.js"></script>
</html>