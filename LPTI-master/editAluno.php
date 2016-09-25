<?php
    require_once 'init.php';
    // abre a conexão
    $PDO = db_connect();
	$aux = $_GET["id"];
    // SQL para selecionar os registros
    $sql = "SELECT idAluno, nomeAluno, matricula, frequencia, idTurmaAluno FROM Aluno WHERE idTurmaAluno = :idTurma ORDER BY nomeAluno ASC";
    // seleciona os registros
    $stmt = $PDO->prepare($sql);
    $stmt->execute(array(':idTurma' => $aux));
	
	include_once 'Aluno.class.php';
    $dadosOK = true;

    while($Aluno = $stmt->fetch(PDO::FETCH_ASSOC)):
        $id = $Aluno['idAluno'];
        $nomeAluno = $Aluno['nomeAluno'];
        $matricula = $Aluno['matricula'];
        $frequencia = isset($_POST['$id']) ? $_POST['$id'] : null;
        $idTurmaAluno = $Aluno['idTurmaAluno'];

        $Alunos = new Aluno($nomeAluno ,$matricula ,$frequencia, $idTurmaAluno);

        $PDO = db_connect();
        
        $sql ="UPDATE Aluno SET nomeAluno = :nomeAluno, matricula = :matricula, frequencia = :frequencia, idTurmaAluno = :idTurmaAluno WHERE idTurmaAluno = $aux && idAluno = $id";
        $stmt = $PDO ->prepare($sql);
        $stmt ->bindParam(':nomeAluno', $Alunos->getNomeAluno());
        $stmt ->bindParam(':matricula', $Alunos->getMatricula());
        $stmt ->bindParam(':frequencia', $Alunos->getFrequencia());
        $stmt ->bindParam(':idTurmaAluno', $Alunos->getIdTurmaAluno());

        $stmt->execute();
           // header('Location: turmaRegistro.php');
       // }else{
        //    echo"Erro ao  alterar";
           // print_r($stmt ->errorInfo());
       // }

        echo $id;
    endwhile;

    //header('Location: turmaRegistro.php');

?>