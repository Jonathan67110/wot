<?php 
	$titre = 'Recherche';

	/* Header */
	include_once('view/header.php');
	
	/* Barre de navigation */
	include_once('view/navigation.php');
?>
        <h1>Recherche WOT</h1>
		
			<h2>Choix de la recherche</h2>
				<section>				
					<p>Sélectionnez la recherche à effectuer</p>
					<form method="post" action="">
					
					
					
					</form>
					
					<h3><!-- nom du char choisi --></h3>
						<article>
							
							<p>
								<form method="post" action=".#ResultatRequete">
									<!-- Données du char -->
									<select name="choixTank">
										<?php
											foreach($tanks as $tank){
												if($tankADetailler != 0 && $tankADetailler == $tank->getId()){
													echo '<option value="'.$tank->getId().'" selected = "selected">'.$tank->getNom().'</option>';
												}
												else{
													echo '<option value="'.$tank->getId().'" >'.$tank->getNom().'</option>';
												}
											}
										?>									
									</select><br />
									<input type="submit" name="RechercheBouton" value="Rechercher" />
								</form>
							</p>
							
						</article>					
				</section>
		
			<h2 id="ResultatRequete">Données recherchées:</h2>
<?php 
	/* Inclut la partie "données recherchées" */
	include_once('view/recherche/FonctionTank/fonctionTankRecherche.php') ;
	
	/* footer */
	include_once('view/footer.php');