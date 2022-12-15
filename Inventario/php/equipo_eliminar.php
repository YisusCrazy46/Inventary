<?php

	/*== Almacenando datos ==*/
    $equi_id_del=limpiar_cadena($_GET['equi_id_del']);

    /*== Verificando usuario ==*/
    $check_equipo=conexion();
    $check_equipo=$check_equipo->query("SELECT ID_Activo FROM equipo WHERE ID_Activo='$equi_id_del'");
    
    if($check_equipo->rowCount()==1){

    		
	    	$eliminar_equipo=conexion();
	    	$eliminar_equipo=$eliminar_equipo->prepare("DELETE FROM equipo WHERE ID_Activo=:id");

	    	$eliminar_equipo->execute([":id"=>$equi_id_del]);

	    	if($eliminar_equipo->rowCount()==1){
		        echo '
		            <div class="notification is-info is-light">
		                <strong>¡EQUIPO ELIMINADO!</strong><br>
		                Los datos del equipo se eliminaron con exito
		            </div>
		        ';
		    }else{
		        echo '
		            <div class="notification is-danger is-light">
		                <strong>¡Ocurrio un error inesperado!</strong><br>
		                No se pudo eliminar el equipo, por favor intente nuevamente
		            </div>
		        ';
		    }
		    $eliminar_equipo=null;
    	
    	$check_productos=null;
    }else{
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                El EQUIPO que intenta eliminar no existe
            </div>
        ';
    }
    $check_equipo=null;