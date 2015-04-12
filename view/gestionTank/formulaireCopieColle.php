<?php
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
			$textFinal = tronqueVariable($textFinal, 'Niveau');
			//tier latin :
			$tierLatin = renvoieTier($textFinal);
			//Copie dans variable de session :
			$_SESSION['ficheTanktierLatin'] = $tierLatin;
			
			//Tronquage-Niveau:
			$textFinal = tronqueVariable($textFinal, 'structure');
			//HP :
			$variable = ' HP';
			$retour = stripos($textFinal,$variable);
			$HP =  trim(str_replace(' ', '', substr ($textFinal, 0, $retour)));
			//Copie dans variable de session :
			$_SESSION['ficheTankHP'] = $HP;
			
			//Tronquage-HP:
			$textFinal = tronqueVariable($textFinal, 'charge');
			$poids = renvoiePoids($textFinal);
			//Copie dans variable de session :
			$_SESSION['ficheTankpoids'] = $poids;
			
			//Tronquage-poids:
			$textFinal = tronqueVariable($textFinal, '/');
			//Charges limite :
			$variable = ' t';
			$retour = stripos($textFinal,$variable);
			$charge = trim(substr ($textFinal, 0, $retour));
			//Copie dans variable de session :
			$_SESSION['ficheTankcharge'] = $charge;
			
			//Tronquage-charge:
			$textFinal = tronqueVariable($textFinal, 'Prix');
			//Prix :
			$variable = 'Équipage';
			$retour = stripos($textFinal,$variable)-2;
			$prix = trim(str_replace(' ', '', substr ($textFinal, 0, $retour)));
			//Copie dans variable de session :
			$_SESSION['ficheTankprix'] = $prix;
			
			//Tronquage-prix:
			$textFinal = tronqueVariable($textFinal, 'Équipage	');
			$variable = CHR(10);
			$textFinal = tronqueVariable($textFinal, $variable);
			$textFinal = tronqueVariable($textFinal, $variable);
			//Equipage :
			$valeurObtenue = 'XXXXXXXXXXXXXXXXX';
			$nombrePilote =0;
			$nombreTireur =0;
			$nombreRadio =0;
			$nombreChargeur =0;
			$autre = '';
			do
			{
				$variable = CHR(10);
				$retour = stripos($textFinal,$variable)-1;
				$valeurObtenue = trim(substr ($textFinal, 0, $retour));
				
				$retour = stripos($textFinal,'(') - 1;
				
				if($retour > 1) 
				{
					$valeurObtenue = substr ($valeurObtenue, 0, $retour);
				}
				$variable = CHR(10);
				
				$textFinal = tronqueVariable($textFinal, $variable);
				
				switch($valeurObtenue)
				{
					case 'Pilote':
						$nombrePilote ++;
					break;
					
					case 'Tireur':
						$nombreTireur ++;
						$textIntermediaire = $textFinal;
					
					break;
					
					case 'Opérateurradio':
						$nombreRadio ++;
					
					break;
					
					case 'Opérateurradio(':
						$nombreRadio ++;
					
					break;
					
					case 'Chargeur':
						$nombreChargeur ++;
					
					break;
					
					default:
						$autre = ($valeurObtenue != 'Mobilité' )? $valeurObtenue : $autre;
				
					break;
				}
			}while($valeurObtenue != 'Mobilité');
			
			//Copie dans variable de session :
			$_SESSION['ficheTankprix'] = $prix;
			
			//Tronquage-équipage:
			$textFinal = tronqueVariable($textFinal, 'maximale');
			//Vitesse :
			$variable = 'km';
			$retour = stripos($textFinal,$variable);
			$vitesse = trim(substr ($textFinal, 0, $retour));
			//Copie dans variable de session :
			$_SESSION['ficheTankvitesse'] = $vitesse;
			
			//Tronquage-vitesse:
			$textFinal = tronqueVariable($textFinal, 'avant');
			//Blindage avant :
			$variable = 'flancs ';
			$retour = stripos($textFinal,$variable) - 2 ;
			$blindageAvant = substr ($textFinal, 0, $retour);
			//Copie dans variable de session :
			$_SESSION['ficheTankblindageAvant'] = $blindageAvant;
			
			//Tronquage-blindage-avant:
			$textFinal = tronqueVariable($textFinal, 'flancs');
			//Blindage flanc :
			$variable = 'arrière ';
			$retour = stripos($textFinal,$variable) - 2;
			$blindageFlanc = substr ($textFinal, 0, $retour);
			//Copie dans variable de session :
			$_SESSION['ficheTankblindageFlanc'] = $blindageFlanc;
			
			//Tronquage-blindage-flanc:	
			$textFinal = tronqueVariable($textFinal, 'arrière');
			//Blindage arrière :
			$variable = 'Armement';
			$retour = stripos($textFinal,$variable) - 2;
			$blindageArriere = substr ($textFinal, 0, $retour);
			//Copie dans variable de session :
			$_SESSION['ficheTankblindageArriere'] = $blindageArriere;
		}
	}


