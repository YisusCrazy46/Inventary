<?php
	require_once "../inc/session_start.php";

	require_once "main.php";

    /*== Almacenando id ==*/
    $id=limpiar_cadena($_POST['usuario_id']);

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
    $nombre=limpiar_cadena($_POST['Nombres']);
    $apellido=limpiar_cadena($_POST['Apellidos']);
    $noempleado=limpiar_cadena($_POST['Num_Empleado']);
    $puesto=limpiar_cadena($_POST['Puesto']);
    $area=limpiar_cadena($_POST['Area']);
    $fechingre=limpiar_cadena($_POST['Fecha_Ingreso']);
    $email=limpiar_cadena($_POST['Correo']);
    $usuario=limpiar_cadena($_POST['Usuario']);
    $responsiva=limpiar_cadena($_POST['Responsivas']);

    /*== Verificando campos obligatorios ==*/
    if($nombre=="" || $apellido=="" || $noempleado=="" || $puesto=="" || $area=="" || $fechingre=="" || $email=="" || $usuario==""|| $responsiva==""){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                No has llenado todos los campos que son obligatorios
            </div>
        ';
        exit();
    }
     /*== Verificando integridad de los datos ==*/
     if(verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}",$nombre)){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                El NOMBRE(S) no coincide con el formato solicitado
            </div>
        ';
        exit();
    }


    if(verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}",$apellido)){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                El APELLIDO no coincide con el formato solicitado
            </div>
        ';
        exit();
    }

    if(verificar_datos("[0-9]{4,20}",$noempleado)){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                El Numero de empleado no coincide con el formato solicitado
            </div>
        ';
        exit();
    }

    if(verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}",$puesto)){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                El PUESTO no coinciden con el formato solicitado
            </div>
        ';
        exit();
    }
    if(verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}",$area) ){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                El AREA no coinciden con el formato solicitado
            </div>
        ';
        exit();
    }
    if(verificar_datos("[0-9 ]{0,15}",$fechingre) ){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                La FECHA DE INGRESO no coinciden con el formato solicitado
            </div>
        ';
        exit();
    }
    if(verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ.  ]{0,40}",$usuario) ){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                El USUARIO no coinciden con el formato solicitado
            </div>
        ';
        exit();
    }
    if(verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ.  ]{0,40}",$responsiva) ){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                La RESPONSIVA(S) no coinciden con el formato solicitado
            </div>
        ';
        exit();
    }
    if($email!=""){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            $check_email=conexion();
            $check_email=$check_email->query("SELECT correo FROM colaborador WHERE correo='$email'");
            if($check_email->rowCount()>0){
                echo '
                    <div class="notification is-danger is-light">
                        <strong>¡Ocurrio un error inesperado!</strong><br>
                        El correo electrónico ingresado ya se encuentra registrado, por favor elija otro
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
    $check_usuario=$check_usuario->query("SELECT Usuario FROM colaborador WHERE Usuario='$usuario'");
    if($check_usuario->rowCount()>0){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                El USUARIO ingresado ya se encuentra registrado, por favor elija otro
            </div>
        ';
        exit();
    }
    $check_usuario=null;
    
    $actualizar_colaborador=conexion();
    $actualizar_colaborador=$actualizar_colaborador->prepare("UPDATE colaborador SET Nombres=:nombre,Apellidos=:apellido,Num_Empleado=:noempleado,Puesto=:puesto,Area=:area,Fecha_Ingreso=:fechingre,Correo=:email,Usuario=:usuario,Responsivas=:responsiva WHERE ID_Usuario=id");

    $marcadores=[
        ":nombre"=>$nombre,
        ":apellido"=>$apellido,
        ":noempleado"=>$noempleado,
        ":puesto"=>$puesto,
        ":area"=>$area,
        ":fechingre"=>$fechingre,
        ":email"=>$email,
        ":usuario"=>$usuario,
        ":responsiva"=>$responsiva
    ];

    $actualizar_colaborador->execute($marcadores);

    if($actualizar_colaborador->rowCount()==1){
        echo '
            <div class="notification is-info is-light">
                <strong>¡COLABORADOR REGISTRADO!</strong><br>
                El Colaborador se registro con exito
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
    $actualizar_colaborador=null;