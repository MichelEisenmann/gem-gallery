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

  <title><?= Translator::t("Biography"); ?></title>
  
  <meta name="viewport" content="width=device-width">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/5/w3.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <link rel="stylesheet" href="./global-style.css">
  <link rel="stylesheet" href="./serie-style.css">

  <style>
  </style>
  
  <body>
    <!-- Header -->
    <?php include("../public/navbar.php"); ?>
    
    <!-- Page Content -->
    <div class="w3-container w3-padding-32 w3-animate-opacity gem-animate gem-fixed-width">

      <!-- photo -->
      <div class="w3-content w3-container">
	<a href="<?= Translator::url('/index.php') ?>">
	  <img class="artiste to-be-signed" src="../public/images/web/gisele.jpg" alt="Artist's photo" /></a>
      </div>
      
      <!-- text -->
      <div class="w3-content w3-container gem-justify">
	<?= Translator::t('Introduction'); ?>
	<?= Translator::t('Winner'); ?>	  
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

