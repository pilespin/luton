<?php

include_once "modele/shop/index.php";
include_once "modele/user_management/lib/lib.php";

$login = get_login();
ob_start();
?>

<br>
<h1 class=" w3-text-gray w3-center">Welcome <?= $login ?></h1><br>
<br>
<?php
if (ifset($_SESSION['login'])) {
	?>

	<div class="w3-content w3-white w3-card" style="max-width:500px;">
		<br>

		<a class="w3-btn w3-blue w3-xlarge" style="min-width:250px;" href="index.php?r=add_promotion">Add Promotion</a>


		<br>
		<br>

		<a class="w3-btn w3-blue w3-xlarge" style="min-width:250px;"href="index.php?r=convert_qr">Scan Promotion</a>
		<br>
		<br>
		<?php
	}
	else
	{
		?>
		<h4 class=" w3-text-gray w3-center">You need to be logged for manage your promotions</h4><br>
		<?php
	}
	?>

</div>
<?php
$controler['shop_controler'] = ob_get_clean();

include_once('vue/shop/index.php');
