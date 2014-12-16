<?php
	if(isset($_POST['boutonConnexion']) && isset($_POST['loginConnexion']) && isset($_POST['mdpConnexion']))
	{
		//A modifier plus tard: Vérification d'un mot de passe et d'un login
		if($_POST['loginConnexion'] == 'admin' && $_POST['mdpConnexion'] == 'admin')
		{
			//Lorsqu'on se connecte, on met à true la variable de connection, puis, on redirige immédiatement vers la page de gestion de char:
			$_SESSION['connexion'] = true;
			header('location:.?page=gestionTank');
		}
	}
	elseif(isset($_POST['boutonDeconnexion']))
	{
		$_SESSION['connexion'] = false;	
	}
	
	if(!isset($_SESSION['connexion']) || !$_SESSION['connexion'])
	{
		include_once('view/connexion/connexion.php');
	}
	else
	{	
		//Mettre ici une autre page si la personne est déjà connectée:
		include_once('view/connexion/deconnexion.php');
	}