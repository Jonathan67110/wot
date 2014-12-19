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
					<h3>Fait </h3>
						<article>
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
					<h3>Reste à faire au <?php echo date('d.m.Y');?></h3>
						<article>
							<p>
								<ul>	
									<li>Corriger l'affichage du tier chiffre qui est en latin, lors de l'envoi du copier-coller</li>
									<li>Corriger la disparition du réglage "type de char"</li>
									<li>Mettre à jour les canons et les membres d'équipage des chars français</li>
									<li>Idem légers britannique</li>
									<li>Ajouter le n° de version de la version du char affiché, voir, la date de première apparition</li>
									<li>Ajouter un élément pour ne modifier qu'un élément sur un char au lieu de tout le char : permettra de revenir à cet élément dans la page html (#idelement) </li>
									<li>Faire qu'on puisse supprimer un canon / élément directement dans la page de gestion d'un char</li>
									<li>Faire que le tier est saisie automatique (clé étrangère qui redirige vers les tiers) => on n'affiche plus du tout de tier chiffre dans la gestion des tanks. Il faudra également veiller à supprimer les fonctions de conversion, superflues(chasse-les, elles seront éparpillées, mouhahahaha)</li>
									<li>Faire une section canon dans un sous-menu => voir le menu de navigation d'Alain : voir à faire quelque chose de réutilisable pour chaque élément</li>
									<li>Mettre à jour les canons japonais ( tant que c'est frais)</li>
									<li>N'afficher la page recherche wot que lorsqu'on clique sur recherche. Mettre sur la page d'accueil les essages du site = la to do list par exemple + Les évolutions.</li>
									<li>Pour les liaisons Tank-Canon, ajouter des paramètres qui inclueront les obus, la dépreciation, la vitesse de visée, ... qui pourraient dépendre du char</li>
									<li>Améliorer la connexion</li></ul>
							</p>
						</article>						
				</section>
				
<?php 
	/* footer */
	include_once('view/footer.php');