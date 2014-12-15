<?php

	/* Pour lancer la page par défaut, il faut lui envoyer une variable correspondant à une sélection pour la requête par défaut.
	Le contrôle suivant, permet de vérifier que la saisie du tank est correct, selon les critères suivant :
	- L'utilisateur a sélectionné un char existant dans la lite ( vérification de l'existance de la variable POST['choixTank']
	- L'utilisateur n'a pas falsifié la page php, ou, envoyé une requête lors de la maintenance, sur un char qu'il aurait supprimé*/
	function renvoiIdValide($bdd, $tanks){
		if(isset($_POST['RechercheBouton']) && isset($_POST['choixTank'])){
			$resultat = 1;
			
			//Scrutage de la table pour vérifier que le char qu'on veut afficher existe bien (cas om on le supprimerait, et, qu'on essayerait de l'afficher)
			foreach($tanks as $tank){
				if($tank->getId() == $_POST['choixTank']){
					$resultat = intval($_POST['choixTank']);
				}
			}
			
			return $resultat;
			
		}
		else{
			return 1;
		}
	}
	
	
	include_once('controller/gestionTank/fonctionRechercheControler/testValeur.php');

	include_once('model/infoBddModel.php');
	include_once('model/requeteModel.php');
	
	//Charge les éléments pour gérer les données sur les tanks :
	include_once('model/tankModel.php');
	
	//Fonctions permettant de charger la liste des canons de la base de données :
	include_once('model/CanonModel.php');
	
	//Fonctions permettant de charger la liste des nations de la base de données :
	include_once('model/NationModel.php');
	
	//Class sur les listes de canon d'un char :
	include_once('model/LiaisonTankElement/ListeDeCanonParTankClass.php');
	
	$nations = listeNation($bddWoT);
	
	//On vient charger la liste complète des tank, puisqu'on est dans la partie recherche(cette opération n'est pas optimale, mais, permettra, pour le moment, de gagner des lignes de code.
	$tanks = listeTank($bddWoT);
	
	$Canons = listeCanon($bddWoT);
	
	/* Partie contrôle*/
	
	
	if(isset($_GET['page'])){
		switch($_GET['page']){
			case 'connexion':
				
				$tankADetailler = renvoiIdValide($bddWoT, $tanks);
				include_once('view/connexion/connexion.php');
				
			break;
			
			case 'rechercheWoT':
				
				$tankADetailler = renvoiIdValide($bddWoT, $tanks);
				include_once('view/recherche/recherche.php');
				
			break;
			
			case 'gestionTank':
				
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
				
				include_once('view/gestionTank/gestionTank.php');
				
			break;
			
			case 'modifierBaseTank':
				if(isset($_POST['AjouterBouton'])){
					//Redirige  vers la requête d'ajout: 
					$messageRetour = ajoutChar($bddWoT, $_POST);
					
					//On affiche la page d'information sur la requête:
					include_once('view/modificationFaite.php');
				}
				elseif(isset($_POST['ModifierBouton'])){
					//Redirige  vers la requête de modification: 
				
					if(isset($_SESSION['indiceCharAModifier'])){
						$messageRetour = modificationChar($bddWoT, $_POST, $_SESSION['indiceCharAModifier']);
					}
					else{
						$messageRetour = 'Erreur : votre opération a été annulé, car, le char sélectionné n\'est pas valide.';
					}					
					
					//On affiche la page d'information sur la requête:
					include_once('view/modificationFaite.php');
				}
				elseif(isset($_POST['SupprimerBouton'])){
					
					//Redirige  vers la requête de suppression: 
					if(isset($_SESSION['indiceCharAModifier'])){
						$messageRetour = suppressionChar($bddWoT, $_POST, $_SESSION['indiceCharAModifier']);
					}
					else{
						$messageRetour = 'Erreur : votre opération a été annulé, car, le char sélectionné n\'est pas valide : ';
					}	
					
					//On affiche la page d'information sur la requête:
					include_once('view/modificationFaite.php');
				}
				else{
					header('location:.');
				}
			break;
		
			default: //En cas d'url incorrect pour la page, on redirige vers l'accueil
				header('location:.');
			break;
		}
	}
	else{
		/**********************************************************************************************************************/
		/* Si aucune info n'est envoyé à l'index et à ce contrôleur, on lance la page par défaut, à savoir, la page d'accueil */
		/**********************************************************************************************************************/
		$tankADetailler = renvoiIdValide($bddWoT, $tanks);
		include_once('view/Accueil/Accueil.php');
	}
	
	
