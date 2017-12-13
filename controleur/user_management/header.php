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
		<button onclick="document.getElementById('id04').style.display='block'" class="w3-button w3-mobile">Settings</button>
		<a href="index.php?r=logout" class="w3-button w3-mobile">Log out</a>
		<a href="index.php?r=logout" class="w3-button w3-mobile">Add Promotion</a>
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