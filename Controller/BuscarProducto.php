<?php
	$servername = "localhost";
    $username = "root";
  	$password = "12345678";
  	$dbname = "dbunad12";

	$conn = new mysqli($servername, $username, $password, $dbname);
      if($conn->connect_error){
        die("Conexión fallida: ".$conn->connect_error);
      }

    $salida = "";

    $query = "SELECT * FROM tabla12";

    if (isset($_POST['consulta'])) {
    	$q = $conn->real_escape_string($_POST['consulta']);
    	$query = "SELECT * FROM tabla12 WHERE Codigo LIKE '%$q%' OR Nombre LIKE '%$q%' OR Marca LIKE '%$q%' OR Precio LIKE '%$q%' OR Cantidad LIKE '$q' ";
    }

    $resultado = $conn->query($query);

    if ($resultado->num_rows>0) {
    	$salida.="<table id='tblProducto' class='table table-striped table-hover table-sm table-bordered'>
        <thead class='thead-primary'>
        <tr>
            <th scope='col '>#</th>
            <th scope='col '>Código</th>
            <th scope='col '>Nombre</th>
            <th scope='col '>Marca</th>
            <th scope='col '>Precio</th>
            <th scope='col '>Cantidad</th>
            <th id='btnTable' scope='col '>Acción</th>
        </tr>
            </thead>
        <tbody>";

    	while ($fila = $resultado->fetch_assoc()) {
    		$salida.="<tr scope='row'>
                <td>".$fila['id']."</td>
                <td>".$fila['Codigo']."</td>
                <td>".$fila['Nombre']."</td>
                <td>".$fila['Marca']."</td>
                <td>".$fila['Precio']."</td>
                <td>".$fila['Cantidad']."</td>
                <td><a href='/ComputerStoreApp/page/inventario/Update.html?id='class='btn btn-info'>Editar</a> 
                <a href='/ComputerStoreApp/page/inventario/Delete.html?id=' class='btn btn-danger'>Eliminar</a>
                </td>
                </tr>";

    	}
    	$salida.="</tbody></table>";
    }else{
    	$salida.="NO HAY DATOS :(";
    }
    echo $salida;
    $conn->close();
?>