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
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/5/w3.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="./public/global-style.css">
  
  <body>

      <!-- Header -->
      <?php include("public/navbar.php"); ?>
      
      <!-- Page Content -->
      <div class="w3-container w3-animate-opacity gem-animate gem-index-fixed-width">

      <div class="w3-left-align gem-menu">
        <?= Translator::t("AccueilArtisteIntro"); ?>
	    [<a href="<?= Translator::url('/public/serie-momentsfeminins.php') ?>">
<?= Translator::t("momentsfeminins"); ?> </a>,
         <a href="<?= Translator::url('/public/serie-watermirror.php') ?>">
<?= Translator::t("watermirror"); ?> </a>, 
        <a href="<?= Translator::url('/public/serie-metamorphose.php') ?>">
<?= Translator::t("metamorphose"); ?> </a>,
       <a href="<?= Translator::url('/public/serie-emergence.php') ?>">
<?= Translator::t("emergence"); ?> </a>]
      </div>	  
	  
        <div class="w3-center">
	  <a href="<?= Translator::url('/public/serie-momentsfeminins.php') ?>">
	    <img src="/public/images/web/Gourdon25_VueDEnsemble.jpg" alt="<?= Translator::t("exposalle_Alt"); ?>" style="width:100%" style="width:100%" />
	  </a>
	</div>
        <div class="w3-center w3-padding-16">
	  <div class="w3-row">
	    <div class="w3-col s4">
	      <a href="<?= Translator::url('/public/serie-momentsfeminins.php') ?>">
		<img src="/public/images/web/Gourdon25_Gi_AirMarin.jpg" alt="Exposition Moments Feminins Eisenmann devant tableau Air Marin Huile" style="width:100%" />
	      </a>
	    </div>
	    <div class="w3-col s4">
	      <a href="<?= Translator::url('/public/serie-momentsfeminins.php') ?>">
		<img src="/public/images/web/Gourdon25_Gi_Danseuses.jpg" alt="Exposition Moments Feminins Eisenmann devant tableau Les Danseuses Huile" style="width:100%"  />
	      </a>
	    </div>
	    <div class="w3-col s4">
	      <a href="<?= Translator::url('/public/serie-momentsfeminins.php') ?>">
		<img src="/public/images/web/Gourdon25_Gi_MurPierre.jpg" alt="Exposition Moments Feminins Eisenmann devant tableau Contemplation acrylique" style="width:100%"  />
	      </a>
	    </div>
	  </div>
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
