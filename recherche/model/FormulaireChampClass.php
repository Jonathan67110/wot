<?php

class FormulaireChamp{

	//les 'FormulaireChamp' sont des objets qui permettent d'associer un formulaire html à un champ d'une table

	private $nomField;//Nom du champ de la table de la base de données
	private $indiceFormulaire;//id du formulaire
	private $typeFormulaire;//Renseigne sur le type de formulaire : textarea, label, select, etc...
	private $labelName;//Nom du label associé
	
	public function __construct($newFieldName, $newType, $newIndiceFormulaire, $bdd){
		//Initialisation des variables de l'instance:
		$this->nomField = $newFieldName;
		$this->typeFormulaire = $newType;
		$this->indiceFormulaire = $newIndiceFormulaire;
	}
	
	/****************/
	/*Fonction Get()*/
	/****************/
	
	public function getNomField(){//Renvoie du nom du tank
	
		return $this->nomField;
		
	}
	
	public function getFormulaireHtml($indice, $value){//Renvoie une mise en forme html d'un champ associé
		
		switch($this->typeFormulaire){
			case 'select':
				$htmlAfficher ='<select name="'.$indice.$this->nomField.'">';
				foreach($this->indiceFormulaire as $cle =>$element){
					if($cle == $value){
						$htmlAfficher = $htmlAfficher.'<option value="'.$cle.'" selected = "selected">'.$element.'</option>';
					}
					else{
						$htmlAfficher = $htmlAfficher.'<option value="'.$cle.'" >'.$element.'</option>';
					}
							
				}
				$htmlAfficher = $htmlAfficher.'</select>';
				
			break;
			
			case 'textarea':
				
				
				$htmlAfficher = '<input type="text"  id="'.$indice.$this->indiceFormulaire.$this->nomField.'" name="'.$indice.$this->indiceFormulaire.$this->nomField.'" value="'.$value.'" />';
				
				 $htmlAfficher = '<textarea rows="7" cols="50"  id="'.$indice.$this->indiceFormulaire.$this->nomField.' " name="'.$indice.$this->indiceFormulaire.$this->nomField.'">'.$value.'</textarea> ';
				
			break;
			
			case 'input_text':
				
				//$htmlAfficher = '<input type="text"  id="'.$indice.$this->indiceFormulaire.$this->nomField.'" name="'.$indice.$this->indiceFormulaire.$this->nomField.'" value="'.$value.'" />';
			
			break;
			
			case 'label':
				$htmlAfficher = '<label id="'.$indice.$this->indiceFormulaire.$this->nomField.'">'.$value.'</label>';
				
			break;
			
			default:
				
				$htmlAfficher = '<input type="text"  id="'.$indice.$this->indiceFormulaire.$this->nomField.'" name="'.$indice.$this->indiceFormulaire.$this->nomField.'" value="'.$value.'" />';
				
			break;
		
		}
		
		return $htmlAfficher;
	}
	
}