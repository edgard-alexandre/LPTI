<?php
    require_once 'init.php';
    // abre a conexão
    $PDO = db_connect();
	$aux = $_GET["id"];
	$nota = $_POST["nota"];
	if(count($nota) > 0 ) {
		foreach ($nota as $indice => $valor) {
			$sql = "UPDATE Nota SET valorNota = :valorNota WHERE idNota = :idNota";
			$stmt = $PDO->prepare($sql);
			$stmt->bindParam(':idNota', $indice);			
			$stmt->bindParam(':valorNota', $valor);
			$stmt->execute();
		}
	}
?>

<!DOCTYPE HTML>
<html lang = "pt-br">
    <head>
        <meta charset = "utf-8">
    </head>    
	<body>
		<script>
			 alert("Alterações realizadas com sucesso!");
			 location.href = "alunoRegistro.php?id=<?php echo $aux ?>"; 
		</script>
			

	</body>
</html>

