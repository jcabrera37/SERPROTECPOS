<?php
require ('../Model/conexion.php');

if (!isset($_SESSION)) {
    session_start();
}

$usuario = $_GET['usuario'];
$password = $_GET['password'];

$con = new Conexion();
$searchUser = $con->getUser($usuario, $password);

foreach ($searchUser as $user) {
    $tipo = $user['tipo'];
    $idUsuario = $user['id_usu'];
    $login = $user['login'];
    $nombre = $user['nombre'];
    $password = $user['password'];
    $foto = $user['foto'];
    
}

if (empty($searchUser)) {
    echo '
       <script language = javascript>
        alert("Usuario o Password incorrectos")
        self.location = "../index.php"
       </script> 
    ';
}
else if($tipo == 'VENTAS' ){
    //$_SESSION['id_usu'] = $idUsuario;
    require('../Views/WellcomeVentas.php');
}
else if($tipo == 'ADMINISTRADOR'){
    require('../Views/Wellcome.php');
}
?>