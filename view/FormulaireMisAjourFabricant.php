<section class="FormulaireMisAjourFabricant" data-component="FormulaireMisAjourFabricant" data-js-component="Form">

	
	<?php

	if($data["fabricant"]){
		foreach ($data["fabricant"] as $Fabricant) {
			$idCh =  $Fabricant["idFabricant"];
			$fabricant =  $Fabricant["fabricant"];
		}
	}

		
?>




	<form>
		<h1><?=TXT__GESTIONU_GESMMAJFAB?></h1>
		<div class="input-wrapper" data-js-input-wrapper>
			<div class="ligne distribue">
				<label for="idFabricant">ID :</label>
				<input type="text" id="idFabricant" required data-js-param="idFabricant" disabled value=<?php echo '"'.$idCh.'"' ?>>
			</div>


		<div class="input-wrapper" data-js-input-wrapper>
			<div class="ligne distribue">
				<label for="fabricant"><?=TXT__MODELE_MANUFACTURER?></label>
			</div>
			
				<input type="text" id="fabricant" required data-js-param="fabricant" value=<?php echo '"'.$fabricant.'"' ?>>
			
			<small class="error-message" data-js-error-msg></small>
		</div> 


		<button data-js-btnMAJ><?=TXT__BTNFORMSUTMIT?></button>
	</form>
</section>


