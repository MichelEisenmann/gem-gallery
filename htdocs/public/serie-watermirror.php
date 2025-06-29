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
$serie_key='watermirror';
$serie= $ALL_GALLERIES->paint_dictionnaries[$serie_key];

// ces dictionnaires sont les dictionnaires standard
$oil= $ALL_GALLERIES->paint_dictionnaries["oil"];
$pastel= $ALL_GALLERIES->paint_dictionnaries["pastel"];
$acrylic= $ALL_GALLERIES->paint_dictionnaries["acrylic"];

// On recupere toutes les peintures qu'on veut voir dans cette serie
// On les stocke dans "$paints" et on leur donne un ID qui doit etre sans caractere special.
// Cet ID servira a les designer le moment venu.
// Oils
$paints["EgretYellowSunset"]= $oil->paints["EgretYellowSunset"];
$paints["ReveDeTropiques"]= $oil->paints["ReveDeTropiques"];
$paints["IlotMangrove"]= $oil->paints["IlotMangrove"];
$paints["Zenitude"]= $oil->paints["Zenitude"];

// Acrylics
$paints["JeuxVagues"]= $acrylic->paints["JeuxVagues"];
$paints["LesZebres"]= $acrylic->paints["LesZebres"];
$paints["ParisQuaiSeine"]= $acrylic->paints["ParisQuaiSeine"];
$paints["AustralianPelican"]= $acrylic->paints["AustralianPelican"];
$paints["PinkSunset"]= $acrylic->paints["PinkSunset"];
$paints["BlueSunset"]= $acrylic->paints["BlueSunset"];
$paints["MangroveCockatoo"]= $acrylic->paints["MangroveCockatoo"];
$paints["LaVague"]= $acrylic->paints["LaVague"];
$paints["MarinaKeithCurran"]= $acrylic->paints["MarinaKeithCurran"];

// Pastels
$paints["LaBragueTamarin"]= $pastel->paints["LaBragueTamarin"];
$paints["BrisbaneNorthBank"]= $pastel->paints["BrisbaneNorthBank"];
$paints["OlenSiagneDoree"]= $pastel->paints["OlenSiagneDoree"];
$paints["AlleePlatanes"]= $pastel->paints["AlleePlatanes"];

$column_generator= new ColumnGenerator();
$column_generator->paints= $paints; // may contain paints that are not in serie
$column_generator->serie_dico= $serie;  // will be used to browse exclusively amongst serie
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
$column_generator->generate_style("EgretYellowSunset", "noir");
$column_generator->generate_style("ReveDeTropiques", "white");
$column_generator->generate_style("IlotMangrove", "white");
$column_generator->generate_style("Zenitude", "white");
$column_generator->generate_style("JeuxVagues", "white");
$column_generator->generate_style("LesZebres", "white");
$column_generator->generate_style("ParisQuaiSeine", "white");
$column_generator->generate_style("AustralianPelican", "white");
$column_generator->generate_style("PinkSunset", "white");
$column_generator->generate_style("BlueSunset", "white");
$column_generator->generate_style("MangroveCockatoo", "white");
$column_generator->generate_style("LaVague", "white");
$column_generator->generate_style("MarinaKeithCurran", "white");
$column_generator->generate_style("LaBragueTamarin", "white");
$column_generator->generate_style("BrisbaneNorthBank", "white");
$column_generator->generate_style("OlenSiagneDoree", "white");
$column_generator->generate_style("AlleePlatanes", "black");
    ?>

  </style>
  
  <body>

    <!-- Header -->
    <?php include("../public/navbar.php"); ?>
    
    <!-- Page Content -->
    <div class="w3-container w3-padding-16 w3-animate-opacity gem-animate gem-fixed-width">
      
      <!-- Text Part -->
      <div class="w3-container w3-left-align">
       <?= Translator::t("IntroWaterMirror"); ?>
      </div>
      
       
      <!-- Paintings -->
      <div class="w3-grid" style="grid-template-columns:30% 40% 30%">
        <!-- First column --> 
        <div class="w3-grid" style="grid-template-columns:auto; align-content:flex-start">
          <?= $column_generator->add_to_column( "ParisQuaiSeine" ); ?>
          <?= $column_generator->add_to_column( "EgretYellowSunset" ); ?>
          <?= $column_generator->add_to_column( "MangroveCockatoo" ); ?>
          <?= $column_generator->add_to_column( "LaVague" ); ?>
          <?= $column_generator->add_to_column( "JeuxVagues" ); ?>
          <?= $column_generator->add_to_column( "ReveDeTropiques" ); ?>
        </div>
        <!-- Second column --> 
        <div class="w3-grid" style="grid-template-columns:auto; align-content:flex-start">
          <?= $column_generator->add_to_column( "AustralianPelican" ); ?>
          <?= $column_generator->add_to_column( "MarinaKeithCurran" ); ?>
          <?= $column_generator->add_to_column( "IlotMangrove" ); ?>
          <?= $column_generator->add_to_column( "PinkSunset" ); ?>
          <?= $column_generator->add_to_column( "OlenSiagneDoree" ); ?>
          <?= $column_generator->add_to_column( "LesZebres" ); ?>
        </div>
        <!-- Third column --> 
        <div class="w3-grid" style="grid-template-columns:auto; align-content:flex-start">
          <?= $column_generator->add_to_column( "AlleePlatanes" ); ?>
          <?= $column_generator->add_to_column( "LaBragueTamarin" ); ?>
          <?= $column_generator->add_to_column( "BrisbaneNorthBank" ); ?>
          <?= $column_generator->add_to_column( "Zenitude" ); ?>
          <?= $column_generator->add_to_column( "BlueSunset" ); ?>
        </div>
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
