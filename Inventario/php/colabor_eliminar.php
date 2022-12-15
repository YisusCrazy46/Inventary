<?php

	/*== Almacenando datos ==*/
    $colabor_id_del=limpiar_cadena($_GET['colabor_id_del']);

    /*== Verificando usuario ==*/
    $check_colabor=conexion();
    $check_colabor=$check_colabor->query("SELECT ID_Usuario FROM colaborador WHERE ID_Usuario='$user_id_del'");
    
    if($check_colabor->rowCount()==1){

    		
	    	$eliminar_colaborador=conexion();
	    	$eliminar_colaborador=$eliminar_colaborador->prepare("DELETE FROM colaborador WHERE ID_Usuario=:id");

	    	$eliminar_colaborador->execute([":id"=>$colabor_id_del]);

	    	if($eliminar_colaborador->rowCount()==1){
		        echo '
		            <div class="notification is-info is-light">
		                <strong>¡USUARIO ELIMINADO!</strong><br>
		                Los datos del usuario se eliminaron con exito
		            </div>
		        ';
		    }else{
		        echo '
		            <div class="notification is-danger is-light">
		                <strong>¡Ocurrio un error inesperado!</strong><br>
		                No se pudo eliminar el usuario, por favor intente nuevamente
		            </div>
		        ';
		    }
		    $eliminar_colaborador=null;
    	
    	$check_productos=null;
    }else{
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                El USUARIO que intenta eliminar no existe
            </div>
        ';
    }
    $check_colabor=null;