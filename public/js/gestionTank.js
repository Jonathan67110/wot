function miseAJourTierChiffre(tier)
{
	switch(tier){
		case 'I':
			tier = 1;
		break;
		
		case 'II':
			tier = 2;
		
		break;
		
		case 'III':
			tier = 3;
		
		break;
		
		case 'IV':
			tier = 4;
		
		break;
		
		case 'V':
			tier = 5;
		
		break;
		
		case 'VI':
			tier = 6;
		
		break;
		
		case 'VII':
			tier = 7;
		
		break;
		
		case 'VIII':
			tier = 8;
		
		break;
		
		case 'IX':
			tier = 9;
		
		break;
		
		case 'X':
			tier = 10;
		
		break;
		
		default:
			tier = 0;
		
		break;
	}
	
	var texteSortie = document.getElementById("recherchetier_chiffre");
	texteSortie.innerHTML = tier;
}

function sommeEquipage()
{
	var nombreChargeur = stringToPositivInteger(document.getElementById("rechercheNombre_chargeur").value);
	document.getElementById("rechercheNombre_chargeur").value = nombreChargeur;
	
	var nombreTireur = stringToPositivInteger(document.getElementById("rechercheNombre_tireur").value);
	document.getElementById("rechercheNombre_tireur").value = nombreTireur;
	
	var nombrePilote = stringToPositivInteger(document.getElementById("rechercheNombre_pilote").value);
	document.getElementById("rechercheNombre_pilote").value = nombrePilote;
	
	var nombreOperateurRadio = stringToPositivInteger(document.getElementById("rechercheNombre_operateur_radio").value);
	document.getElementById("rechercheNombre_operateur_radio").value = nombreOperateurRadio;
	
	var nombreEquipage = document.getElementById("rechercheNombre_equipage");
	
	nombreEquipage.innerHTML  = nombreChargeur + nombreTireur + nombrePilote + nombreOperateurRadio + 1;
}

/* Convertit une chaîne de caractères en nombre entier positif ou nul */
function stringToPositivInteger(number)
{
	number = isNaN(parseInt(number)) ? 0 : Math.abs(parseInt(number));
	
	return number;
}

/* Fonction permettant de supprimer automatiquement des blancs dans une chaîne de caractères  */
function suppressionBlanc(idBalise)
{
	document.getElementById(idBalise).value = document.getElementById(idBalise).value.replace(/ /g, "");
	
}

/* Fonction pour remplacer les ',' par des '.' */
function remplacementVirguleParPoint(idBalise)
{
	document.getElementById(idBalise).value = document.getElementById(idBalise).value.replace(/,/g, ".");
	
}






















