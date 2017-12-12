    
<form class="w3-container" action="index.php?r=login_validate" method='post'>
	<div class="w3-section">
		<input class="w3-input w3-border w3-margin-bottom" type="text" name="login" placeholder=<?= "\""._("Login")."\"" ?> required autofocus>
		<input class="w3-input w3-border" type="password" name="pass" placeholder=<?= "\""._("Password")."\"" ?> required>
		<button class="w3-button w3-block w3-green w3-section w3-padding" type="submit">Login</button>
	</div>
</form>

<div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
	<span class="w3-right w3-hide-small">
		<button onclick="document.getElementById('id03').style.display='block'" class="w3-button w3-mobile">Forgot password?</button>
	</span>
</div>
