<?php 
	/* Header */
	include_once('view/header.php');
	
	/* Barre de navigation */
	include_once('view/navigation.php');
	
	//Redirection de l'adresse vers phpmyadmin, en fonction de la machine qui héberge l'application:
		if(isset($_SERVER['SERVER_ADDR']) && strstr($_SERVER['SERVER_ADDR'], '192.168.'))
		{
			$phpMyAdminLink = $_SERVER['SERVER_ADDR'];
		}
		else
		{
			$phpMyAdminLink = 'localhost';				
		}
		
		echo '<a href="http://'.$phpMyAdminLink.'/phpmyadmin/#PMAURL-2:db_structure.php?db=wot&table=&server=1&target=&token=c7ff5ec32123e7f060068a5604702730" target ="_blank">Bdd Wot</a>';
	?>
	<a href="http://worldoftanks.eu/encyclopedia/vehicles/" target="_blank">Tankopédia</a>
	<a href="Aide/" target="_blank">Aide</a>
			
        <h1>Gestion des chars WOT</h1>
		
				<section>					
					<h3><!-- nom du char choisi --></h3>
						<article>
							<p>
							<?php include_once('view/gestionTank/formulairegestion/FormulaireGestion.php'); ?>
							</p>
							
						</article>					
				</section>
				
<?php 
	/* footer */
	include_once('view/footer.php');