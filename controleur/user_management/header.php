<?php


ob_start();

?>

<div class="upbar w3-bar-item">
	<span style="font-size:26px;cursor:pointer;" class="w3-button w3-mobile" onclick="openNav()">&#9776;</span>

	<?php

	if (isset($_SESSION['login']) && $_SESSION['login'] != "")
	{
		?>
		<a href="index.php" class="w3-button w3-mobile"><?= _("Hello")?> <?= $_SESSION['login']?></a>
		<a href="index.php?r=add_promotion" class="w3-button w3-mobile">Add Promotion</a>
		<a href="index.php?r=convert_qr" class="w3-button w3-mobile">Scan Promotion</a>
		<a href="index.php?r=get_discount" class="w3-button w3-mobile">Get Discount</a>
		<a href="index.php?r=game" class="w3-button w3-mobile">Game</a>
		<button onclick="document.getElementById('id04').style.display='block'" class="w3-button w3-mobile">Settings</button>
		<a href="index.php?r=logout" class="w3-button w3-mobile">Log out</a>
		<!-- <a href="index.php?r=utilisateur" class="w3-button w3-mobile">Utilisateur</a> -->
		<?php

	}
	else {
		?>
		<a href="index.php" class="w3-button w3-mobile">Home</a>

		<button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-mobile">Login</button>
		<button onclick="document.getElementById('id02').style.display='block'" class="w3-button w3-mobile">Register</button>

		<?php
	}

	?>


</div>

<?php
$controler['user_management_controler'] = ob_get_clean();