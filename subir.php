<?php

$servername = "localhost";
$username = "root";
$password = "sa";
$dbname = "prueba_diagnostico";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if (!$conn) {
    echo "No se ha establecido la conexión a la base de datos.";
    exit();
}

$accion ="" ;
if (!empty($_GET["accion"])) {
	$accion = $_GET["accion"];
} 
$rut ="" ;
if (!empty($_GET["rut"])) {
	$rut = $_GET["rut"];
} 
$nombre ="";
if(!empty($_GET['nombre'])){
	$nombre = $_GET['nombre'];
}
$alias = "";
if(!empty($_GET['alias'])){
	$alias = $_GET['alias'];
}
$email = "";
if(!empty($_GET['email'])){
	$email = $_GET['email'];
}
$region = "";
if(!empty($_GET['region'])){
	$region = $_GET['region'];
}
$comuna = "";
if(!empty($_GET['comuna'])){
	$comuna = $_GET['comuna'];
}
$candidato = "";
if(!empty($_GET['candidato'])){
	$candidato = $_GET['candidato'];
}
$web = "";
if(!empty($_GET['web'])){
	$web = $_GET['web'];
}
$tv = "";
if(!empty($_GET['tv'])){
	$tv = $_GET['tv'];
}
$redes_sociales = "";
if(!empty($_GET['redes_sociales'])){
	$redes_sociales = $_GET['redes_sociales'];
}
$amigo = "";
if(!empty($_GET['amigo'])){
	$amigo = $_GET['amigo'];
}

switch ($accion){
	case "Buscar":
	
	$sql="select count(*) as cantidad from votacion where rut='".$rut."'";

	$result = $conn->query($sql);

	// Verificar si se encontraron resultados
	if ($result->num_rows > 0) {
		
		//creamos un arreglo para almacenar las regiones
		$rut = array();
		
		
		// Iterar sobre los resultados y mostrar los datos
		while ($row = $result->fetch_assoc()) {
			$rut[] = $row;
		}
		
		//se devuelven los datos como json
		echo json_encode($rut);
	} else {
		echo "No se encontraron datos con el rut.";
	}

	// Cerrar la conexión a la base de datos
	$conn->close();
		
	break;

	case "Subir":
	
		// Realizamos la inserción en la base de datos
		$query =" set @id_votacion = 0;".
				" select IFNULL(MAX(Id_Votacion),0) INTO @id_votacion from votacion; ".
				" INSERT INTO votacion VALUES (@id_votacion,'".$nombre."', '".$alias."','".$rut."','".$email."',".$region.",".$comuna.",".$candidato.",'".$web."','".$tv."','".$redes_sociales."','".$amigo."')";
		if (mysqli_query($conn, $query)) {
			echo json_encode("Datos guardados correctamente.");
		} else {
			echo json_encode("Error al guardar los datos: " .$query);
		}
	
		// Cerramos la conexión
		mysqli_close($conn);
	break;
	
}



?>
