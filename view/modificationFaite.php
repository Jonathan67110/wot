<?php 
	$titre = 'Modification réussie';

	/* Header */
	include_once('view/header.php');
	
	/* Barre de navigation */
	include_once('view/navigation.php');
?>
        <h1>Gestion des chars WOT</h1>
		
				<section>
						<article>
							<p>
								Information sur la requête:<br />
								<?php echo $messageRetour ?><br />
								<a href=".?page=gestionTank">Retour</a>
								
							</p>
							
						</article>					
				</section>
    </body>
</html>




