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
	texteSortie.value = tier;
}