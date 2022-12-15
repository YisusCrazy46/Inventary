<?php
    
    require_once "main.php";

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
    $guardar_responsiva=$guardar_responsiva->prepare("INSERT INTO responsiva(Nombre_Completo,Usuario,Correo,Fecha_de_asignacion,No_serie,Cargador) VALUES(:nombrecomp,:usuario,:email,:fechasi,:noserie,:cargador)");

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