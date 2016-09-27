<?php
 require_once 'init.php';
 include_once 'Atividade.class.php';
 // pega os dados do formulário
 $nomeAtividade = isset($_POST['txtAtividade']) ? $_POST['txtAtividade'] : null;
 $valorAtividade = isset($_POST['txtValorAtividade']) ? $_POST['txtValorAtividade'] : null;
 $bimestreAtividade = isset($_POST['txtBimestreAtividade']) ? $_POST['txtBimestreAtividade'] : null;
 $tipoAtividade = isset($_POST['txtTipoAtividade']) ? $_POST['txtTipoAtividade'] : null;
 $nomeTurma = isset($_POST['txtTurmaAtividade']) ? $_POST['txtTurmaAtividade'] : null;

 // validação simples se campos estão vazios
 
 if (empty($nomeAtividade) || empty($valorAtividade) || empty($bimestreAtividade) || empty($tipoAtividade)){
    echo "Campos devem ser preenchidos!!";
    exit;
 }


    require_once 'init.php';
    // abre a conexão
    $PDO = db_connect();
    // SQL para selecionar os registros
	$sql = "SELECT idTurma, nomeTurma FROM Turma WHERE nomeTurma = :nomeTurma ORDER BY nomeTurma ASC";
    // seleciona os registros
    $stmt = $PDO->prepare($sql);
    $stmt->execute(array(':nomeTurma' => $nomeTurma));

 
    $Turma = $stmt->fetch(PDO::FETCH_ASSOC)
    echo $Turma['idTurma'];

     
 if (empty($idTurmaAtividade)):
    echo "Campos devem ser preenchidos!!";
    exit;
 endif; 

 // instancia objeto aluno
 $Atividade = new Atividade($nomeAtividade, $valorAtividade, $bimestreAtividade, $tipoAtividade, idTurmaAtividade);

 // insere no BD
 $PDO = db_connect();
 $sql = "INSERT INTO Atividade(nomeAtividade, valorAtividade, bimestreAtividade, tipoAtividade, idTurmaAtividade) VALUES (:nomeAtividade, :valorAtividade, :bimestreAtividade, :tipoAtividade, :idTurmaAtividade)";
 $stmt = $PDO->prepare($sql);
 $stmt->bindParam(':nomeAtividade', $Atividade->getNomeAtividade());
 $stmt->bindParam(':valorAtividade', $Atividade->getValorAtividade());
 $stmt->bindParam(':bimestreAtividade', $Atividade->getBimestreAtividade());
 $stmt->bindParam(':tipoAtividade', $Atividade->getTipoAtividade());
 $stmt->bindParam(':idTurmaAtividade', $Atividade->getIdTurmaAtividade());
 if($stmt->execute()){
    header ("Location:atividadeLista.php");
 }else{
    echo "Erro ao cadastrar!!";
    print_r($stmt->errorInfo());
 }
?>