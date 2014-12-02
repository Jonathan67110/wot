							<!-- Formulaire pour la modification des données d'un char -->
							<form method="post" action=".?page=modifierBaseTank">
							<?php
								//Ajout des boutons d'interface ( à réunir dans un bibliotèque commune ultérieurement):
								include('view/interface/BoutonFormulaireBase.php');
							?>
							<table>
							<?php
								
								
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
										</td>											
									</tr>						
								</table>
							<?php
								//Ajout des boutons de modifications de formulaire: 
								include('view/interface/BoutonFormulaireBase.php');
							?>
								
							</form>



