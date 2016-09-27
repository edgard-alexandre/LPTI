<?php
    require_once 'init.php';
    // abre a conexão
    $PDO = db_connect();
    $id = $_GET["id"];
    // SQL para selecionar os registros
    $sql = "SELECT idAluno, nomeAluno, matricula, frequencia, idTurmaAluno FROM Aluno WHERE idAluno = :idAluno ORDER BY nomeAluno ASC";
    // seleciona os registros
    $stmt = $PDO->prepare($sql);
    //$stmt->execute(array(':idTurmaAluno' => $aux2));
   // $stmt->execute(array(':idTurma' => $aux));
    $stmt->execute(array(':idAluno' => $id));
    $Aluno = $stmt->fetch(PDO::FETCH_ASSOC);
    $aux = $Aluno['idTurmaAluno'];
    
	
	include_once 'Aluno.class.php';
   // $dadosOK = true;

       $nomeAluno = isset($_POST['txtNome']) ? $_POST['txtNome'] : null;
       $matricula = isset($_POST['txtMatricula']) ? $_POST['txtMatricula'] : null;
       $frequencia = isset($_POST['txtFrequencia']) ? $_POST['txtFrequencia'] : null;
       $idTurmaAluno = NULL;
       
        $Alunos = new Aluno($nomeAluno ,$matricula ,$frequencia, $idTurmaAluno);

        $PDO = db_connect();
        
        $sql ="UPDATE Aluno SET nomeAluno = :nomeAluno, matricula = :matricula, frequencia = :frequencia WHERE idAluno = $id";
        $stmt = $PDO ->prepare($sql);
        $stmt ->bindParam(':nomeAluno', $Alunos->getNomeAluno());
        $stmt ->bindParam(':matricula', $Alunos->getMatricula());
        $stmt ->bindParam(':frequencia', $Alunos->getFrequencia());

        if($stmt->execute()){
            header("Location: alunoLista.php?id=$aux");
        }else{
          echo"Erro ao  alterar";
        print_r($stmt ->errorInfo());
        }

       // echo $id;
   // endwhile;

    //header('Location: turmaRegistro.php');

?>
