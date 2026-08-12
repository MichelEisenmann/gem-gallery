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

  <style>
    .introcontainer {
    display: grid;
    grid-template-columns: 30% auto;
    padding: 10px;
    }
    .introcontainer div {
    padding: 10px;
    }

    .for-mobile {
    display:none;
    }

    .accesscontainer {
    display: grid;
    grid-template-columns: 33% 33% 33%;
    padding: 10px;
    }
    .accesscontainer div {
    padding: 10px;
    }

    .imagecontainer {
    height: 200px;
    overflow: hidden;
    }

    .imagecontainer div {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
    }
    
    @media screen and (max-width: 480px) {
    .accesscontainer {
    display: grid;
    grid-template-columns: 50% 50%;
    padding: 10px;
    }
    .accesscontainer div {
    padding: 10px;
    }

    .for-computer {
    display: none;
    }

    .for-mobile {
    display: inline;
    }

    .introcontainer {
    display: grid;
    grid-template-columns: 30% auto;
    padding: 10px;
    }
    .introcontainer div {
    padding: 10px;
    }

    }

  </style>
  
  <body>

    <!-- Header -->
    <?php include("public/navbar.php"); ?>

    <!-- Page Content -->
    <div class="w3-container w3-animate-opacity gem-animate gem-index-fixed-width">
	
      <!--- Intro Photo et contenu oeuvres ---->
      <div class="for-computer">
	<div class="introcontainer">
	  <div>
	    <img src="/public/images/web/20260730_GEM_Accueil.png" class="w3-circle" alt="GEM Photo" style="width:70%"/>
	  </div>
	  <div class="">
            <?= Translator::t("AccueilArtisteIntro"); ?>
	    <?= Translator::t("Accueil_CreationsDefinition0"); ?>
	    <?= Translator::t("Accueil_CreationsDefinition1"); ?>
	    <?= Translator::t("Accueil_CreationsDefinition2"); ?>
	  </div>
	</div>
      </div>

<!---- Mobile début --->
      <div class="for-mobile">
	<div class="introcontainer">
	  <div>
	    <img src="/public/images/web/20260730_GEM_Accueil.png" class="w3-circle" alt="GEM Photo" style="width:70%"/>
	  </div>
	  <div class="">
            <?= Translator::t("AccueilArtisteIntro"); ?>
	  </div>
	</div>
	
	<div class="">
	  <?= Translator::t("Accueil_CreationsDefinition0"); ?>
	  <?= Translator::t("Accueil_CreationsDefinition1"); ?>
	  <?= Translator::t("Accueil_CreationsDefinition2"); ?>
	</div>
      </div>
<!---- Mobile fin --->
      
      <!-- Grille des choix --->
      <div class="accesscontainer">

        <a href="<?= Translator::url('/public/acces-paintings.php') ?>">
	  <div class="w3-card-4">
	    <div class="imagecontainer">
	      <img src="/public/images/Acrylique/20250421_Lectrice_AC50x50_small.jpg" alt="Conte Musical" style="width:100%; "  />
	    </div>
	    <div class="w3-container w3-center">
	      <?= Translator::t("Tableaux"); ?>
	    </div>
	  </div>
	</a>
        <a href="<?= Translator::url('/public/serie-composition.php') ?>">
	  <div class="w3-card-4">
	    <div class="imagecontainer w3-center">
	      <img src="/public/images/Acrylique/20260623_Festif_AC41x27_small.png" alt="Festif" style="width:100%; " />
	    </div>
	    <div class="w3-container w3-center">
	      <?= Translator::t("Compositions"); ?>
	    </div>
	  </div>
	</a>
	
        <a href="<?= Translator::url('/public/serie-mixedmedia.php') ?>">
	  <div class="w3-card-4">
	    <div class="imagecontainer w3-center">
	    <img src="/public/images/Acrylique/20230629_LaVague_AC33x41_small.jpg" alt="LaVague" style="width:100%; " />
	    </div>
	    <div class="w3-container w3-center">
	      <?= Translator::t("MixedMedia"); ?>
	    </div>
	  </div>
	</a>
	
        <a href="<?= Translator::url('/public/serie-abstrait.php') ?>">
	  <div class="w3-card-4">
	    <div class="imagecontainer w3-center">
	    <img src="/public/images/Acrylique/20240326_Deflagration_AC90x90_small.jpg" alt="Conte Musical" style="width:100%; " />
	    </div>
	    <div class="w3-container w3-center">
	      <?= Translator::t("Abstrait"); ?>
	    </div>
	  </div>
	</a>
	
        <a href="<?= Translator::url('/public/serie-compositions.php') ?>">
	  <div class="w3-card-4">
	    <div class="imagecontainer w3-center">
	      <img src="/public/images/web/2024-04-29-GEM-peint.png" alt="Conte Musical" style="width:100%; " />
	    </div>
	    <div class="w3-container w3-center">
	      <?= Translator::t("Atelier"); ?>
	    </div>
	  </div>
	</a>
	
	<a href="<?= Translator::url('/public/expositions.php') ?>">
	  <div class="w3-card-4">
	    <div class="imagecontainer w3-center">
	    <img src="/public/images/web/Affichette_Expo-Gourdon26_Cadre.jpg" alt="Conte Musical" style="width:100%; " />
	    </div>
	    <div class="w3-container w3-center">
	      <?= Translator::t("Expositions"); ?>
	    </div>
	  </div>
	</a>
      </div>
      
<!---
	<div class="w3-left-align gem-menu">
          <?= Translator::t("AccueilArtisteIntro"); ?>
	  [<a href="<?= Translator::url('/public/serie-couleursetmodele.php') ?>">
            <?= Translator::t("couleursetmodele"); ?> </a>,
		<a href="<?= Translator::url('/public/serie-momentsfeminins.php') ?>">
            <?= Translator::t("momentsfeminins"); ?> </a>,
          <a href="<?= Translator::url('/public/serie-watermirror.php') ?>">
            <?= Translator::t("watermirror"); ?> </a>, 
          <a href="<?= Translator::url('/public/serie-metamorphose.php') ?>">
            <?= Translator::t("metamorphose"); ?> </a>,
          <a href="<?= Translator::url('/public/serie-emergence.php') ?>">
            <?= Translator::t("emergence"); ?> </a>]
	</div>	  
	
	<div class="w3-center">
	  <a href="<?= Translator::url('/public/serie-couleursetmodele.php') ?>">
	    <img src="/public/images/Acrylique/20260602_ConteMusical_AC60x30_small.jpg" alt="Conte Musical" style="width:100%" style="width:100%" />
	  </a>
	</div>


	<div class="w3-center w3-padding-16">
		<div class="w3-row-padding" >
			<div class="w3-col s8">
			<img src="/public/images/web/Decor_ConteMusical-V2.jpg" alt="Decor conte musical" style="width:100%" />
			</div>
		</div>
	</div>
--->

      
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
