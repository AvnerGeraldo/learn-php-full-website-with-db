<?php

	if( !isset($_SESSION) ){
		session_start();		
	}

	if( !isset($_SESSION['redirecionaPagina']) ){
		$_SESSION['redirecionaPagina'] = "index";
	}

	$arrayURL 		= explode("/", $_SERVER['PHP_SELF']);
	$paginaAtual	= $arrayURL[count($arrayURL) - 1];

	if( $paginaAtual != ($_SESSION[redirecionaPagina].".php") ){
		header("location:error-page.html");
		exit;
	}	

?>
<!DOCTYPE html>
<html lang="pt">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="web-files/lib/bootstrap/dist/css/bootstrap.min.css" media="all">
		<link rel="stylesheet" href="web-files/css/themes/bootstrap.min.css" media="all">
		<link rel="stylesheet" href="web-files/css/styleWebsite.css" media="all">
		<script type="text/javascript" src="web-files/js/jquery.min.js"></script>
		<script type="text/javascript" src="web-files/lib/bootstrap/dist/js/bootstrap.min.js"></script>		
	</head>
	<body>	
		<div class="container-fluid">
			<nav class="navbar navbar-inverse">
			  <div class="container-fluid">
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
					<span class="sr-only"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
				  <a class="navbar-brand" href="page.php?page=index">Logo</a>
				</div>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
				  <ul class="nav navbar-nav">
					<li <?=($paginaAtual == 'index.php' ? "class='active'" : '')?>><a href="page.php?page=index">Home </a></li>
					<li <?=($paginaAtual == 'empresa.php' ? "class='active'" : '')?>><a href="page.php?page=empresa">Empresa</a></li>
					<li <?=($paginaAtual == 'produtos.php' ? "class='active'" : '')?>><a href="page.php?page=produtos">Produtos</a></li>
					<li <?=($paginaAtual == 'servicos.php' ? "class='active'" : '')?>><a href="page.php?page=servicos">Serviços</a></li>
					<li <?=($paginaAtual == 'contato.php' ? "class='active'" : '')?>><a href="page.php?page=contato">Contato</a></li>					
				  </ul>				  
				</div>
			  </div>
			</nav>

