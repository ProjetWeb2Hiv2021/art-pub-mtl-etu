<section class="FormulaireAjoutChassis" data-component="FormulaireAjoutChassis" data-js-component="Form">

	<!-- plusieurs criteres -->
	<form>
		<h1><?=TXT__GESTIONU_AJCHAS?></h1>
		<div class="input-wrapper" data-js-input-wrapper>
			<div class="ligne distribue">
				<label for="chassis"><?=TXT__MODELE_CHASSIS?> </label>
				<input type="text" id="chassis" required data-js-param="chassis">
			</div>
			
			
			<small class="error-message" data-js-error-msg></small>
		</div> 


		<button data-js-btn><?=TXT__BTNFORMSUTMIT?></button>
	</form>
</section>


