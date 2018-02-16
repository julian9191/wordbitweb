<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Your Website</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>
	<section>
		
		<div id="boton"></div>
		
	</section>
	<script>
		
		var palabra = [];
		var palabraAnterior = {"idwords": "-1"};
		
		
		$(document).ready(function() {
			var minutos = parseInt(prompt("Por favor seleccione el intervalo en minutos"));
			mostrar(minutos*1000);
		});
		
		function mostrar(milisegundos){
			//alert("111");
			$("#boton").html("");
			
			setInterval(function(){ 
			//alert("222");
				
				$.get("data.php", function(data, status){
					var palabra = JSON.parse(data);
					console.log(palabraAnterior["idwords"]+", "+palabra["idwords"]);
					if(palabraAnterior["idwords"] != palabra["idwords"] || palabra["isrepeat"]==1){
						
						palabraAnterior = palabra;
						
						var texto = palabra['english']+" ("+palabra['pronunciation']+"): "+palabra['spanish'];
				
						
						var myWindow = window.open("word.php?idwords="+palabra['idwords']+"&english="+palabra['english']+"&pronunciation="+palabra['pronunciation']+"&spanish="+palabra['spanish']+"&sentence="+palabra['sentence'], "", "width=1000, height=500");   // Opens a new window
						myWindow.focus(); 
					}
					
				});
				

				
				 
			}, milisegundos);
			
		}
		
	</script>

</body>

</html>