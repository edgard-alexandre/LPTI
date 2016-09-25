<?php
    require_once 'init.php';
    //abre a conexão
    $PDO = db_connect();
    //SQL para selecionar os registros
    $sql = "SELECT senha FROM Senha";
    // seleciona os registros
    $stmt = $PDO->prepare($sql);
    $stmt->execute();
?>   
<!DOCTYPE HTML>
<html>
	<head>
		<title>Imperium</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<script type = "text/javascript" src = "assets/js/jquery.min.js"></script>
	</head>
	<body class="landing">

		<!-- Page Wrapper -->
			<div id="page-wrapper">

				<!-- Header -->
					<header id="header" class="alt">
						<h1><a href="index.html">Imperium</a></h1>
					</header>

				<!-- Banner -->
					<section id="banner">
						<div class="inner">
							<h2>Imperium</h2>
							<p>Gerenciador pessoal de registros acadêmicos</p>
							<form action="" id="senha">
								<input type="button" value="Login" class="button special" id="botaoLogin"><br><br>
								<p id="nSenha">Senha</p>
								<input type="password" id="senha1"><br>
								<p id="error1">Senha Incorreta</p>
								<input type="button" value="Entrar" class="button special" id="botaoEntrar"><br><br>
							</form>
							<script language="Javascript">
							    $(document).ready(function(){
							        $("#senha1").fadeOut(0);
							        $("#nSenha").fadeOut(0);
							        $("#botaoEntrar").fadeOut(0);
							        $("#error1").fadeOut(0);
							    });	
							    $("#botaoLogin").click(function(){
									$("#senha1").fadeIn(0);	
									$("#nSenha").fadeIn(0);	
									$("#botaoEntrar").fadeIn(2500);
									$("#botaoLogin").fadeOut(2500);
									$("#botaoEntrar").click(function(){
							    	var b = document.querySelector("#senha1").value;
							    	});									
								});	
								</script>
								 <?php while($Senha = $stmt->fetch(PDO::FETCH_ASSOC)):						
							    	if($b != $Senha['senha']){
										$aux = TRUE;
							    	}else{
							    		$aux = FALSE;
							    }	
							     endwhile; ?>
							   <script language="Javascript">
										$(document).ready(function(){							   		
							   			if(aux == TRUE){
												$("#error1").fadeOut(0);							   		
							   			}else {
							   				$("error1").fadeOut(0);
							   				location.href="/index.html"; 
							   			}
							   		});
							   </script>  					
		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/utilScreen.js"></script>
			<script src="assets/js/mainScreen.js"></script>

	</body>
</html>
