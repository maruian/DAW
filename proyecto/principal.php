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
      <title>Página principal</title>
      <link rel='stylesheet' href='estilos.css'>
   </head>
   <body>
      <div>
         <img src="logo.jpg" width="200" alt="TecniDent"><h1> Tecni Dent ERP</h1>
         <hr />
         <h3> Usuario: <?=$segsesion->getOperario()?></h2>
         <br />
         <br />
         <table>
         <tr>
         <td>
         <h3>AVISOS</h3>
         <br /><br />         
         <a href="crear_aviso.php">Crear aviso</a>
         <br />
         <br />
         <a href="mostrar_avisos.php">Mostrar avisos</a>
         <br />
         <br />
         <a href="ver_aviso.php">Ver aviso</a>
         <br />
         <br />
         <a href="eliminar_aviso.php">Eliminar aviso</a>
         <br />
         <br />
         </td>
         <td>
         <h3>CLIENTES</h3>
         <br /><br />
         <a href="crear_cliente.php">Crear cliente</a>
         <br />
         <br />
         <a href="mostrar_clientes.php">Mostrar clientes</a>
         <br />
         <br />
         <a href="eliminar_cliente.php">Eliminar cliente</a>
         <br />
         <br />
         <a href="asignar_cliente_aviso.php">Asignar cliente a aviso</a>
         <br />
         <br />
         </td>
         </tr>
         <tr>
         <td>
         <h3>ALMACEN</h3>
         <br /><br />        
         <a href="crear_pieza.php">Crear nueva pieza</a>
         <br />
         <br />
         <a href="crear_ubicacion.php">Crear ubicación en el almacén</a>
         <br />
         <br />
         <a href="alta_pieza_almacen.php">Dar de alta pieza en el almacén</a>
         <br />
         <br />
         <a href="baja_pieza_almacen.php">Dar de baja pieza en el almacén</a>
         <br />
         <br />
         <a href="asignar_pieza_aviso.php">Asignar pieza a un aviso</a>
         <br />
         <br />
         <a href="mostrar_piezas_almacen.php">Mostrar piezas en el almacen</a>
         </td>
         <td>
         <h3>OPERARIOS</h3>
         <br />
         <br />
         <a href="asignar_operario_aviso.php">Asignar operario a aviso</a>
         <br />
         <br />
         <a href="registro.php">Crear nuevo operario</a>
         <br />
         <br />
         <a href=""></a>
         <br />
         <br />
         <a href=""></a>
         <br />
         <br />
         <a href=""></a>
         <br />
         <br />
         </td>
         </tr>
         </table>
         <form method="POST" action="desconectar.php">
         <input type="submit" name="desconectar" value="Desconectar">
         </form>
      </div>
   </body>
</html>
