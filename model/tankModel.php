<?php

include_once('model/TankClass.php');
include_once('model/FormulaireChampClass.php');

//Permet de renvoyer la liste complète de tous les chars existants:
function listeTank($bdd){
		
	$req = $bdd->prepare('SELECT id FROM tank ORDER BY pays_id, type_char, tier_chiffre, nom');
	$req -> execute();
	
	while($tank = $req->fetch()){
		$listetank[$tank['id']] = new Tank($tank['id'], $bdd);
	}
	$req->closeCursor();
	
	return $listetank;
	
}

//Permet de renvoyer la liste des champs de la table tank de la base WoT. A modifier ultérieurement pour la récupérer depuis la base de donnée directement.

function listeChampTank($bdd, $tableName){
	//$bdd : base de données
	//$tableName : nom de la table
	
	
	//Requête :
	$recordset = $bdd->query('SHOW COLUMNS FROM tank');
	
	//Récupération des résultats:
	$fields = $recordset->fetchAll(PDO::FETCH_ASSOC);
	
	$fieldNames = '';
	
	
	foreach ($fields as $field) {
		//Initialisation des variables :
		
		//
		$element = '';
		
		//Correspond au type d'élément du formulaire final : textbox, button, listbox, ....
		$type = '';

		switch($field['Field']){
			case 'id':
				//Ne rien faire, on ne veut pas récupérer l'id.
			break;
			
			case 'datemiseajour':
			
				$fieldNames = $field['Field'];
				$element = '';
				$type = 'label';
			
				$listTankField[] = new FormulaireChamp($fieldNames, $type, $element, '', '', '');	
			break;
			
			case 'type_credit':
				$fieldNames = 'type_credit';
				
				$reqtype_credit = $bdd->query('SELECT * FROM monnaie ORDER BY id');
				$typeCredit = $reqtype_credit->fetchAll();
				
				
				$idTab = '';
				$paysTab = '';
				foreach($typeCredit as $type){
					$element[$type['type']] = $type['type'];
				}
				

				$type = 'select';
		
				$listTankField[] = new FormulaireChamp($fieldNames, $type, $element, '', '', '');		
				
				$reqtype_credit->closeCursor();
				
			break;
			
			case 'monaie':
				$fieldNames = 'monaie';
				$reqtype_credit = $bdd->query('SELECT * FROM monnaie ORDER BY id');
				$typeCredit = $reqtype_credit->fetchAll();
				$idTab = '';
				$paysTab = '';
				
				foreach($typeCredit as $type){
					$element[$type['type']] = $type['type'];
				}
					
				$type = 'select';
		
				$listTankField[] = new FormulaireChamp($fieldNames, $type, $element,'', '', '');		
				
				$reqtype_credit->closeCursor();
				
			break;
			
			case 'Description':
			
				$fieldNames = $field['Field'];
				$element = '';
				$type = 'textarea';
		
				$listTankField[] = new FormulaireChamp($fieldNames, $type, $element, '', '', '');	

			break;
			
			case 'premium':
				$fieldNames = 'premium';
				
				$reqtype_credit = $bdd->query('SELECT * FROM acces_char ORDER BY id');
				$typeCredit = $reqtype_credit->fetchAll();
				
				
				$idTab = '';
				$paysTab = '';
				foreach($typeCredit as $type){
					$element[$type['type']] = $type['type'];
				}
					
				$type = 'select';
		
				$listTankField[] = new FormulaireChamp($fieldNames, $type, $element,'', '',  '');		
				
				$reqtype_credit->closeCursor();
				
			break;
			
			case 'type_char':
				$fieldNames = 'type_char';
				
				$reqtype_credit = $bdd->query('SELECT * FROM type_char ORDER BY id');
				$typeCredit = $reqtype_credit->fetchAll();
				
				
				$idTab = '';
				$paysTab = '';
				foreach($typeCredit as $type){
					$element[$type['id']] = $type['type'];
				}
					
				$type = 'select';
		
				$listTankField[] = new FormulaireChamp($fieldNames, $type, $element, '', '',  '');		
				
				$reqtype_credit->closeCursor();
				
			break;
			
			
			case 'tier_latin':
				$fieldNames = 'tier_latin';
				
				$reqtype_credit = $bdd->query('SELECT * FROM tier ORDER BY id');
				$typeCredit = $reqtype_credit->fetchAll();
				
				
				$idTab = '';
				$paysTab = '';
				foreach($typeCredit as $type){
					$element[$type['tier_latin']] = $type['tier_latin'];
				}
					
				$type = 'select';
		
				$triggerScript = 'onchange';
				$scriptFonction = 'miseAJourTierChiffre(this.value)';
				$attribut = '';
				
				$listTankField[] = new FormulaireChamp($fieldNames, $type, $element, $triggerScript, $scriptFonction, $attribut);	
				
				$reqtype_credit->closeCursor();
				
			break;
			
			case 'pays_id':
				$fieldNames = 'pays';
				
				$reqNation = $bdd->query('SELECT * FROM nation ORDER BY id');
				$nations = $reqNation->fetchAll();
				
				
				$idTab = '';
				$paysTab = '';
				foreach($nations as $nation){
					$element[$nation['id']] = $nation['pays'];
				}
					
				$type = 'select';
		
				$triggerScript = '';
				$scriptFonction = '';
				$attribut = '';
				
				$listTankField[] = new FormulaireChamp($fieldNames, $type, $element, $triggerScript, $scriptFonction, $attribut);	
				
				$reqtype_credit->closeCursor();
				
			break;
			
			case 'Nombre_equipage':
			
				$fieldNames = $field['Field'];
				$element = '';
				$type = '';
				$triggerScript = '';
				$scriptFonction = '';
				$attribut = 'readonly';
		
				$listTankField[] = new FormulaireChamp($fieldNames, $type, $element, $triggerScript, $scriptFonction, $attribut);	

				break;
				
			case 'Nombre_chargeur':
			
				$fieldNames = $field['Field'];
				$element = '';
				$type = '';
				$triggerScript = 'onchange';
				$scriptFonction = 'sommeEquipage()';
				$attribut = '';
		
				$listTankField[] = new FormulaireChamp($fieldNames, $type, $element, $triggerScript, $scriptFonction, $attribut);	

				break;
			
			case 'Nombre_tireur':
			
				$fieldNames = $field['Field'];
				$element = '';
				$type = '';
				$triggerScript = 'onchange';
				$scriptFonction = 'sommeEquipage()';
				$attribut = '';
		
				$listTankField[] = new FormulaireChamp($fieldNames, $type, $element, $triggerScript, $scriptFonction, $attribut);	

				break;
			
			
			case 'Nombre_pilote':
			
				$fieldNames = $field['Field'];
				$element = '';
				$type = '';
				$triggerScript = 'onchange';
				$scriptFonction = 'sommeEquipage()';
				$attribut = '';
		
				$listTankField[] = new FormulaireChamp($fieldNames, $type, $element, $triggerScript, $scriptFonction, $attribut);	

				break;
			
			
			case 'Nombre_operateur_radio':
			
				$fieldNames = $field['Field'];
				$element = '';
				$type = '';
				$triggerScript = 'onchange';
				$scriptFonction = 'sommeEquipage()';
				$attribut = '';
		
				$listTankField[] = new FormulaireChamp($fieldNames, $type, $element, $triggerScript, $scriptFonction, $attribut);	

				break;
			
			case 'tier_chiffre':
			
				$fieldNames = $field['Field'];
				$element = '';
				$type = '';
				$triggerScript = '';
				$scriptFonction = '';
				$attribut = 'readonly';
		
				$listTankField[] = new FormulaireChamp($fieldNames, $type, $element, $triggerScript, $scriptFonction, $attribut);	

				break;
			
			case 'prix':
			
				$fieldNames = $field['Field'];
				$element = '';
				$type = '';
				$triggerScript = 'onchange';
				$scriptFonction = 'suppressionBlanc(this.id)';
				$attribut = '';
		
				$listTankField[] = new FormulaireChamp($fieldNames, $type, $element, $triggerScript, $scriptFonction, $attribut);	

				break;
		
			default:
			
				$fieldNames = $field['Field'];
				$element = '';
				$type = '';
		
				$listTankField[] = new FormulaireChamp($fieldNames, $type, $element,'', '', '');	

				break;
			
		}
				
		
		$recordset->closeCursor();
		
	}
	return $listTankField;
}

