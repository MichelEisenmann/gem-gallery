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
$serie_key='multitexture';
$serie= $ALL_GALLERIES->paint_dictionnaries[$serie_key];

// ces dictionnaires sont les dictionnaires standard
$acrylic= $ALL_GALLERIES->paint_dictionnaries["acrylic"];

// On recupere toutes les peintures qu'on veut voir dans cette serie
// On les stocke dans "$paints" et on leur donne un ID qui doit etre sans caractere special.
// Cet ID servira a les designer le moment venu.


// Acrylic
$paints["TroisReveurs"]= $acrylic->paints["TroisReveurs"];
$paints["Leman"]= $acrylic->paints["Leman"];
$paints["RencontreAuSommet"]= $acrylic->paints["RencontreAuSommet"];
$paints["LeverSoleilRouge"]= $acrylic->paints["LeverSoleilRouge"];
$paints["PurpleSeagull"]= $acrylic->paints["PurpleSeagull"];
$paints["YellowSunset"]= $acrylic->paints["YellowSunset"];
$paints["ApresMidiOiseau"]= $acrylic->paints["ApresMidiOiseau"];
$paints["ApresLaPluie"]= $acrylic->paints["ApresLaPluie"];


$column_generator= new ColumnGenerator();
$column_generator->paints= $paints; // may contain paints that are not in serie
$column_generator->serie_dico= $serie;  // will be used to browse exclusively amongst serie
?>


  

  <title><?= Translator::t($serie_key); ?> | Gisèle Eisenmann Montagné</title>
  
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
$column_generator->generate_style("TroisReveurs", "white");
$column_generator->generate_style("Leman", "black");
$column_generator->generate_style("RencontreAuSommet", "white");
$column_generator->generate_style("LeverSoleilRouge", "white");
$column_generator->generate_style("PurpleSeagull", "black");
$column_generator->generate_style("YellowSunset", "black");
$column_generator->generate_style("ApresMidiOiseau", "white");
$column_generator->generate_style("ApresLaPluie", "black");
    ?>
  </style>
  
  <body>

    <!-- Header -->
    <?php include("../public/navbar.php"); ?>
    
    <!-- Page Content -->
    <div class="w3-container w3-padding-16 w3-animate-opacity gem-animate gem-fixed-width">
      
      <!-- Text Part -->
      <div class="w3-container w3-left-align">
        <?= Translator::t("IntroMultiTexture"); ?>
        </div>
      
       
       <!-- Paintings -->
 
  	  <div class="w3-grid" style="grid-template-columns:100%">
        <!-- single column --> 
        <div class="w3-grid" style="grid-template-columns:auto; align-content:flex-start">
		  <?= $column_generator->add_to_column( "RencontreAuSommet" ); ?>
        </div>
      </div>
	  
      <div class="w3-grid" style="grid-template-columns:40% 60%">
        <!-- First column --> 
        <div class="w3-grid" style="grid-template-columns:auto; align-content:flex-start">
		   <?= $column_generator->add_to_column( "LeverSoleilRouge" ); ?>
		   <?= $column_generator->add_to_column( "ApresLaPluie" ); ?>
		   <?= $column_generator->add_to_column( "Leman" ); ?>
		   <?= $column_generator->add_to_column( "PurpleSeagull" ); ?>

        </div>
		
        <!-- Second column --> 
        <div class="w3-grid" style="grid-template-columns:auto; align-content:flex-start">
		   <?= $column_generator->add_to_column( "TroisReveurs" ); ?>
		  <?= $column_generator->add_to_column( "YellowSunset" ); ?>
		   <?= $column_generator->add_to_column( "ApresMidiOiseau" ); ?>
         </div>
      </div>

 
     <!-- Footer -->
    <?php include("../public/copyright.php"); ?>
    
    </div>
    
  </body>
</html>
