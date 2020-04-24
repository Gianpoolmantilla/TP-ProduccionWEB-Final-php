<?php


    $nombre = trim($_POST["nombre"]);
    $email = trim($_POST["email"]);
    $telefono = trim($_POST["telefono"]);
    $area = trim($_POST["area"]);
    $comentario = trim($_POST["comentario"]);

try {
    
    $hostname = 'localhost';
    $database = 'produccion';
    $username = 'root';
    $password = '';
    $port     = '3306';
    
   $base =new PDO('mysql:host='.$hostname.';port='.$port.';dbname='.$database, $username, $password);
   $base ->setAttribute(PDO::ATTR_ERRMODE, PDO :: ERRMODE_EXCEPTION);
   $base -> exec("SET CHARACTER SET utf8");

   $sql = "INSERT INTO contactos (nombre, email,telefono,area,comentario) 
   VALUES (:nombre, :email, :telefono, :area, :comentario)";


   $resultado=$base->prepare($sql);

$resultado -> execute(array(":nombre"=>$nombre, ":email"=>$email, ":telefono"=>$telefono, ":area"=>$area, ":comentario"=>$comentario ));

echo "registro insertado";
$resultado->closeCursor();

} catch (Exception $ex) {
   echo "linea del error: " .$ex->getLine() ;
}