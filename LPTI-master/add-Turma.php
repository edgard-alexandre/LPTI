<?php
 require_once 'init.php';
 include_once 'Turma.class.php';
 // pega os dados do formulário
 $nomeTurma = isset($_POST['txtNomeTurma']) ? $_POST['txtNomeTurma'] : null;
 
 // validação simples se campos estão vazios
 
 if (empty($nomeTurma)){
    echo "Campos devem ser preenchidos!!";
    exit;
 }
 
 // instancia objeto aluno
 $Turma = new Turma($nomeTurma);

 // insere no BD
 $PDO = db_connect();
 $sql = "INSERT INTO Turma(nomeTurma) VALUES (:nomeTurma)";
 $stmt = $PDO->prepare($sql);
 $stmt->bindParam(':nomeTurma', $Turma->getNomeTurma());
 if($stmt->execute()){
    header ("Location:turmaRegistro.php");
 }else{
    echo "Erro ao cadastrar!!";
    print_r($stmt->errorInfo());
 }
?>