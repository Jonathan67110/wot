<?php 
	$titre = 'Connexion';

	/* Header */
	include_once('view/header.php');
	
	/* Barre de navigation */
	include_once('view/navigation.php');
?>
        <h1>Connexion</h1>
				<section>
					<p>
						Déconnectez-vous par sécurité!
					</p>	
					<form action = '.?page=connexion' method = 'post'>
						<input type ="submit" name = "boutonDeconnexion" id = "boutonDeconnexion" value = "Sign out"/><br />
					</form>
				</section>
<?php 
	/* footer */
	include_once('view/footer.php');