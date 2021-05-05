<?php 
    $servername = "localhost";
    $username = "root";
    $password = "12345678";
    $DataBase = "dbunad12";

    $conn = mysqli_connect($servername, $username, $password, $DataBase);
    if (!$conn) {
        echo json_encode(
            array(
                'ok' => false,
                'tipoMsg' => 'error',
                'titulo' => 'ComputerStore App', 
                'msg' => 'Error al conectarse al servidor: ' . mysqli_connect_error()
            ));
    }
    else {
        $Id = $_POST['Id'];
        $sql = "SELECT * FROM tabla12 WHERE Id=$Id";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $lsProducto = array();
            // output data of each row 
            while($row = mysqli_fetch_assoc($result)) { 
                array_push($lsProducto, $row["Id"]."|".$row["Codigo"]."|".$row["Nombre"]."|".$row["Marca"]."|".$row["Precio"]."|".$row["Cantidad"]);
            }
            echo json_encode(
                array(
                    'ok' => true,
                    'count' => mysqli_num_rows($result),
                    'data' => $lsProducto
                )); 
        } else { 
            echo json_encode(
                array(
                    'ok' => true,
                    'count' => 0
                ));
        }

        $Result = mysqli_query($conn, $sql);
    }
 ?>