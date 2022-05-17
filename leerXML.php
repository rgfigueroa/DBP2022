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

	
	foreach ($arrayEstudiantes as $key => $value) {
		echo '<tr>';   
	    echo "<td> $key </td>";
	    echo '<td>'.$value.'</td>';
	    echo '</tr>';
	}
	echo '</table>';  

?>