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
$serie_key='metamorphose';
$serie= $ALL_GALLERIES->paint_dictionnaries[$serie_key];

// ces dictionnaires sont les dictionnaires standard
$oil= $ALL_GALLERIES->paint_dictionnaries["oil"];
$pastel= $ALL_GALLERIES->paint_dictionnaries["pastel"];
$acrylic= $ALL_GALLERIES->paint_dictionnaries["acrylic"];
$other= $ALL_GALLERIES->paint_dictionnaries["other"];

// On recupere toutes les peintures qu'on veut voir dans cette serie
// On les stocke dans "$paints" et on leur donne un ID qui doit etre sans caractere special.
// Cet ID servira a les designer le moment venu.

// Oils
$paints["Flamboyance"]= $oil->paints["Huile/20221109_Flamboyance_HU32x41.jpg"];
$paints["ChapeauOrange"]= $oil->paints["Huile/20240601_ChapeauOrange_HU46x33.jpg"];

// Acrylics
$paints["EvocationGourdon"]= $acrylic->paints["Acrylique/20211228_EvocationGourdon_AC73x90.jpg"];
$paints["LeFicus"]= $acrylic->paints["Acrylique/20220609_Le Ficus_AC20x20.jpg"];
$paints["Abutilons"]= $acrylic->paints["Acrylique/20221016_Abutilon_AC20x27.jpg"];
$paints["Pelagos"]= $acrylic->paints["Acrylique/20231109_Pelagos_AC41x61.jpg"];
$paints["Tournesols"]= $acrylic->paints["Acrylique/20231111_LesTournesols_AC24x30.jpg"];
$paints["BallonsOl"]= $acrylic->paints["Acrylique/20240218_BallonsOlympiques_AC55x38.jpg"];
$paints["Deflagration"]= $acrylic->paints["Acrylique/20240326_Deflagration_AC90x90.jpg"];
$paints["Distorsion"]= $acrylic->paints["Acrylique/20240529_Distorsion_AC46x55.jpg"];
$paints["Eclosion"]= $acrylic->paints["Acrylique/20240704_Eclosion_AC38x46.jpg"];

// Pastels et Autres
$paints["MichelPoly"]= $pastel->paints["Pastels/20210917_MichelPolynesie_PA20x28.jpg"];
$paints["BebeSourit"]= $pastel->paints["Pastels/20240119_Corentin2M_PA26x21.jpg"];
$paints["Tendresse"]= $pastel->paints["Pastels/20240227_Tendresse_PA30x24.jpg"];
$paints["BebeRose"]= $pastel->paints["Pastels/20240625_BebeRose_PA32x24.jpg"];

$paints["LesMouettes"]= $other->paints["Autres/20230202_LesMouettes_AQ40x30.jpg"];


$line_generator= new LineGenerator();
$line_generator->paints= $paints; // may contain paints that are not in serie
$line_generator->serie_dico= $serie;  // will be used to browse exclusively amongst serie
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
$line_generator->generate_style("Flamboyance", 50, 50, "white");
$line_generator->generate_style("ChapeauOrange", 50, 50, "white");
$line_generator->generate_style("EvocationGourdon", 50, 50, "white");
$line_generator->generate_style("LeFicus", 50, 50, "white");
$line_generator->generate_style("Abutilons", 50, 50, "white");
$line_generator->generate_style("Pelagos", 0, 50, "black");
$line_generator->generate_style("Tournesols", 50, 50, "white");
$line_generator->generate_style("BallonsOl", 50, 50, "white");
$line_generator->generate_style("Deflagration", 50, 50, "white");
$line_generator->generate_style("Distorsion", 50, 50, "white");
$line_generator->generate_style("Eclosion", 50, 50, "white");
$line_generator->generate_style("MichelPoly", 50, 50, "white");
$line_generator->generate_style("BebeSourit", 50, 50, "white");
$line_generator->generate_style("Tendresse", 50, 50, "white");
$line_generator->generate_style("BebeRose", 50, 50, "white");
$line_generator->generate_style("LesMouettes", 0, 50, "white");
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
      <!--   First argument is the height of the line -->
      <!--   The second number is the percent of width allocated to the first paint -->
<?= $line_generator->generate_double_line( "gem-medium-height", "Deflagration", 60, "Distorsion" ); ?>
<?= $line_generator->generate_double_line( "gem-small-height", "Eclosion", 50, "Tournesols" ); ?>
<?= $line_generator->generate_single_line( "gem-very-large-height", "Pelagos" ); ?>
<?= $line_generator->generate_double_line( "gem-medium-height", "EvocationGourdon", 60, "Tendresse" ); ?>
<?= $line_generator->generate_double_line( "gem-large-height", "ChapeauOrange", 60, "Flamboyance" ); ?>
<?= $line_generator->generate_double_line( "gem-medium-height", "Abutilons", 60, "BebeSourit" ); ?>
<?= $line_generator->generate_double_line( "gem-medium-height", "LesMouettes", 60, "BebeRose" ); ?>
<?= $line_generator->generate_single_line( "gem-large-height", "MichelPoly" ); ?>
<?= $line_generator->generate_double_line( "gem-medium-height", "BallonsOl", 60, "LeFicus" ); ?>


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
