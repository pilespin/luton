<?php

include_once "modele/shop/index.php";

///////////////////////////////////////////////////////
if (!isset($_SESSION['login'])) {
	echo "<meta http-equiv='refresh' content='0; url=index.php' />";
	return;
}
///////////////////////////////////////////////////////

ob_start();
?>

<br>
<h1 class=" w3-text-gray w3-center">Add promotion</h1><br>
<br>
<div class="w3-content w3-white w3-card" style="max-width:500px;">
	<div class="w3-center">

		<form class="w3-container" action="index.php?r=addpromo_validate" method='post'>
			<br>

			<label class="w3-text-blue"><b>Promotion</b></label>
			<input class="w3-input w3-border" name="promotion" type="text" placeholder="ex. -20%">
			<br>

			<label class="w3-text-blue"><b>Article</b></label>
			<input class="w3-input w3-border" name="article" type="text" placeholder="ex. Channel n°5">
			<br>

			<label class="w3-text-blue"><b>Minimal Age</b></label>
			<input class="w3-input w3-border" name="agemin" type="number" placeholder="ex. 18">
			<br>

			<label class="w3-text-blue"><b>Maximal Age</b></label>
			<input class="w3-input w3-border" name="agemax" type="number" placeholder="ex. 35">
			<br>

			<label class="w3-text-blue"><b>Prefered Nationality</b></label>
			<select class="w3-select" name="nationality">
				<option value="undetermined" >Undetermined</option>
				<option value="english">English</option>
				<option value="french">French</option>
				<option value="swedish">Swedish</option>
			</select>
			<br>
			<br>

			<input class="w3-radio" type="radio" id="contactChoice1"
			name="sex" value="male">
			<label for="contactChoice1">Male</label>

			<input class="w3-radio" type="radio" id="contactChoice1"
			name="sex" value="female">
			<label for="contactChoice1">Female</label>

			<input class="w3-radio" type="radio" id="contactChoice1"
			name="sex" value="indifferent">
			<label for="contactChoice1">Indifferent
			</label>

			<br>
			<br>

			<button class="w3-btn w3-blue">Add Promotion</button>
			<br>
			<br>

		</form>

	</div>
</div>

<br>
<h4>Warning your promotion will be immediatly available for users</h4>

<br>
<br>

<!-- <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=Eric_Dupond_promo_parfum_20_pour_cent" /> -->

<?php
$controler['shop_controler'] = ob_get_clean();

include_once('vue/shop/index.php');
