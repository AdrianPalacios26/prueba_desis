<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "sa";
$dbname = "prueba_diagnostico";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

//guardamos las conexion
$_SESSION['conexion'] = $conn;

// Verificar la conexión
if ($conn->connect_error) {
    die("Falló la conexión: " . $conn->connect_error);
}

$accion ="" ;
if (!empty($_GET["accion"])) {
	$accion = $_GET["accion"];
} 

$id_region = null;
if (!empty($_GET['region'])) {
	$id_region = $_GET['region'];
}


switch ($accion){
	case "Region":
	
	$sql="select Id_Region,Nombre from region";

	$result = $conn->query($sql);

	// Verificar si se encontraron resultados
	if ($result->num_rows > 0) {
		
		//creamos un arreglo para almacenar las regiones
		$regiones = array();
		
		
		// Iterar sobre los resultados y mostrar los datos
		while ($row = $result->fetch_assoc()) {
			$regiones[] = $row;
		}
		
		//se devuelven los datos como json
		echo json_encode($regiones);
	} else {
		echo "No se encontraron regiones.";
	}

	// Cerrar la conexión a la base de datos
	$conn->close();
		
	break;
	
	case "Comuna":
	
	$sql="Select Id_Comuna,Nombre from comuna where Id_Region =".$id_region;
	$result = $conn->query($sql);

	// Verificar si se encontraron resultados
	if ($result->num_rows > 0) {
		
		//creamos un arreglo para almacenar las regiones
		$comunas = array();
		
		
		// Iterar sobre los resultados y mostrar los datos
		while ($row = $result->fetch_assoc()) {
			$comunas[] = $row;
		}
		
		//se devuelven los datos como json
		echo json_encode($comunas);
	} else {
		echo "No se encontraron comunas.";
	}

	// Cerrar la conexión a la base de datos
	$conn->close();
	
	break;

	case "Candidato":
	
		$sql="select Id_Candidato,Nombre from candidato";
	
		$result = $conn->query($sql);
	
		// Verificar si se encontraron resultados
		if ($result->num_rows > 0) {
			
			//creamos un arreglo para almacenar las regiones
			$candidatos = array();
			
			
			// Iterar sobre los resultados y mostrar los datos
			while ($row = $result->fetch_assoc()) {
				$candidatos[] = $row;
			}
			
			//se devuelven los datos como json
			echo json_encode($candidatos);
		} else {
			echo "No se encontraron candidatos.";
		}
	
		// Cerrar la conexión a la base de datos
		$conn->close();
			
		break;
}



?>
