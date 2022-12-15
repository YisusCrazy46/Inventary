<div class="container is-fluid mb-6">

	<center><h1  class="title" >EQUIPOS IMI</h1></center>
    </div>
	<center><h2 class="subtitle">Nuevo equipo</h2></center>
   
<div class="container pb-6 pt-6">

	<div class="form-rest mb-6 mt-6"></div>
	<form action="./php/equipo_guardar.php" method="POST" class="FormularioAjax" autocomplete="off" >
		<div class="columns">
		  	<div class="column">
		    	<div class="control">
					<label>Numero de serie</label>
				  	<input class="input" type="text" name="Num_Serie" pattern="[a-zA-Z0-9]{10,20}" maxlength="20" required >
				</div>
		  	</div>
		  	<div class="column">
		    	<div class="control"> 
					<label>Host</label>
				  	<input class="input" type="text" name="Host" pattern="[a-zA-Z0-9 ]{3,9}" maxlength="9" required >
				</div>
		  	</div>
		</div>
		<div class="columns">
		  	<div class="column">
		    	<div class="control">
					<label>Marca</label>
				  	<input class="input" type="text" name="Marca" pattern="[a-zA-Z ]{0,10}" maxlength="10"  required >
				</div>
		  	</div>
		  	<div class="column">
		    	<div class="control">
					<label>Modelo</label>
				  	<input class="input" type="text" name="Modelo" pattern="[a-zA-Z0-9 ]{3,20}" maxlength="20"  required >
				</div>
		  	</div>
		</div>
		<div class="columns">
		  	<div class="column">
		    	<div class="control">
					<label>Capacidad de Disco Duro</label>
				  	<input class="input" type="text" name="Capacidad_DD" pattern="[a-zA-Z0-9 ]{0,20}" maxlength="20"  required  >
				</div>
		  	</div>
              
		  	<div class="column">
		    	<div class="control">
					<label>Capacidad de RAM</label>
				  	<input class="input" type="text" name="Capacidad_RAM" pattern="[a-zA-Z0-9 ]{0,15}" maxlength="15"  required >
				</div>
		  	</div>
		</div>
        <div class="columns">
		  	<div class="column">
		    	<div class="control">
					<label>Sistema operativo</label>
				  	<input class="input" type="text" name="Sis_Operativo" pattern="[a-zA-Z-0-9 ]{3,15}" maxlength="15"  required  >
				</div>
		  	</div>
              
              
		  	<div class="column">
		    	<div class="control">
					<label>Area</label>
				  	<input class="input" type="text" name="Area" pattern="[a-zA-Z ]{0,20}" maxlength="20"  required >
				</div>
		  	</div>
              </div>
              <div class="columns">
		  	<div class="column">
		    	<div class="control">
					<label>Usuario</label>
				  	<input class="input" type="text" name="Usuario" pattern="[a-zA-Z-0-9 .- ]{3,20}" maxlength="20"  required >
                      
                </div>
		  	</div>
              
             
		  	<div class="column">
		    	<div class="control">
					<label>Fecha de actualización (dd/mm/aaaa)</label>
				  	<input class="input" type="text" name="Fecha_Modificacion" pattern="[0-9 ]{0,20}" maxlength="20" >
                      
				</div>
                </div>
              </div>
              
              <div class="columns">
		  	<div class="column">
		    	<div class="control">
					<label>Fecha de asignacion (dd/mm/aaaa)</label>
				  	<input class="input" type="text" name="Fecha_Asignacion" pattern="[0-9 ]{0,20}" maxlength="20" >
    
                </div>
		  	</div>
              
                
              
              
		  	<div class="column">
		    	<div class="control">
					<label>Observaciones</label>
				  	<input class="input" type="text" name="Observaciones" pattern="[a-zA-Z Ñ]{0,40}" maxlength="40"   >
				</div>
		  	</div>
              </div>
              <div class="columns">
		  	<div class="column">
		    	<div class="control">
					<label>Responsiva(s)</label>
				  	<input class="input" type="text" name="IDNum_Responsiva" pattern="[a-zA-Z0-9]{3,20}" maxlength="20"  required >
				</div>
		  	</div>
              
             
		  	<div class="column">
		    	<div class="control">
					<label>Estado del equipo</label>
				  	<input class="input" type="text" name="Estado_del_Equipo" pattern="[a-zA-ZÑ ]{3,20}" maxlength="20"  required >
				</div>
		  	</div>
              </div>
              
              <div class="columns">
		  	<div class="column">
		    	<div class="control">
					<label>Fecha de proximo servicio (dd/mm/aaaa) 6 meses</label>
				  	<input class="input" type="text" name="Fecha_proximoservicio"  pattern="[0-9 ]{0,20}" maxlength="20" >
				</div>
		  	</div>
              
              <div class="column">
		    	<div class="control">
					
				  	
				</div>
		  	</div>
              </div>
		<p class="has-text-centered">
		<button type="submit" class="button is-danger is-outlined">Guardar</button>
		</p>
	</form>
</div>
