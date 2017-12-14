<?php

include_once "modele/shop/index.php";

///////////////////////////////////////////////////////
if (!isset($_SESSION['login'])) {
	echo "<meta http-equiv='refresh' content='0; url=index.php' />";
	return;
}
///////////////////////////////////////////////////////

ob_start();
?>

<br>
<h1 class=" w3-text-gray w3-center">Scan QR code</h1><br>
<br>

<!-- <input type=“file” accept=“image/*;capture=camera”> -->
<video class="w3-card" id="video" width="640" height="480" autoplay></video>

<!-- <input type="file" id="video" name="video" width="640" height="480" accept="video/*" capture> -->

<!-- <input type="file" accept="video/*;capture=camcorder"> -->

<!-- <form action="server.cgi" method="post" enctype="multipart/form-data">
  <input type="file" id="video" name="video" accept="video/*" capture>
  <input type="submit" value="Upload">
</form> -->

<!-- <button class="w3-btn w3-blue" id="snap">Snap Code</button> -->



<br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br>

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

// Detecting qr
setInterval(function(){  
	context.drawImage(video, 0, 0, 640, 480);

	var b64 = canvas.toDataURL();

	decodeImageFromBase64(b64,function(decodedInformation){
		// console.log(decodedInformation);
		if (decodedInformation != "error decoding QR Code")
		{
			window.location.href = "index.php?r=show_converted&name=" + decodedInformation;
		}
		// console.log(decodedInformation);

	});

}, 500);

</script>



<?php
$controler['shop_controler'] = ob_get_clean();

include_once('vue/shop/index.php');
