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
$serie_key='metamorphose';
$serie= $ALL_GALLERIES->paint_dictionnaries[$serie_key];

// ces dictionnaires sont les dictionnaires standard
$oil= $ALL_GALLERIES->paint_dictionnaries["oil"];
$pastel= $ALL_GALLERIES->paint_dictionnaries["pastel"];
$acrylic= $ALL_GALLERIES->paint_dictionnaries["acrylic"];
$aquarelle = $ALL_GALLERIES->paint_dictionnaries["aquarelle"];

// On recupere toutes les peintures qu'on veut voir dans cette serie
// On les stocke dans "$paints" et on leur donne un ID qui doit etre sans caractere special.
// Cet ID servira a les designer le moment venu.

// Oils
$paints["Flamboyance"]= $oil->paints["Flamboyance"];
$paints["ChapeauOrange"]= $oil->paints["ChapeauOrange"];

// Acrylics
$paints["EvocationGourdon"]= $acrylic->paints["EvocationGourdon"];
$paints["LesTournesols"]= $acrylic->paints["LesTournesols"];
$paints["BallonsOlympiques"]= $acrylic->paints["BallonsOlympiques"];
$paints["Deflagration"]= $acrylic->paints["Deflagration"];
$paints["Distorsion"]= $acrylic->paints["Distorsion"];
$paints["Eclosion"]= $acrylic->paints["Eclosion"];

// Pastels et Autres
$paints["MichelPolynesie"]= $pastel->paints["MichelPolynesie"];
$paints["BebeSourit"]= $pastel->paints["BebeSourit"];
$paints["TendresseChat"]= $pastel->paints["TendresseChat"];
$paints["CorentinLaRose"]= $pastel->paints["CorentinLaRose"];

$paints["LesMouettesPlage"]= $aquarelle->paints["LesMouettesPlage"];


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
  $column_generator->generate_style("Flamboyance", "white");
$column_generator->generate_style("ChapeauOrange",  "white");
$column_generator->generate_style("EvocationGourdon",  "black");
$column_generator->generate_style("LesTournesols",  "black");
$column_generator->generate_style("BallonsOlympiques",  "black");
$column_generator->generate_style("Deflagration",  "black");
$column_generator->generate_style("Distorsion",  "white");
$column_generator->generate_style("Eclosion",  "white");
$column_generator->generate_style("MichelPolynesie",  "white");
$column_generator->generate_style("BebeSourit",  "black");
$column_generator->generate_style("TendresseChat",  "black");
$column_generator->generate_style("CorentinLaRose",  "black");
$column_generator->generate_style("LesMouettesPlage", "black");
    ?>
  </style>
  
  <body>

    <!-- Header -->
    <?php include("../public/navbar.php"); ?>
    
    <!-- Page Content -->
    <div class="w3-container w3-padding-16 w3-animate-opacity gem-animate gem-fixed-width">
      
      <!-- Text Part -->
      <div class="w3-container w3-left-align">
        <?= Translator::t("IntroMetamorphose"); ?>
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
         <?= $column_generator->add_to_column( "Distorsion" ); ?>
		 <?= $column_generator->add_to_column( "TendresseChat" ); ?>
          <?= $column_generator->add_to_column( "MichelPolynesie" ); ?>		 
         </div>

        <!-- Second column --> 
        <div class="w3-grid" style="grid-template-columns:auto; align-content:flex-start">
		  <?= $column_generator->add_to_column( "Deflagration" ); ?>
          <?= $column_generator->add_to_column( "ChapeauOrange" ); ?>
        </div>
 
       <!-- Third column --> 
        <div class="w3-grid" style="grid-template-columns:auto; align-content:flex-start">
		  <?= $column_generator->add_to_column( "Eclosion" ); ?>
          <?= $column_generator->add_to_column( "CorentinLaRose" ); ?>
		  <?= $column_generator->add_to_column( "BebeSourit" ); ?>
        </div>
      </div>
	  
	  <!-- single column --> 
	  <div class="w3-grid" style="grid-template-columns:100%">
        <div class="w3-grid" style="grid-template-columns:auto; align-content:flex-start">
		     <?= $column_generator->add_to_column( "EvocationGourdon" ); ?> 
        </div>
      </div>
          
       <div class="w3-grid" style="grid-template-columns:30% 40% 30%">
        <!-- First column --> 
        <div class="w3-grid" style="grid-template-columns:auto; align-content:flex-start">
           <?= $column_generator->add_to_column( "LesMouettesPlage" ); ?>
		  
        </div>
        <!-- Second column --> 
        <div class="w3-grid" style="grid-template-columns:auto; align-content:flex-start">
		 <?= $column_generator->add_to_column( "Flamboyance" ); ?>
		 <?= $column_generator->add_to_column( "LesTournesols" ); ?>
        </div>
 
       <!-- Third column --> 
        <div class="w3-grid" style="grid-template-columns:auto; align-content:flex-start">
          <?= $column_generator->add_to_column( "BallonsOlympiques" ); ?>
 
        </div>
      </div>
	  
     <!-- Footer -->
    <?php include("../public/copyright.php"); ?>

    </div>
    
    
  </body>
</html>
