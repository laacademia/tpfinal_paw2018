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
	</header>
	<section class="errores"><?php core\Notification::instancia()->print(); ?></section>
	<section id="main-container">
		<div id="imagen-loader" style="display: none">CARGANDO........</div>		
		<div id="title-view-container" class="bar-container title-content"><?=$title?></div>		
		<div class="view-container"><?=$content?></div>					
	</section>
	<footer class="footer-site">
            <article class="art-footer">
                <figure class="txt-footer">
                    <p id="p-footer">Derechos Reservados - 2018 - Argentina </p>
                </figure>
                <article class="art-footer-ico">
                    <figure class="fig-footer">
                        <a title="Facebook" href="https:/www.facebook.com" alt="Facebook"> <img class="img-footer" src= "./img/footer/facebook.png" > </a>
                    </figure>
                    <figure  class="fig-footer">
                        <a title="Twitter" href="https:/www.twitter.com" alt="Twitter"> <img class="img-footer" src= "./img/footer/twitter.png" > </a>
                    </figure>
                    <figure  class="fig-footer">
                        <a title="Instagram" href="https:/www.instragram.com" alt="Instagram"> <img class="img-footer" src= "./img/footer/instagram.png" > </a>
                    </figure>
                    <figure  class="fig-footer">
                        <a title="Youtube" href="https:/www.youtube.com" alt="Youtube"> <img class="img-footer" src= "./img/footer/youtube.png" > </a>
                    </figure>
                    <figure  class="fig-footer">
                        <img class="qr-footer" src= "./img/footer/qr.png" alt="">
                    </figure>
                </article>
            </article>
        </footer>
</body>
</html>

