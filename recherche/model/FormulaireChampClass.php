<?php

class FormulaireChamp{

	//les 'FormulaireChamp' sont des objets qui permettent d'associer un formulaire html à un champ d'une table

	private $m_nomField;//Nom du champ de la table de la base de données
	private $m_indiceFormulaire;//id du formulaire
	private $m_typeFormulaire;//Renseigne sur le type de formulaire : textarea, label, select, etc...
	
	/* Attribut de script */
	private $m_methodeScript;//Nom du script associé
	private $m_scriptFormulaireChamp;//Nom du script associé
	
	//Variables inutiles pour le moment :
	//private $m_labelName;//Nom du label associé

	public function __construct($newFieldName, $newType, $newIndiceFormulaire, $newMethodeScript, $newScript,  $bdd){
		//Initialisation des variables de l'instance:
		$this->m_nomField = $newFieldName;
		$this->m_typeFormulaire = $newType;
		$this->m_indiceFormulaire = $newIndiceFormulaire;
		$this->m_methodeScript = $newMethodeScript;
		$this->m_scriptFormulaireChamp = $newScript;
	}
	
	/****************/
	/*Fonction Get()*/
	/****************/
	
	public function getNomField(){//Renvoie du nom du tank
	
		return $this->m_nomField;
		
	}
	
	public function getFormulaireHtml($indice, $value){//Renvoie une mise en forme html d'un champ associé
	
		if(!empty($this->m_methodeScript) && !empty($this->m_scriptFormulaireChamp)){
			$script = $this->m_methodeScript.'="'.$this->m_scriptFormulaireChamp.'" ';
		}
		else{
			$script = '';
		}
		switch($this->m_typeFormulaire){
			case 'select':
				$htmlAfficher ='<select name="'.$indice.$this->m_nomField.'" '.$script.'>';
				foreach($this->m_indiceFormulaire as $cle =>$element){
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
				
				$htmlAfficher = '<textarea rows="9" cols="51"  id="'.$indice.$this->m_indiceFormulaire.$this->m_nomField.' " name="'.$indice.$this->m_indiceFormulaire.$this->m_nomField.'"  '.$script.'>'.$value.'</textarea> ';
				
			break;
			
			case 'input_text':
				
				//$htmlAfficher = '<input type="text"  id="'.$indice.$this->m_indiceFormulaire.$this->m_nomField.'" name="'.$indice.$this->m_indiceFormulaire.$this->m_nomField.'" value="'.$value.'" />';
			
			break;
			
			case 'label':
				$htmlAfficher = '<label id="'.$indice.$this->m_indiceFormulaire.$this->m_nomField.'"  '.$script.'>'.$value.'</label>';
				
			break;
			
			default:
				
				$htmlAfficher = '<input type="text"  id="'.$indice.$this->m_indiceFormulaire.$this->m_nomField.'" name="'.$indice.$this->m_indiceFormulaire.$this->m_nomField.'" value="'.$value.'"  '.$script.'/>';
				
			break;
		
		}
		
		return $htmlAfficher;
	}
	
}