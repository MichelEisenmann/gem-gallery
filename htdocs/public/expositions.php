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

  <title><?= Translator::t("Expositions"); ?></title>
  
  <meta name="viewport" content="width=device-width">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/5/w3.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="./global-style.css">

  <body>
    
    <!-- Header -->
    <?php include("../public/navbar.php"); ?>
    
    <!-- Page Content -->
    <div class="w3-container w3-padding-32 w3-animate-opacity gem-animate gem-fixed-width">
      <h5><b><?= Translator::t('soloexpo') ?></b></h5>
      <ul>
	2025
	<ul>
	  <li><?= Translator::t('momentsfeminins') ?>, Gourdon (06, France) - <?= Translator::t('currentExpoDate') ?></li>
	</ul>
      </ul>

      <ul>
	2024
	<ul>
	  <li><?= Translator::t('metamorphose') ?>, Gourdon (06, France) </li>
	  <li><?= Translator::t('watermirror') ?>, Seillans (83, France) </li>
	  <li><?= Translator::t('watermirror') ?>, Roquefort Les Pins (06, France) </li>
	</ul>
      </ul>

      <ul>
	2023
	<ul>
	  <li>Gourdon (06, France) </li>
	</ul>
      </ul>
      
      <h5><b><?= Translator::t('groupexpo') ?></b></h5>

      <ul>
	2025
	<ul>
	  <li>Antibes Art Fair, Antibes (06, France) </li>
	  <li>Feminin'Arte, Antibes (06, France) </li>
	</ul>
      </ul>

      <ul>
	2024
	<ul>
	  <li>International virtual exhibition Arts & Sports 2024 </li>
	  <li><?= Translator::t('faitespeinture') ?> - (<?= Translator::t('assopicasso') ?>), Antibes (06, France) </li>
	  <li>Feminin'Arte, Antibes (06, France) </li>
	</ul>     
      </ul>     
      
      <ul>
	2021 to 2023
	<ul>
	  <li><?= Translator::t('faitespeinture') ?>, Antibes (06, France) </li>
	</ul>         
      </ul>
      

    </div>
    
    <!-- Footer -->
    <?php include("../public/copyright.php"); ?>
    
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

