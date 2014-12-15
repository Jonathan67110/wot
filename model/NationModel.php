<?php

include_once('model/NationClass.php');

//Permet la liste des nations dans un tableau:
function listeNation($bdd){
		
	$req = $bdd->prepare('SELECT id FROM nation ORDER BY pays');
	$req -> execute();
	
	while($nation = $req->fetch()){
		$listenation[$nation['id']] = new Nation($nation['id'], $bdd);
	
	}
	$req->closeCursor();
	
	return $listenation;
	
}
