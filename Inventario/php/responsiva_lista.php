<?php

        $inicio = ($pagina>0) ? (($pagina*$registros)-$registros) : 0 ;
        $tabla="";

        if(isset($busqueda)&& $busqueda!=""){
            $consulta_datos="SELECT * FROM responsiva WHERE ((IDNum_Responsiva!='".$_SESSION['id']."') AND(Nombre_Completo LIKE '%$busqueda%' OR Usuario LIKE '%$busqueda%' OR Correo LIKE '%$busqueda%' OR Fecha_de_asignacion LIKE '%$busqueda%' OR No_serie LIKE '%$busqueda%' OR Cargador LIKE '%$busqueda%'  )) ORDER BY Nombre_Completo ASC LIMIT $inicio,$registros";
        
            $consulta_total="SELECT COUNT(IDNum_Responsiva) FROM responsiva WHERE ((IDNum_Responsiva!='".$_SESSION['id']."') AND(Nombre_Completo LIKE '%$busqueda%' OR Usuario LIKE '%$busqueda%' OR Correo LIKE '%$busqueda%' OR Fecha_de_asignacion LIKE '%$busqueda%' OR No_serie LIKE '%$busqueda%' OR Cargador LIKE '%$busqueda%'  ))  ";

        }else{
            $consulta_datos="SELECT * FROM responsiva WHERE IDNum_Responsiva!='".$_SESSION['id']."' ORDER BY Nombre_Completo ASC LIMIT $inicio,$registros";
        
        $consulta_total="SELECT COUNT(IDNum_Responsiva) FROM responsiva WHERE IDNum_Responsiva!='".$_SESSION['id']."'";
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
                        <th>Nombre Completo</th>
                        <th>Usuario</th>
                        <th>Correo</th>
                        <th>Fecha de asignacion</th>
                        <th>Numero de serie</th>
                        <th>Cargador</th>
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
                    <td>'.$rows['Nombre_Completo'].'</td>
                    <td>'.$rows['Usuario'].'</td>
                    <td>'.$rows['Correo'].'</td>
                    <td>'.$rows['Fecha_de_asignacion'].'</td>
                    <td>'.$rows['No_serie'].'</td>
                    <td>'.$rows['Cargador'].'</td>
                    <td>
                        <a href="index.php?vista=resp_actualizar&resp_id_up='.$rows['IDNum_Responsiva'].'" class="button is-success is-rounded is-small is-outlined">Actualizar</a>
                    </td>
                    <td>
                        <a href="'.$url.$pagina.'&resp_id_del='.$rows['IDNum_Responsiva'].'" " class="button is-danger  is-rounded is-small is-outlined">Eliminar</a>
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
    <td colspan="7">
        No hay registros en el sistema
    </td>
</tr>

    ';
}
}


      $tabla.=' </tbody></table> </div>';
      if($total>=1 && $pagina<=$Npaginas){
        $tabla.=' <p class="has-text-right">Mostrando responsivas <strong>'.$pag_inicio.'</strong> al <strong>'.$pag_final.'</strong> de un <strong>total de '.$total.'</strong></p>
  
        ';
      }

        $conexion=null;
      echo $tabla;

      if($total>=1 && $pagina<=$Npaginas){
        echo paginador_tablas($pagina,$Npaginas,$url,7);
      }