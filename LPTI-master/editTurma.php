<?php
    require_once 'init.php';
    // abre a conexão
    $PDO = db_connect();
    $id = $_GET["id"];
	
	include_once 'Turma.class.php';
   // $dadosOK = true;

       $nomeTurma = isset($_POST['txtNome']) ? $_POST['txtNome'] : null;
       
        $Turma = new Turma($nomeTurma);

        $PDO = db_connect();
        
        $sql ="UPDATE Turma SET nomeTurma = :nomeTurma WHERE idTurma = $id";
        $stmt = $PDO ->prepare($sql);
        $stmt ->bindParam(':nomeTurma', $Turma->getNomeTurma());

        if($stmt->execute()){
            header("Location:turmaRegistro.php");
        }else{
          echo"Erro ao  alterar";
        print_r($stmt ->errorInfo());
        }

       // echo $id;
   // endwhile;

    //header('Location: turmaRegistro.php');

?>
