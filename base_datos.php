<?php

$conexionGlobal =null;

function conectarBaseDatos() {

    global $conexionGlobal;

    $servidorDondeEstaLaBD = "localhost";
    $usuario = "root";
    $password = "";
    $baseDatos = "taskapp";

    $conexionGlobal = new mysqli($servidorDondeEstaLaBD, $usuario, $password, $baseDatos);

    if ($conexionGlobal->connect_error) {
        die("Connection failed: " . $conexionGlobal->connect_error);
    }
    
}

function desconectarBaseDatos(){
global $conexionGlobal;
$conexionGlobal->close();

}



function accionesEnBaseDatos($accionEnBaseDatos){
    global $conexionGlobal;

    conectarBaseDatos();
    $result = $conexionGlobal ->query($accionEnBaseDatos);

    if(is_bool($result)){
        return;
    }


    if ($result->num_rows > 0) {
        while($row = mysqli_fetch_assoc($result))
             $arrayDeRespuestas[] = $row; 
             
        return $arrayDeRespuestas;
    } 

    desconectarBaseDatos();
}




?>