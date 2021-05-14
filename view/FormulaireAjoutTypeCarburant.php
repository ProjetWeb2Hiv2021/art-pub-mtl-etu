<section class="FormulaireAjoutTypeCarburant" data-component="FormulaireAjoutTypeCarburant" data-js-component="Form">

	<!-- plusieurs criteres -->
	<form>
		<h1><?=TXT__GESTIONU_AJTC?></h1>
		<div class="input-wrapper" data-js-input-wrapper>
			<div class="ligne distribue">
				<label for="typecarburant"><?=TXT__MODELE_TC?></label>
				<input type="text" id="typeCarburant" required data-js-param="typeCarburant">
			</div>
			
			
			<small class="error-message" data-js-error-msg></small>
		</div> 


		<button data-js-btn><?=TXT__BTNFORMSUTMIT?></button>
	</form>
</section>


