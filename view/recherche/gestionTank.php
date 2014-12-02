<?php
	INCLUDE_ONCE('recherche/model/TypeChar/ListeTypeChar.php');
	//A mettre dans une fonction : Permet de récupérer le type de nation à afficher.
	if(isset($_SESSION['nationGestionTank']) && intval($_SESSION['nationGestionTank'])>0 && !isset($_POST['RechercheBouton']) && !isset($_POST['RechercheSuivantBouton']) && !isset($_POST['RecherchePrecedentBouton'])){
		if(!isset($_POST['nationGestionTank']) || (isset($_POST['nationGestionTank']) && (intval($_POST['nationGestionTank']) == intval($_SESSION['nationGestionTank'])|| intval($_POST['nationGestionTank']) == 0))){
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
			$titre = 'Gestion des chars - '.$tanks[intval(str_replace('gestion','', $_POST['gestionTank']))]->getNom();
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
								<form method="post" action=".?page=gestionTank">
									<!-- Liste des différentes nations existantes -->
									<select name="nationGestionTank">
										<option value="0" >Toutes les nations</option>
										<?php										
											foreach($nations as $nation){
												//echo '<option value="'.$nation->getId().'" >'.$nation->getNomNation().'</option>';
												//On initialise la variable indice qu'on utilisera ultérieurement:
												if($nation->getId() == $indiceNation){
													$indice = $_POST['gestionTank'];
													echo '<option value="'.$nation->getId().'" selected = "selected">'.$nation->getNomNation().'</option>';
												}
												else{
													echo '<option value="'.$nation->getId().'" >'.$nation->getNomNation().'</option>';
												}
											}
										?>
									</select>
									
									<!-- <br /> On peut accoler les paramètres de sélection -->
									
									<!-- Liste des différents type de chars existants -->
									<select name="typeCharGestionTank">
										<option value="0" >Tous types de char</option>
									</select>
									
									<!-- Liste des différents tier -->
									<select name="tierGestionTank">
<script type = "text/javascript">
	var test;
	
</script>
									<!-- Selon le tier sélectionné plus haut ( à savoir $tierSelection) on sélectionne l'élément recherché dans la liste -->
										<?php 
											switch($tierSelection){
												case 0:
										echo '<option value="0">Tous tier</option>
										<option value="1" >I</option>
										<option value="2" >II</option>
										<option value="3" >III</option>
										<option value="4" >IV</option>
										<option value="5" >V</option>
										<option value="6" >VI</option>
										<option value="7" >VII</option>
										<option value="8" >VIII</option>
										<option value="9" >IX</option>
										<option value="10" >X</option>	';
													break;
												case 1:
										echo '<option value="0">Tous tier</option>
										<option value="1" selected = "selected">I</option>
										<option value="2" >II</option>
										<option value="3" >III</option>
										<option value="4" >IV</option>
										<option value="5" >V</option>
										<option value="6" >VI</option>
										<option value="7" >VII</option>
										<option value="8" >VIII</option>
										<option value="9" >IX</option>
										<option value="10" >X</option>	';
													break;
												case 2:
										echo '<option value="0">Tous tier</option>
										<option value="1" >I</option>
										<option value="2" selected = "selected">II</option>
										<option value="3" >III</option>
										<option value="4" >IV</option>
										<option value="5" >V</option>
										<option value="6" >VI</option>
										<option value="7" >VII</option>
										<option value="8" >VIII</option>
										<option value="9" >IX</option>
										<option value="10" >X</option>	';
													break;
												case 3:
										echo '<option value="0">Tous tier</option>
										<option value="1" >I</option>
										<option value="2" >II</option>
										<option value="3" selected = "selected">III</option>
										<option value="4" >IV</option>
										<option value="5" >V</option>
										<option value="6" >VI</option>
										<option value="7" >VII</option>
										<option value="8" >VIII</option>
										<option value="9" >IX</option>
										<option value="10" >X</option>	';
													break;
												case 4:
										echo '<option value="0">Tous tier</option>
										<option value="1" >I</option>
										<option value="2" >II</option>
										<option value="3" >III</option>
										<option value="4" selected = "selected">IV</option>
										<option value="5" >V</option>
										<option value="6" >VI</option>
										<option value="7" >VII</option>
										<option value="8" >VIII</option>
										<option value="9" >IX</option>
										<option value="10" >X</option>	';
													break;
												case 5:
										echo '<option value="0">Tous tier</option>
										<option value="1" >I</option>
										<option value="2" >II</option>
										<option value="3" >III</option>
										<option value="4" >IV</option>
										<option value="5" selected = "selected">V</option>
										<option value="6" >VI</option>
										<option value="7" >VII</option>
										<option value="8" >VIII</option>
										<option value="9" >IX</option>
										<option value="10" >X</option>	';
													break;
												case 6:
										echo '<option value="0">Tous tier</option>
										<option value="1" >I</option>
										<option value="2" >II</option>
										<option value="3" >III</option>
										<option value="4" >IV</option>
										<option value="5" >V</option>
										<option value="6" selected = "selected">VI</option>
										<option value="7" >VII</option>
										<option value="8" >VIII</option>
										<option value="9" >IX</option>
										<option value="10" >X</option>	';
													break;
												case 7:
										echo '<option value="0">Tous tier</option>
										<option value="1" >I</option>
										<option value="2" >II</option>
										<option value="3" >III</option>
										<option value="4" >IV</option>
										<option value="5" >V</option>
										<option value="6" >VI</option>
										<option value="7" selected = "selected">VII</option>
										<option value="8" >VIII</option>
										<option value="9" >IX</option>
										<option value="10" >X</option>	';
													break;
												case 8:
										echo '<option value="0">Tous tier</option>
										<option value="1" >I</option>
										<option value="2" >II</option>
										<option value="3" >III</option>
										<option value="4" >IV</option>
										<option value="5" >V</option>
										<option value="6" >VI</option>
										<option value="7" >VII</option>
										<option value="8" selected = "selected">VIII</option>
										<option value="9" >IX</option>
										<option value="10" >X</option>	';
													break;
												case 9:
										echo '<option value="0">Tous tier</option>
										<option value="1" >I</option>
										<option value="2" >II</option>
										<option value="3" >III</option>
										<option value="4" >IV</option>
										<option value="5" >V</option>
										<option value="6" >VI</option>
										<option value="7" >VII</option>
										<option value="8" >VIII</option>
										<option value="9" selected = "selected">IX</option>
										<option value="10" >X</option>	';
													break;
												case 10:
										echo '<option value="0">Tous tier</option>
										<option value="1" >I</option>
										<option value="2" >II</option>
										<option value="3" >III</option>
										<option value="4" >IV</option>
										<option value="5" >V</option>
										<option value="6" >VI</option>
										<option value="7" >VII</option>
										<option value="8" >VIII</option>
										<option value="9" >IX</option>
										<option value="10" selected = "selected">X</option>	';
													break;
											
											}
											?>
									</select>
									
									<!-- On met à la ligne les éléments qui ne permettent pas de trier la recherche -->
									<br />
									
									<!-- Liste des chars dans la base de données : le premier élément sert à ajouter un char, et donc, à ne pas charger d'élément -->
									<select name="gestionTank">
										<option value="gestionNouveauTank" > -- Nouveau tank -- </option>
										<?php
										
											//On initialise la variable indice qu'on utilisera ultérieurement:
											$indice = 0;
												
											foreach($tanks as $tank){
												//On teste si le tank appartient à la nation choisit et, au tier choisit : 
												
												if(($indiceNation == 0 || $indiceNation == $tank->getPays()) && ($tierSelection == 0 || $tierSelection == $tank->getTier_chiffre())){
													//On forme le nom des values des options pour faciliter le traitement qui suit:
													$indiceValue  = 'gestion'.$tank->getId();
													
													if(isset($_POST['gestionTank']) &&  $indiceValue == $_POST['gestionTank']){
														$indice = $_POST['gestionTank'];
														echo '<option value="'.$indiceValue.'" selected = "selected">'.$tank->getNom().'</option>';
													}
													else{
														echo '<option value="'.$indiceValue.'" >'.$tank->getNom().'</option>';
													}
												}
											}
										?>									
									</select><br />
									<input type="submit" name="RecherchePrecedentBouton" value="<-" />
									<input type="submit" name="RechercheBouton" value="Sélectionner" />
									<input type="submit" name="RechercheSuivantBouton" value="->" />
								</form>
								
								
								<!-- Formulaire pour la modification de la base de données -->
								<form method="post" action=".?page=modifierBaseTank">
								<table>
								<?php
									
									//On récupère l'indice du véhicule envoyé:
									$indice = intval(str_replace('gestion','', $indice));
									
									if($indice == 0){
										echo	'<input type="submit" name="AjouterBouton" value="Ajouter" />' ;
									}
									else{
										echo 	'<input type="submit" name="ModifierBouton" value="Modifier" />
													<input type="submit" name="SupprimerBouton" value="Supprimer" />';
									}
									
									
									foreach(listeChampTank($bddWoT, 'tank') as $champ){
									//On trace la liste des éléments à ajouter, modifier, ou, supprimer pour un char.
									
										if($indice >0){
												$valeurDeCharAAfficher = $tanks[$indice]->getParametre($champ->getNomField());
										}
										else{
												$valeurDeCharAAfficher = '';
										}
										
										echo '
										<tr>
											<td><label for="recherche'.$champ->getNomField().'">'.$champ->getNomField().'</label></td>
											<td>'.$champ->getFormulaireHtml('recherche', $valeurDeCharAAfficher).'</td>										
										</tr>';
										//<td><input type="text"  id="recherche'.$champ->getNomField().'" name="recherche'.$champ->getNomField().'" value="'.$valeurDeCharAAfficher.'" /></td>								
									}
									
									//Recherche de la liste des canons du tank :
									$ListeCanonDuTank = new ListeDeCanonParTank($indice , $bddWoT);
									
									//print_r( $ListeCanonDuTank->getListeCanon());
									if(sizeof($ListeCanonDuTank->getListeCanon())>0){
										foreach($ListeCanonDuTank->getListeCanon() as $idCanon=>$NomCanon){
											echo '
											<tr>
												<td><label for="rechercheCanon'.$idCanon.'">Canon n°'.$idCanon.'</label></td>
												<td><label id="rechercheCanon'.$idCanon.'">'.$NomCanon.'</label></td>										
											</tr>';
										}
									}
								?>  
				
										<tr>
											<td><label for="rechercheAjoutCanon">Canon à ajouter</label></td>
											<td><select name="rechercheAjoutCanon">
													<option value="0" selected = "selected">-- Ne pas ajouer de canon --</option>
													<?php
														foreach($Canons as $id=>$Canon){
															echo '<option value="'.$id.'" >'.$Canon.'</option>';
														}
													?>
												</select>
											</td><br />												
										</tr>						
									</table>
								</form>
							</p>
							
						</article>					
				</section>
    </body>
</html>




