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
								
							</p>	
							<form action = '#' method = 'post'>
								<input type = "text" name = "loginConnexion" value = "" id = "" Placeholder = "Pseudo"><br />
								<input type = "text" name = "mdpConnexion" value = "" id = "" Placeholder = "Mdp"><br />
								<input type ="button" name = "bouton" value = "Sign in"/><br />
							</form>
				</section>
<?php 
	/* footer */
	include_once('view/footer.php');