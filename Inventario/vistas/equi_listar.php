<div class="container is-fluid mb-6">
    <h1 class="title">Equipos</h1>
    <h2 class="subtitle">Lista de equipos</h2>
</div>

<div class="container pb-6 pt-6">
<?php
    require_once"./php/main.php";
    if(isset($_GET['equi_id_del'])){
        require_once "./php/equipo_eliminar.php";
    }
    if(!isset($_GET['page'])){
    $pagina=1;
    }else{
        $pagina=(int) $_GET['page'];
        if($pagina<=1){
            $pagina=1;
        }
    }
    $pagina=limpiar_cadena($pagina);
    $url="index.php?vista=equi_listar&page=";
    $registros=15;
    $busqueda="";
    
    require_once"./php/equipo_lista.php";
   
?>
<h7 class="subtitle">Selecciona aqui para descargar el  <div class="row text-center">
  <div class="col-md-12"> 
      <a class="btn btn-info" download="Mi_Excel" href="Reporte1.php">->Reporte de equipos<-</a>
  </div>
</div></h7>
 
              
