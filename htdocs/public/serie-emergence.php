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
$serie_key='emergence';
$serie= $ALL_GALLERIES->paint_dictionnaries[$serie_key];

// ces dictionnaires sont les dictionnaires standard
$oil= $ALL_GALLERIES->paint_dictionnaries["oil"];
$pastel= $ALL_GALLERIES->paint_dictionnaries["pastel"];
$acrylic= $ALL_GALLERIES->paint_dictionnaries["acrylic"];

// On recupere toutes les peintures qu'on veut voir dans cette serie
// On les stocke dans "$paints" et on leur donne un ID qui doit etre sans caractere special.
// Cet ID servira a les designer le moment venu.
// Oils
$paints["AutomneCezanne"]= $oil->paints["AutomneCezanne"];
$paints["PanierFraisesBois"]= $oil->paints["PanierFraisesBois"];
$paints["PascaleMelancolie"]= $oil->paints["PascaleMelancolie"];
$paints["DonazacVillage"]= $oil->paints["DonazacVillage"];

// Acrylics
$paints["TroueeBois"]= $acrylic->paints["TroueeBois"];
$paints["Aviateur"]= $acrylic->paints["Aviateur"];
$paints["PortraitGuillaumeTetine"]= $acrylic->paints["PortraitGuillaumeTetine"];
$paints["Royal"]= $acrylic->paints["Royal"];
$paints["FlamandsRouges"]= $acrylic->paints["FlamandsRouges"];
$paints["GuillaumePense"]= $acrylic->paints["GuillaumePense"];
$paints["LeFicus"]= $acrylic->paints["LeFicus"];
$paints["Pelagos"]= $acrylic->paints["Pelagos"];


// Pastels et Autres
$paints["LeLievre"]= $pastel->paints["LeLievre"];
$paints["AmericanRobins"]= $pastel->paints["AmericanRobins"];
$paints["LeBisou"]= $pastel->paints["LeBisou"];
$paints["DesertJordanie"]= $pastel->paints["DesertJordanie"];
$paints["PascaleRenaissance"]= $pastel->paints["PascaleRenaissance"];
$paints["AlleePlatanes"]= $pastel->paints["AlleePlatanes"];
$paints["FleurNenuphar"]= $pastel->paints["FleurNenuphar"];



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
    /* Par ex: 50, 50 veut dire que le milieu de la peinture (W 50%, H 50%) est au centre de la zone */
	/* 0 est en haut à gauche. H 100 clippera plus vers le bas de la peinture */
    /* Le dernier parametre est la couleur du texte qui apparait quand la souris se deplace sur l image */
    
    <?php
$column_generator->generate_style("AutomneCezanne", "white");
$column_generator->generate_style("Royal", "white");
$column_generator->generate_style("PanierFraisesBois", "white");
$column_generator->generate_style("TroueeBois", "black");
$column_generator->generate_style("PortraitGuillaumeTetine", "white");
$column_generator->generate_style("LeLievre", "noir");
$column_generator->generate_style("FlamandsRouges", "white");
$column_generator->generate_style("DonazacVillage", "white");
$column_generator->generate_style("AmericanRobins", "black");
$column_generator->generate_style("Aviateur", "white");
$column_generator->generate_style("LeBisou", "white");
$column_generator->generate_style("DesertJordanie", "white");
$column_generator->generate_style("GuillaumePense", "white");
$column_generator->generate_style("PascaleMelancolie", "black");
$column_generator->generate_style("PascaleRenaissance", "white");
$column_generator->generate_style("AlleePlatanes", "black");
$column_generator->generate_style("LeFicus",  "white");
$column_generator->generate_style("Pelagos", "black");
$column_generator->generate_style("FleurNenuphar", "black");
    ?>
  </style>
  
  <body>

    <!-- Header -->
    <?php include("../public/navbar.php"); ?>
    
    <!-- Page Content -->
    <div class="w3-container w3-padding-16 w3-animate-opacity gem-animate gem-fixed-width">
      
      <!-- Text Part -->
      <div class="w3-container w3-left-align">
        <?= Translator::t("IntroEmergence"); ?>
        </div>
      
      <!-- Galerie/Exposition photo -->
<!--      <div class="w3-container w3-center">
	<img src="/public/images/web/expo-seillans.png" alt="" style="width:100%">
      </div>
-->      
      
      <!-- Paintings -->
      <div class="w3-grid" style="grid-template-columns:30% 40% 30%">
        <!-- First column --> 
        <div class="w3-grid" style="grid-template-columns:auto; align-content:flex-start">
          <?= $column_generator->add_to_column( "AutomneCezanne" ); ?>
          <?= $column_generator->add_to_column( "Royal" ); ?>
          <?= $column_generator->add_to_column( "TroueeBois" ); ?>
		  <?= $column_generator->add_to_column( "AmericanRobins" ); ?>
		  <?= $column_generator->add_to_column( "FlamandsRouges" ); ?>
		  <?= $column_generator->add_to_column( "LeFicus" ); ?>
        </div>
        <!-- Second column --> 
        <div class="w3-grid" style="grid-template-columns:auto; align-content:flex-start">
		  <?= $column_generator->add_to_column( "PortraitGuillaumeTetine" ); ?>
          <?= $column_generator->add_to_column( "LeLievre" ); ?>
		  <?= $column_generator->add_to_column( "PanierFraisesBois" ); ?>
          <?= $column_generator->add_to_column( "DonazacVillage" ); ?>
 		  <?= $column_generator->add_to_column( "DesertJordanie" ); ?>
		  <?= $column_generator->add_to_column( "Pelagos" ); ?>
        </div>
        <!-- Third column --> 
        <div class="w3-grid" style="grid-template-columns:auto; align-content:flex-start">
          <?= $column_generator->add_to_column( "AlleePlatanes" ); ?>
          <?= $column_generator->add_to_column( "LeBisou" ); ?>
          <?= $column_generator->add_to_column( "GuillaumePense" ); ?>
          <?= $column_generator->add_to_column( "PascaleMelancolie"); ?>
		  <?= $column_generator->add_to_column( "Aviateur" ); ?>
          <?= $column_generator->add_to_column( "PascaleRenaissance" ); ?>
		  <?= $column_generator->add_to_column( "FleurNenuphar" ); ?>

        </div>
      </div>
      
     <!-- Footer -->
    <?php include("../public/copyright.php"); ?>
    
    </div>
  </body>
</html>
