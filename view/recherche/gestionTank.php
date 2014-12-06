<?php
	INCLUDE_ONCE('recherche/model/TypeChar/ListeTypeChar.php');
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
		if(intval(str_replace('gestion','', $_POST['gestionTank'])) > 0){
			try{
				$titre = 'Gestion des chars - '.$tanks[intval(str_replace('gestion','', $_POST['gestionTank']))]->getNom();
			}
			catch(Exception $e)
			{
				$titre = 'Char supprimée';

			}		
		}
		else{
			$titre = 'Gestion des chars - Nouveau char';		
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
		$titre = 'Gestion des chars - Nouveau char';
		$tierSelection = 0;
	}
?>

<?php 
	/* Header */
	include_once('view/header.php');
	
	/* Barre de navigation */
	include_once('view/navigation.php');
?>
        <h1>Gestion des chars WOT</h1>
		
				<section>					
					<h3><!-- nom du char choisi --></h3>
						<article>
							<p>
							<?php include_once('view/recherche/formulairegestion/FormulaireGestion.php'); ?>
							</p>
							
						</article>					
				</section>
    </body>
</html>




