<?php
	require_once "../inc/session_start.php";

	require_once "main.php";

    /*== Almacenando id ==*/
    $id=limpiar_cadena($_POST['ID_Activo']);

    /*== Verificando usuario ==*/
	$check_equipo=conexion();
	$check_equipo=$check_equipo->query("SELECT * FROM equipo WHERE ID_Activo='$id'");

    if($check_equipo->rowCount()<=0){
    	echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                El equipo no existe en el sistema
            </div>
        ';
        exit();
    }else{
    	$datos=$check_equipo->fetch();
    }
    $check_equipo=null;
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


     $nserie= limpiar_cadena($_POST['Num_Serie']);
     $host = limpiar_cadena($_POST['Host']);
 
     $marca = limpiar_cadena($_POST['Marca']);
     $modelo = limpiar_cadena($_POST['Modelo']);
 
     $dd = limpiar_cadena($_POST['Capacidad_DD']);
     $ram = limpiar_cadena($_POST['Capacidad_RAM']);
 
     $sisop = limpiar_cadena($_POST['Sis_Operativo']);
     $area = limpiar_cadena($_POST['Area']);
 
     $usuario = limpiar_cadena($_POST['Usuario']);
     $fechact = limpiar_cadena($_POST['Fecha_Modificacion']);
 
     $fechasi = limpiar_cadena($_POST['Fecha_Asignacion']);
     $observacion = limpiar_cadena($_POST['Observaciones']);
 
     $responsiva = limpiar_cadena($_POST['IDNum_Responsiva']);
     $estadoequi = limpiar_cadena($_POST['Estado_del_Equipo']);
 
     $fechser = limpiar_cadena($_POST['Fecha_proximoservicio']);
     
     if ($nserie == "" ||$host == "" ||$marca == "" ||$modelo == ""  ||$dd == "" ||$ram == "" || $sisop == "" ||$area == "" || $usuario == ""  || $observacion == "" || $responsiva == "" ||$estadoequi == "" ){
        echo '<div class="notification is-danger is-ligth">
                        <strong>¡Ocurrio un error inesperado!</strong>
                        No has llenado todos los campos que son obligatorios
                    </div>';
        exit();
    }
     #verificando integridad de los datos#
     if (verificar_datos("[aa-zA-Z0-9]{10,40}", $nserie)) {
        echo '<div class="notification is-danger is-ligth">
                <strong>¡Ocurrio un error inesperado!</strong>
                El NUMERO DE SERIE no coincide con el formato solicitado
            </div>';
        exit();
    }
    if (verificar_datos("[aa-zA-Z0-9]{3,10}", $host)) {
        echo '<div class="notification is-danger is-ligth">
                <strong>¡Ocurrio un error inesperado!</strong>
                El HOST no coincide con el formato solicitado
            </div>';
        exit();
    }
    if (verificar_datos("[a-zA-Z ]{0,40}", $marca)) {
        echo '<div class="notification is-danger is-ligth">
                <strong>¡Ocurrio un error inesperado!</strong>
                El MARCA no coincide con el formato solicitado
            </div>';
        exit();
    }
    if (verificar_datos("[a-zA-Z0-9 ]{3,40}", $modelo)) {
        echo '<div class="notification is-danger is-ligth">
                <strong>¡Ocurrio un error inesperado!</strong>
                El MODELO no coincide con el formato solicitado
            </div>';
        exit();
    }
    if (verificar_datos("[a-zA-Z0-9 ]{3,40}", $dd)) {
        echo '<div class="notification is-danger is-ligth">
                <strong>¡Ocurrio un error inesperado!</strong>
                El campo CAPACIDAD DE DISCO DURO no coincide con el formato solicitado
            </div>';
        exit();
    }
    if (verificar_datos("[a-zA-Z0-9 ]{0,40}", $ram)) {
        echo '<div class="notification is-danger is-ligth">
                <strong>¡Ocurrio un error inesperado!</strong>
                El campo RAM no coincide con el formato solicitado
            </div>';
        exit();
    }
    if (verificar_datos("[a-zA-Z-0-9 ]{3,40}", $sisop)) {
        echo '<div class="notification is-danger is-ligth">
                <strong>¡Ocurrio un error inesperado!</strong>
                El campo SISTEMA OPERATIVO no coincide con el formato solicitado
            </div>';
        exit();
    }
    if (verificar_datos("[a-zA-Z ]{0,40}", $area)) {
        echo '<div class="notification is-danger is-ligth">
                <strong>¡Ocurrio un error inesperado!</strong>
                El campo AREA no coincide con el formato solicitado
            </div>';
        exit();
    }
    if (verificar_datos("[a-zA-Z0-9 ]{3,40}", $usuario)) {
        echo '<div class="notification is-danger is-ligth">
                <strong>¡Ocurrio un error inesperado!</strong>
                El campo USUARIO no coincide con el formato solicitado
            </div>';
        exit();
    }
    if (verificar_datos("[0-9 ]{0,20}", $fechact)) {
        echo '<div class="notification is-danger is-ligth">
                <strong>¡Ocurrio un error inesperado!</strong>
                El campo FECHA DE ACTUALIZACION no coincide con el formato solicitado
            </div>';
        exit();
    }
    if (verificar_datos("[0-9 ]{0,20}", $fechasi)) {
        echo '<div class="notification is-danger is-ligth">
                <strong>¡Ocurrio un error inesperado!</strong>
                El campo FECHA DE ASIGNACION no coincide con el formato solicitado
            </div>';
        exit();
    }
    if (verificar_datos("[a-zA-Z Ñ]{0,100}", $observacion)) {
        echo '<div class="notification is-danger is-ligth">
                <strong>¡Ocurrio un error inesperado!</strong>
                El campo OBSERVACION no coincide con el formato solicitado
            </div>';
        exit();
    }
    if (verificar_datos("[a-zA-Z0-9]{3,40}", $responsiva)) {
        echo '<div class="notification is-danger is-ligth">
                <strong>¡Ocurrio un error inesperado!</strong>
                El campo NUMERO DE RESPONSIVA(S) no coincide con el formato solicitado
            </div>';
        exit();
    }
    if (verificar_datos("[a-zA-Zñ ]{3,40}", $estadoequi)) {
        echo '<div class="notification is-danger is-ligth">
                <strong>¡Ocurrio un error inesperado!</strong>
                El campo ESTADO DEL EQUIPO no coincide con el formato solicitado
            </div>';
        exit();
    }
    if (verificar_datos("[0-9 ]{0,20}", $fechser)) {
        echo '<div class="notification is-danger is-ligth">
                <strong>¡Ocurrio un error inesperado!</strong>
                El campo Fecha de proximo servicio no coincide con el formato solicitado
            </div>';
        exit();
    }

    #verificar fechas#

   
    
    $check_numser = conexion();
    $check_numser = $check_numser->query("SELECT Num_Serie FROM equipo WHERE Num_Serie='$nserie'");
    if ($check_numser->rowCount() > 0) {
        echo '<div class="notification is-danger is-ligth">
                <strong>¡Ocurrio un error inesperado!</strong>
                El NUMERO DE SERIE ya se encuentra registrado, favor de verificar
            </div>';
        exit();
    }
    $check_numser = null;
    


    $check_host = conexion();
    $check_host = $check_host->query("SELECT Host FROM equipo WHERE Host='$host'");
    if ($check_host->rowCount() > 0) {
        echo '<div class="notification is-danger is-ligth">
                <strong>¡Ocurrio un error inesperado!</strong>
                El HOST ya se encuentra registrado en un equipo, favor cambiarlo
            </div>';
        exit();
    }
    $check_host = null;
    
    $actualizar_equipo = conexion();
    $actualizar_equipo = $actualizar_equipo->prepare("UPDATE equipo SET Num_Serie=:nserie,Host=:host,Marca=:marca,Modelo=:modelo,Capacidad_DD=:dd,Capacidad_RAM=:ram,Sis_Operativo=:sisop,Area=:area,Usuario=:usuario,Fecha_Modificacion=:fechact,Fecha_Asignacion=:fechasi,Observaciones=:observacion,IDNum_Responsiva=:responsiva,Estado_del_Equipo=:estadoequi,Fecha_proximoservicio=:fechser WHERE ID_Activo=:id");
                                                                                                                                                                                                                                                                               
    $marcadores = [
        ":nserie" => $nserie,
         ":host" => $host,
         ":modelo" => $modelo,
         ":marca" => $marca,
          ":dd" => $dd, 
          ":ram" => $ram,
           ":sisop" => $sisop,
            ":area" => $area, 
            ":usuario" => $usuario,
             ":fechact" => $fechact,
              ":fechasi" => $fechasi,
               ":observacion" => $observacion,
                ":responsiva" => $responsiva, 
                ":estadoequi" => $estadoequi,
                 ":fechser" => $fechser
                ];
                if($actualizar_equipo->execute($marcadores)){
                    echo '
                        <div class="notification is-info is-light">
                            <strong>¡USUARIO ACTUALIZADO!</strong><br>
                            El usuario se actualizo con exito
                        </div>
                    ';
                }else{
                    echo '
                        <div class="notification is-danger is-light">
                            <strong>¡Ocurrio un error inesperado!</strong><br>
                            No se pudo actualizar el usuario, por favor intente nuevamente
                        </div>
                    ';
                }
                $actualizar_equipo=null;