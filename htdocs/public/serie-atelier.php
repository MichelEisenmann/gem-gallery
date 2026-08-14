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
  <?php include ('../private/column_generator.php'); ?>

<?php
// ce dictionnaire servira lorsqu'on voudra parcourir la serie sur la page qui montre les peintures une par une
$serie_key='atelier';
// $serie= $ALL_GALLERIES->paint_dictionnaries[$serie_key];


?>
  

  <title><?= Translator::t($serie_key); ?> | Gisele Eisenmann Montagné</title>
  
  <meta name="viewport" content="width=device-width">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/5/w3.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="./global-style.css">    
  <link rel="stylesheet" href="./serie-style.css">    
      
  <style>
    /* On doit utiliser un des ID qu'on a defini plus haut */
    /* Chaque peinture va s'afficher dans une zone definie plus loin */
    /* Cette zone va "clipper" la peinture */
    /* La partie visible de la peinture est definie par les deux valeurs */
    /* Elles definissent quel point de la peinture sera affiche au centre de la zone */
    /* Par ex: 50, 50 veut dire que le milieu de la peinture (50%, 50%) est au centre de la zone */
    /* Le dernier parametre est la couleur du texte qui apparait quand la souris se deplace sur l image */
  
    <?php
$column_generator->generate_style("ConteMusical", "black");
$column_generator->generate_style("Mimosa", "white");
$column_generator->generate_style("Festif", "white");

    ?>

.gem-MimosaInSitu {
    width: 90%;}

.gem-MimosaInSitu:hover {
    opacity: 0.8;
}

.gem-MimosaInSitu:hover > .gem-hover {
    color: white;
    display: block;
}

.gem-FestifInSitu {
    width: 90%;}

.gem-FestifInSitu:hover {
    opacity: 0.8;
}

.gem-FestifInSitu:hover > .gem-hover {
    color: white;
    display: block;
}
  </style>
  
  <body>

    <!-- Header -->
    <?php include("../public/navbar.php"); ?>
    
    <!-- Page Content -->
    <div class="w3-container w3-padding-16 w3-animate-opacity gem-animate gem-fixed-width">
      
      <!-- Text Part -->
      <div class="w3-container w3-left-align">
       <?= Translator::t("IntroComposition"); ?>
      </div>
      
       
      <!-- Paintings (Grille avec images in-situ)-->	  
	  
      <div class="w3-grid" style="grid-template-columns:33% 33% 33%">
       <!-- First column --> 
       <div class="w3-grid" style="grid-template-columns:auto; align-content:flex-start">
	     <?= $column_generator->add_to_column( "ConteMusical" ); ?>
		 
		 <div class="w3-display-container w3-padding gem-ConteMusical" >
            <img src="images/web/conte-musical-blue-coach-unsplash-edited.png" class="gem-ConteMusical" alt="Conte musical">
        </div>
		 
       </div>
       <div class="w3-grid" style="grid-template-columns:auto; align-content:flex-start">
         <?= $column_generator->add_to_column( "Mimosa" ); ?> 
		 
		 <div class="w3-display-container w3-padding gem-MimosaInSitu" >
            <img src="images/web/mimosas-bedroom-2-unsplash-2.png" class="gem-MimosaInSitu" alt="Mimosa">
		</div>
       </div>
       <div class="w3-grid" style="grid-template-columns:auto; align-content:flex-start">
		 <?= $column_generator->add_to_column( "Festif" ); ?>
		 
		 <div class="w3-display-container w3-padding gem-FestifInSitu" >
            <img src="images/web/festif-living-room-unsplash.png" class="gem-FestifInSitu" alt="Mimosa">
		</div>
      </div>
		     
      </div>
      
      <!-- Footer -->
      <?php include("../public/copyright.php"); ?>
      
    </div>
    
  </body>
</html>