/*
function listeChampTank(){
	return array(
	'nom',
	'premium',
	'poids_chassis',
	'limite_charge',
	'monaie',
	'vitesse_max',
	'Nombre_equipage',
	'Nombre_pilote',
	'Nombre_tireur',
	'Nombre_chargeur',
	'Nombre_operateur_radio',
	'hp_base',
	'Blindage_avant',
	'Blindage_flanc',
	'Blindage_arriere',
	'type_char',
	'pays',
	'prix',
	'type_credit',
	'tier_latin',
	'tier_chiffre',
	'idExistante');
}*/

/******Fonction de nettoyage juste pour les fonctions de requetage de la base ci-dessous*******/
function EnleveRechercheDansLesIndicesDeLaTableDuTankARajouterOuModifier($texteANettoyer){
	
	$texteANettoyer = str_replace('recherche', '', $texteANettoyer);

	return $texteANettoyer;
}


/******Fonction pour vérifier que les entrées sont correctes *******/
function verificationParametre($tableauAVerifier){

	$resultat = '';

	//On scrute l'ensemble des paramètres du tableau pour vérifier sa validité:
	foreach($tableauAVerifier as $cle=>$parametre){
		
		if(empty($parametre) && EnleveRechercheDansLesIndicesDeLaTableDuTankARajouterOuModifier($cle) != 'Nombre_tireur' && 
		EnleveRechercheDansLesIndicesDeLaTableDuTankARajouterOuModifier($cle) != 'Nombre_chargeur' && 
		EnleveRechercheDansLesIndicesDeLaTableDuTankARajouterOuModifier($cle) != 'Nombre_pilote' && 
		EnleveRechercheDansLesIndicesDeLaTableDuTankARajouterOuModifier($cle) != 'Nombre_operateur_radio' &&
		EnleveRechercheDansLesIndicesDeLaTableDuTankARajouterOuModifier($cle) != 'prix' ){
			if(empty($resultat)){
				$resultat= 'Attention, certains de vos paramètres sont absents: <br /> - '.EnleveRechercheDansLesIndicesDeLaTableDuTankARajouterOuModifier($cle);
			 }
			 else{
				$resultat= $resultat.', <br /> -'.EnleveRechercheDansLesIndicesDeLaTableDuTankARajouterOuModifier($cle);
			 }
		}
	}
	return $resultat;
}

