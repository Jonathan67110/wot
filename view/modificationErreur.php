<?php 
	$titre = 'Echec Modification';
	
	/* Header */
	include_once('view/header.php');
	
	/* Barre de navigation */
	include_once('view/navigation.php');
?>

        <h1>Gestion des chars WOT</h1>
		
			<h2>Choix de la recherche</h2>
				<section>					
					<h3><!-- nom du char choisi --></h3>
						<article>
							<p>
								Erreur de paramètres : <?php echo $messageRetour ?>
								<a href=".?page=gestionTank">Retour</a>
							</p>
							
						</article>					
				</section>
    </body>
</html>