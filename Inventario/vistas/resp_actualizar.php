<?php
	require_once "./php/main.php";

    $id = (isset($_GET['resp_id_up'])) ? $_GET['resp_id_up'] : 0;
    $id=limpiar_cadena($id);
?>
?>
<div class="container is-fluid mb-6">
	<?php if($id==$_SESSION['id']){ ?>
		<h1 class="title">Mi cuenta</h1>
		<h2 class="subtitle">Actualizar datos de cuenta</h2>
	<?php }else{ ?>
		<h1 class="title">Responsivas</h1>
		<h2 class="subtitle">Actualizar responsiva</h2>
	<?php } ?>
</div>

<div class="container pb-6 pt-6">
	<?php

		include "./inc/btn_back.php";

        /*== Verificando usuario ==*/
    	$check_resp=conexion();
    	$check_resp=$check_resp->query("SELECT * FROM responsiva WHERE IDNum_Responsiva='$id'");

        if($check_resp->rowCount()>0){
        	$datos=$check_resp->fetch();
	?>

	<div class="form-rest mb-6 mt-6"></div>

	<form action="./php/resp_actualizar.php" method="POST" class="FormularioAjax" autocomplete="off" >

		<input type="hidden" name="IDNum_Responsiva"  required value="<?php echo $datos['IDNum_Responsiva']; ?>" >
		
        <div class="columns">
		  	<div class="column">
		    	<div class="control">
					<label>Nombre completo</label>
				  	<input class="input" type="text" name="Nombre_Completo" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,100}" maxlength="40" required value="<?php echo $datos['Nombre_Completo']; ?>">
				</div>
		  	</div>
			
		  	<div class="column">
		    	<div class="control">
					<label>Usuario</label>
				  	<input class="input" type="text" name="Usuario" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ. ]{3,40}" maxlength="40" required value="<?php echo $datos['Usuario']; ?>">
				</div>
		  	</div>
		</div>
		<div class="columns">
		  	<div class="column">
		    	<div class="control">
					<label>Correo</label>
				  	<input class="input" type="email" name="Correo"  maxlength="40"  required value="<?php echo $datos['Correo']; ?>">
				</div>
		  	</div>
				<div class="column">
		    			<div class="control">
					<label>Fecha de asignacion (dd/mm/aaaa)</label>
				  	<input class="input" type="text" name="Fecha_de_asignacion" pattern="[a-zA-Z0-9 ]{2,20}" maxlength="20"  required value="<?php echo $datos['Fecha_de_asignacion']; ?>" >
				</div>
		</div>
	</div>
	
        <div class="column">
		    	<div class="control">
					<label>Numero de serie </label>
				  	<input class="input" type="text" name="No_serie" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{3,40}" maxlength="40"  required value="<?php echo $datos['No_serie']; ?>" >
				</div>
				</div>
			
		 <div class="columns">
		  	<div class="column">
		    	<div class="control">
					<label>Cargador</label>
				  	<input class="input" type="text" name="Cargador" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{3,40}" maxlength="40"  required value="<?php echo $datos['Cargador']; ?>"  >
				</div>
				</div></div>
		
		
		<p class="has-text-centered">
			
			Para poder actualizar los datos de esta responsiva por favor ingrese su USUARIO y CLAVE con la que ha iniciado sesión
		
        </p>
        <br>
		
		
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
		$check_resp=null;
	?>
</div>