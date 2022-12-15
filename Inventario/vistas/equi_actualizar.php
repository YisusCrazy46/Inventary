<?php
	require_once "./php/main.php";

    $id = (isset($_GET['equi_id_up'])) ? $_GET['equi_id_up'] : 0;
    $id=limpiar_cadena($id);
?>
<div class="container is-fluid mb-6">
	<?php if($id==$_SESSION['id']){ ?>
		<h1 class="title">Mi cuenta</h1>
		<h2 class="subtitle">Actualizar datos de cuenta</h2>
	<?php }else{ ?>
		<h1 class="title">Equipos</h1>
		<h2 class="subtitle">Actualizar equipos</h2>
	<?php } ?>
</div>

<div class="container pb-6 pt-6">
	<?php

		include "./inc/btn_back.php";

        /*== Verificando usuario ==*/
    	$check_usuario=conexion();
    	$check_usuario=$check_usuario->query("SELECT * FROM equipo WHERE ID_Activo='$id'");

        if($check_usuario->rowCount()>0){
        	$datos=$check_usuario->fetch();
	?>

<div class="form-rest mb-6 mt-6"></div>

	<form action="./php/equipo_actualizar.php" method="POST" class="FormularioAjax" autocomplete="off" >
	
    <input type="hidden" name="ID_Activo" value="<?php echo $datos['ID_Activo']; ?>" required >
    
    <div class="columns">
		  	<div class="column">
		    	<div class="control">
					<label>Numero de serie</label>
				  	<input class="input" type="text" name="Num_Serie" pattern="[a-zA-Z0-9]{10,20}" maxlength="20" required value="<?php echo $datos['Num_Serie']; ?>" >
				</div>
		  	</div>
		  	<div class="column">
		    	<div class="control"> 
					<label>Host</label>
				  	<input class="input" type="text" name="Host" pattern="[a-zA-Z0-9 ]{3,9}" maxlength="9" required value="<?php echo $datos['Host']; ?>"  >
				</div>
		  	</div>
		</div>
		<div class="columns">
		  	<div class="column">
		    	<div class="control">
					<label>Marca</label>
				  	<input class="input" type="text" name="Marca" pattern="[a-zA-Z ]{0,10}" maxlength="10"  required value="<?php echo $datos['Marca']; ?>"  >
				</div>
		  	</div>
		  	<div class="column">
		    	<div class="control">
					<label>Modelo</label>
				  	<input class="input" type="text" name="Modelo" pattern="[a-zA-Z0-9 ]{3,20}" maxlength="20"  required value="<?php echo $datos['Modelo']; ?>"  >
				</div>
		  	</div>
		</div>
		<div class="columns">
		  	<div class="column">
		    	<div class="control">
					<label>Capacidad de Disco Duro</label>
				  	<input class="input" type="text" name="Capacidad_DD" pattern="[a-zA-Z0-9 ]{0,20}" maxlength="20"  required value="<?php echo $datos['Capacidad_DD']; ?>"   >
				</div>
		  	</div>
              
		  	<div class="column">
		    	<div class="control">
					<label>Capacidad de RAM</label>
				  	<input class="input" type="text" name="Capacidad_RAM" pattern="[a-zA-Z0-9 ]{0,15}" maxlength="15"  required value="<?php echo $datos['Capacidad_RAM']; ?>"  >
				</div>
		  	</div>
		</div>
        <div class="columns">
		  	<div class="column">
		    	<div class="control">
					<label>Sistema operativo</label>
				  	<input class="input" type="text" name="Sis_Operativo" pattern="[a-zA-Z-0-9 ]{3,15}" maxlength="15"  required value="<?php echo $datos['Sis_Operativo']; ?>"   >
				</div>
		  	</div>
              
              
		  	<div class="column">
		    	<div class="control">
					<label>Area</label>
				  	<input class="input" type="text" name="Area" pattern="[a-zA-Z ]{0,20}" maxlength="20"  required value="<?php echo $datos['Area']; ?>"  >
				</div>
		  	</div>
              </div>
              <div class="columns">
		  	<div class="column">
		    	<div class="control">
					<label>Usuario</label>
				  	<input class="input" type="text" name="Usuario" pattern="[a-zA-Z-0-9 .- ]{3,20}" maxlength="20"  required value="<?php echo $datos['Usuario']; ?>"  >
                      
                </div>
		  	</div>
              
             
		  	<div class="column">
		    	<div class="control">
					<label>Fecha de actualización (dd/mm/aaaa)</label>
				  	<input class="input" type="text" name="Fecha_Modificacion" pattern="[0-9 ]{0,20}" maxlength="20"  value="<?php echo $datos['Fecha_Modificacion']; ?>"  >
                      
				</div>
                </div>
              </div>
              
              <div class="columns">
		  	<div class="column">
		    	<div class="control">
					<label>Fecha de asignacion (dd/mm/aaaa)</label>
				  	<input class="input" type="text" name="Fecha_Asignacion" pattern="[0-9 ]{0,20}" maxlength="20" value="<?php echo $datos['Fecha_Asignacion']; ?>"  >
    
                </div>
		  	</div>
              
                
              
              
		  	<div class="column">
		    	<div class="control">
					<label>Observaciones</label>
				  	<input class="input" type="text" name="Observaciones" pattern="[a-zA-Z Ñ]{0,40}" maxlength="40"   value="<?php echo $datos['Observaciones']; ?>"  >
				</div>
		  	</div>
              </div>
              <div class="columns">
		  	<div class="column">
		    	<div class="control">
					<label>Responsiva(s)</label>
				  	<input class="input" type="text" name="IDNum_Responsiva" pattern="[a-zA-Z0-9]{3,20}" maxlength="20"  required value="<?php echo $datos['IDNum_Responsiva']; ?>"  >
				</div>
		  	</div>
              
             
		  	<div class="column">
		    	<div class="control">
					<label>Estado del equipo</label>
				  	<input class="input" type="text" name="Estado_del_Equipo" pattern="[a-zA-ZÑ ]{3,20}" maxlength="20"  required value="<?php echo $datos['Estado_del_Equipo']; ?>"  >
				</div>
		  	</div>
              </div>
              
              <div class="columns">
		  	<div class="column">
		    	<div class="control">
					<label>Fecha de proximo servicio (dd/mm/aaaa) 6 meses</label>
				  	<input class="input" type="text" name="Fecha_proximoservicio"  pattern="[0-9 ]{0,20}" maxlength="20"  value="<?php echo $datos['Fecha_proximoservicio']; ?>"  >
                      </div> 
                      </div>
                    <div class="column">
		    	<div class="control">
                </div>
                </div>
				</div>
		  	
              
		<br><br><br>
		<p class="has-text-centered">
			Para poder actualizar los datos de este usuario por favor ingrese su USUARIO y CLAVE con la que ha iniciado sesión
		</p>
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
              </p>
	</form>
    <?php 
		}else{
			include "./inc/error_alert.php";
		}
		$check_usuario=null;
	?>
</div>