?>

<html lang="fr">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Détails char</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
    </head>

	<body>
	<form action ="#" method ="post">
		<textarea rows="20" cols="50" name ="textWoT"><?php 
		echo $text; 
		?></textarea><br />
		<input type="submit" name = "EnvoieText">
	</form>
		<textarea rows="20" cols="50" name ="textWoT"><?php 
		echo $textIntermediaire ; 
		?></textarea><br />
	<h3>Résultat :</h3>
		<textarea rows="20" cols="150">
Résultat de l'étude :
nom 		: <?php echo $nomChar; ?> 
Description : <?php echo $descriptionChar; ?> 
HP 	: <?php echo $HP; ?> 
poids_chassis	        : <?php echo $poids; ?> 
limite_charge	        : <?php echo $charge; ?> 
vitesse_max	            : <?php echo $vitesse; ?> 
hp_base : <?php echo $HP; ?> 
Blindage_avant : <?php echo $blindageAvant; ?> 
Blindage_flanc : <?php echo $blindageFlanc; ?> 
Blindage_arriere : <?php echo $blindageArriere; ?> 
type_char : <?php echo $textTypeChar; ?> 
prix : <?php echo $prix	; ?> 
tier_latin : <?php echo $tierLatin; ?> 
pilote : <?php echo $nombrePilote; ?> 
Tireur : <?php echo $nombreTireur; ?> 
Radio : <?php echo $nombreRadio; ?> 
Chargeur : <?php echo $nombreChargeur; ?> 
Autre : <?php echo $autre; ?> 
		</textarea><br />

</body>
</html>

<?php
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
	$variable = CHR(13).CHR(10);
	$debutBlanc = stripos($text,$variable);
	
	$nomCharEnPartie = substr ($text, 0, $debutBlanc);
	$resteDuTextApresNom = substr ($text, $debutBlanc);
	$finNomChar = stripos($resteDuTextApresNom,$nomCharEnPartie) + $debutBlanc - 2;//4 car, on a 2 fois un retour à la ligne qui s'écrit sur 2 caractère : \r
	
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
	//Renvoie la description:
	
	$ChaineCaractereApresFiltre = substr ($text, 2, 6);//Restriction de la chaîne de caractère
	if (stripos($text,'P') > 0){
		$finText = stripos($text,'P');
	}
	else{
		$finText  = 4;
	}
	$ChaineCaractereApresFiltre = trim(substr ($text, 0, $finText ));//Elimination des caractères inutiles
		
	return $ChaineCaractereApresFiltre; // 2 correspond à l'espace entre 'Niveau' et le tier et 6 est la longuer max du tier latin.
	
}
function renvoiePoids($text){
	$variable = '/';
	$retour = stripos($text,$variable);
	
	//Renvoie la description:
	return trim(substr ($text, 0, $retour));
	
}

