<?php
ob_start();
?>

<link href=vue/shop/style.css rel=stylesheet type=text/css />

<?= $controler['shop_controler'] ?>

<?php
$content['shop_vue'] = ob_get_clean();
