    
<form class="w3-container" action="index.php?r=changepass" method='post'>
	<div class="w3-section">
		
		<input class="w3-input w3-border w3-margin-bottom" type="password" name="oldpass" placeholder=<?= "\""._("Old Password")."\"" ?> required autofocus>
		<input class="w3-input w3-border w3-margin-bottom" type="password" name="pass" placeholder=<?= "\""._("New Password")."\"" ?> required>
		<input class="w3-input w3-border w3-margin-bottom" type="password" name="pass2" placeholder=<?= "\""._("Repeat Password")."\"" ?> required>
		
		<button class="w3-button w3-block w3-green w3-section w3-padding" type="submit">Register</button>

	</div>
</form>
