<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title>Pagina de entrada</title>
      <link rel="stylesheet" href="estilos.css">
   </head>
   <body>
      <div>
	 <img src="logo.jpg" width="200" >
	 <h3>Proyecto Mini-ERP</h3>
         <hr />
         <h2>Login</h2>
         <form method="POST" action="seguridad.php">

            <label for="dni">Operario:</label>
            <input type="text" id="dni" name="operario" placeholder="Operario..">

            <label for="pass0">Contraseña:</label>
            <input type="password" id="pass0" name="pass0" placeholder="Contraseña..">

            <input type="hidden" name="accion" value="login">

            <input type="submit" value="Login">
         </form>
      </div>
    </body>
</html>

        
