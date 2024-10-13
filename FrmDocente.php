<?PHP
include("conexion.php");
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <title>Gestión de Docentes</title>
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 30px;
        }

        header, footer {
            background-color: #343a40;
            color: white;
            padding: 20px;
        }

        h1 {
            margin: 0;
        }

        .form-control {
            margin-bottom: 10px;
        }

        .btn {
            margin-right: 5px;
        }
    </style>
</head>

<body>
    <header class="text-center">
        <h1>Gestión de Docentes</h1>
    </header>
    <div class="container">
        <form action="" method="post" class="my-4">
            <div class="form-group row">
                <label for="txtbus" class="col-sm-2 col-form-label">Buscar</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="txtbus" id="txtbus" />
                </div>
                <div class="col-sm-2">
                    <input type="submit" class="btn btn-primary" name="btn1" value="Buscar" />
                </div>
            </div>

            <div class="form-group">
                <label for="txtcod">Carnet:</label>
                <input type="text" class="form-control" name="txtcod" id="txtcod" value="" />
            </div>

            <div class="form-group">
                <label for="txtnom">Nombre:</label>
                <input type="text" class="form-control" name="txtnom" id="txtnom" value="" />
            </div>

            <div class="form-group">
                <label for="txtape">Apellido:</label>
                <input type="text" class="form-control" name="txtape" id="txtape" value="" />
            </div>

            <div class="form-group">
                <label for="txtdir">Dirección:</label>
                <input type="text" class="form-control" name="txtdir" id="txtdir" value="" />
            </div>

            <div class="form-group">
                <label for="txtgen">Género:</label>
                <select class="form-control" name="txtgen" id="txtgen">
                    <option>Femenino</option>
                    <option>Masculino</option>
                </select>
            </div>

            <div class="form-group">
                <label for="txttel">Teléfono:</label>
                <input type="text" class="form-control" name="txttel" id="txttel" value="" />
            </div>

            <div class="form-group">
                <label for="txtemail">Email:</label>
                <input type="email" class="form-control" name="txtemail" id="txtemail" value="" />
            </div>

            <div class="form-group">
                <label for="txtcel">Celular:</label>
                <input type="text" class="form-control" name="txtcel" id="txtcel" value="" />
            </div>

            <div class="form-group">
                <label for="txtfec">Fecha de Nacimiento:</label>
                <input type="date" class="form-control" name="txtfec" id="txtfec" value="" />
            </div>

            <div class="form-group">
                <label for="txtesp">Especialidad:</label>
                <input type="text" class="form-control" name="txtesp" id="txtesp" value="" />
            </div>

            <div class="text-center">
                <input type="submit" class="btn btn-success mx-1" name="btn1" value="Agregar" />
                <input type="submit" class="btn btn-info mx-1" name="btn1" value="Mostrar" />
                <input type="submit" class="btn btn-warning mx-1" name="btn1" value="Modificar" />
                <input type="submit" class="btn btn-danger mx-1" name="btn1" value="Eliminar" />
            </div>
        </form>

        <?php
        if (isset($_POST["btn1"])) {
            $btn = $_POST["btn1"];
            $bus = $_POST["txtbus"];
            $cod = $_POST["txtcod"];
            $nom = $_POST["txtnom"];
            $ape = $_POST["txtape"];
            $dir = $_POST["txtdir"];
            $gen = $_POST["txtgen"];
            $tel = $_POST["txttel"];
            $email = $_POST["txtemail"];
            $cel = $_POST["txtcel"];
            $fec = $_POST["txtfec"];
            $esp = $_POST["txtesp"];

            if ($btn == "Buscar") {
                $sql = "SELECT * FROM docente WHERE carnet_doc='$bus'";
$cs = mysqli_query($cn, $sql);
if ($resul = mysqli_fetch_array($cs)) {
    // Asignar los valores a un objeto JSON para usarlos en JavaScript
    echo "<script>
        const datosDocente = {
            carnet: '" . addslashes($resul['carnet_doc']) . "',
            nombre: '" . addslashes($resul['nombre_doc']) . "',
            apellido: '" . addslashes($resul['apellido_doc']) . "',
            direccion: '" . addslashes($resul['direccion_doc']) . "',
            genero: '" . addslashes($resul['genero_doc']) . "',
            telefono: '" . addslashes($resul['telefono_doc']) . "',
            email: '" . addslashes($resul['email_doc']) . "',
            celular: '" . addslashes($resul['celular_doc']) . "',
            fecha_nacimiento: '" . addslashes($resul['fecha_nac_doc']) . "',
            especialidad: '" . addslashes($resul['especialidad']) . "'
        };

        // Llenar los campos del formulario
        document.getElementById('txtcod').value = datosDocente.carnet;
        document.getElementById('txtnom').value = datosDocente.nombre;
        document.getElementById('txtape').value = datosDocente.apellido;
        document.getElementById('txtdir').value = datosDocente.direccion;
        document.getElementById('txtgen').value = datosDocente.genero;
        document.getElementById('txttel').value = datosDocente.telefono;
        document.getElementById('txtemail').value = datosDocente.email;
        document.getElementById('txtcel').value = datosDocente.celular;
        document.getElementById('txtfec').value = datosDocente.fecha_nacimiento;
        document.getElementById('txtesp').value = datosDocente.especialidad;
    </script>";
} else {
    echo "<script>alert('No se encontraron datos');</script>";
}

            }

            if ($btn == "Agregar") {
                $sql = "INSERT INTO docente VALUES ('$cod','$nom','$ape','$dir','$gen','$tel','$email','$cel','$fec','$esp')";
                $cs = mysqli_query($cn, $sql);
                echo "<script>alert('Datos insertados correctamente');</script>";
            }

            if ($btn == "Modificar") {
                $sql = "UPDATE docente SET nombre_doc='$nom', apellido_doc='$ape', direccion_doc='$dir', genero_doc='$gen', telefono_doc='$tel', email_doc='$email', celular_doc='$cel', fecha_nac_doc='$fec', especialidad='$esp' WHERE carnet_doc='$cod'";
                $cs = mysqli_query($cn, $sql);
                echo "<script>alert('Datos modificados correctamente');</script>";
            }

            if ($btn == "Eliminar") {
                $sql = "DELETE FROM docente WHERE carnet_doc='$cod'";
                $cs = mysqli_query($cn, $sql);
                echo "<script>alert('Datos eliminados correctamente');</script>";
            }

            if ($btn == "Mostrar") {
                $sql = "SELECT * FROM docente";
                $cs = mysqli_query($cn, $sql);
                echo "<table class='table table-bordered'>
                <thead class='thead-dark'>
                    <tr>
                        <th>Carnet</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Dirección</th>
                        <th>Género</th>
                        <th>Teléfono</th>
                        <th>Email</th>
                        <th>Celular</th>
                        <th>Fecha de Nacimiento</th>
                        <th>Especialidad</th>
                    </tr>
                </thead>
                <tbody>";
                while ($resul = mysqli_fetch_array($cs)) {
                    echo "<tr>
                    <td>{$resul['carnet_doc']}</td>
                    <td>{$resul['nombre_doc']}</td>
                    <td>{$resul['apellido_doc']}</td>
                    <td>{$resul['direccion_doc']}</td>
                    <td>{$resul['genero_doc']}</td>
                    <td>{$resul['telefono_doc']}</td>
                    <td>{$resul['email_doc']}</td>
                    <td>{$resul['celular_doc']}</td>
                    <td>{$resul['fecha_nac_doc']}</td>
                    <td>{$resul['especialidad']}</td>
                </tr>";
                }
                echo "</tbody></table>";
            }
        }
        ?>

    </div>
    <footer class="text-center">
        <h5> </h5>
        <div id="fb-root"></div>
    </footer>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
