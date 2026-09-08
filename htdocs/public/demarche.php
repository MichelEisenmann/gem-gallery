<!DOCTYPE html>
<html lang="en">
  <meta charset="UTF-8">
  
  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-R9KWX3PWND"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'G-R9KWX3PWND');
  </script>

  <?php include ('../private/initialize.php'); ?>
  <?php include ('../private/initialize_translator.php'); ?>
  <?php include ('../private/initialize_galleries.php'); ?>

  <title><?= Translator::t("Demarche"); ?></title>
  
  <meta name="viewport" content="width=device-width">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/5/w3.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <link rel="stylesheet" href="./global-style.css">
  <link rel="stylesheet" href="./serie-style.css">

  <style>
.img-left {
    float: left;
    margin-right: 15px;
    width: 100px;
}
.img-right {
    float: right;
    margin-right: 15px;
    width: 100px;
}
  </style>
  
  <body>
    <!-- Header -->
    <?php include("../public/navbar.php"); ?>
    
    <!-- Page Content -->
    <div class="w3-container w3-padding-32 w3-animate-opacity gem-animate gem-fixed-width">

      <!-- photo -->
      <div class="w3-content w3-container">
      </div>
      
      <!-- text -->
      <div class="w3-content w3-container gem-justify">

	          <img class="artiste to-be-signed img-right"
                       src="../public/images/Acrylique/20260125_PurpleSeagull_AC73x50_small.jpg"
                       alt="Purple seagull"
                       onclick="document.getElementById('ModalSeagull').style.display='block'"
                       />

               <!-- the part that is displayed when one clicks on the above image -->
               <div id="ModalSeagull" class="w3-modal" onclick="this.style.display='none'">
                 <span class="w3-button w3-hover-red w3-xlarge w3-display-topright">&times;</span>
                 <div class="w3-modal-content w3-animate-zoom">
	               <img class="artiste to-be-signed"
                            src="../public/images/Acrylique/20260125_PurpleSeagull_AC73x50.jpg"
                            alt="Purple seagull" width="100%"/>
                 </div>
               </div>

	           <?= Translator::t('DemarchePrologue'); ?>
      </div>

      <div class="w3-content w3-container gem-justify">
        <img class="artiste to-be-signed img-left"
             src="../public/images/Acrylique/20260615_Mimosa_AC27x19_small.jpg"
             alt="Mimosa"
             onclick="document.getElementById('ModalMimosa').style.display='block'"
             />

               <!-- the part that is displayed when one clicks on the above image -->
               <div id="ModalMimosa" class="w3-modal" onclick="this.style.display='none'">
                 <span class="w3-button w3-hover-red w3-xlarge w3-display-topright">&times;</span>
                 <div class="w3-modal-content w3-animate-zoom">
	               <img class="artiste to-be-signed"
                            src="../public/images/Acrylique//20260615_Mimosa_AC27x19.jpg"
                            alt="Mimosa" width="100%"/>
                 </div>
               </div>

        <?= Translator::t('DemarcheTexte'); ?>	  
      </div>

      
      <!-- Footer -->
      <?php include("../public/copyright.php"); ?>
      
    </div>
    
    <script>
      // add the "alt" attribute to all "to-be-signed" images
      function signImages() {
	  var gemSignature= "Gisele Eisenmann (gem)";
	  let images= document.querySelectorAll(".to-be-signed");
          for ( let i= 0; i < images.length; i++ ) {
	      images[i].setAttribute( 'alt', gemSignature );
          }
      }
      document.addEventListener('DOMContentLoaded', function() { signImages(); }, false);  
    </script>
    
  </body>
</html>

