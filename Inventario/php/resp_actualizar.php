<?php
	require_once "../inc/session_start.php";

	require_once "main.php";

    /*== Almacenando id ==*/
    $id=limpiar_cadena($_POST['IDNum_Responsiva']);

    /*== Verificando usuario ==*/
	$check_usuario=conexion();
	$check_usuario=$check_usuario->query("SELECT * FROM usuario WHERE usuario_id='$id'");

    if($check_usuario->rowCount()<=0){
    	echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                El usuario no existe en el sistema
            </div>
        ';
        exit();
    }else{
    	$datos=$check_usuario->fetch();
    }
    $check_usuario=null;


    /*== Almacenando datos del administrador ==*/
    $admin_usuario=limpiar_cadena($_POST['administrador_usuario']);
    $admin_clave=limpiar_cadena($_POST['administrador_clave']);


    /*== Verificando campos obligatorios del administrador ==*/
    if($admin_usuario=="" || $admin_clave==""){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                No ha llenado los campos que corresponden a su USUARIO o CLAVE
            </div>
        ';
        exit();
    }

    /*== Verificando integridad de los datos (admin) ==*/
    if(verificar_datos("[a-zA-Z0-9]{4,20}",$admin_usuario)){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                Su USUARIO no coincide con el formato solicitado
            </div>
        ';
        exit();
    }

    if(verificar_datos("[a-zA-Z0-9$@.-]{7,100}",$admin_clave)){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                Su CLAVE no coincide con el formato solicitado
            </div>
        ';
        exit();
    }


    /*== Verificando el administrador en DB ==*/
    $check_admin=conexion();
    $check_admin=$check_admin->query("SELECT usuario_usuario,usuario_clave FROM usuario WHERE usuario_usuario='$admin_usuario' AND usuario_id='".$_SESSION['id']."'");
    if($check_admin->rowCount()==1){

    	$check_admin=$check_admin->fetch();

    	if($check_admin['usuario_usuario']!=$admin_usuario || !password_verify($admin_clave, $check_admin['usuario_clave'])){
    		echo '
	            <div class="notification is-danger is-light">
	                <strong>¡Ocurrio un error inesperado!</strong><br>
	                USUARIO o CLAVE de administrador incorrectos
	            </div>
	        ';
	        exit();
    	}

    }else{
    	echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                USUARIO o CLAVE de administrador incorrectos
            </div>
        ';
        exit();
    }
    $check_admin=null;

    /*== Almacenando datos ==*/
    $nombrecomp=limpiar_cadena($_POST['Nombre_Completo']);
    $usuario=limpiar_cadena($_POST['Usuario']);
    $email=limpiar_cadena($_POST['Correo']);
    $fechasi=limpiar_cadena($_POST['Fecha_de_asignacion']);
        $noserie=limpiar_cadena($_POST['No_serie']);
     $cargador=limpiar_cadena($_POST['Cargador']);

    /*== Verificando campos obligatorios ==*/
    if($nombrecomp=="" || 
    $usuario=="" ||
     $email=="" ||
      $fechasi=="" 
      || 
    
      $noserie=="" ||
       $cargador==""){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                No has llenado todos los campos que son obligatorios
            </div>
        ';
        exit();
    }


    /*== Verificando integridad de los datos ==*/
    if(verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,100}",$nombrecomp)){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                El NOMBRE COMPLETO no coincide con el formato solicitado
            </div>
        ';
        exit();
    }


    if(verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ. ]{3,40}",$usuario)){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                El USUARIO no coincide con el formato solicitado
            </div>
        ';
        exit();
    }

    if(verificar_datos("[a-zA-Z0-9 ]{2,20}",$fechasi)){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                La FECHA DE ASIGNACION no coincide con el formato solicitado
            </div>
        ';
        exit();
    }


    
    if(verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{3,40}",$noserie) ){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                El NUMERO DE SERIE no coincide con el formato solicitado
            </div>
        ';
        exit();
    }
    if(verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{3,40}",$cargador) ){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                El USUARIO no coinciden con el formato solicitado
            </div>
        ';
        exit();
    }
   
    if($email!=""){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            $check_email=conexion();
            $check_email=$check_email->query("SELECT Correo FROM responsiva WHERE Correo='$email'");
            if($check_email->rowCount()>0){
                echo '
                    <div class="notification is-danger is-light">
                        <strong>¡Ocurrio un error inesperado!</strong><br>
                        El correo electrónico ingresado ya se encuentra registrado con otra responsiva, por favor elija otro
                    </div>
                ';
                exit();
            }
            $check_email=null;
        }else{
            echo '
                <div class="notification is-danger is-light">
                    <strong>¡Ocurrio un error inesperado!</strong><br>
                    Ha ingresado un correo electrónico no valido
                </div>
            ';
            exit();
        } 
    }


    /*== Verificando usuario ==*/
    $check_usuario=conexion();
    $check_usuario=$check_usuario->query("SELECT Usuario FROM responsiva WHERE Usuario='$usuario'");
    if($check_usuario->rowCount()>0){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                El USUARIO ingresado ya se encuentra registrado en otra responsiva, por favor elija otro
            </div>
        ';
        exit();
    }
    $check_usuario=null;
    
    $guardar_responsiva=conexion();
    $guardar_responsiva=$guardar_responsiva->prepare("UPDATE responsiva SET Nombre_Completo=:nombrecomp,Usuario=:usuario,Correo=:email,Fecha_de_asignacion=:fechasi,No_serie=:noserie,Cargador=:cargador WHERE IDNum_Responsiva=:id");

    $marcadores=[
        ":nombrecomp"=>$nombrecomp,
        ":usuario"=>$usuario,
        ":email"=>$email,
        ":fechasi"=>$fechasi,
         ":noserie"=>$noserie,
        ":cargador"=>$cargador,
       
       
        
    ];

    $guardar_responsiva->execute($marcadores);

    if($guardar_responsiva->rowCount()==1){
        echo '
            <div class="notification is-info is-light">
                <strong>¡COLABORADOR REGISTRADO!</strong><br>
                La RESPONSIVA se registro con exito
            </div>
        ';
    }else{
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                No se pudo registrar el COLABORADOR, por favor intente nuevamente
            </div>
        ';
    }
    $guardar_responsiva=null;