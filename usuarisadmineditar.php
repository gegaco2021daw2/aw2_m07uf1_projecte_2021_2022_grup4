<?php
    session_start();
	echo "Nombre de usuario: " . $_SESSION["usuario"];
	
	$fitxer_usuaris="/var/www/html/Projecte/usuaris";
	$fp=fopen($fitxer_usuaris,"r+") or die ("No s'ha pogut validar l'usuari");
	if ($fp) {
		$mida_fitxer=filesize($fitxer_usuaris);	
		$usuari = explode(PHP_EOL, fread($fp,$mida_fitxer));
	}

	foreach ($usuari as $users) {
		$logpwd = explode(":",$users);
		if (($_POST['usernomedit'] == $logpwd[0])&&($_POST['usuari'])&&($_POST['ctsnya'])&&($_POST['nomcognoms'])&&($_POST['codipostal'])&&($_POST['email'])&&($_POST['numcontacte'])&&($_POST['carrer'])){
            $a = $users;
            $user = ($_POST['usuari']);
            $password = ($_POST['ctsnya']);
            $nomcognoms = ($_POST['nomcognoms']);
            $codipostal = ($_POST['codipostal']);
            $email = ($_POST['email']);
            $numcontacte = ($_POST['numcontacte']);
            $carrer = ($_POST['carrer']);
            $texte="$user:$password:$nomcognoms:$codipostal:$email:$numcontacte:$carrer\n";
			$b = file_get_contents('usuaris');
			$c = preg_replace("/$a/", "$texte", $b); 
			file_put_contents($fitxer_usuaris, $c);
			fclose($fp);
		}
        else{
            echo "Te has olvidado algo...";
        }
	}
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
			<a href="interficieadmin.php" class="menu">Pagina Principal</a>
            <a href="llibresadmin.php" class="menu">Llibres</a>
		    <a href="usuarisadmin.php" class="menu">Usuaris</a>
		</nav>
        <div class="titolp">
			<h1 id="black">EDITAR USUARIS</h1>
        </div>
        <div class="indexdivproductes">
            <form action="" method="POST">
            <br><p id="white" class="pinicisessio">NOM USUARI A EDITAR:</p>
                <input type="text" class="num" name="usernomedit" placeholder="NOM USUARI"><br>
                <p id="white" class="pinicisessio">NOU USUARI</p>
                <input type="text" class="num" name="usuari" placeholder="NOU USUARI"><br>
                <p id="white" class="pinicisessio">CONTRASENYA</p>
                <input type="text" name="ctsnya" placeholder="CONTRASENYA"><br>
                <p id="white" class="pinicisessio">NOM I COGNOMS</p>
                <input type="text" class="num" name="nomcognoms" placeholder="NOM I COGNOMS"><br>
                <p id="white" class="pinicisessio">CODI POSTAL</p>
                <input type="text" class="num" name="codipostal" placeholder="CODI POSTAL"><br>
                <p id="white" class="pinicisessio">EMAIL:</p>
                <input type="text" class="num" name="email" placeholder="EMAIL"><br>
                <p id="white" class="pinicisessio">NUMERO DE CONTACTE</p>
                <input type="text" class="num" name="numcontacte" placeholder="NUM CONTACTE"><br>
                <p id="white" class="pinicisessio">CARRER:</p>
                <input type="text" class="num" name="carrer" placeholder="CARRER"><br>
                <br><br>
                <input type="submit" class="comanda" value="EDITAR"><br><br><br>
            </form>
        </div>
        <div class="usuaricuadre">
			<form action="http://localhost/Projecte/logoutadmin.php" method="POST">
				<p class="pinicisessio1"><?php
				if (!isset($_SESSION["comptador"])) {
					$_SESSION['comptador'] = 1;
					echo "Benvingut " . $_SESSION["usuario"]."<br>";
					echo "Visites web: " . $_SESSION["comptador"] . " durant aquesta sessi??.<br>";
					echo "Aquest ??s el primer acc??s.<br>";			 
				}	
				else{
					$_SESSION["comptador"] += 1;
					echo "Benvingut " . $_SESSION["usuario"]."<br>";
					echo "Visites web: " . $_SESSION["comptador"] . " durant aquesta sessi??.<br>";
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
