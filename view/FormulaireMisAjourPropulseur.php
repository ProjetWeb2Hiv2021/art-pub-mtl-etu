<section class="FormulaireMisAjourPropulseur" data-component="FormulaireMisAjourMotoPropulseur" data-js-component="Form">

	<!-- plusieurs criteres -->
	
	<?php

	if($data["groupeMotopropulseur"]){
		foreach ($data["groupeMotopropulseur"] as $Motopropulseur) {
			$idMoto =  $Motopropulseur["idGroupeMotopropulseur"];
			$groupeMoto =  $Motopropulseur["groupeMotopropulseur"];
		}
	}

		
?>




	<form>
		<h1><?=TXT__GESTIONU_GESMMAJGMP?></h1>
		<div class="input-wrapper" data-js-input-wrapper>
			<div class="ligne distribue">
				<label for="idGroupeMoto">ID :</label>
				<input type="text" id="idGroupeMoto" required data-js-param="idGroupeMoto" disabled value=<?php echo '"'.$idMoto.'"' ?>>
			</div>


		<div class="input-wrapper" data-js-input-wrapper>
			<div class="ligne distribue">
				<label for="groupeMoto"><?=TXT__MODELE_GMP?></label>
				<input type="text" id="groupeMotopropulseur" required data-js-param="groupeMotopropulseur" value=<?php echo '"'.$groupeMoto.'"' ?>>
			</div>
			
			
			<small class="error-message" data-js-error-msg></small>
		</div> 


		<button data-js-btnMAJ><?=TXT__BTNFORMSUTMIT?></button>
	</form>
</section>


