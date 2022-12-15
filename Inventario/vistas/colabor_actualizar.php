<?php
	require_once "./php/main.php";

    $id = (isset($_GET['colabor_id_up'])) ? $_GET['colabor_id_up'] : 0;
    $id=limpiar_cadena($id);
?>
<div class="container is-fluid mb-6">
	<?php if($id==$_SESSION['id']){ ?>
		<h1 class="title">Mi cuenta</h1>
		<h2 class="subtitle">Actualizar datos de cuenta</h2>
	<?php }else{ ?>
		<h1 class="title">Colaboradores</h1>
		<h2 class="subtitle">Actualizar Colaborador</h2>
	<?php } ?>
</div>

<div class="container pb-6 pt-6">
	<?php

		include "./inc/btn_back.php";

        /*== Verificando usuario ==*/
    	$check_colaborador=conexion();
    	$check_colaborador=$check_colaborador->query("SELECT * FROM colaborador WHERE ID_Usuario='$id'");

        if($check_colaborador->rowCount()>0){
        	$datos=$check_colaborador->fetch();
	?>
    <div class="form-rest mb-6 mt-6"></div>

<form action="./php/colaborador_actualizar.php" method="POST" class="FormularioAjax" autocomplete="off" >

    <input type="hidden" name="ID_Usuario" value="<?php echo $datos['ID_Usuario']; ?>" required >
    <div class="columns">
		  	<div class="column">
		    	<div class="control">
					<label>Nombre(s)</label>
				  	<input class="input" type="text" name="Nombres" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}" maxlength="40" required value="<?php echo $datos['Nombres']; ?>" >
				</div>
		  	</div>
		  	<div class="column">
		    	<div class="control">
					<label>Apellidos</label>
				  	<input class="input" type="text" name="Apellidos" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}" maxlength="40" required value="<?php echo $datos['Apellidos']; ?>" >
				</div>
		  	</div>
		</div>
		<div class="columns">
		  	<div class="column">
		    	<div class="control">
					<label>Numero de empleado</label>
				  	<input class="input" type="text" name="Num_Empleado" pattern="[0-9]{4,20}" maxlength="40"  required value="<?php echo $datos['Num_Empleado']; ?>" >
				</div>
		  	</div>
		  	<div class="column">
		    	<div class="control">
					<label>Puesto</label>
				  	<input class="input" type="text" name="Puesto" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}" maxlength="40"  required value="<?php echo $datos['Puesto']; ?>">
				</div>
		  	</div>
		</div>
		<div class="columns">
		  	<div class="column">
		    	<div class="control">
					<label>Area</label>
				  	<input class="input" type="text" name="Area" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}" maxlength="40"  required value="<?php echo $datos['Area']; ?>" >
				</div>
		  	</div>
              
		  	<div class="column">
		    	<div class="control">
					<label>Fecha de ingreso (dd/mm/aaaa)</label>
				  	<input class="input" type="text" name="Fecha_Ingreso" pattern="[0-9 ]{0,15}" maxlength="15"  required value="<?php echo $datos['Fecha_Ingreso']; ?>" >
				</div>
		  	</div>
		</div>
        <div class="columns">
		  	<div class="column">
		    	<div class="control">
					<label>Correo</label>
				  	<input class="input" type="email" name="Correo"  maxlength="40"  required value="<?php echo $datos['Correo']; ?>" >
				</div>
		  	</div>
              
              
		  	<div class="column">
		    	<div class="control">
					<label>Usuario</label>
				  	<input class="input" type="text" name="Usuario" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ.  ]{0,40}" maxlength="40"  required value="<?php echo $datos['Usuario']; ?>" >
				</div>
		  	</div>
              </div>
              <div class="columns">
		  	<div class="column">
		    	<div class="control">
					<label>Responsiva(s)</label>
				  	<input class="input" type="text" name="Responsivas" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ.  ]{0,40}" maxlength="40"  required value="<?php echo $datos['Responsivas']; ?>" >
                      
                </div>
		  	</div>
             
              <div class="column">
		    	<div class="control">
					
				  	
				</div>
		  	</div>
              </div>
              <br><br>
		<p class="has-text-centered">
              Para poder actualizar los datos de este usuario por favor ingrese su USUARIO y CLAVE con la que ha iniciado sesión
		</p>
        
              <br><br>
		<div class="columns">
		  	<div class="column">
		    	<div class="control">
					<label>Usuario</label>
				  	<input class="input" type="text" name="administrador_usuario" pattern="[a-zA-Z0-9]{4,20}" maxlength="20" required >
				</div>
		  	</div>
		  	<div class="column">
		    	<div class="control">
					<label>Clave</label>
				  	<input class="input" type="password" name="administrador_clave" pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="100" required >
				</div>
		  	</div>
		</div>
		<p class="has-text-centered">
			<button type="submit" class="button is-success is-rounded">Actualizar</button>
		</p>
	</form>
	<?php 
		}else{
			include "./inc/error_alert.php";
		}
		$check_colaborador=null;
	?>
</div>