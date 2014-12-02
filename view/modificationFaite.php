<!DOCTYPE html>
<html>
    <head>
        <title>Recherche</title>
        <meta charset="utf-8" />
		<link rel="stylesheet" href="style.css" />
    </head>
    <body>
		<?php
			//On insère la navigation dans la future page html :
			include_once('calque/navigation.php');
			
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




