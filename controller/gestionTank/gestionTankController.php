<?php
	/* 
	 * Avant d'accéder à la page de modification, il faut s'être identifé avant
	 */
	
	if(!isset($_SESSION['connexion']))
		header('location:.?page=connexion');
	
	/*
	 * Accessible uniquement si connecté :
	 */
	
	//Pour modifier proprement un tank, on va récupérer son id dans une variable de session, cela, uniquement si on a choisi de modifier un tank:
	if(isset($_POST['gestionTank'])){
		if(isset($_POST['RecherchePrecedentBouton'])){
			$_SESSION['indiceCharAModifier'] = idPrecedent($bddWoT, $tanks, intval(str_replace('gestion','', $_POST['gestionTank'])));
			$_POST['gestionTank'] = 'gestion'.$_SESSION['indiceCharAModifier'] ;
		}
		elseif(isset($_POST['RechercheSuivantBouton'])){
			if(isset($_SESSION['nationGestionTank'])){
				$_SESSION['indiceCharAModifier'] = idSuivantMemeNation($bddWoT, $tanks, intval(str_replace('gestion','', $_POST['gestionTank'])), $_SESSION['nationGestionTank']);
			}
			else{
				$_SESSION['indiceCharAModifier'] = idSuivant($bddWoT, $tanks, intval(str_replace('gestion','', $_POST['gestionTank'])));
			}
			$_POST['gestionTank'] = 'gestion'.$_SESSION['indiceCharAModifier'] ;
		}
		elseif(isset($_POST['RechercheBouton'])){
			$_SESSION['indiceCharAModifier'] = intval(str_replace('gestion','', $_POST['gestionTank']));
		}
	}
	elseif(isset($_SESSION['indiceCharAModifier'])){
		$_POST['gestionTank'] = 'gestion'.$_SESSION['indiceCharAModifier'];
	}

	//Configuration de la page web :
	INCLUDE_ONCE('model/TypeChar/ListeTypeChar.php');
	//A mettre dans une fonction : Permet de récupérer le type de nation à afficher.
	if(isset($_SESSION['nationGestionTank']) && intval($_SESSION['nationGestionTank'])>0 && !isset($_POST['RechercheBouton']) && !isset($_POST['RechercheSuivantBouton']) && !isset($_POST['RecherchePrecedentBouton'])){
	
		if(!isset($_POST['nationGestionTank']) || intval($_POST['nationGestionTank']) == 0){
			$indiceNation = $_SESSION['nationGestionTank'];
		}
		else{
			$indiceNation = intval($_POST['nationGestionTank']);
			$_SESSION['nationGestionTank']= $indiceNation;
		}
	}
	elseif(isset($_POST['nationGestionTank']) && intval($_POST['nationGestionTank']) >0){
		$indiceNation = intval($_POST['nationGestionTank']);
		$_SESSION['nationGestionTank']= $indiceNation;
	}
	else{
		$indiceNation = 0;
	}
	//Recherche des informations à afficher : titre de la page, tank à afficher, liste des chars à afficher, nation à afficher, tier à afficher, type de char à afficher
	if(isset($_POST['gestionTank'])){	
	
		//On récupère l'indice reçu via formulaire :
		$indiceEnvoyeEnPost = intval(str_replace('gestion','', $_POST['gestionTank']));
		
		if($indiceEnvoyeEnPost > 0 && array_key_exists ($indiceEnvoyeEnPost, $tanks )) {//Double test pour vérifier que l'indice est bien dans le tableau des chars
				$titre = $tanks[intval(str_replace('gestion','', $_POST['gestionTank']))]->getNom().' - Gestion des chars';
		}
		else{
			$titre = 'Nouveau char - Gestion des chars -';
		}
		if(isset($_POST['tierGestionTank']) && intval($_POST['tierGestionTank'])>= 0){
			$tierSelection = intval($_POST['tierGestionTank']);
			$_SESSION['tierGestionTank'] = $tierSelection;
		}
		elseif(isset($_SESSION['tierGestionTank']) && intval($_SESSION['tierGestionTank'])>= 0){
			$tierSelection = $_SESSION['tierGestionTank'];
		}
		else{
			$tierSelection = 0;
		}
	}
	else{
		$titre = 'Nouveau char - Gestion des chars -';
		$tierSelection = 0;
	}
	//Envoie de la page web :
	include_once('view/gestionTank/gestionTank.php');