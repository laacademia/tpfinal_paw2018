<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="./css/main.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript" src="./js/jquery-3.3.1.min.js"></script>
	<title>TP FINAL</title>
</head>
<body>
	<header class="bar-container">
		<span class="button-main-menu">||||</span>		
		<nav id="main-menu">			
			<ul>
				<?php include('menu.php'); ?>
			</ul>
		</nav>
		<div class="cerrar-sesion-container"><a href="./?c=login&a=logout"><?php echo $_SESSION['username']; ?><img src="./img/botones/logout.jpeg" width="40px"></a></div>
	</header>
	<section class="errores"><?php core\Notification::instancia()->imprimir(); ?></section>
	<section id="main-container">		
		<div class="bar-container title-content"><?=$title?></div>		
		<div class="view-container"><?=$content?></div>					
	</section>
	<footer></footer>
</body>
</html>


