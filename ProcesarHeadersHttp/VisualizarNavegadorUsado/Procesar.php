<?php
    print_r($_REQUEST);
    print "<p>Su nombre es $_REQUEST[Usuario]</p>\n";
    print("<br>La contraseña ingresada es ". $_REQUEST['Clave']);
    print("<h1>La Edad es ". $_REQUEST['Edad']);
    print("</h1>");
    print("<br><br>FIN DEL EJERCICIO");
    print("<br>
      <h3>Se Imprime los HEADERS:</h3>
    </br><br>");
        var_dump($_SERVER);
        print("<br><h3>Se usa la funcion GETALLHEADERS:</h3><br>")
?>
<?php
foreach (getallheaders() as $name => $value) {
echo "$name: $value <br>";
}
?>
  <h3>Demostrando Header HTTP con LENGUAJE PHP</h3>
  <?php
  $header = apache_response_headers();
  foreach ($header as $headers => $value) {
  echo "$headers: $value <br />\n";
  }
  ?>
  <hr>
    <h1>TRABAJO EN CLASE: HEADERS</h1>
      <hr>
<?php 
    echo "<b> Tu dirección IP es:</b> {$_SERVER['REMOTE_ADDR']}<br>";
    echo "<b>El servidor es:</b> {$_SERVER['SERVER_NAME']}<br>"; 
    echo "<b>Vienes de la página:</b> {$_SERVER['HTTP_REFERER']}<br>"; 
    echo "<b>Te has conectado usando el puerto:</b> {$_SERVER['REMOTE_PORT']}<br>"; 
    echo "<b>El agente de usuario es:</b>{$_SERVER['HTTP_USER_AGENT']}";
?>
 <hr>
<?php
$useragent = $_SERVER['HTTP_USER_AGENT'];
$otros = '';
if (preg_match("/Edg/i", $useragent)){
    echo "Estás navegando desde <b>EDGE</b>";
  }elseif (preg_match("/KHTML like Gecko/i", $useragent) || preg_match("/Safari/i", $useragent)){
    echo "Estás navegando desde <b>CHROME</b>";
	}else if (preg_match("/20100101/i", $useragent)) {
    echo "Estás navegando desde <b>FIREFOX</b>";
  }elseif (preg_match("/OPR/i", $useragent)) {
    echo "Estás navegando desde <b>OPERA</b>";
  }elseif (preg_match("/Mobile/i", $useragent)) {
    echo "Estás navegando desde <b>SAFAR</b>I";
  }else {
    echo "Estás navegando desde <b>OTRO NAVEGADOR</b>";
  }
?>
  <hr>
  <h3>TABLA COMPLETA DE LOS HEADERS</h3>
<?php
    echo '<table border="1">';
    foreach($_SERVER as $k => $v) {
        echo '<tr><td>'.$k.'</td><td>'.$v.'</td></tr>';
    }
    echo '</table>';
?>