<?php

include_once "modele/shop/index.php";

ob_start();
?>

<h1> Commercant ajouter promotion</h1>

<form action="/action_page.php">
	Promotion: <input type="text" name="fname" placeholder="-20%"><br>
	Article: <input type="text" name="lname" placeholder="Parfum Chanel"><br>
	<input type="submit" value="Submit">
</form>

<br>
<br>

Votre promotion sera immediatement disponible aupres des utilisateur
<br><br><br><br><br>

<?php
$controler['shop_controler'] = ob_get_clean();

include_once('vue/shop/index.php');
