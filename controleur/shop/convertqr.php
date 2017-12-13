<?php

include_once "modele/shop/index.php";

ob_start();
?>

<br><br><br><br><br>


<video id="video" width="640" height="480" autoplay></video>
<br><br>
<button id="snap">Snap Photo</button>
<br><br>

<canvas id="canvas" width="640" height="480"></canvas>


<h1> En boutique</h1>


Le commercant scanne le QR code et genere un code barre (EAN-13) compatible avec son instalation existante
<br>

les donnes que l'utilisateur a inscrit a la connexion au wifi son remonté au serveur

<br>
<br>
<br>

<img src="http://www.barcodes4.me/barcode/c39/Kinder20pourcent.png" />

<br>
<br>
<br>

Le commercant applique la reduction sur le produit
<br><br><br><br><br>

<h1> veuillez vous connecter pour ajouter des promotion</h1>




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
		alert(decodedInformation);
	});
});

</script>



<?php
$controler['shop_controler'] = ob_get_clean();

include_once('vue/shop/index.php');
