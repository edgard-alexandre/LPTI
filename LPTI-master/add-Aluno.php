<?php
 require_once 'init.php';
 include_once 'Aluno.class.php';
 // pega os dados do formulário
 $nomeAluno = isset($_POST['txtNome']) ? $_POST['txtNome'] : null;
 $matricula = isset($_POST['txtMatricula']) ? $_POST['txtMatricula'] : null;
 $frequencia = NULL;
 $idTurmaAluno = isset($_POST['idTurma']) ? $_POST['idTurma'] : null;
 
 // validação simples se campos estão vazios
 
 if (empty($nomeAluno) || empty($matricula) || empty($idTurmaAluno)){
    echo "Campos devem ser preenchidos!!";
    exit;
 }
 
 //FAZER VERIFICACAO 
 
 
 // instancia objeto aluno
 $Aluno = new Aluno($nomeAluno, $matricula, $frequencia, $idTurmaAluno);

 // insere no BD
 $PDO = db_connect();
 $sql = "INSERT INTO Aluno(nomeAluno, matricula, idTurmaAluno) VALUES (:nomeAluno, :matricula, :idTurmaAluno)";
 $stmt = $PDO->prepare($sql);
 $stmt->bindParam(':nomeAluno', $Aluno->getNomeAluno());
 $stmt->bindParam(':matricula', $Aluno->getMatricula());
 //$stmt->bindParam(':frequencia', $Aluno->getFrequencia());
 $stmt->bindParam(':idTurmaAluno', $Aluno->getIdTurmaAluno());
 if($stmt->execute()){
    header ("Location:alunoLista.php?id=$idTurmaAluno");
 }else{
    echo "Erro ao cadastrar!!";
    print_r($stmt->errorInfo());
 }
?>
