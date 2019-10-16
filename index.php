<?php

require_once("conexion.php");

// Some Query
$sql 	= 'SELECT * FROM words order by idwords;';
$query 	= mysqli_query($con, $sql);
$palabras = [];
$i=0;

if (!$query) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
}

while ($row = mysqli_fetch_array($query))
{
	$palabras[$i]['idwords'] = $row['idwords'];
	$palabras[$i]['english'] = $row['english'];
	$palabras[$i]['pronunciation'] = $row['pronunciation'];
	$palabras[$i]['sentence'] = $row['sentence'];
	$palabras[$i]['spanish'] = $row['spanish'];
	$palabras[$i]['used'] = $row['used'];
	$palabras[$i]['group_id'] = $row['group_id'];
	$palabras[$i]['created'] = $row['created'];
	$palabras[$i]['modified'] = $row['modified'];
	$palabras[$i]['isrepeat'] = $row['isrepeat'];
	
	$i++;
}

//echo json_encode($palabras);
?>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>WordbitWeb</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<style>
		.resaltar{
			background-color: yellow !important; 
		}
	</style>

</head>

<body>
	<div class='container'>

		<h1 style='text-align: center'>WordbitWeb</h1>

		<table class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>English</th>
                <th>Pronunciation</th>
                <th>Sentence</th>
                <th>Spanish</th>
              </tr>
            </thead>
            <tbody>
            	<?php
            		foreach ($palabras as &$palabra) {
            			echo "<tr id='tr_".$palabra["idwords"]."' class='fila'>
            					<td>".$palabra["idwords"]."</td>
            					<td>".$palabra["english"]."</td>
            					<td>".$palabra["pronunciation"]."</td>
            					<td>".$palabra["sentence"]."</td>
            					<td>".$palabra["spanish"]."</td>
            				</tr>";
            		}

            	?>
            </tbody>
          </table>
	</div>
	<script>
		
		var palabra = [];
		var palabraAnterior = {"idwords": "-1"};
		
		
		$(document).ready(function() {
			var minutos = parseInt(prompt("Por favor seleccione el intervalo en minutos"));
			mostrar(minutos*60000);
		});
		
		function mostrar(milisegundos){
			mostrarPalabra();
			setInterval(function(){ 
				mostrarPalabra();
				 
			}, milisegundos);
			
		}
		
		function mostrarPalabra(){
			$.get("data.php", function(data, status){
				var palabra = JSON.parse(data);
				console.log(palabraAnterior["idwords"]+", "+palabra["idwords"]);
				if(palabraAnterior["idwords"] != palabra["idwords"] || palabra["isrepeat"]==1){
					
					var texto = palabra['english']+" ("+palabra['pronunciation']+"): "+palabra['spanish'];
					$("#tr_"+palabraAnterior['idwords']).removeClass( "resaltar" );
					$("#tr_"+palabra['idwords']).addClass( "resaltar" );
					palabraAnterior = palabra;

					var myWindow = window.open("word.php?idwords="+palabra['idwords']+"&english="+palabra['english']+"&pronunciation="+palabra['pronunciation']+"&spanish="+palabra['spanish']+"&sentence="+palabra['sentence'], "", "width=1000, height=600");   // Opens a new window
					myWindow.focus(); 
				}
				
			});
		}
		
	</script>

</body>

</html>

<?php

// Close connection
mysqli_close ($con);

?>