<section class="FormulaireMisAjourTypeCarburant" data-component="FormulaireMisAjourTypeCarburant" data-js-component="Form">
	
	<?php

	if($data["typeCarburant"]){
		foreach ($data["typeCarburant"] as $TypeCarburant) {
			$idType =  $TypeCarburant["idTypeCarburant"];
			$type =  $TypeCarburant["typeCarburantfr"];
		}
	}

		
?>




	<form>
		<h1><?=TXT__GESTIONU_GESMMAJTC?></h1>
		<div class="input-wrapper" data-js-input-wrapper>
			<div class="ligne distribue">
				<label for="idTypeCarburant">ID :</label>
				<input type="text" id="idTypeCarburant" required data-js-param="idTypeCarburant" disabled value=<?php echo '"'.$idType.'"' ?>>
			</div>


		<div class="input-wrapper" data-js-input-wrapper>
			<div class="ligne distribue">
				<label for="typeCarburant"><?=TXT__MODELE_TC?></label>
				<input type="text" id="typeCarburant" required data-js-param="typeCarburant" value=<?php echo '"'.$type.'"' ?>>
			</div>
			
			
			<small class="error-message" data-js-error-msg></small>
		</div> 


		<button data-js-btnMAJ><?=TXT__BTNFORMSUTMIT?></button>
	</form>
</section>


