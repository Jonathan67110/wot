<?php

/* Cette bibliothèque contiendra toutes les fonctions essentielles au traitement des tier, à leur conversion, etc...*/

function TierLatinToTierNumber($TierLatin){//Convertit un tier donné en chiffre latin, en tier donné en chiffre arabe
	
	switch($TierLatin){
		case 'I':
			$TierNumber = 1;
		break;
			
		case 'II':	
			$TierNumber = 2;
		break;
		
		case 'III':
			$TierNumber = 3;
		break;
		
		case 'IV':
			$TierNumber = 4;
		break;
		
		case 'V':
			$TierNumber = 5;
		break;
		
		case 'VI':
			$TierNumber = 6;
		break;
		
		case 'VII':
			$TierNumber = 7;
		break;
		
		case 'VIII':
			$TierNumber = 8;
		break;
		
		case 'IX':
			$TierNumber = 9;
		break;
		
		case 'X':
			$TierNumber = 10;
		break;
		
		default:
			$TierNumber = 1;//Initialisation par défaut
		break;
	}
	return $TierNumber;
}

function TierNumberToTierLatin($TierNumber){
	
	switch($TierNumber){
		case 1:
			$TierLatin = 'I';
		break;
			
		case 2:	
			$TierLatin = 'II';
		break;
		
		case 3:
			$TierLatin = 'III';
		break;
		
		case 4:
			$TierLatin = 'IV';
		break;
		
		case 5:
			$TierLatin = 'V';
		break;
		
		case 6:
			$TierLatin = 'VI';
		break;
		
		case 7:
			$TierLatin = 'VII';
		break;
		
		case 8:
			$TierLatin = 'VIII';
		break;
		
		case 9:
			$TierLatin = 'IX';
		break;
		
		case 10:
			$TierLatin = 'X';
		break;
		
		default:
			$TierLatin = 'I';//Initialisation par défaut
		break;
	}
	return $TierLatin;
}