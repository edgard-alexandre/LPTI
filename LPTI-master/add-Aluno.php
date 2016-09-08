<?php
 require_once 'init.php';
 include_once 'Aluno.class.php';
 // pega os dados do formulário
 $nomeAluno = isset($_POST['txtNome']) ? $_POST['txtNome'] : null;
 $matricula = isset($_POST['txtMatricula']) ? $_POST['txtMatricula'] : null;
 $frequencia = isset($_POST['txtFrequencia']) ? $_POST['txtFrequencia'] : null;
 
 // validação simples se campos estão vazios
 
 if (empty($nomeAluno) || empty($matricula) || empty($frequencia)){
    echo "Campos devem ser preenchidos!!";
    exit;
 }
 
 //FAZER VERIFICACAO 
 
 
 // instancia objeto aluno
 $Aluno = new Aluno($nomeAluno, $matricula, $frequencia);

 // insere no BD
 $PDO = db_connect();
 $sql = "INSERT INTO Aluno(nomeAluno, matricula, frequencia) VALUES (:nomeAluno, :matricula, :frequencia)";
 $stmt = $PDO->prepare($sql);
 $stmt->bindParam(':nomeAluno', $Aluno->getNomeAluno());
 $stmt->bindParam(':matricula', $Aluno->getMatricula());
 $stmt->bindParam(':frequencia', $Aluno->getFrequencia());
 if($stmt->execute()){
    header ("Location:index.html");
 }else{
    echo "Erro ao cadastrar!!";
    print_r($stmt->errorInfo());
 }
?>
