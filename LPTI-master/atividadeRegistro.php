<?php
    require_once 'init.php';
    // abre a conexão
    $PDO = db_connect();
	$id = $_GET["id"];
    // SQL para selecionar os registros
	$sql = "SELECT idAtividade, nomeAtividade, valorAtividade, bimestreAtividade, tipoAtividade, idTurmaAtividade FROM Atividade WHERE idAtividade = :idAtividade ORDER BY bimestreAtividade ASC";
    $sql2 = "SELECT idAluno, nomeAluno, matricula, frequencia, idTurmaAluno FROM Aluno WHERE idTurmaAluno = :idTurmaAluno ORDER BY nomeAluno ASC";
    $sql3 = "SELECT idNota, idAtividade, idAluno, valorNota FROM Nota WHERE idAtividade = :idAtividadeNota";
    $sql4 = "SELECT idTurma, nomeTurma FROM Turma WHERE idTurma = :idTurma";
    // seleciona os registros
    $stmt = $PDO->prepare($sql);
	$stmt2 = $PDO->prepare($sql2);
    $stmt3 = $PDO->prepare($sql3);
    $stmt4 = $PDO->prepare($sql4);
    $stmt->execute(array(':idAtividade' => $id));
?>

<!DOCTYPE HTML>
<html>
<head>
		<title>Imperium</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/mainScreen.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
        <link rel="stylesheet" href="assets/css/style.css" />
	</head>
<body>
<!-- Content -->
<div id="content">
    <div class="inner">

        <!-- Post -->
        <article class="box post post-excerpt">
                <!--
                    Note: Titles and subtitles will wrap automatically when necessary, so don't worry
                    if they get too long. You can also remove the <p> entirely if you don't
                    need a subtitle.
                -->
        <?php $Atividade = $stmt->fetch(PDO::FETCH_ASSOC)?>
		<a href = "atividadeLista.php"><img src = "images/setaVoltar.png"></a><br>
            <?php $stmt4->execute(array(':idTurma' => $Atividade['idTurmaAtividade'])); ?>
            <?php $Turma = $stmt4->fetch(PDO::FETCH_ASSOC)?>
            
            <h2><p><?php echo $Atividade['nomeAtividade']?></p></h2>
            <h3><p><?php echo $Turma['nomeTurma']?></p></h3>
            <h3><p>VALOR: <?php echo $Atividade['valorAtividade']?></p></h3> 
            
            <?php
            $turmaAtividade = $Atividade['idTurmaAtividade'];
        
            $stmt2->execute(array(':idTurmaAluno' => $turmaAtividade));
            $stmt3->execute(array(':idAtividadeNota' => $Atividade['idAtividade']));
        ?>
        
			<table>
				<tr id = "bim">
					<td><h5>ALUNO</h5></td>
					<td><h5>MATRICULA</h5></td>
                    <td><h5>NOTA</h5></td>
				</tr>
				 <?php while($Aluno = $stmt2->fetch(PDO::FETCH_ASSOC)): ?>
                        <tr>
                            <td><?php echo $Aluno['nomeAluno'] ?></td>
                            <td><?php echo $Aluno['matricula'] ?></td>
                           <?php while($Nota = $stmt3->fetch(PDO::FETCH_ASSOC)): ?>
                                <?php if($Nota['idAluno'] == $Aluno['idAluno']): ?>
                                    <td><?php echo $Nota['valorNota'] ?></td> 
                                <?php endif; ?>
                            <?php endwhile; ?>
                        </tr>  
                    <?php $stmt3 = $PDO->prepare($sql3); ?>
                    <?php $stmt3->execute(array(':idAtividadeNota' => $Atividade['idAtividade'])); ?>
                <?php endwhile; ?>
        </table>
        </article>
    
		<!--EXCLUIR Aluno-->
        <a onClick = "if(confirm('Tem certeza que deseja excluir permanentemente este aluno?')) location.href = '#';"><img src = "images/pbi_deleteicon.png"></a>
        <a href='#'>Editar</a>
    </div>
</div>

		<!-- Sidebar -->
			<div id="sidebar">

				<!-- Logo -->
					<h1 id="logo"><a href="#">Imperium</a></h1>


				<!-- Nav -->
					<nav id="nav">
						<ul>
							<li><a href="indexMain.html">Principal</a></li>
							<li><a href="turmaRegistro.php">Registro de Alunos</a></li>
							<li><a href="calendario.html">Agenda</a></li>
							<li class="current"><a href="atividadeLista.php">Atividades</a></li>
						</ul>
					</nav>
				<!-- Calendar -->
					<section class="box calendar">
						<div class="inner">
							<table>
								<caption>Março 2016</caption>
								<thead>
									<tr>
										<th scope="col" title="Monday">M</th>
										<th scope="col" title="Tuesday">T</th>
										<th scope="col" title="Wednesday">W</th>
										<th scope="col" title="Thursday">T</th>
										<th scope="col" title="Friday">F</th>
										<th scope="col" title="Saturday">S</th>
										<th scope="col" title="Sunday">S</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td colspan="4" class="pad"><span>&nbsp;</span></td>
										<td><span>1</span></td>
										<td><span>2</span></td>
										<td><span>3</span></td>
									</tr>
									<tr>
										<td><span>4</span></td>
										<td><span>5</span></td>
										<td><a href="#">6</a></td>
										<td><span>7</span></td>
										<td><span>8</span></td>
										<td><span>9</span></td>
										<td><a href="#">10</a></td>
									</tr>
									<tr>
										<td><span>11</span></td>
										<td><span>12</span></td>
										<td><span>13</span></td>
										<td class="today"><a href="#">14</a></td>
										<td><span>15</span></td>
										<td><span>16</span></td>
										<td><span>17</span></td>
									</tr>
									<tr>
										<td><span>18</span></td>
										<td><span>19</span></td>
										<td><span>20</span></td>
										<td><span>21</span></td>
										<td><span>22</span></td>
										<td><a href="#">23</a></td>
										<td><span>24</span></td>
									</tr>
									<tr>
										<td><a href="#">25</a></td>
										<td><span>26</span></td>
										<td><span>27</span></td>
										<td><span>28</span></td>
										<td class="pad" colspan="3"><span>&nbsp;</span></td>
									</tr>
								</tbody>
							</table>
						</div>
					</section>

				<!-- Copyright -->
					<ul id="copyright">
						<li>&copy; CEFET-MG Unidade Varginha.</li><li>Design: Edgard Alexandre, Larissa Rodrigues, Pedro Barbosa, Willian Alves</a></li>
					</ul>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/utilScreen.js"></script>
			<script src="assets/js/mainScreen.js"></script>

	</body>
</html>
