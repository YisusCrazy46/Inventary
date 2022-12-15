<div class="container is-fluid mb-6">

	<center><h1  class="title" >RESPONSIVAS IMI</h1></center>
    </div>
	<center><h2 class="subtitle">Nueva responsiva</h2></center>
   
<div class="container pb-6 pt-6">

	<div class="form-rest mb-6 mt-6"></div>

	<form action="./php/resp_guardar.php" method="POST" class="FormularioAjax" autocomplete="off" >
		<div class="columns">
		  	<div class="column">
		    	<div class="control">
					<label>Nombre completo</label>
				  	<input class="input" type="text" name="Nombre_Completo" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,100}" maxlength="40" required >
				</div>
		  	</div>
		  	<div class="column">
		    	<div class="control">
					<label>Usuario</label>
				  	<input class="input" type="text" name="Usuario" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ. ]{3,40}" maxlength="40" required >
				</div>
		  	</div>
		</div>
		<div class="columns">
		  	<div class="column">
		    	<div class="control">
					<label>Correo</label>
				  	<input class="input" type="email" name="Correo"  maxlength="40"  required >
				</div>
		  	</div>
		  	<div class="column">
		    	<div class="control">
					<label>Fecha de asignacion (dd/mm/aaaa)</label>
				  	<input class="input" type="text" name="Fecha_de_asignacion" pattern="[a-zA-Z0-9 ]{2,20}" maxlength="20"  required >
				</div>
		  	</div>
		</div>
		<div class="columns">
		  	<div class="column">
		    	<div class="control">
					<label>Host</label>
				  	<input class="input" type="text" name="Area" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{3,40}" maxlength="40"  required  >
				</div>
		  	</div>
              
		  	<div class="column">
		    	<div class="control">
					<label>Numero de serie </label>
				  	<input class="input" type="TEXT" name="No_serie" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{3,40}" maxlength="40"  required >
				</div>
		  	</div>
		</div>
        <div class="columns">
		  	<div class="column">
		    	<div class="control">
					<label>Cargador</label>
				  	<input class="input" type="text" name="Cargador" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{3,40}" maxlength="40"  required  >
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
