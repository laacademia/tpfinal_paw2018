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
				<li><a href="./?c=home&a=inicio">Inicio</a></li>				
				<li><a href="./?c=disciplinas&a=inicio">Disciplinas</a></li>
				<li><a href="./?c=talleres&a=inicio">Talleres</a></li>
				<li><a href="./?c=muestras&a=inicio">Muestras</a></li>				
				<li><a href="./?c=quienesSomos&a=inicio">¿Quienes somos?</a></li>	
                                <li><a href="./?c=ubicacion&a=inicio">Nuestra Ubicacion</a></li>
				<li><a href="./?c=mensaje&a=inicio">Contacto</a></li>				
			</ul>
		</nav>
	</header>
	<section class="errores"><?php core\Notification::instancia()->print(); ?></section>
	<section id="main-container">		
		<div class="bar-container title-content"><?=$title?></div>		
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

