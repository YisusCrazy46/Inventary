<div class="container is-fluid mb-6">

	<center><h1  class="title" >COLABORADORES IMI</h1></center>
    </div>
	<center><h2 class="subtitle">Nuevo colaborador</h2></center>
   
<div class="container pb-6 pt-6">

	<div class="form-rest mb-6 mt-6"></div>

	<form action="./php/colabor_guardar.php" method="POST" class="FormularioAjax" autocomplete="off" >
		<div class="columns">
		  	<div class="column">
		    	<div class="control">
					<label>Nombre(s)</label>
				  	<input class="input" type="text" name="Nombres" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}" maxlength="40" required >
				</div>
		  	</div>
		  	<div class="column">
		    	<div class="control">
					<label>Apellidos</label>
				  	<input class="input" type="text" name="Apellidos" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}" maxlength="40" required >
				</div>
		  	</div>
		</div>
		<div class="columns">
		  	<div class="column">
		    	<div class="control">
					<label>Numero de empleado</label>
				  	<input class="input" type="text" name="Num_Empleado" pattern="[0-9]{4,20}" maxlength="40"  required >
				</div>
		  	</div>
		  	<div class="column">
		    	<div class="control">
					<label>Puesto</label>
				  	<input class="input" type="text" name="Puesto" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}" maxlength="40"  required >
				</div>
		  	</div>
		</div>
		<div class="columns">
		  	<div class="column">
		    	<div class="control">
					<label>Area</label>
				  	<input class="input" type="text" name="Area" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}" maxlength="40"  required  >
				</div>
		  	</div>
              
		  	<div class="column">
		    	<div class="control">
					<label>Fecha de ingreso (dd/mm/aaaa)</label>
				  	<input class="input" type="text" name="Fecha_Ingreso" pattern="[0-9 ]{0,15}" maxlength="15"  required >
				</div>
		  	</div>
		</div>
        <div class="columns">
		  	<div class="column">
		    	<div class="control">
					<label>Correo</label>
				  	<input class="input" type="email" name="Correo"  maxlength="40"  required  >
				</div>
		  	</div>
              
              
		  	<div class="column">
		    	<div class="control">
					<label>Usuario</label>
				  	<input class="input" type="text" name="Usuario" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ.  ]{0,40}" maxlength="40"  required >
				</div>
		  	</div>
              </div>
              <div class="columns">
		  	<div class="column">
		    	<div class="control">
					<label>Responsiva(s)</label>
				  	<input class="input" type="text" name="Responsivas" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ.  ]{0,40}" maxlength="40"  required >
                      
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
