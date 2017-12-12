<?php
ob_start();
?>

<link href=vue/sidebar/style.css rel=stylesheet type=text/css />

<?= $controler['sidebar_controler'] ?>

<?php
$content['sidebar_vue'] = ob_get_clean();
