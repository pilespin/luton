
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

	<!-- <script src="https://ajax.googleapis.com/ajax/libs/angularjs/cam/js/1.6.4/angular.min.js"></script> -->
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

    <br><br><br>

    <?php

    if (isset($_SESSION['login']) && $_SESSION['login'] != "")
    {
        ?>

      <!-- <h3> Hello please select one button above</h3> -->


      <!--   <h1> Utilisateur</h1>

        Creation de QR code corespondant a la promotion et a l'identite de l'utilisateur
        <br>
        <br>
        <br>

        <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=Jonathan_Pollard_promo_Kinder_20_pour_cent" />



        <br><br><br><br><br> -->

        <?php
    }
    else
    {
        echo "<h1> veuillez vous connecter pour ajouter des promotion</h1>";
    }

    ?>
    <!-- http://api.qrserver.com/v1/read-qr-code/?fileurl=http%3A%2F%2Fapi.qrserver.com%2Fv1%2Fcreate-qr-code%2F%3Fdata%3DHelloWorld -->



    <br><br><br><br><br>
    <br><br><br><br><br>
    <br><br><br><br><br>


    </html>
