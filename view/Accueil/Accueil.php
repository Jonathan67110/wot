<?php 
	$titre = 'Accueil';

	/* Header */
	include_once('view/header.php');
	
	/* Barre de navigation */
	include_once('view/navigation.php');
?>
        <h1>Accueil</h1>
		
			<h2>Choix de la recherche</h2>
				<section>						
					<h3>Reste à faire au <?php echo date('d.m.Y');?></h3>	
						<p>
						<?php 
							$remarquesTotales = 20;
							$remarqueEnCours = 14;
						?>
								<ul>
									<li><?php echo $remarquesTotales;?> remarques au total</li>
									<li><?php echo $remarqueEnCours;?> remarques en cours</li>
									<li><?php echo $remarquesTotales - $remarqueEnCours;?> remarques traités</li>
								</ul>
						</p>	
						<h4>Important et urgent</h4>
						<article>	
							<p>
								<ul>
									<li>6) Ajouter le n° de version de la version du char affiché, voir, la date de première apparition</li>
									<li>8) Faire qu'on puisse supprimer un canon / élément directement dans la page de gestion d'un char</li>
									<li>15) Eviter l'écrasement des données d'un char par un autre, en partant de son nom : si nom pas identique, demander confirmation</li>
									<li>16) Traiter les équipages dans le copier-coller de données</li>
									<li>20) Ajouter les canons du SARL 42</li>
								</ul>
							</p>
						</article>						
						<h4>Important et Non-urgent</h4>
						<article>	
							<p>
								<ul>
									<li>4) Mettre à jour les canons et les membres d'équipage des chars français</li>
									<li>5) Mettre à jour les canons et les membres d'équipage des chars britanniques</li>
									<li>9) Faire que le tier est saisie automatiquement (clé étrangère qui redirige vers les tiers) => on n'affiche plus du tout de tier chiffre dans la gestion des tanks. Il faudra également veiller à supprimer les fonctions de conversion, superflues(chasse-les, elles seront éparpillées, mouhahahaha)</li>
									<li>10) Faire une section canon dans un sous-menu => voir le menu de navigation d'Alain : voir à faire quelque chose de réutilisable pour chaque élément</li>
									<li>11) Mettre à jour les canons japonais ( tant que c'est frais)</li>
									<li></li>
								</ul>
							</p>
						</article>					
						<h4>Non-Important et urgent</h4>
						<article>	
							<p>
								<ul>
									<li></li>
								</ul>
							</p>
						</article>					
						<h4>Non-Important et Non-urgent</h4>
						<article>	
							<p>
								<ul>	
									<li>7) Ajouter un élément pour ne modifier qu'un élément sur un char au lieu de tout le char : permettra de revenir à cet élément dans la page html (#idelement) </li>
									<li>14) Améliorer la connexion</li>
									<li>13) Pour les liaisons Tank-Canon, ajouter des paramètres qui inclueront les obus, la dépreciation, la vitesse de visée, ... qui pourraient dépendre du char</li>
									<li>17) Ajouter dans tankliaison un paramètre donnant l'id du canon prédécesseur. Voir à ajouter un Id tank-canon pour cela, histoire </li>
									<li>18) Ajouter une vérification quand une liaison est cassé par la suppression d'un canon</li>
								</ul>
							</p>
						</article>			
					<h3>Fait </h3>
						<article>
							<p>				
								<h4>Fait le 29/04/2015: </h4>
								<ul>			
									<li>-) Sauvegarde de l'image du char, et, affichage de l'image du char depuis le site wot</li>
								</ul>
							</p>
							<p>				
								<h4>Fait le 12/04/2015: </h4>
								<ul>			
									<li>2) Corriger l'affichage du tier chiffre qui est en latin, lors de l'envoi du copier-coller</li>
								</ul>
							</p>
							<p>				
								<h4>Fait le 19/12/2014: </h4>
								<ul>	
									<li>b-1 Corriger la disparition du réglage "type de char" : Corrigé</li>
								</ul>
							</p>
							<p>				
								<h4>Fait le 17/12/2014: </h4>
								<ul>	
									<li>Ajout d'un textarea pour copier-coller des infos</li>
								</ul>
							</p>
							<p>				
								<h4>Fait le 16/12/2014: </h4>
								<ul>	
									<li>Amélioration de la page gestion de tank: ajout de js pour remettre en forme, de mofi du phpp, etc...</li>
									<li>Ajout d'un pied de page</li>
									<li>Ajout de la page de connection</li>
								</ul>
							</p>
						</article>			
				</section>
<?php 
	/* footer */
	include_once('view/footer.php');