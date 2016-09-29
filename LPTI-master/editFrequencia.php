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
<html>
	<body>
		<script>
			 alert("frequencia alterada com sucesso!");
			 location.href = "alunoLista.php?id=<?php echo $aux ?>"; 
		</script>
			

	</body>
</html>

