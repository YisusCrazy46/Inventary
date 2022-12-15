<?php

        $inicio = ($pagina>0) ? (($pagina*$registros)-$registros) : 0 ;
        $tabla="";

        if(isset($busqueda)&& $busqueda!=""){
            $consulta_datos="SELECT * FROM colaborador WHERE (ID_Usuario!='".$_SESSION['id']."') AND(Nombres LIKE '%$busqueda%' OR Apellidos LIKE '%$busqueda%' OR Num_Empleado LIKE '%$busqueda%' OR Puesto LIKE '%$busqueda%' OR Area LIKE '%$busqueda%' OR Fecha_Ingreso LIKE '%$busqueda%'OR Correo LIKE '%$busqueda%'OR Usuario LIKE '%$busqueda%'OR Responsivas LIKE '%$busqueda%' ))  ORDER BY Nombres ASC LIMIT $inicio,$registros";
        
            $consulta_total="SELECT COUNT(ID_Usuario) FROM colaborador WHERE ((ID_Usuario!='".$_SESSION['id']."') AND(Nombres LIKE '%$busqueda%' OR Apellidos LIKE '%$busqueda%' OR Num_Empleado LIKE '%$busqueda%' OR Puesto LIKE '%$busqueda%' OR Area LIKE '%$busqueda%' OR Fecha_Ingreso LIKE '%$busqueda%'OR Correo LIKE '%$busqueda%'OR Usuario LIKE '%$busqueda%'OR Responsivas LIKE '%$busqueda%' )) ";

        }else{
            $consulta_datos="SELECT * FROM colaborador WHERE (ID_Usuario!='".$_SESSION['id']."') ORDER BY Nombres ASC LIMIT $inicio,$registros";
        
        $consulta_total="SELECT COUNT(ID_Usuario) FROM colaborador WHERE ID_Usuario!='".$_SESSION['id']."'";
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
                        <th>Nombre(s)</th>
                        <th>Apellidos</th>
                        <th>Numero de empleado</th>
                        <th>Puesto</th>
                        <th>Area</th>
                        <th>Fecha de ingreso</th>
                        <th>Correo</th>
                        <th>Usuario</th>
                        <th>Responsiva(s)</th>
                        
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
                    <td>'.$rows['Nombres'].'</td>
                    <td>'.$rows['Apellidos'].'</td>
                    <td>'.$rows['Num_Empleado'].'</td>
                    <td>'.$rows['Puesto'].'</td>
                    <td>'.$rows['Area'].'</td>
                    <td>'.$rows['Fecha_Ingreso'].'</td>
                    <td>'.$rows['Correo'].'</td>
                    <td>'.$rows['Usuario'].'</td>
                    <td>'.$rows['Responsivas'].'</td>
                    <td>
                        <a href="index.php?vista=colabor_actualizar&colabor_id_up='.$rows['ID_Usuario'].'" class="button is-success is-rounded is-small is-outlined">Actualizar</a>
                    </td>
                    <td>
                        <a href="'.$url.$pagina.'&colabor_id_del='.$rows['ID_Usuario'].'" " class="button is-danger  is-rounded is-small is-outlined">Eliminar</a>
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
    <td colspan="11">
        No hay registros en el sistema
    </td>
</tr>

    ';
}
}


      $tabla.=' </tbody></table> </div>';
      if($total>=1 && $pagina<=$Npaginas){
        $tabla.=' <p class="has-text-right">Mostrando colaboradores <strong>'.$pag_inicio.'</strong> al <strong>'.$pag_final.'</strong> de un <strong>total de '.$total.'</strong></p>
  
        ';
      }

        $conexion=null;
      echo $tabla;

      if($total>=1 && $pagina<=$Npaginas){
        echo paginador_tablas($pagina,$Npaginas,$url,7);
      }