/*************************************************************/
/*******************Ajout de char*****************************/
/*************************************************************/
function ajoutChar($bdd, $tablAjouter){//$bdd est la base à requêter

	//Vérification des paramètres d'entrée:
	$message =verificationParametre($tablAjouter);
	
	if(empty($message)){
				
		try{
			//Préparation de la requête
			$req = $bdd->prepare('INSERT INTO tank	(nom, 
																	premium, 
																	Description,	
																	poids_chassis,	
																	limite_charge, 
																	monaie, 
																	vitesse_max,	
																	Nombre_equipage,	
																	Nombre_pilote,	
																	Nombre_tireur,	
																	Nombre_chargeur,	
																	Nombre_operateur_radio,	
																	hp_base, 
																	Blindage_avant,	
																	Blindage_flanc,	
																	Blindage_arriere,	
																	type_char, 
																	pays_id,	
																	prix,	
																	type_credit,	
																	tier_latin,	
																	tier_chiffre) 
			VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
			
			//$req->execute($tablAjouter);
				
				$req->execute(array(
			$tablAjouter['recherchenom'],
			$tablAjouter['recherchepremium'], 
			$tablAjouter['rechercheDescription'],
			floatval($tablAjouter['recherchepoids_chassis']),
			floatval($tablAjouter['recherchelimite_charge']),
			$tablAjouter['recherchemonaie'],
			floatval($tablAjouter['recherchevitesse_max']),
			intval($tablAjouter['rechercheNombre_equipage']),
			intval($tablAjouter['rechercheNombre_pilote']),
			intval($tablAjouter['rechercheNombre_tireur']),
			intval($tablAjouter['rechercheNombre_chargeur']),
			intval($tablAjouter['rechercheNombre_operateur_radio']),
			intval($tablAjouter['recherchehp_base']),
			intval($tablAjouter['rechercheBlindage_avant']), 
			intval($tablAjouter['rechercheBlindage_flanc']),
			intval($tablAjouter['rechercheBlindage_arriere']), 
			$tablAjouter['recherchetype_char'], 
			max(1,intval($tablAjouter['recherchepays'])),
			intval($tablAjouter['rechercheprix']), 
			$tablAjouter['recherchetype_credit'], 
			$tablAjouter['recherchetier_latin'],
			intval($tablAjouter['recherchetier_chiffre']))
			);
			
			$req->closeCursor();

			
			//On suppose la requête effectuée:
			$message = 'Requête terminée avec succès : Le char '.$tablAjouter['recherchenom'].' a bien été ajouté.';
		}
	
		catch (Exception $e)
		{
				die('Erreur : ' . $e->getMessage());
		}
		
	}
	
	return $message;

}

