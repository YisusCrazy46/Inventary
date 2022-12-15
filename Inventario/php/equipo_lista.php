<?php

        $inicio = ($pagina>0) ? (($pagina*$registros)-$registros) : 0 ;
        $tabla="";

        if(isset($busqueda)&& $busqueda!=""){
            $consulta_datos="SELECT * FROM equipo WHERE ((ID_Activo!='".$_SESSION['id']."') AND(Num_Serie LIKE '%$busqueda%' OR Host LIKE '%$busqueda%' OR Marca LIKE '%$busqueda%' OR Modelo LIKE '%$busqueda%' OR Capacidad_DD LIKE '%$busqueda%' OR Capacidad_RAM LIKE '%$busqueda%' OR Sis_Operativo LIKE '%$busqueda%' OR Area LIKE '%$busqueda%' OR Usuario LIKE '%$busqueda%' OR Fecha_Modificacion LIKE '%$busqueda%' OR Fecha_Asignacion LIKE '%$busqueda%' OR Observaciones LIKE '%$busqueda%' OR IDNum_Responsiva LIKE '%$busqueda%' OR Estado_del_Equipo LIKE '%$busqueda%' OR Fecha_proximoservicio LIKE '%$busqueda%'  )) ORDER BY Num_Serie ASC LIMIT $inicio,$registros";
        
            $consulta_total="SELECT COUNT(ID_Activo) FROM equipo WHERE ((ID_Activo!='".$_SESSION['id']."') AND(Num_Serie LIKE '%$busqueda%' OR Host LIKE '%$busqueda%' OR Marca LIKE '%$busqueda%' OR Modelo LIKE '%$busqueda%' OR Capacidad_DD LIKE '%$busqueda%' OR Capacidad_RAM LIKE '%$busqueda%' OR Sis_Operativo LIKE '%$busqueda%' OR Area LIKE '%$busqueda%' OR Usuario LIKE '%$busqueda%' OR Fecha_Modificacion LIKE '%$busqueda%' OR Fecha_Asignacion LIKE '%$busqueda%' OR Observaciones LIKE '%$busqueda%' OR IDNum_Responsiva LIKE '%$busqueda%' OR Estado_del_Equipo LIKE '%$busqueda%' OR Fecha_proximoservicio LIKE '%$busqueda%'  ))  ";

        }else{
            $consulta_datos="SELECT * FROM equipo WHERE ID_Activo!='".$_SESSION['id']."' ORDER BY Num_Serie ASC LIMIT $inicio,$registros";
        
        $consulta_total="SELECT COUNT(ID_Activo) FROM equipo WHERE ID_Activo !='".$_SESSION['id']."'";
        }

        $conexion=conexion();
        $datos=$conexion->query($consulta_datos);
        $datos=$datos->fetchAll();
  
        $total=$conexion->query($consulta_total);
        $total=(int) $total->fetchColumn();
  
        $Npaginas=ceil($total/$registros);
  
        $tabla.='
        <div class="table-container">
        <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
            <thead>
                <tr class="has-text-centered">
                    <th>#</th>
                    <th>Numero de serie</th>
                    <th>Host</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Capacidad de Disco Duro</th>
                    <th>Capacidad de RAM</th>
                    <th>Sistema Operativo</th>
                    <th>Area</th>
                    <th>Usuario</th>
                    <th>Fecha de Modificacion</th>
                    <th>Fecha de Asignacion</th>
                    <th>Observaciones</th>
                    <th>Numero de responsiva</th>
                    <th>Estado del equipo</th>
                    <th>Fecha de proximo Servicio</th>
                    <th colspan="2">Opciones</th>
                    
                </tr>
            </thead>
            <tbody>
        ';
  if($total>=1 && $pagina<=$Npaginas){
          $contador=$inicio+1;
          $pag_inicio=$inicio+1;
          foreach($datos as $rows){
              $tabla.='
              
                      <tr class="has-text-centered" >
                      <td>'.$contador.'</td>
                      <td>'.$rows['Num_Serie'].'</td>
                      <td>'.$rows['Host'].'</td>
                      <td>'.$rows['Marca'].'</td>
                      <td>'.$rows['Modelo'].'</td>
                      <td>'.$rows['Capacidad_DD'].'</td>
                      <td>'.$rows['Capacidad_RAM'].'</td>
                      <td>'.$rows['Sis_Operativo'].'</td>
                      <td>'.$rows['Area'].'</td>
                      <td>'.$rows['Usuario'].'</td>
                      <td>'.$rows['Fecha_Modificacion'].'</td>
                      <td>'.$rows['Fecha_Asignacion'].'</td>
                      <td>'.$rows['Observaciones'].'</td>
                      <td>'.$rows['IDNum_Responsiva'].'</td>
                      <td>'.$rows['Estado_del_Equipo'].'</td>
                      <td>'.$rows['Fecha_proximoservicio'].'</td>
                     
                      <td>
                          <a href="index.php?vista=equi_actualizar&equi_id_up='.$rows['ID_Activo'].'" class="button is-success is-rounded is-small is-outlined">Actualizar</a>
                      </td>
                      <td>
                          <a href="'.$url.$pagina.'&equi_id_del='.$rows['ID_Activo'].'" " class="button is-danger  is-rounded is-small is-outlined">Eliminar</a>
                      </td>
                  </tr>
  
              
  
              ';
              $contador++;
          }
         
          $pag_final=$contador-1;
  }else{
  if($total>=1){
      $tabla.='
      <tr class="has-text-centered" >
      <td colspan="7">
          <a href="'.$url.'1" class="button is-danger is-rounded is-small is-outlined mt-4 mb-4">
              Haga clic acá para recargar el listado
          </a>
      </td>
  </tr>
      ';
  }else{
      $tabla.='
      <tr class="has-text-centered" >
      <td colspan="17">
          No hay registros en el sistema
      </td>
  </tr>
  
      ';
  }
  }
  
  
        $tabla.=' </tbody></table> </div>';
        if($total>=1 && $pagina<=$Npaginas){
          $tabla.=' <p class="has-text-right">Mostrando equipos <strong>'.$pag_inicio.'</strong> al <strong>'.$pag_final.'</strong> de un <strong>total de '.$total.'</strong></p>
    
          ';
        }
  
          $conexion=null;
        echo $tabla;
  
        if($total>=1 && $pagina<=$Npaginas){
          echo paginador_tablas($pagina,$Npaginas,$url,7);
         
        }
        