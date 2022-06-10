<?php
    print ("Esto es un lenguaje de PHP")
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>MI PAGINA EN PHP</title>
</head>
<body>
    <form action="Procesar.php" method="get">
        <input type="text" name="Usuario" placeholder="Ingese el Usuario">
        <input type="text" name="Clave" placeholder="Ingresar la Clave">
        <input type="text" name="Edad" placeholder="Ingresar la Edad">
        <input type="submit" name="Enviar" value="Guardar">
    </form>
    Mi primer ejemplo de PHP
</body>
</html>
<?php
  setcookie("CookieDBP","camofur@gmail.com",time()+2);
      if (count($_COOKIE)>0) {
        print("Voy alamcenar Cookies");
    } else {
        print("No puedo alamcenar Cookies");
      }
?>