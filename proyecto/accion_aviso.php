<?php
include "seguridad_sesion.php";
$segsesion=new Seguridad_sesion();
if ($segsesion->getOperario()==null){
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title></title>
<link rel="stylesheet" href="estilos.css">
</head>
<body>
<div>
<?php
include "aviso.php";
include "usuario.php";
include "almacen.php";
include "pieza.php";
$pieza=new Pieza();
$aviso=new Aviso();
$operario=new Usuario();
$almacen=new Almacen();
$idAviso=$_POST['idAviso'];
if (isset($_POST['anadir_operario'])){
    if ($operario->devolverOperariosNoAsignadosAviso($idAviso)!=NULL){
       echo "<h3>Seleccione operario:</h3><br />";
       echo "<form method='POST' action='ejecutar_asignar_operario_aviso.php'>";
       echo "<select name='operario'>";
       foreach ($operario->devolverOperariosNoAsignadosAviso($idAviso) as $fila){
          echo "<option value='" . $fila['idOperario'] . "'>" . $fila['idOperario'] . " " . $fila['nombre'] . " " . $fila['apellido1'] . "</option>\n";
       }
       echo "</select>";
       echo "<input type='hidden' name='aviso' value='" . $idAviso . "'>";
       echo "<input type='submit' name='submit' value='Asignar'>";
       echo "</form>";
       echo "<br />";
    } else {
        echo "<h3>No hay mas operarios asignables a este aviso</h3>";
    }
}
if (isset($_POST['quitar_operario'])){
    if ($operario->devolverOperariosAsignadosAviso($idAviso)!=NULL){
       echo "<h3>Seleccione operario:</h3><br />";
       echo "<form method='POST' action='ejecutar_eliminar_operario_aviso.php'>";
       echo "<select name='operario'>";
       foreach ($operario->devolverOperariosAsignadosAviso($idAviso) as $fila){
          echo "<option value='" . $fila['idOperario'] . "'>" . $fila['idOperario'] . " " . $fila['nombre'] . " " . $fila['apellido1'] . "</option>\n";
       }
       echo "</select>";
       echo "<input type='hidden' name='aviso' value='" . $idAviso . "'>";
       echo "<input type='submit' name='submit' value='Quitar'>";
       echo "</form>";
       echo "<br />";
    } else {
        echo "<h3>No hay operarios asignados a este aviso</h3>";
    }
}
if (isset($_POST['anadir_pieza'])){
    if ($almacen->devolverPiezasAlmacen()!=NULL){
        echo "<h3>Seleccione pieza:</h3><br />\n";
        echo "<form method='POST' action='ejecutar_asignar_pieza_aviso.php'>\n";
        echo "<select name='ubicacion'>";
        foreach ($almacen->devolverPiezasAlmacen() as $fila){
            echo "<option value='" . $fila['ubicacion'] . "'>" . $fila['idPieza'] . " " . $fila['descripcion'] . " " . $fila['codigo'] . "</option>\n";
        }
        echo "</select>";
        echo "<input type='hidden' name='aviso' value='" . $idAviso . "'>";
        echo "<input type='submit' name='submit' value='Asignar'>";
        echo "</form>";
        echo "<br />";
    } else {
    echo "<h3>No hay más piezas disponibles en el almacén<br />";
    echo "<br />";
    }
}
if (isset($_POST['quitar_pieza'])){
    if($pieza->devolverPiezaAPiezaXAviso($idAviso)!=NULL){
       echo "<h3>Seleccione pieza:</h3><br />\n";
       echo "<form method='POST' action='ejecutar_eliminar_pieza_aviso.php'>\n";
       echo "<select name='pieza'>";
       foreach($pieza->devolverPiezaAPiezaXAviso($idAviso) as $fila){
        echo "<option value='" . $fila['idPieza'] . "'>" . $fila['idPieza'] . " " . $fila['descripcion'] . " " . $fila['codigo'] . "</option>\n";
       }
       echo "</select>";
       echo "<input type='hidden' name='aviso' value='" . $idAviso . "'>";
       echo "<input type='submit' name='submit' value='Quitar'>";
       echo "</form>";
       echo "<br />";
    } else {
       echo "<h3>No hay piezas que quitar</h3>";
       echo "<br />";
}
} 
if (isset($_POST['empezar_trabajo'])){
    $consulta="UPDATE aviso SET fechaInicio=NOW(), horaInicio=NOW() WHERE idAviso=$idAviso";
    $aviso->realizarconsulta($consulta);
    echo "<div>";
    echo "<h2>Trabajo empezado</h2>";
    echo "<br />";
    echo "</div>";
}
if (isset($_POST['terminar_trabajo'])){
    $consulta="UPDATE aviso SET fechaFin=NOW(), horaFin=NOW() WHERE idAviso=$idAviso";
    $aviso->realizarConsulta($consulta);
    echo "<div>";
    echo "<h2>Trabajo terminado</h2>";
    echo "<br />";
    echo "</div>";
}
if (isset($_POST['facturar_trabajo'])){
    echo "Facturar trabajo";
    echo "<br />";
}
echo "<a href='principal.php'>Volver</a>";
?>
</div>
</body>
</html>