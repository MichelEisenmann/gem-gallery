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
$paints["AutomneCezanne"]= $oil->paints["Huile/20211229_Automne_FromCezanne.jpg"];
$paints["PanierFraises"]= $oil->paints["Huile/20220723_Chardin-FraisesDesBois_HU60x80.jpg"];
$paints["Melancolie"]= $oil->paints["Huile/20220222_Melancolie_HU46x55.jpg"];
$paints["Donazac"]= $oil->paints["Huile/20230706_Donazac_Hu30P_65x92.jpg"];

// Acrylics
$paints["LaTrouee"]= $acrylic->paints["Acrylique/20210801_OlenLaTroueeDonazac_AC33x24.jpg"];
$paints["LucPlanneur"]= $acrylic->paints["Acrylique/20211003_LucPlanneur_AC30x40.jpg"];
$paints["GuiTetine"]= $acrylic->paints["Acrylique/20211019_PortraitGuillaumeTetine_AC33x24.jpg"];
$paints["OlenEnPied"]= $acrylic->paints["Acrylique/20211105_OlenEnPied_AC55x46.jpg"];
$paints["FlamandsRouges"]= $acrylic->paints["Acrylique/20220723_LesFlamantsRouges_AC50x50.jpg"];
$paints["GuilPiscine"]= $acrylic->paints["Acrylique/20210722_GuillaumePensePiscine_AC20x20.jpg"];



// Pastels et Autres
$paints["Lievre"]= $pastel->paints["Pastels/20200809_Le lievre.jpg"];
$paints["AmericanRobins"]= $pastel->paints["Pastels/20200815_AmericanRobin.jpg"];
$paints["Bisou"]= $pastel->paints["Pastels/20200824_GuillaumeMaximilien_Bisou.jpg"];
$paints["WadiRamm"]= $pastel->paints["Pastels/20200827_Desert Jordanie.jpg"];
$paints["PascRenaissance"]= $pastel->paints["Pastels/20201106_Pascale_RenaissanceItalienne.jpg"];


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
    /* Par ex: 50, 50 veut dire que le milieu de la peinture (W 50%, H 50%) est au centre de la zone */
	/* 0 est en haut à gauche. H 100 clippera plus vers le bas de la peinture */
    /* Le dernier parametre est la couleur du texte qui apparait quand la souris se deplace sur l image */
    
    <?php
$line_generator->generate_style("AutomneCezanne", 0, 50, "white");
$line_generator->generate_style("OlenEnPied", 50, 50, "white");
$line_generator->generate_style("PanierFraises", 50, 50, "white");
$line_generator->generate_style("LaTrouee", 50, 75, "black");
$line_generator->generate_style("GuiTetine", 50, 50, "white");
$line_generator->generate_style("Lievre", 50, 50, "white");
$line_generator->generate_style("FlamandsRouges", 100, 50, "white");
$line_generator->generate_style("Donazac", 50, 50, "white");
$line_generator->generate_style("AmericanRobins", 50, 50, "black");
$line_generator->generate_style("LucPlanneur", 50, 100, "white");
$line_generator->generate_style("Bisou", 50, 50, "white");
$line_generator->generate_style("WadiRamm", 50, 50, "white");
$line_generator->generate_style("GuilPiscine", 0, 80, "white");
$line_generator->generate_style("Melancolie", 50, 50, "black");
$line_generator->generate_style("PascRenaissance", 50, 50, "white");
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
      <!--   First argument is the height of the line -->
      <!--   The second number is the percent of width allocated to the first paint -->
<?= $line_generator->generate_double_line( "gem-large-height", "AutomneCezanne", 50, "OlenEnPied" ); ?>
<?= $line_generator->generate_single_line( "gem-large-height", "PanierFraises" ); ?>
<?= $line_generator->generate_double_line( "gem-large-height", "LaTrouee", 50, "GuiTetine" ); ?>
<?= $line_generator->generate_double_line( "gem-medium-height", "Lievre", 50, "AmericanRobins" ); ?>
<?= $line_generator->generate_single_line( "gem-medium-height", "Donazac" ); ?>
<?= $line_generator->generate_double_line( "gem-large-height", "FlamandsRouges", 50, "LucPlanneur" ); ?>
<?= $line_generator->generate_double_line( "gem-small-height", "Bisou", 50, "GuilPiscine" ); ?>
<?= $line_generator->generate_single_line( "gem-small-height", "WadiRamm" ); ?>
<?= $line_generator->generate_double_line( "gem-medium-height", "Melancolie", 50, "PascRenaissance" ); ?>



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