/*************************************************************/
/*****************Suppression de char*************************/
/*************************************************************/
function suppressionChar($bdd, $tablAjouter, $indiceTankSupprimer){//$bdd est la base à requêter

	//Vérification des paramètres d'entrée:
	$message =verificationParametre($tablAjouter);
	
	$indiceTankSupprimer = intval($indiceTankSupprimer);

	try{
		$req = $bdd->prepare('DELETE FROM tank WHERE id = ?');
		
		//$req->execute($tablAjouter);
			
		$req->execute(array($indiceTankSupprimer));
		$req->closeCursor();
		
		$message = 'Le char '.$tablAjouter['recherchenom'].' a bien été supprimé';
		
		}
		
	catch (Exception $e){
	
		die('Erreur : ' . $e->getMessage());
				
	}
	
	
	return $message;
}


/**************************************************************/
/*****************Modification de char*************************/
/**************************************************************/

function modificationChar($bdd, $tablAjouter, $indiceTankModifier){//$bdd est la base à requêter

	//Vérification des paramètres d'entrée:
	$message =verificationParametre($tablAjouter);
	
	$indiceTankModifier = intval($indiceTankModifier);
	
	try{
		
		$req = $bdd->prepare('	UPDATE  tank
											SET nom = ?, 
											premium =?,	
											Description =?,	
											poids_chassis=?, 
											limite_charge=?, 
											monaie=?, 
											vitesse_max=?,	
											Nombre_equipage=?,	
											Nombre_pilote=?,	
											Nombre_tireur=?,	
											Nombre_chargeur=?,	
											Nombre_operateur_radio=?,	
											hp_base=?, 
											Blindage_avant=?,	
											Blindage_flanc=?,	
											Blindage_arriere=?,	
											type_char=?, 
											pays_id=?,	
											prix=?,	
											type_credit=?,	
											tier_latin=?,	
											tier_chiffre=?,
											datemiseajour=?
											WHERE id = ?
		');
		
		//$req->execute($tablAjouter);
		
		$req->execute(array(
		$tablAjouter['recherchenom'],
		$tablAjouter['recherchepremium'],
		$tablAjouter['rechercheDescription'], 
		$tablAjouter['recherchepoids_chassis'],
		$tablAjouter['recherchelimite_charge'],
		$tablAjouter['recherchemonaie'],
		$tablAjouter['recherchevitesse_max'],
		max(1, $tablAjouter['rechercheNombre_equipage']), 
		$tablAjouter['rechercheNombre_pilote'],
		$tablAjouter['rechercheNombre_tireur'], 
		$tablAjouter['rechercheNombre_chargeur'], 
		$tablAjouter['rechercheNombre_operateur_radio'],
		$tablAjouter['recherchehp_base'],
		$tablAjouter['rechercheBlindage_avant'], 
		$tablAjouter['rechercheBlindage_flanc'],
		$tablAjouter['rechercheBlindage_arriere'], 
		$tablAjouter['recherchetype_char'], 
		$tablAjouter['recherchepays'],
		$tablAjouter['rechercheprix'], 
		$tablAjouter['recherchetype_credit'], 
		$tablAjouter['recherchetier_latin'],
		$tablAjouter['recherchetier_chiffre'], 
		date("Y-m-d H:i:s"),
		$indiceTankModifier));
		$req->closeCursor();
			
		$message = 'Le char '.$tablAjouter['recherchenom'].' a bien été modifié.';
	
	}
	
	catch (Exception $e)
	{
			die('Erreur : ' . $e->getMessage());
	}
	
	if(intval($tablAjouter['rechercheAjoutCanon']) > 0){
	
		//On recherche la liste de canon du tank, que l'on met dans un objet de liaison tank et canon :
		$ListeCanonDuTank = new ListeDeCanonParTank($indiceTankModifier, $bdd);
		
		//On affiche la liste des tanks pour voir si quelque chose cloche :
		//$ListeCanonDuTank->AffichageInformationListe(); 
		
		//On valide l'ajout d'une nouvelle liaison, en passant par l'objet de liste du tank correspondant, qui va ajouter la liaison.
		$ListeCanonDuTank->AjouterCanon(intval($tablAjouter['rechercheAjoutCanon']));
	}
	
	return $message;


}
