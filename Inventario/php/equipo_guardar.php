<?php
    require_once "main.php";
    /*== Almacenando datos ==*/
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
    
    #verificando campos obligatorios#
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
    
    $guardar_equipo = conexion();
    $guardar_equipo = $guardar_equipo->prepare("INSERT INTO equipo(Num_Serie,Host,Marca,Modelo,Capacidad_DD,Capacidad_RAM,Sis_Operativo,Area,Usuario,Fecha_Modificacion,Fecha_Asignacion,Observaciones,IDNum_Responsiva,Estado_del_Equipo,Fecha_proximoservicio) VALUES(:nserie,:host,:marca,:modelo,:dd,:ram,:sisop,:area,:usuario,:fechact,:fechasi,:observacion,:responsiva,:estadoequi,:fechser)");
    
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
    
    $guardar_equipo->execute($marcadores);
    
    if ($guardar_equipo->rowCount() == 1) {
        echo '<div class="notification is-info is-ligth">
                <strong>¡EQUIPO REGISTRADO!</strong>
                El equipo se registro con exito
            </div>';
    } else {
        echo '<div class="notification is-danger is-ligth">
                <strong>¡Ocurrio un error inesperado!</strong>
               No se pudo registrar el equipo, por favor intente nuevamente
            </div>';
    }
    $guardar_equipo = null;
    
    