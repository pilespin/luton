<?php
ob_start();
?>

<link href=vue/game/style.css rel=stylesheet type=text/css />

<?= $controler['game_controler'] ?>

<?php
$content['game_vue'] = ob_get_clean();
