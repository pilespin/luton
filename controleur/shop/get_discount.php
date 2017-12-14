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
<h1 class=" w3-text-gray w3-center">Get Discount</h1><br>


<h4 class=" w3-text-gray w3-center">Parfum Chanel -20%</h4><br>

<img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=Jonathan_Pollard_promo_parfum_chanel_20_pour_cent" />

<!-- <img src="http://www.barcodes4.me/barcode/qr/qr.png?value=Jonathan_Pollard_promo_parfum_chanel_20_pour_cent&size=5&ecclevel=0" /> -->

<?php
$controler['shop_controler'] = ob_get_clean();

include_once('vue/shop/index.php');
