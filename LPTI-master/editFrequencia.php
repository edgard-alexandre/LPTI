<?php
    require_once 'init.php';
    // abre a conexão
    $PDO = db_connect();
	$aux = $_GET["id"];
	$freq = $_POST["freq"];
	if(count($freq) > 0 ) {
		foreach ($freq as $indice => $valor) {
			$sql = "UPDATE Aluno SET frequencia = :frequencia WHERE idAluno = :idAluno";
			$stmt = $PDO->prepare($sql);
			$stmt->bindParam(':idAluno', $indice);			
			$stmt->bindParam(':frequencia', $valor);
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
			 location.href = "alunoLista.php?id=<?php echo $aux ?>"; 
		</script>
			

	</body>
</html>

