<?PHP
include("conexion.php");
?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
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
    <title>
        Agenda
    </title>
</head>

<body onload="carga();">
    <header class="text-center">
        <h1>Mantenimiento Basico Tabla Alumno</h1>
    </header>
    <div id="leo" class="container">
        <section id="leo">
            <section id="leone">
                <?php
                $var = "";
                $var1 = "";
                $var2 = "";
                $var3 = "";
                $var4 = "";
                if (isset($_POST['btn1'])) {
                    $btn = $_POST["btn1"];
                    $bus = $_POST["txtbus"];
                    if ($btn == "Buscar") {
                        $sql = "select * from alumno where Codigo='$bus'";
                        $cs = mysqli_query($cn, $sql);
                        while ($resul = mysqli_fetch_array($cs)) {
                            $var =  $resul[0];
                            $var1 = $resul[1];
                            $var2 = $resul[2];
                            $var3 = $resul[3];
                            $var4 = $resul[4]; {
                                if ($var4 == "Masculino") {
                                    $var4 = "selected";
                                }
                            }
                        }
                    }
                    if ($btn == "Agregar") {
                        $cod = $_POST["txtcod"];
                        $nom = $_POST["txtnom"];
                        $ape = $_POST["txtape"];
                        $tel = $_POST["txttel"];
                        $sex = $_POST["cbosex"];
                        $sql = "insert into alumno values ('$cod','$nom','$ape','$tel','$sex')";

                        $cs = mysqli_query($cn, $sql);
                        echo "<script> alert('Datos insertados correctamente');</script>";
                    }

                    if ($btn == "Modificar") {
                        $cod = $_POST["txtcod"];
                        $nom = $_POST["txtnom"];
                        $ape = $_POST["txtape"];
                        $tel = $_POST["txttel"];
                        $sex = $_POST["cbosex"];
                        $sql = "update alumno set nombre='$nom',apellido='$ape',telefono='$tel',genero='$sex' where codigo='$cod'";
                        $cs = mysqli_query($cn, $sql);
                        echo "<script>alert('Datos Modificados Correctamente')</script>";
                    }
                    if ($btn == "Eliminar") {
                        $cod = $_POST["txtcod"];

                        $sql = "delete from alumno where codigo='$cod'";

                        $cs = mysqli_query($cn, $sql);
                        echo "<script> alert('Datos eliminados correctamente');</script>";
                    }
                }
                ?>
                <form name="fe" action="" method="post" class="my-4">
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
                        <label for="txtcod">Codigo:</label>
                        <input type="text" class="form-control" name="txtcod" id="txtcod" value="<?php echo $var ?>" />
                    </div>

                    <div class="form-group">
                        <label for="txtnom">Nombre:</label>
                        <input type="text" class="form-control" name="txtnom" id="txtnom" value="<?php echo $var1 ?>" />
                    </div>

                    <div class="form-group">
                        <label for="txtape">Apellido:</label>
                        <input type="text" class="form-control" name="txtape" id="txtape" value="<?php echo $var2 ?>" />
                    </div>

                    <div class="form-group">
                        <label for="txttel">Telefono:</label>
                        <input type="text" class="form-control" name="txttel" id="txttel" value="<?php echo $var3 ?>" />
                    </div>

                    <div class="form-group">
                        <label for="cbosex">Genero:</label>
                        <select class="form-control" name="cbosex" id="cbosex">
                            <option>Femenino</option>
                            <option <?php echo $var4 ?>>Masculino</option>
                        </select>
                    </div>

                    <div class="text-center">
                        <input type="submit" class="btn btn-success mx-1" name="btn1" value="Agregar" />
                        <input type="submit" class="btn btn-info mx-1" name="btn1" value="Mostrar" />
                        <input type="submit" class="btn btn-warning mx-1" name="btn1" value="Modificar" />
                        <input type="submit" class="btn btn-danger mx-1" name="btn1" value="Eliminar" />
                    </div>
                </form>
                <br />

                <?php
                if (isset($_POST["btn1"])) {
                    $btn = $_POST["btn1"];

                    if ($btn == "Mostrar") {
                        $sql = "select * from alumno";
                        $cs = mysqli_query($cn, $sql);
                        echo "<center>
<table class='table table-bordered'>
<thead class='thead-dark'>
<tr>
<th>Codigo</th>
<th>Nombre</th>
<th>Apellido</th>
<th>Telefono</th>
<th>Genero</th>
</tr>
</thead>
<tbody>";
                        while ($resul = mysqli_fetch_array($cs)) {
                            $var = $resul[0];
                            $var1 = $resul[1];
                            $var2 = $resul[2];
                            $var3 = $resul[3];
                            $var4 = $resul[4];
                            echo "<tr>
<td>$var</td>
<td>$var1</td>
<td>$var2</td>
<td>$var3</td>
<td>$var4</td>
</tr>";
                        }
                        echo "</tbody>
</table>
</center>";
                    }
                }
                ?>

            </section>
        </section>
        <section id="rojas">

    </div>
    <footer id="aranda" class="text-center">
        <h5> </h5>
        <div id="fb-root"></div>
    </footer>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
