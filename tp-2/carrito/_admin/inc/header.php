<!DOCTYPE html>
<?php  session_start();
include('../inc/db_data.php');

include('clases/usuarios.php');
include('clases/perfil.php');
include('clases/ABMproductos.php');
include('clases/ABMcomentario.php');
include('clases/AbmMarcas.php');
include('clases/AbmCategorias.php');


$hostname = '127.0.0.1';
$database = 'tp2';
$username = 'root';
$password = '';
$port= 3306;

try {
        $con = new PDO('mysql:host='.$hostname.';port='.$port.';dbname='.$database, $username, $password);
} catch (PDOException $e) {
        print "�Error!: " . $e->getMessage();
        die();
}


$user = new Usuario($con);


if(isset($_POST['login'])){
	$user->login($_POST);
}
 
if(isset($_GET['logout'])){
    unset($_SESSION['usuario']); 

}
	
if($user->notLogged()){
	 header('Location: login.php');
}


?>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Dashboard with Off-canvas Sidebar</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/530d20e4e2.js" crossorigin="anonymous"></script>




		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="css/styles.css" rel="stylesheet">
	</head>
	<body>
    
  <script type = "text/javascript">
  function ConfirmAprobacion()
  {
    var respuesta =confirm("¿Estas seguro que desea Aprobar?");
    if(respuesta == true){
        return true;
    }else{
        return false;
    }
  }
  function ConfirmDelete()
  {
    var respuesta =confirm("¿Estas seguro que desea eliminar?");
    if(respuesta == true){
        return true;
    }else{
        return false;
    }
  }
</script>	 

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Hola <?php echo $_SESSION['usuario']['nombre']?></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="?logout"><i class="fas fa-power-off"></i> Cerrar sesion</a></li>  
          </ul>          
        </div>
      </div>
</nav>