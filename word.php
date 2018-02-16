<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Your Website</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>
	<section>
		<div style='text-align: center; color: red;'>
			<?php
				$idwords = $_GET["idwords"];
				$english = $_GET["english"];
				$pronunciation = $_GET["pronunciation"];
				$spanish = $_GET["spanish"];
				$sentence = $_GET["sentence"];

				$texto = $english." (".$pronunciation."): ".$spanish;
				echo "<h1 style='font-size: 3em;'>".$texto."</h1><h2>".$sentence."</h2>";
			?>

			<br><br><br>
			<input type='button' value='Siguiente' onclick='marcarPalabra(0)' />
			<input type='button' value='Repetir' onclick='marcarPalabra(1)' />
		</div>
		
	</section>
	<script>
		
		var idWord = <?php echo $idwords; ?>;
		
		
		function marcarPalabra(repetir){
			$.get("update.php?idwords="+idWord+"&repeat="+repetir, function(data, status){
				window.close();
			});
		}
		
		
	</script>

</body>

</html>