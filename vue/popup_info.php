<?php if (isset($content['error']))
{
	?>
	<div class="w3-panel w3-display-container w3-red">
		<span onclick="this.parentElement.style.display='none'"
		class="w3-button w3-display-topright">X</span>
		<p><?= $content['error']?></p>
	</div>
	<?php 
}
?>

<?php if (isset($content['notif']))
{
	?>
	<div class="w3-panel w3-display-container w3-green">
		<span onclick="this.parentElement.style.display='none'"
		class="w3-button w3-display-topright">X</span>
		<p><?= $content['notif']?></p>
	</div>
	<?php 
}
?>

<?php if (isset($content['warn']))
{
	?>
	<div class="w3-panel w3-display-container w3-amber">
		<span onclick="this.parentElement.style.display='none'"
		class="w3-button w3-display-topright">X</span>
		<p><?= $content['warn']?></p>
	</div>
	<?php 
}
?>
