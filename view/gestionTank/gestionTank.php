<?php 
/****************************************************************************/
/************* Section à bouger ultérieurement ******************************/
/****************************************************************************/
	if(isset($_POST['EnvoieText']))
	{
		if(isset($_POST['textWoT']))
		{
			$text = $_POST['textWoT'];
			$textTypeChar =  retourneTypeChar($text);
			//Copie dans variable de session :
			$_SESSION['ficheTanktextTypeChar'] = $textTypeChar;
			
			//Tronquage à partir du type de char :
			$textFinal = substr ($text , retournePositionTypeChar($text) );
			//Nom du char :
			$nomChar = renvoieNomChar($textFinal);
			//Copie dans variable de session :
			$_SESSION['ficheTanknomChar'] = $nomChar;
			
			//Tronquage à partir description:
			$textFinal = tronqueVariable($textFinal, $nomChar.'\r\r'.$nomChar.'\r');
			//RDescription :
			$descriptionChar = renvoieDescription($textFinal);
			//Copie dans variable de session :
			$_SESSION['ficheTankdescriptionChar'] = $descriptionChar;
			
			//Tronquage à partir description:
			$textFinal = tronqueVariable($textFinal, 'Niveau	');
			//tier latin :
			$tierLatin = renvoieTier($textFinal);
			//Copie dans variable de session :
			$_SESSION['ficheTanktierLatin'] = $tierLatin;
			
			//Tronquage-Niveau:
			$textFinal = tronqueVariable($textFinal, 'structure	');
			//HP :
			$variable = ' HP';
			$retour = stripos($textFinal,$variable);
			$HP =  str_replace(' ', '', substr ($textFinal, 0, $retour));
			//Copie dans variable de session :
			$_SESSION['ficheTankHP'] = $HP;
			
			//Tronquage-HP:
			$textFinal = tronqueVariable($textFinal, 'charge	');
			$poids = renvoiePoids($textFinal);
			//Copie dans variable de session :
			$_SESSION['ficheTankpoids'] = $poids;
			
			//Tronquage-poids:
			$textFinal = tronqueVariable($textFinal, '/ ');
			//Charges limite :
			$variable = ' t';
			$retour = stripos($textFinal,$variable);
			$charge = substr ($textFinal, 0, $retour);
			//Copie dans variable de session :
			$_SESSION['ficheTankcharge'] = $charge;
			
			//Tronquage-charge:
			$textFinal = tronqueVariable($textFinal, 'Prix	');
			//Prix :
			$variable = 'Équipage';
			$retour = stripos($textFinal,$variable)-2;
			$prix = str_replace(' ', '', substr ($textFinal, 0, $retour));
			//Copie dans variable de session :
			$_SESSION['ficheTankprix'] = $prix;
			
			//Tronquage-prix:
			$textFinal = tronqueVariable($textFinal, 'Équipage	');
			//Equipage :
			//Faudra faire des tests plus poussée pour ça, car, on n'a pas beaucoup de truc pour s'y accrocher. Pour le moment, ce qu'on a là est déjà pas mal :)
			//$variable = ' t';
			//$retour = stripos($textFinal,$variable);
			//$charge = substr ($textFinal, 0, $retour);
			
			//Tronquage-équipage:
			$textFinal = tronqueVariable($textFinal, 'maximale	');
			//Vitesse :
			$variable = ' ';
			$retour = stripos($textFinal,$variable);
			$vitesse = substr ($textFinal, 0, $retour);
			//Copie dans variable de session :
			$_SESSION['ficheTankvitesse'] = $vitesse;
			
			//Tronquage-vitesse:
			$textFinal = tronqueVariable($textFinal, 'avant ');
			//Blindage avant :
			$variable = 'flancs ';
			$retour = stripos($textFinal,$variable) - 2 ;
			$blindageAvant = substr ($textFinal, 0, $retour);
			//Copie dans variable de session :
			$_SESSION['ficheTankblindageAvant'] = $blindageAvant;
			
			//Tronquage-blindage-avant:
			$textFinal = tronqueVariable($textFinal, 'flancs ');
			//Blindage flanc :
			$variable = 'arrière ';
			$retour = stripos($textFinal,$variable) - 2;
			$blindageFlanc = substr ($textFinal, 0, $retour);
			//Copie dans variable de session :
			$_SESSION['ficheTankblindageFlanc'] = $blindageFlanc;
			
			//Tronquage-blindage-flanc:	
			$textFinal = tronqueVariable($textFinal, 'arrière ');
			//Blindage arrière :
			$variable = 'Blindage ';
			$retour = stripos($textFinal,$variable) - 2;
			$blindageArriere = substr ($textFinal, 0, $retour);
			//Copie dans variable de session :
			$_SESSION['ficheTankblindageArriere'] = $blindageArriere;
			
			//Tronquage-blindage-arrière:
			//$textFinal = tronqueVariable($textFinal, 'charge	');
			//Prix :
			//$variable = ' t';
			//$retour = stripos($textFinal,$variable);
			//$blindageArriere = substr ($textFinal, 0, $retour);
			//Copie dans variable de session :
			//$_SESSION['ficheTankprix'] = $prix;
			
			
			//retour gestionTank :
			//header('location:../../.?page=gestionTank');
		}
	}
