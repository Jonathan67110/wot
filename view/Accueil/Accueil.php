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
					<h3>Message du jour</h3>
						<article>
							<p>
								<ul>
									<li>Remettre en forme, avec du javascript, les copier-coller dans la gestion des tanks :
										<ul>
											<li>Le poids et la charge admise : convertir le séparateur dans le format chiffre de la bdd mysql</li>
											<li>Ne conserver que les chiffres quand on copie colle un poids/chassis ( vérifier csi c'est déjà le cas, sinon, l'implémenter)</li>
										</ul>
									</li>	
									<li>Faire que le tier est saisie automatique (clé étrangère qui redirige vers les tiers) => on n'affiche plus du tout de tier chiffre dans la gestion des tanks</li>
									<li>Mettre un label à la place d'un input sur le textbox du nombre d'équipage</li>
									<li>Faire une section canon dans un sous-menu => voir le menu de navigation d'Alain</li>
									<li>Mettre à jour les canons japonais ( tant que c'est frais)</li>
									<li>N'afficher la page recherche wot que lorsqu'on clique sur recherche. Mettre sur la page d'accueil les essages du site = la to do list par exemple + Les évolutions.</li>
								</ul>
							</p>
						</article>					
				</section>
    </body>
</html>