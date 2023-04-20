<?php

define('SERVIDOR','localhost');
define('USUARIO','root');
define('PASSWORD','');
define('BD','sistema_de_ventas');

$servidor = "mysql:dbname=".BD.";host=".SERVIDOR;

try{
    $pdo = new PDO($servidor,USUARIO,PASSWORD,array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
    //echo "La conexión a la base de datos fue con exito";
}catch (PDOException $e){
    //print_r($e);
    echo "Error al conectar a la base de datos";
}

$URL = "http://localhost:8082/Parcial02Pcortes/sistema_de_ventas_pcortes/archivos/";

date_default_timezone_set("America/Bogota");
$fechaHora = date('Y-m-d H:i:s');


