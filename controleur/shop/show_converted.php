<?php

include_once "modele/shop/index.php";

///////////////////////////////////////////////////////
if (!isset($_SESSION['login'])) {
	echo "<meta http-equiv='refresh' content='0; url=index.php' />";
	return;
}
///////////////////////////////////////////////////////

$get = ft_protect_post($_GET);

ob_start();
?>

<br>
<h1 class=" w3-text-gray w3-center">Scan to apply promotion on article</h1><br>
<h4 class=" w3-text-gray w3-center">Promotion for: <?= $get['name'] ?></h4><br>

<img src="http://www.barcodes4.me/barcode/c39/Kinder20pourcent.png" />

<br><br><br>

<?php
$controler['shop_controler'] = ob_get_clean();

include_once('vue/shop/index.php');
