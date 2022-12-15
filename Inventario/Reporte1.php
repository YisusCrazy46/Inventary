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
date_default_timezone_set("America/Bogota");
$fecha = date("d/m/Y");

header("Content-Type: text/html;charset=utf-8");
header("Content-Type: application/vnd.ms-excel charset=iso-8859-1");
$filename = "ReporteEquipos_" .$fecha. ".xls";
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Disposition: attachment; filename=" . $filename . "");


$listPais = ("SELECT * FROM equipo ORDER BY Num_Serie ASC");
$DataPaises = mysqli_query($con, $listPais);

?>


<table style="text-align: center;" border='1' cellpadding=1 cellspacing=1>
<thead>
    <tr style="background: #D0CDCD;">
    <th>#</th>
    <th>Numero de serie</th>
    <th>Host</th>
    <th>Marca</th>
	<th>Modelo</th>
    <th>Capacidad de disco duro</th>
    <th>Capacidad de ram</th>
    <th>Sistema operativo</th>
	<th>Area</th>
    <th>Usuario</th>
    <th>Fecha de modificacion</th>
	<th>Fecha de asignacion</th>
    <th>Observaciones</th>
    <th>Numero de responsiva</th>
    <th>Estado del equipo</th>
	<th>Fecha de proximo servicio</th>
   

    </tr>
</thead>
<?php
$i =1;
while ($pais = mysqli_fetch_array($DataPaises)) { ?>
    <tbody>
        <tr>
            <td><?php echo $i++; ?></td>
            <td><?php echo $pais['Num_Serie']; ?></td>
            <td><?php echo $pais['Host']; ?></td>
            <td><?php echo $pais['Marca'] ; ?></td>
			<td><?php echo $pais['Modelo']; ?></td>
            <td><?php echo $pais['Capacidad_DD']; ?></td>
            <td><?php echo $pais['Capacidad_RAM'] ; ?></td>
			<td><?php echo $pais['Sis_Operativo']; ?></td>
            <td><?php echo $pais['Area']; ?></td>
            <td><?php echo $pais['Usuario'] ; ?></td>
			<td><?php echo $pais['Fecha_Modificacion']; ?></td>
            <td><?php echo $pais['Fecha_Asignacion']; ?></td>
            <td><?php echo $pais['Observaciones'] ; ?></td>
			<td><?php echo $pais['IDNum_Responsiva']; ?></td>
            <td><?php echo $pais['Estado_del_Equipo']; ?></td>
            <td><?php echo $pais['Fecha_proximoservicio'] ; ?></td>
        </tr>
    </tbody>
    
<?php } ?>
</table>

</body>
</html>