function retourneTypeChar($text)
{
			if(strstr($text,'Char léger:'))
			{
				return 'Char léger';
			}
			elseif(strstr($text,'Char moyen:'))
			{
				return 'Char moyen';
			}
			elseif(strstr($text,'Char lourd:'))
			{
				return 'Char lourd';
			}
			elseif(strstr($text,'Ch. de chars:'))
			{
				return 'Chasseur de char';
			}
			elseif(strstr($text,'CAM:'))
			{
				return 'Artillerie';
			}
			else
			{
				return '';
			}
}
function retournePositionTypeChar($text)
{
			$variable = 'Char léger: ';
			if(strstr($text,$variable))
			{
				return stripos($text,$variable) + strlen($variable);
			}
			
			$variable = 'Char moyen: ';
			if(strstr($text,$variable))
			{
				return stripos($text,$variable) + strlen($variable);
			}
			
			$variable = 'Char lourd: ';
			if(strstr($text,$variable))
			{
				return stripos($text,$variable) + strlen($variable);
			}
			
			$variable = 'Ch. de chars: ';
			if(strstr($text,$variable))
			{
				return stripos($text,$variable) + strlen($variable);
			}
			
			$variable = 'CAM: ';
			if(strstr($text,$variable))
			{
				return stripos($text,$variable) + strlen($variable);
			}
			
			else
			{
				return '0';
			}	
}

function renvoieNomChar($text){
	$variable = ' ';
	$debutBlanc = stripos($text,$variable);
	
	$nomCharEnPartie = substr ($text, 0, $debutBlanc);
	$resteDuTextApresNom = substr ($text, $debutBlanc);
	$finNomChar = stripos($resteDuTextApresNom,$nomCharEnPartie) + $debutBlanc - 4;//4 car, on a 2 fois un retour à la ligne qui s'écrit sur 2 caractère : \r
	
	return substr ($text, 0, $finNomChar);
}

function tronqueVariable($text, $variable){
	return substr ($text, stripos($text,$variable) + strlen($variable));
}

function renvoieDescription($text){
	$variable = 'Caractéristiques de base du char avec un équipage à 100% dans la compétence principale.';
	$debutRetour = stripos($text,$variable);
	
	//Renvoie la description:
	return substr ($text, 0, $debutRetour-4);
	
}

function renvoieTier($text){
	$variable = ' ';
	$debutRetour = stripos($text,$variable);
	
	//Renvoie la description:
	return substr ($text, 0, $debutRetour - strlen('  Points'));
	
}
function renvoiePoids($text){
	$variable = ' ';
	$retour = stripos($text,$variable);
	
	//Renvoie la description:
	return substr ($text, 0, $retour);
	
}
/****************************************************************************/
/************* Fin Section à bouger ultérieurement **************************/
/****************************************************************************/

	/* Header */
	include_once('view/header.php');
	
	/* Barre de navigation */
	include_once('view/navigation.php');
	
	//Redirection de l'adresse vers phpmyadmin, en fonction de la machine qui héberge l'application:
		if(isset($_SERVER['SERVER_ADDR']) && strstr($_SERVER['SERVER_ADDR'], '192.168.'))
		{
			$phpMyAdminLink = $_SERVER['SERVER_ADDR'];
		}
		else
		{
			$phpMyAdminLink = 'localhost';				
		}
		
		echo '<a href="http://'.$phpMyAdminLink.'/phpmyadmin/#PMAURL-2:db_structure.php?db=wot&table=&server=1&target=&token=c7ff5ec32123e7f060068a5604702730" target ="_blank">Bdd Wot</a>';
	?>
	<a href="http://worldoftanks.eu/encyclopedia/vehicles/" target="_blank">Tankopédia</a>
	<a href="Aide/" target="_blank">Aide</a>
	<a href="view/gestionTank/formulaireCopieColle.php" target="_blank">Copier-Coller</a>
	
			
        <h1>Gestion des chars WOT</h1>
		
				<section>					
					<h3><!-- nom du char choisi --></h3>
						<article>
							<p>
							<?php include_once('view/gestionTank/formulairegestion/FormulaireGestion.php'); ?>
							</p>
							<form action ="#" method ="post">
								<textarea rows="20" cols="50" name ="textWoT"><?php 
								if(!empty($text)) echo $text; 
								?></textarea><br />
								<input type="submit" name = "EnvoieText">
							</form>							
						</article>					
				</section>
				
<?php 
	/* footer */
	include_once('view/footer.php');