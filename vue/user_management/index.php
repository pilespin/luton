<?php
ob_start();
?>

<link href="vue/user_management/style.css" rel="stylesheet" type="text/css" />

<div id="id01" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity" style="max-width:400px">

    <div class="w3-center"><br><br>
      <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close">&times;</span>
    </div>

    <?php include_once "form_log_in.php"; ?>

  </div>
</div>

<div id="id02" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity" style="max-width:400px">

    <div class="w3-center"><br><br>
      <span onclick="document.getElementById('id02').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close">&times;</span>
    </div>
    
    <?php include_once "form_register.php"; ?>

  </div>
</div>

<div id="id03" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity" style="max-width:400px">

    <div class="w3-center"><br><br><br>
      <span onclick="document.getElementById('id03').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close">&times;</span>
    </div>
    
    <?php include_once "form_lost_password.php"; ?>

    <br>
  </div>
</div>

<div id="id04" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity" style="max-width:400px">

    <div class="w3-center"><br><br>
      <span onclick="document.getElementById('id04').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close">&times;</span>
    </div>

    <div class=" w3-container w3-section">

      <button onclick="document.getElementById('id05').style.display='block'" class="w3-button w3-block w3-green w3-section w3-padding">Change my e-mail</button>
      <button onclick="document.getElementById('id06').style.display='block'" class="w3-button w3-block w3-green w3-section w3-padding">Change my password</button>

    </div>
  </div>
</div>


<div id="id05" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity" style="max-width:400px">

    <div class="w3-center"><br><br>
      <span onclick="document.getElementById('id05').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close">&times;</span>
    </div>
    
    <?php include_once "form_change_mail.php"; ?>

  </div>
</div>

<div id="id06" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-opacity" style="max-width:400px">

    <div class="w3-center"><br><br>
      <span onclick="document.getElementById('id06').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close">&times;</span>
    </div>
    
    <?php include_once "form_modify_password.php"; ?>

  </div>
</div>


<?= $controler['user_management_controler'] ?>

<?php
$content['user_management_vue'] = ob_get_clean();
?>
