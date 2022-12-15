<?php

	/*== Almacenando datos ==*/
    $resp_id_del=limpiar_cadena($_GET['resp_id_del']);

    /*== Verificando usuario ==*/
    $check_resp=conexion();
    $check_resp=$check_resp->query("SELECT IDNum_Responsiva FROM responsiva WHERE IDNum_Responsiva='$resp_id_del'");
    
    if($check_resp->rowCount()==1){

    		
	    	$eliminar_resp=conexion();
	    	$eliminar_resp=$eliminar_resp->prepare("DELETE FROM responsiva WHERE IDNum_Responsiva=:id");

	    	$eliminar_resp->execute([":id"=>$resp_id_del]);

	    	if($eliminar_resp->rowCount()==1){
		        echo '
		            <div class="notification is-info is-light">
		                <strong>¡RESPONSIVA ELIMINADA!</strong><br>
		                Los datos del usuario se eliminaron con exito
		            </div>
		        ';
		    }else{
		        echo '
		            <div class="notification is-danger is-light">
		                <strong>¡Ocurrio un error inesperado!</strong><br>
		                No se pudo eliminar la responsiva, por favor intente nuevamente
		            </div>
		        ';
		    }
		    $eliminar_resp=null;
    	
    	$check_resp=null;
    }else{
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                La RESPONSIVA que intenta eliminar no existe
            </div>
        ';
    }
    $check_resp=null;