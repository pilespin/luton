<?php

include_once "modele/game/index.php";

ob_start();
?>

<div class="w3-container w3-teal">
	<br>
	<br>
	<br>
	<h1>Luton Games Area</h1>
</div>

<br>
<br>
<br>

<div class="w3-container ">

		<a class="w3-btn w3-purple w3-xlarge" style="min-width:250px;" href="index.php?r=get_discount">Game</a>
		<a class="w3-btn w3-purple w3-xlarge" style="min-width:250px;" href="index.php?r=get_discount">Game</a>


		<br>
		<br>

		<a class="w3-btn w3-purple w3-xlarge" style="min-width:250px;"href="index.php?r=get_discount">Game</a>
		<a class="w3-btn w3-purple w3-xlarge" style="min-width:250px;"href="index.php?r=get_discount">Game</a>
		<br>
		<br>
</div>

<?php
$controler['game_controler'] = ob_get_clean();

include_once('vue/game/index.php');
