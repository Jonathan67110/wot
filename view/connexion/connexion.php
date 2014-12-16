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
						Connectez-vous pour accéder à la gestion des chars!
					</p>	
					<form action = '.?page=connexion' method = 'post'>
						<input type = "text" name = "loginConnexion" value = "" id = "loginConnexion" Placeholder = "Pseudo" /><br />
						<input type = "password" name = "mdpConnexion" value = "" id = "mdpConnexion" Placeholder = "Mdp"/><br />
						<input type ="submit" name = "boutonConnexion" id = "boutonConnexion" value = "Sign in"/><br />
					</form>
				</section>
<?php 
	/* footer */
	include_once('view/footer.php');