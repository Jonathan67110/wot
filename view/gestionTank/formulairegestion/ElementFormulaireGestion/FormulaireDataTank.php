							<!-- Formulaire pour la modification des données d'un char -->
							<form method="post" action=".?page=modifierBaseTank">
							<?php
								//Ajout des boutons d'interface ( à réunir dans un bibliotèque commune ultérieurement):
								include('view/interface/BoutonFormulaireBase.php');
							?>
							<table>
							<?php
								if ($indice > 0)
								{
									//Requête de recherche de l'url pour la nation:
									$req = $bddWoT->prepare('SELECT NomUrl, pays FROM nation WHERE id=?');
									$req -> execute(array($tanks[$indice]->getPays()));
									
									while($tableauReponse = $req->fetch()){
										$urlNation = $tableauReponse['NomUrl'];
									}
									
									//Fermeture de la requête:
									$req->closeCursor();
									
									//Test pour vérifier qu'une url existe pour ce char :
									if ($tanks[$indice]->getRaccourci_url() <> "" && $tanks[$indice]->getRaccourci_url() <> "Pas de paramètre")
									{
									echo '<p>Tankopédia : <a href="http://worldoftanks.eu/encyclopedia/vehicles/'.$urlNation.'/'.$tanks[$indice]->getRaccourci_url().'/" target="_blank">Lien vers la page du '.$tanks[$indice]->getNom().'</a></p>
									<img src ="http://static-ptl-eu.gcdn.co/static/3.27.0.2/encyclopedia/tankopedia/vehicle/'.$urlNation.'-'.$tanks[$indice]->getRaccourci_url().'.png" alt="'.$tanks[$indice]->getNom().'">';
									}
								}
								
								foreach(listeChampTank($bddWoT, 'tank') as $champ){
								//On trace la liste des éléments à ajouter, modifier, ou, supprimer pour un char.
																			if(isset($_POST['EnvoieText']))
											{
												switch($champ->getNomField())
												{
													case 'tier_latin':
														$valeurDeCharAAfficher = $_SESSION['ficheTanktierLatin'];
													break;
													
													case 'tier_chiffre':
														$valeurDeCharAAfficher = conversionLatinToArabe(trim($_SESSION['ficheTanktierLatin']));
													break;
													
													case 'nom':
														$valeurDeCharAAfficher = $_SESSION['ficheTanknomChar'];
													break;
													
													case 'Description':
														$valeurDeCharAAfficher = $_SESSION['ficheTankdescriptionChar'];
													break;
													
													case 'poids_chassis':
														$valeurDeCharAAfficher = $_SESSION['ficheTankpoids'];
													break;
													
													case 'limite_charge':
														$valeurDeCharAAfficher = $_SESSION['ficheTankcharge'];
													break;
													
													case 'vitesse_max':
														$valeurDeCharAAfficher = $_SESSION['ficheTankvitesse'];
													break;
													
													case 'Nombre_pilote':
														$valeurDeCharAAfficher = $_SESSION['ficheTankPilote'];
													break;
													
													case 'Nombre_tireur':
														$valeurDeCharAAfficher = $_SESSION['ficheTankTireur'];
													break;
													
													case 'Nombre_chargeur':
														$valeurDeCharAAfficher = $_SESSION['ficheTankChargeur'];
													break;
													
													case 'Nombre_operateur_radio':
														$valeurDeCharAAfficher = $_SESSION['ficheTankRadio'];
													break;
													
													case 'hp_base':
														$valeurDeCharAAfficher = $_SESSION['ficheTankHP'];
													break;
													
													case 'Blindage_avant':
														$valeurDeCharAAfficher = $_SESSION['ficheTankblindageAvant'];
													break;
													
													case 'Blindage_flanc':
														$valeurDeCharAAfficher = $_SESSION['ficheTankblindageFlanc'];
													break;
													
													case 'Blindage_arriere':
														$valeurDeCharAAfficher = $_SESSION['ficheTankblindageArriere'];
													break;
													
													case 'prix':
														$valeurDeCharAAfficher = $_SESSION['ficheTankprix'];
													break;
													
													case 'type_char':
														$valeurDeCharAAfficher = $_SESSION['ficheTanktextTypeChar'];
													break;

													default:												
														if($indice >0)
														{
															$valeurDeCharAAfficher = $tanks[$indice]->getParametre($champ->getNomField());
														}
														else{
																$valeurDeCharAAfficher = ($champ->getNomField() == 'tier_chiffre') ? 1 : '';
														}
													break;
												}
											}
											else
											{
												if($indice >0){

															$valeurDeCharAAfficher = $tanks[$indice]->getParametre($champ->getNomField());
												}
												else{
														$valeurDeCharAAfficher = ($champ->getNomField() == 'tier_chiffre') ? 1 : '';
												}
											}
									//Affichage normal des éléments :
									echo '
									<tr>
										<td><label for="recherche'.$champ->getNomField().'">'.$champ->getNomField().'</label></td>
										<td>'.$champ->getFormulaireHtml('recherche', $valeurDeCharAAfficher).'</td>										
									</tr>';							
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
												<option value="0" selected = "selected">-- Ne pas ajouter de canon --</option>
												<?php
													foreach($Canons as $id=>$Canon){
														echo '<option value="'.$id.'" >'.$Canon.'</option>';
													}
												?>
											</select>
										</td>											
									</tr>						
								</table>
							<?php
								//Ajout des boutons de modifications de formulaire: 
								include('view/interface/BoutonFormulaireBase.php');
							?>
								
							</form>
