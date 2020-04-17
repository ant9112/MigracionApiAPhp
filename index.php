<?php

include 'base_datos.php';


if($_GET['url'] == "getTask"){

	if($_SERVER['REQUEST_METHOD'] == "GET"){

		if(isset($_GET['id'])){
			http_response_code(200);
			$idRecibido = $_GET['id'];
			$consultaEnBaseDatos = "SELECT * FROM TBL_TASK WHERE ID=$idRecibido" ;			
			echo json_encode(accionesEnBaseDatos($consultaEnBaseDatos));  
		}
 
	}

}
else if($_GET['url'] == "listTask"){

	if($_SERVER['REQUEST_METHOD']== "GET"){

		http_response_code(200);
		$consultaEnBaseDatos = "SELECT * FROM TBL_TASK" ;			
		echo json_encode(accionesEnBaseDatos($consultaEnBaseDatos)); 
	}

}
else if($_GET['url'] == "addTask"){

	if($_SERVER['REQUEST_METHOD'] == "POST"){

			$cuerpoRecibido = file_get_contents("php://input");
			http_response_code(200);
			$cuerpoRecibido = json_decode($cuerpoRecibido);

			$taskParaGuardar = $cuerpoRecibido->TASK;
			$dateParaGuardar = $cuerpoRecibido->DATE;

			$consultaEnBaseDatos = "INSERT INTO TBL_TASK (TASK, DATE) VALUES ('$taskParaGuardar', '$dateParaGuardar')" ;
		
			json_encode(accionesEnBaseDatos($consultaEnBaseDatos)); 

	}

}
else if($_GET['url'] == "updateTask"){

	if($_SERVER['REQUEST_METHOD'] == "POST"){	
			
		$cuerpoRecibido = file_get_contents("php://input");
		http_response_code(200);
		$cuerpoRecibido = json_decode($cuerpoRecibido);

		$taskParaActualizar = $cuerpoRecibido->TASK;
		$dateParaActualizar = $cuerpoRecibido->DATE;
		$idParaBuscar = $cuerpoRecibido ->ID;

		$consultaEnBaseDatos = "UPDATE TBL_TASK SET TASK='$taskParaActualizar', DATE='$dateParaActualizar' WHERE id=$idParaBuscar" ;
	
		json_encode(accionesEnBaseDatos($consultaEnBaseDatos)); 		   
	}

}
else if($_GET['url'] == "deleteTask" ){

	if($_SERVER['REQUEST_METHOD'] == "POST"){

			$cuerpoRecibido = file_get_contents("php://input");
			http_response_code(200);
			$cuerpoRecibido = json_decode($cuerpoRecibido);

			$idTaskParaBorrar = $cuerpoRecibido->ID;
			$consultaEnBaseDatos = "DELETE FROM TBL_TASK WHERE ID=$idTaskParaBorrar" ;			
			 json_encode(accionesEnBaseDatos($consultaEnBaseDatos));  
		
 
 
	}

}else
{
	http_response_code(404);
}








?>