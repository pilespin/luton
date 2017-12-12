<?php

include_once "modele/sidebar/index.php";

ob_start();

// include_once "modele/user_management/lib/lib.php";

?>

<div id="mySidenav" class="sidenav">
	<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
	<a href="#">Category</a>

		<a href="#">One</a>
		<a href="#">Two</a>
		<a href="#">Three</a>


</div>

<!-- <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span> -->

<script>
	function openNav() {
		document.getElementById("mySidenav").style.width = "250px";
		document.getElementById("main").style.marginLeft = "234px";
	}

	function closeNav() {
		document.getElementById("mySidenav").style.width = "0";
		document.getElementById("main").style.marginLeft = "0";
		document.getElementById("main").style.marginLeft = "-16px";
	}

</script>


<?php
$controler['sidebar_controler'] = ob_get_clean();

include_once('vue/sidebar/index.php');
