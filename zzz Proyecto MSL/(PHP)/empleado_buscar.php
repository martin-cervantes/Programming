<!DOCTYPE html>
<html>
    <head>
        <title>Informaci&oacute;n Empleado</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="style.css" />
    </head>
    <body>
        <div class="container">
            <h1>Informaci&oacute;n Empleado</h1>
            <?php
                require_once "conexion.php";

                $id = $_GET["id"];

                if($conexion->connect_error)
                {
                    die("Error: ".$conexion->connect_error);
                }
                else
                {
                    $comando = "SELECT * 
                                FROM Employees 
                                WHERE employee_id =" . $id;

                    $resultado = $conexion->query($comando);
                    
                    $rows = $resultado->fetch_assoc();
                    
                    echo "<form action='index.php' method='POST'>
                            <div class='form-group'>
                                <label for='employee_id'>Id Empleado</label>
                                <input type='text' class='form-control' name='employee_id' value='" . $rows["employee_id"] . "' readonly />
                            </div>
                            <div class='form-group'>
                                <label for='first_name'>Nombre</label>
                                <input type='text' class='form-control' name='first_name' value='" . $rows["first_name"] . "' readonly />
                            </div>
                            <div class='form-group'>
                                <label for='last_name'>Apellido</label>
                                <input type='text' class='form-control' name='last_name' value='" . $rows["last_name"] . "' readonly />
                            </div>
                            <div class='form-group'>
                                <label for='email'>Correo</label>
                                <input type='email' class='form-control' name='email' value='" . $rows["email"] . "' readonly />
                            </div>
                            <div class='form-group'>
                                <label for='manager'>Supervisor</label>
                                <input type='text' class='form-control' name='manager' value='" . $rows["manager"] . "' readonly />
                            </div>";
                            
                    
                    $comando = "SELECT * 
                                FROM Leave_requests 
                                WHERE employee_id =" . $id;
                    
                    $resultado = $conexion->query($comando);
                    
                    if($resultado->num_rows > 0)
                    {
                        echo "<h1>Permisos</h1>";
                    
                        echo "<table class='table'>
                                  <thead>
                                      <tr>
                                          <th scope='col'>Id</th>
                                          <th scope='col'>Inicio</th>
                                          <th scope='col'>Finaliza</th>
                                          <th scope='col'>Regreso</th>
                                          <th scope='col'>#D&iacute;as</th>
                                          <th scope='col'><center>Tipo</center></th>
                                          <th scope='col'><center>Status</center></th>
                                          <th scope='col'></th>
                                          <th scope='col'></th>
                                      </tr>
                                  </thead>
                                  <tbody>";

                        while($rows = $resultado->fetch_assoc())
                        {
                            $fila = "<tr>
                                       <td scope='row'>" . $rows["leave_request_id"] . "</td>
                                       <td>" . $rows["start_date"] . "</td>
                                       <td>" . $rows["end_date"] . "</td>
                                       <td>" . $rows["return_date"] . "</td>
                                       <td>" . $rows["number_of_days"] . "</td>
                                       <td>" . $rows["type_of_leave"] . "</td>";

                            switch($rows["status"])
                            {
                                case "0":
                                    $status = "Enviada";
                                    break;
                                case "1":
                                    $status = "Aprobada";
                                    break;
                                case "2":
                                    $status = "Denegada (Sup)";
                                    break;
                                case "3":
                                    $status = "Denegada (RH)";
                                    break;
                                case "4":
                                    $status = "Validada";
                                    break;
                            }

                            $fila = $fila . "<td>" . $status . "</td>
                                      </tr>";

                            echo $fila;
                        }

                        echo "</tbody></table>";
                    }
                    else
                    {
                        echo "O permisos<br />";
                    }
                    
                    echo "<button type='submit' class='btn btn-danger'>Regresar</button>
                      </form>";
                    
                    $conexion = null;
                }
            ?>
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
        </div>
    </body>
</html>