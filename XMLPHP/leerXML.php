	<?php

		//print_r($_SERVER);
		$userA= $_SERVER['HTTP_USER_AGENT'];
		print("<br><br>Navegador:".$userA);

		if (preg_match("/Firefox/i", $userA)) {
			echo "<br><h3>Te encuentras navegando con Firefox</h3>";
		} else {
			echo "<br><h3>Estas navegando en otro navaegador diferente Firefox.</h3>";
		}

		$arrayEstudiantes = array('Javier','Jean','Ricardo','Juan','Edy','Cecilia','Brigith');
		print("<h1 align='center'>Listado de Estudiantes del 5B DBP</h1>");
		echo('<table align="center" border=1 style="background:yellow">');
		echo '<tr>';   
		echo '<th>Posicion</th>';
		echo '<th>Apellido</th>';
		echo '</tr>'; 

		if (file_exists('Estudiantes.xml')) {
			$xml = simplexml_load_file('Estudiantes.xml');
			print_r($xml);
				
			print("<br><br>Probando con foreach<br>");

			foreach ($xml->estudiante as $key => $estud) {
	            echo "Estudiante: ".$estud->apellido." con cedula :".$estud->cedula ."<br>";    
	        }

		} else {
			exit('No se puede abrir XML');
		}
	  
			//cargar en la tabla
			foreach ($arrayEstudiantes as $key => $value) {
				echo '<tr>';   
				echo "<td> $key </td>";
				echo '<td>'.$value.'</td>';
				echo '</tr>';
			}
			echo '</table>';  
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="estilos.css">
	<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

	<title></title>
</head>
<body>

 <h1>Contenido</h1>

 <form>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>



 <h2>Ahora leyendo SRI Ecuador </h2>
 <?php  

 $url = 'https://celcer.sri.gob.ec/comprobantes-electronicos-ws/RecepcionComprobantesOffline?wsdl';
$client = new SoapClient($url);
$directorio = "C:/Users/Adan Gimenez/Documents/FIRMADOS"; 
$fichero = "0505202001170756230000110010010000000091234567819.xml";
$decodeContent = base64_encode(file_get_contents($directorio."/".$fichero)); 
$xml = '<?xml version="1.0" encoding="UTF-8"?>
            <SOAP-ENV:Envelope xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ns1="http://ec.gob.sri.ws.recepcion">
              <SOAP-ENV:Body>
                <ns1:validarComprobante>
                  <xml>'.$decodeContent.'</xml>
                </ns1:validarComprobante>
              </SOAP-ENV:Body>
        </SOAP-ENV:Envelope>'; 
$parametros = new stdClass();
$parametros->xml = $xml;
$result = $client->validarComprobante($parametros);
print_r($result);

?>
</body>
</html>