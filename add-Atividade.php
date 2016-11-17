 <?php
 require_once 'init.php';
 include_once 'Atividade.class.php';
 
 
 $nomeAtividade = isset($_POST['txtAtividade']) ? $_POST['txtAtividade'] : null;
 $valorAtividade = isset($_POST['txtValorAtividade']) ? $_POST['txtValorAtividade'] : null;
 $bimestreAtividade = isset($_POST['txtBimestreAtividade']) ? $_POST['txtBimestreAtividade'] : null;
 $tipoAtividade = isset($_POST['txtTipoAtividade']) ? $_POST['txtTipoAtividade'] : null;
 $nomeTurma = isset($_POST['txtTurmaAtividade']) ? $_POST['txtTurmaAtividade'] : null;
 
 
  // validação simples se campos estão vazios
 
 if (empty($nomeAtividade) || empty($valorAtividade) || empty($bimestreAtividade) || empty($tipoAtividade) || empty($nomeTurma)){
    echo "Campos devem ser preenchidos!!";
    exit;
 }
 
 //conexao banco de dados para pegar o id turma
 
   require_once 'init.php';
   $PDO = db_connect();
   // SQL para selecionar os registros
   $sql = "SELECT idTurma, nomeTurma FROM Turma WHERE nomeTurma = :nomeTurma ORDER BY nomeTurma ASC";
   // seleciona os registros
   $stmt = $PDO->prepare($sql);
   $stmt->execute(array(':nomeTurma' => $nomeTurma)); 
   
   $ayuda = $stmt->fetch(PDO::FETCH_ASSOC);
   $idTurmaAtividade = $ayuda['nomeTurma'];
 
  // instancia objeto atividade
  
 $Atividade = new Atividade($nomeAtividade, $valorAtividade, $bimestreAtividade, $tipoAtividade, $idTurmaAtividade);
 
 // insere no BD
 $PDO1 = db_connect();
 $sql1 = "INSERT INTO Atividade(nomeAtividade, valorAtividade, bimestreAtividade, tipoAtividade, idTurmaAtividade) VALUES (:nomeAtividade, :valorAtividade, :bimestreAtividade, :tipoAtividade, :idTurmaAtividade)";
 $stmt1 = $PDO1->prepare($sql1);
 $stmt1->bindParam(':nomeAtividade', $Atividade->getNomeAtividade());
 $stmt1->bindParam(':valorAtividade', $Atividade->getValorAtividade());
 $stmt1->bindParam(':bimestreAtividade', $Atividade->getBimestreAtividade());
 $stmt1->bindParam(':tipoAtividade', $Atividade->getTipoAtividade());
 $stmt1->bindParam(':idTurmaAtividade', $Atividade->getIdTurmaAtividade());
 if($stmt1->execute()){
    header ("Location:alunoLista.php?id=$idTurmaAluno");
 }else{
    echo "Erro ao cadastrar!!";
    print_r($stmt1->errorInfo());
 }
 
 ?>
