<!DOCTYPE html>
<html lang="en">
  <meta charset="UTF-8">
  <title>GEM</title>
  
  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-R9KWX3PWND"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'G-R9KWX3PWND');
  </script>

  <?php include ('private/initialize.php'); ?>
  <?php include ('private/initialize_translator.php'); ?>
  <?php include ('private/initialize_galleries.php'); ?>
  
  <meta name="viewport" content="width=device-width">
  <!--
      <meta name="viewport" content="width=1000, initial-scale=1">
      -->
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/5/w3.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="./public/global-style.css">
  
  <body>

      <!-- Header -->
      <?php include("public/navbar.php"); ?>
      
      <!-- Page Content -->
      <div class="w3-row w3-padding-32 w3-animate-opacity gem-animate gem-fixed-width">
	<div class="w3-col s6 w3-center w3-container">
	  <img src="/public/images/web/Accueil-art-gallery1.jpg" alt="" style="width:100%">
	</div>
	<div class="w3-col s6 w3-center w3-container">
	  <img src="/public/images/web/Accueil-art-gallery2.jpg" alt="" style="width:100%" >
	</div>
      </div>
      
      <!-- Footer -->
      <?php include("public/copyright.php"); ?>
      

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
