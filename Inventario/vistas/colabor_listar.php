
 
 <div class="container is-fluid mb-6">
    <h1 class="title">Colaboradoes</h1>
    <h2 class="subtitle">Lista de colaboradores</h2>
</div>

<div class="container pb-6 pt-6">
<?php
    require_once"./php/main.php";
    if(isset($_GET['colabor_id_del'])){
        require_once "./php/colabor_eliminar.php";
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
    $url="index.php?vista=colabor_listar&page=";
    $registros=15;
    $busqueda="";
    
    require_once"./php/colaborador_lista.php";
   
?>
 