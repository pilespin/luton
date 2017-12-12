<!DOCTYPE html>
<html>
<head>
	<title>QR</title>
	<link rel="icon" href="favicon.ico" type="image/x-icon">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" href="w3.css"> <!-- 20Kb -->
	<link rel="stylesheet" href="fontAwesome/css/font-awesome.min.css"> <!-- 116Kb -->
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
	<link href="vue/style.css" rel="stylesheet" type="text/css" /> 

	<!-- <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script> -->
	<!-- <link rel="stylesheet" href="jquery/jquery-ui.min.css" type="text/css" media="all" /> -->
	<!-- <script src="jquery/external/jquery/jquery.js"></script> -->
	<!-- <script src="jquery/jquery-ui.js"></script> -->

</head>
<div id="main">
	<body>

		<?php include_once "vue/popup_info.php"; ?>


		<?php
	// print_r($_SERVER);
	// echo "$_SERVER[HTTP_USER_AGENT]";

		foreach ($content as $key => $value) {
			if (strlen($value) > 0 && $key != "notif" && $key != "error" && $key != "warn")
			{
				if ($key == "sidebar_vue")
					echo "$value";
				else
					echo "<div>$value</div>";
			}
		}
		?>

	</body> 



</div>


</html>
