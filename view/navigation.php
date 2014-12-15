		<nav>
			<a href=".">Accueil</a>
			<a href=".?page=rechercheWoT">Recherche</a>
			<a href=".?page=gestionTank">Gestion</a>
			<a href=".?page=connexion">Connexion</a>
			<?php
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
			
		</nav>