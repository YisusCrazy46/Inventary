<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> <!--Importante--->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Descargar</title>
</head>
<body>
    
<?php
include('config.php');
date_default_timezone_set("America/Mexico");
$fecha = date("d/m/Y");

header("Content-Type: text/html;charset=utf-8");
header("Content-Type: application/vnd.ms-excel charset=iso-8859-1");
$filename = "ReporteResponsivas_" .$fecha. ".xls";
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Disposition: attachment; filename=" . $filename . "");


$listPais = ("SELECT * FROM equipo ORDER BY Num_Serie ASC");
$DataPaises = mysqli_query($con, $listPais);

?>


<table style="text-align: center;" border='1' cellpadding=1 cellspacing=1>
<thead>
    <tr style="background: #D0CDCD;">
    <th>#</th>
    <th>Numero Completo</th>
    <th>Usuario</th>
    <th>Correo</th>
	<th>Fecha de asignacion</th>
    <th>Numero de serie</th>
    <th>Cargador</th>

   

    </tr>
</thead>
<?php
$i =1;
while ($pais = mysqli_fetch_array($DataPaises)) { ?>
    <tbody>
        <tr>
            <td><?php echo $i++; ?></td>
            <td><?php echo $pais['Nombre_Completo']; ?></td>
            <td><?php echo $pais['Usuario']; ?></td>
            <td><?php echo $pais['Correo'] ; ?></td>
			<td><?php echo $pais['Fecha_de_asignacion']; ?></td>
            <td><?php echo $pais['No_serie']; ?></td>
            <td><?php echo $pais['Cargador'] ; ?></td>

        </tr>
    </tbody>
    
<?php } ?>
</table>

</body>
</html>
