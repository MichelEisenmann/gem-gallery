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
  <?php include ('../private/line_generator.php'); ?>

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

$line_generator= new LineGenerator();
$line_generator->paints= $paints; // may contain paints that are not in serie
$line_generator->serie_dico= $serie;  // will be used to browse exclusively amongst serie
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
$line_generator->generate_style("EgretYellowSunset", 50, 100, "noir");
$line_generator->generate_style("ReveDeTropiques", 25, 50, "white");
$line_generator->generate_style("IlotMangrove", 50, 50, "white");
$line_generator->generate_style("Zenitude", 50, 50, "white");
$line_generator->generate_style("JeuxVagues", 0, 50, "white");
$line_generator->generate_style("LesZebres", 50, 50, "white");
$line_generator->generate_style("ParisQuaiSeine", 50, 50, "white");
$line_generator->generate_style("AustralianPelican", 50, 50, "white");
$line_generator->generate_style("PinkSunset", 50, 50, "white");
$line_generator->generate_style("BlueSunset", 0, 50, "white");
$line_generator->generate_style("MangroveCockatoo", 50, 50, "white");
$line_generator->generate_style("LaVague", 50, 50, "white");
$line_generator->generate_style("MarinaKeithCurran", 50, 50, "white");
$line_generator->generate_style("LaBragueTamarin", 0, 50, "white");
$line_generator->generate_style("BrisbaneNorthBank", 50, 50, "white");
$line_generator->generate_style("OlenSiagneDoree", 50, 100, "white");
$line_generator->generate_style("AlleePlatanes", 50, 50, "black");
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
<?= $line_generator->generate_single_line( "gem-medium-height", "ParisQuaiSeine" ); ?>
<?= $line_generator->generate_double_line( "gem-large-height", "EgretYellowSunset", 50, "MangroveCockatoo" ); ?>
<?= $line_generator->generate_double_line( "gem-medium-height", "LaVague", 40, "JeuxVagues" ); ?>
<?= $line_generator->generate_double_line( "gem-medium-height", "ReveDeTropiques", 55, "AustralianPelican" ); ?>
<?= $line_generator->generate_single_line( "gem-small-height", "MarinaKeithCurran" ); ?>
<?= $line_generator->generate_single_line( "gem-small-height", "IlotMangrove" ); ?>
<?= $line_generator->generate_double_line( "gem-small-height", "PinkSunset", 55, "OlenSiagneDoree" ); ?>
<?= $line_generator->generate_single_line( "gem-medium-height", "LesZebres" ); ?>
<?= $line_generator->generate_double_line( "gem-large-height", "AlleePlatanes", 50, "LaBragueTamarin" ); ?>
<?= $line_generator->generate_double_line( "gem-medium-height", "BrisbaneNorthBank", 50, "Zenitude" ); ?>
<?= $line_generator->generate_single_line( "gem-large-height", "BlueSunset" ); ?>

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
