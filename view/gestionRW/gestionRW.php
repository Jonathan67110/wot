<?php 
/****************************************************************************/
/************* feuille de gestion des évolution *****************************/
/****************************************************************************/
	/* Header */
	include_once('view/header.php');
	
	/* Barre de navigation */
	include_once('view/navigation.php');
?>		
	<h1>Remarques et évolution futures</h1>
	
			<section>					
				<h3><!-- Iutile a priori --></h3>
					<article>
						<p>
						<?php include_once('view/gestionTank/formulairegestion/FormulaireGestion.php'); ?>
						</p>
						<form action ="#" method ="post">
							<textarea rows="20" cols="50" name ="textWoT"><?php 
							if(!empty($text)) echo $text; 
							?></textarea><br />
							<input type="submit" name = "EnvoieText" value ="Envoyer les infos">
						</form>							
					</article>					
			</section>
			
<?php 
	/* footer */
	include_once('view/footer.php');