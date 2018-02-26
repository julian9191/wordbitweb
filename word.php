<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Your Website</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>

<body>
	<div class='container'>
		<div style='text-align: center; color: red;'>
			<div class='jumbotron'>
				<?php
					$idwords = $_GET["idwords"];
					$english = $_GET["english"];
					$pronunciation = $_GET["pronunciation"];
					$spanish = $_GET["spanish"];
					$sentence = $_GET["sentence"];

					echo "<p>$idwords</p>";
					echo "<h2 style='font-size: 3em;'>".$spanish."</h2>
							<input class='btn btn-lg btn-primary' type='button' value='Mostrar' onclick='mostrar()' />
							<div id='english-div'>
							<h1>".$english." (".$pronunciation.")</h1>
							<h2>".$sentence."</h2></div>";
				?>
			</div>
			

			<br>
			<input class='btn btn-lg btn-info' type='button' value='Siguiente' onclick='marcarPalabra(0)' />
			<input class='btn btn-lg btn-warning' type='button' value='Repetir' onclick='marcarPalabra(1)' />
		</div>
		
	</div>
	<script>

		$(document).ready(function(){
		    $("#english-div").hide();
		});
		
		var idWord = <?php echo $idwords; ?>;
		var visible = false;
		
		
		function marcarPalabra(repetir){
			$.get("update.php?idwords="+idWord+"&repeat="+repetir, function(data, status){
				window.close();
			});
		}

		function mostrar(){
			if(visible){
				$("#english-div").hide();
				visible = false;
			}else{
				$("#english-div").show();
				visible = true;
			}
			
		}
		
		
	</script>

</body>

</html>