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
$serie_key='portrait';
$serie= $ALL_GALLERIES->paint_dictionnaries[$serie_key];

// ces dictionnaires sont les dictionnaires standard
$oil= $ALL_GALLERIES->paint_dictionnaries["oil"];
$pastel= $ALL_GALLERIES->paint_dictionnaries["pastel"];
$acrylic= $ALL_GALLERIES->paint_dictionnaries["acrylic"];
$sanguine = $ALL_GALLERIES->paint_dictionnaries["sanguine"];

// On recupere toutes les peintures qu'on veut voir dans cette serie
// On les stocke dans "$paints" et on leur donne un ID qui doit etre sans caractere special.
// Cet ID servira a les designer le moment venu.
// Oils
$paints["PascaleMelancolie"]= $oil->paints["PascaleMelancolie"];
$paints["PortraitPascale"]= $oil->paints["PortraitPascale"];
$paints["ChapeauOrange"]= $oil->paints["ChapeauOrange"];

// Acrylics
$paints["Aviateur"]= $acrylic->paints["Aviateur"];
$paints["PortraitGuillaumeTetine"]= $acrylic->paints["PortraitGuillaumeTetine"];
$paints["Royal"]= $acrylic->paints["Royal"];
$paints["GuillaumePense"]= $acrylic->paints["GuillaumePense"];
$paints["EnfantParait"]= $acrylic->paints["EnfantParait"];


// Pastels et Autres
$paints["LeLievre"]= $pastel->paints["LeLievre"];
$paints["Calin"]= $pastel->paints["Calin"];
$paints["PremiersPas"]= $pastel->paints["PremiersPas"];
$paints["PascaleRenaissance"]= $pastel->paints["PascaleRenaissance"];
$paints["LesFiancesFR"]= $pastel->paints["LesFiancesFR"];
$paints["MichelPolynesie"]= $pastel->paints["MichelPolynesie"];
$paints["BebeSourit"]= $pastel->paints["BebeSourit"];
$paints["TendresseChat"]= $pastel->paints["TendresseChat"];
$paints["CorentinLaRose"]= $pastel->paints["CorentinLaRose"];
$paints["Generations"]= $pastel->paints["Generations"];
$paints["GiseleLaServante"]= $pastel->paints["GiseleLaServante"];


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

$column_generator->generate_style("Royal", "white");
$column_generator->generate_style("PortraitPascale", "black");
$column_generator->generate_style("LeLievre", "noir");
$column_generator->generate_style("Aviateur", "white");
$column_generator->generate_style("GuillaumePense", "white");
$column_generator->generate_style("PortraitGuillaumeTetine", "black");
$column_generator->generate_style("PascaleMelancolie","black");
$column_generator->generate_style("ChapeauOrange", "white");
$column_generator->generate_style("Calin", "white");
$column_generator->generate_style("PremiersPas", "white");
$column_generator->generate_style("PascaleRenaissance", "white");
$column_generator->generate_style("LesFiancesFR", "white");
$column_generator->generate_style("MichelPolynesie", "white");
$column_generator->generate_style("BebeSourit", "white");
$column_generator->generate_style("TendresseChat", "white");
$column_generator->generate_style("CorentinLaRose", "white");
$column_generator->generate_style("EnfantParait", "white");
$column_generator->generate_style("Generations", "white");
$column_generator->generate_style("GiseleLaServante", "white");


    ?>
  </style>
  
  <body>

    <!-- Header -->
    <?php include("../public/navbar.php"); ?>
    
    <!-- Page Content -->
    <div class="w3-container w3-padding-16 w3-animate-opacity gem-animate gem-fixed-width">
      
      <!-- Text Part -->
      <div class="w3-container w3-left-align">
        <?= Translator::t("IntroPortraits"); ?>
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
		  <?= $column_generator->add_to_column( "ChapeauOrange" ); ?>
		  <?= $column_generator->add_to_column( "Calin" ); ?>
          <?= $column_generator->add_to_column( "PremiersPas" ); ?>
          <?= $column_generator->add_to_column( "PascaleRenaissance" ); ?>
          <?= $column_generator->add_to_column( "LesFiancesFR" ); ?>
          <?= $column_generator->add_to_column( "EnfantParait" ); ?>
		  <?= $column_generator->add_to_column( "Generations" ); ?>

 
        </div>
        <!-- Second column --> 
        <div class="w3-grid" style="grid-template-columns:auto; align-content:flex-start">
          <?= $column_generator->add_to_column( "PortraitPascale" ); ?>
		  <?= $column_generator->add_to_column( "MichelPolynesie" ); ?>
		  <?= $column_generator->add_to_column( "PortraitGuillaumeTetine" ); ?>
		  <?= $column_generator->add_to_column( "BebeSourit" ); ?>
		  <?= $column_generator->add_to_column( "GiseleLaServante" ); ?>


 

        </div>
        <!-- Third column --> 
        <div class="w3-grid" style="grid-template-columns:auto; align-content:flex-start">
		  <?= $column_generator->add_to_column( "Aviateur" ); ?>
		  <?= $column_generator->add_to_column( "TendresseChat" ); ?>
          <?= $column_generator->add_to_column( "CorentinLaRose" ); ?>
          <?= $column_generator->add_to_column( "PascaleMelancolie" ); ?>
          <?= $column_generator->add_to_column( "GuillaumePense" ); ?>
		  <?= $column_generator->add_to_column( "Royal" ); ?>
		  <?= $column_generator->add_to_column( "LeLievre" ); ?>


        </div>
      </div>
      
     <!-- Footer -->
    <?php include("../public/copyright.php"); ?>
    
    </div>
  </body>
</html>
