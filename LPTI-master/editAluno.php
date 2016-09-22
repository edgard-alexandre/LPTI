<?php
    require_once 'init.php';
    // abre a conexão
    $PDO = db_connect();
    // SQL para selecionar os registros
    $sql = "SELECT idAluno, nomeAluno, matricula, frequencia, idTurmaAluno FROM Aluno WHERE idTurmaAluno = :idTurma ORDER BY nomeAluno ASC";
    // seleciona os registros
    $stmt = $PDO->prepare($sql);
    $stmt->execute(array(':idTurma' => $aux));
?> 

<?php
	require_once 'init.php';
	include_once 'Aluno.class.php';
$dadosOK = true;
//Pega id da URL
$id = isset($_GET['id'])?$_GET['id']:null;

while($Aluno = $stmt->fetch(PDO::FETCH_ASSOC)):
//pega os dados do formulário
$idAluno = $Aluno['idAluno']
$frequencia = isset($_POST['frequencia[$idAluno]']) ? $_POST['frequencia[$idAluno]'] : null;
$idTurmaAluno = $Aluno['idTurmaAluno'];
	
//validação email
//if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
  // echo "Email Invalido";
//}
//instancia objeto  clientes
$Aluno = new Aluno($idTurmaAluno ,$frequencia);
//atualiza o BD
$PDO = db_connect();
$sql ="UPDATE  Aluno  SET frequencia = :frequencia WHERE  idTurmaAluno = :id";
$stmt = $PDO ->prepare($sql);
$stmt ->bindParam(':frequencia', $Aluno->getFrequencia());
$stmt ->bindParam(':id', $id , PDO:: PARAM_INT);
endwhile; 
if($stmt->execute())
{
header('Location: turmaRegistro.php');
}
else
{
echo"Erro ao  alterar";
print_r($stmt ->errorInfo());
}
?>
