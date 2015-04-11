<?php
		//Recherche du pays du char
		$req = $bddWoT->prepare('SELECT NomUrl, pays FROM nation WHERE id=?');
		$req -> execute(array($tanks[$tankADetailler]->getPays()));
		
		while($tableauReponse = $req->fetch()){
			$urlNation = $tableauReponse['NomUrl'];
			$Nation = $tableauReponse['pays'];
		}

		//Fermeture de la requête:
		$req->closeCursor();
	echo '
			<section>	
					<h3>Détail du char : </h3>	
						<h4>'.$tanks[$tankADetailler]->getNom().'</h4>
						<article id="infoGeneraleRecherche">
							<h5>Informations générales</h5>';
							
							if ($tanks[$tankADetailler]->getRaccourci_url() <> "")
							{
	echo '
								<p>Tankopédia : <a href="http://worldoftanks.eu/encyclopedia/vehicles/'.$urlNation.'/'.$tanks[$tankADetailler]->getRaccourci_url().'/" target="_blank">Lien vers la page du '.$tanks[$tankADetailler]->getNom().'</a></p>';
							}
	echo '
							<p>Accession du char  : Char de type '.$tanks[$tankADetailler]->getPremium().' accessible à partir de '.$tanks[$tankADetailler]->getPrix().' '.$tanks[$tankADetailler]->getType_credit().'</p>
							<p>Point de vie de base (sans tourelle) : '.$tanks[$tankADetailler]->getHp_base().' hp</p>
							<p>Catégorie de char : '.$tanks[$tankADetailler]->getType_char().'</p>
							<p>Nationalité : '.$Nation.'</p>
							<p>Tier : '.$tanks[$tankADetailler]->getTier_latin().'</p>
						</article>
						
						<article id="infoEquipageRecherche">
							<h5>Informations sur l\'équipage</h5>
							<p>Nombre d\'équipage : '.$tanks[$tankADetailler]->getNombre_equipage().'</p>
							<p>Nombre de pilote : '.$tanks[$tankADetailler]->getNombre_pilote().'</p>
							<p>Nombre de tireur : '.$tanks[$tankADetailler]->getNombre_tireur().'</p>
							<p>Nombre de chargeur : '.$tanks[$tankADetailler]->getNombre_chargeur().'</p>
							<p>Nombre d\'opérateur radio : '.$tanks[$tankADetailler]->getNombre_operateur_radio().'</p>
						</article>
						
						<article id="infoTechniqueRecherche">
							<h5>Informations techniques</h5>
							<p>Blindage avant : '.$tanks[$tankADetailler]->getBlindage_avant().'</p>
							<p>Blindage flanc : '.$tanks[$tankADetailler]->getBlindage_flanc().'</p>
							<p>Blindage arrière :'.$tanks[$tankADetailler]->getBlindage_arriere().'</p>			
							<p>Poids du chassis : '.$tanks[$tankADetailler]->getPoids_chassis().'</p>		
							<p>Limite de charge : '.$tanks[$tankADetailler]->getLimite_charge().'</p>	
							<p>Vitesse : '.$tanks[$tankADetailler]->getVitesse_max().'</p>
						</article>
			
			</section>
			
		</article>';