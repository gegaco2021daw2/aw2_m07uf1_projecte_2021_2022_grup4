<?php
    session_start();
    echo "Nombre de usuario: " . $_SESSION["usuario"];
?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <FONT FACE="">
        
        <TITLE>Projecte M07 - UF1</TITLE>
</head>
	<body>
		<div class="back"></div>
		<nav>
			<a href="interficiecap.php" class="menu">Pagina Principal</a>
            <a href="llibrescap.php" class="menu">Llibres</a>
            <a href="usuariscap.php" class="menu">Usuaris</a>
			<a href="bibliotecariscap.php" class="menu">Treballadors</a>
        </nav>
        <div class="titolp">
			<h1 id="black">LLIBRES ADMINISTRADOR</h1>
		</div>
		<div class="indexdivproductest">
            <div class="productes"></div>
            <div class="productes_1"><a href="llibrescapmostrar.php" class="h4"><h4>MOSTRAR LLIBRES</h4><a></div>
        </div>
        <div class="indexdivproductest">
            <div class="productes1"></div>
            <div class="productes2"></div>
            <div class="productes1_1"><a href="llibrescapborrar.php" class="h4"><h4>BORRAR LLIBRES</h4><a></div>
            <div class="productes1_2"><a href="llibrescapafegir.php" class="h4"><h4>AFEGIR LLIBRES</h4><a></div>
        </div>
		<div class="indexdivproductest">
            <div class="productes"></div>
            <div class="productes_1"><a href="llibrescapeditar.php" class="h4"><h4>EDITAR LLIBRES</h4><a></div>
        </div>
        <div class="usuaricuadre">
		<form action="http://localhost/Projecte/logoutcap.php" method="POST">
			<p class="pinicisessio1"><?php
			if (!isset($_SESSION["comptador"])) {
				 $_SESSION['comptador'] = 1;
				 echo "Benvingut " .session_name()."<br>";
				 echo "Visites web: " . $_SESSION["comptador"] . " durant aquesta sessió.<br>";
				 echo "Aquest és el primer accés.<br>";			 
			}	
			else{
				 $_SESSION["comptador"] += 1;
				 echo "Benvingut " .session_name()."<br>";
				 echo "Visites web: " . $_SESSION["comptador"] . " durant aquesta sessió.<br>";
				 echo "Ultima visita: " . $_SESSION["data_darrer_acces"] . ".<br>";
			}
			date_default_timezone_set('Europe/Andorra');
			$_SESSION['data_darrer_acces'] = date('d/m/Y h:i:s');
		?></p>
			<input id="noV" type="user" name="usuari" value="<?php echo "".session_name()."";?>">
			<input id="noV" type="password" name="ctsnya" value="<?php echo "".$password."";?>">
			<input type="submit" value="LOG OUT">
		</form>
	</div>
     </body>
</html>
