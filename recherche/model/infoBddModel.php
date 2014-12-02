<?php

function nombreTotalTank($bdd){
	//On requête la base 
	$req = $bdd->prepare('SELECT MAX(id) AS nombreTankTotal FROM tank');
	$req -> execute();
	
	$res = $req->fetch();
	
	return $res['nombreTankTotal'];
}



function indiceMaxTank($bdd){
	//On requête la base 
	$req = $bdd->prepare('SELECT Max(id) AS nombreTankTotal FROM tank');
	$req -> execute();
	
	$res = $req->fetch();
	
	return $res['nombreTankTotal'];
}