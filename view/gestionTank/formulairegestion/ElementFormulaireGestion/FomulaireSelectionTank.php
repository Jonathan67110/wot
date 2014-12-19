							<form method="post" action=".?page=gestionTank">
								<!-- Liste des différentes nations existantes -->
								<select name="nationGestionTank">
									<option value="0" >Toutes les nations</option>
									<?php										
										foreach($nations as $nation){
											//On initialise la variable indice qu'on utilisera ultérieurement:
											if($nation->getId() == $indiceNation){
												$indice = isset($_POST['gestionTank'])?$_POST['gestionTank'] : 0 ;
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
									<option value="0" <?php if($typeDeCharSelection == 0){?> Selected = "selected" <?php }; ?>>Tous types de char</option>
									<option value="1" <?php if($typeDeCharSelection == 1){?> Selected = "selected" <?php }; ?>>Char léger</option>
									<option value="2" <?php if($typeDeCharSelection == 2){?> Selected = "selected" <?php }; ?>>Char moyen</option>
									<option value="3" <?php if($typeDeCharSelection == 3){?> Selected = "selected" <?php }; ?>>Char lourd</option>
									<option value="4" <?php if($typeDeCharSelection == 4){?> Selected = "selected" <?php }; ?>>Chasseur de char</option>
									<option value="5" <?php if($typeDeCharSelection == 5){?> Selected = "selected" <?php }; ?>>Artillerie</option>
								</select>
								
								<!-- Liste des différents tier -->
								<select name="tierGestionTank">
								
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
											
											if(($indiceNation == 0 || $indiceNation == $tank->getPays()) && ($tierSelection == 0 || $tierSelection == $tank->getTier_chiffre()) && ($typeDeCharSelection == 0 || $typeDeCharSelection == $tank->getType_char())){
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
							