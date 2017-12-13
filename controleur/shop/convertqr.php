<?php

include_once "modele/shop/index.php";

ob_start();
?>

<h1> Commercant ajouter promotion</h1>

<form action="/action_page.php">
	Promotion: <input type="text" name="fname" placeholder="-20%"><br>
	Article: <input type="text" name="lname" placeholder="Parfum Chanel"><br>
	<input type="submit" value="Submit">
</form>

<br>
<br>

Votre promotion sera immediatement disponible aupres des utilisateur
<br><br><br><br><br>






<video id="video" width="640" height="480" autoplay></video>
<button id="snap">Snap Photo</button>
<canvas id="canvas" width="640" height="480"></canvas>

<script type="text/javascript" src="jsqrcode/src/grid.js"></script>
<script type="text/javascript" src="jsqrcode/src/version.js"></script>
<script type="text/javascript" src="jsqrcode/src/detector.js"></script>
<script type="text/javascript" src="jsqrcode/src/formatinf.js"></script>
<script type="text/javascript" src="jsqrcode/src/errorlevel.js"></script>
<script type="text/javascript" src="jsqrcode/src/bitmat.js"></script>
<script type="text/javascript" src="jsqrcode/src/datablock.js"></script>
<script type="text/javascript" src="jsqrcode/src/bmparser.js"></script>
<script type="text/javascript" src="jsqrcode/src/datamask.js"></script>
<script type="text/javascript" src="jsqrcode/src/rsdecoder.js"></script>
<script type="text/javascript" src="jsqrcode/src/gf256poly.js"></script>
<script type="text/javascript" src="jsqrcode/src/gf256.js"></script>
<script type="text/javascript" src="jsqrcode/src/decoder.js"></script>
<script type="text/javascript" src="jsqrcode/src/qrcode.js"></script>
<script type="text/javascript" src="jsqrcode/src/findpat.js"></script>
<script type="text/javascript" src="jsqrcode/src/alignpat.js"></script>
<script type="text/javascript" src="jsqrcode/src/databr.js"></script>


<script type="text/javascript">

// Grab elements, create settings, etc.
var video = document.getElementById('video');

// Get access to the camera!
if(navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
    // Not adding `{ audio: true }` since we only want video now
    navigator.mediaDevices.getUserMedia({ video: true }).then(function(stream) {
    	video.src = window.URL.createObjectURL(stream);
    	video.play();
    });
}	

// Elements for taking the snapshot
var canvas = document.getElementById('canvas');
var context = canvas.getContext('2d');
var video = document.getElementById('video');



function decodeImageFromBase64(data, callback){
	qrcode.callback = callback;
	qrcode.decode(data)
}
// Trigger photo take
document.getElementById("snap").addEventListener("click", function() {
	context.drawImage(video, 0, 0, 640, 480);

	var b64 = canvas.toDataURL();
	// console.log(b64);

	decodeImageFromBase64(b64,function(decodedInformation){
		console.log(decodedInformation);
		// alert(decodedInformation);
	});
});

</script>



<?php
$controler['shop_controler'] = ob_get_clean();

include_once('vue/shop/index.php');
