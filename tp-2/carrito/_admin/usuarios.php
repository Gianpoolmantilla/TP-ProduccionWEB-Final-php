<?php 
require('inc/header.php');
//include('clases/usuarios.php');
?> 

<div class="container-fluid">
      
      <?php $userMenu = 'Usuarios';
	  
	  
	   if(  !in_array('user.add',$_SESSION['usuario']['permisos']) &&
			!in_array('user.del',$_SESSION['usuario']['permisos']) &&		
			!in_array('user.edit',$_SESSION['usuario']['permisos']) &&
			!in_array('user.see',$_SESSION['usuario']['permisos'])){ 
				header('Location: index.php');
			}
			
			
	include('inc/side_bar.php');
	 
	
	if(isset($_POST['submit'])){ 
	    if($_POST['id_usuario'] > 0){
                $user->edit($_POST); 
               
	    }else{
                $user->save($_POST); 
        }
		
		header('Location: usuarios.php');
	}	
	

	if(isset($_GET['del'])){
            $user->del($_GET['del']);
            header('Location: usuarios.php');

	}
	

        ?>
	  
	  
        
        <div class="col-sm-9 col-md-10 main">
          
          <!--toggle sidebar button-->
          <p class="visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas"><i class="glyphicon glyphicon-chevron-left"></i></button>
          </p>
          
		  <h1 class="page-header">
            Usuarios
          </h1>

		  <div class="sub-header">
		      <h4>Nombre</h4>		     
              <input type="text" class="form-control" id="nombre" name="nombre" placeholder="" value="<?php echo isset($usuario->nombre)?$usuario->nombre:'';?>">
              <br><a href="usuarios_ae.php"><button type="button" class="btn btn-success" title="Agregar">Buscar</button></a>
		  </div><br>

          <h2 class="sub-header">		 
		  <?php if(in_array('user.add',$_SESSION['usuario']['permisos'])){?>
				<a href="usuarios_ae.php"><button type="button" class="btn btn-success" title="Agregar">Agregar</button></a>
		  <?php }?>	
		  </h2>
		   <?php if(in_array('user.see',$_SESSION['usuario']['permisos'])){?>
			  <div class="table-responsive">
				<table class="table table-striped">
				  <thead>
					<tr>
					  <th>#</th>
					  <th>Nombre</th>
					  <th>Apellido</th>
					  <th>Usuario</th>
					  <th>eMail</th>
					  <th>Perfil</th>
					  <th>Activo</th>
					  <th>Acciones</th>
					</tr>
				  </thead>
				  <tbody>
					<?php  	 
						foreach($user->getList() as $usuario){?>
				  
							<tr>
							  <td><?php echo $usuario['id_usuario'];?></td>
							  <td><?php echo $usuario['nombre'];?></td>
							  <td><?php echo $usuario['apellido'];?></td>
							  <td><?php echo $usuario['usuario'];?></td>
							  <td><?php echo $usuario['email'];?></td>
							  <td><?php echo isset($usuario['perfiles'])?implode(', ',$usuario['perfiles']):'No tiene perfiles asignados';?></td>
							  <td><?php echo ($usuario['activo'])?'si':'no';?></td>
							  <td>
								  <?php if(in_array('user.edit',$_SESSION['usuario']['permisos'])){?>
										<a href="usuarios_ae.php?edit=<?php echo $usuario['id_usuario']?>"><button type="button" class="btn btn-info" title="Modificar"><i class="far fa-edit"></i></i></button></a>
								  <?php }?>
								   <?php if(in_array('user.del',$_SESSION['usuario']['permisos'])){?>
										<a href="usuarios.php?del=<?php echo $usuario['id_usuario']?>"><button type="button" class="btn btn-danger" title="Borrar"><i class="far fa-trash-alt"></i></button></a>
								<?php }?>
							  </td>
							</tr>
						<?php }?>                
				  </tbody>
				</table>
			  </div>
 <?php }?> 
          
      </div><!--/row-->
	</div>
</div><!--/.container-->

<?php include('inc/footer.php');?>