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
$serie_key='momentsfeminins';
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
$paints["LesDanseuses"]= $oil->paints["Huile/20230216_LesDanseuses_Huile.jpg"];
$paints["ClairDeSoleil"]= $oil->paints["Huile/20230708_ClairDeSoleil_HU92x65.jpg"];
$paints["TheRiverBankVlaminck"]= $oil->paints["Huile/20230921_TheRiverBank_Vlaminck_38x46.jpg"];
$paints["BaigneursRiviere"]= $oil->paints["Huile/20240204_Baigneurs_Huile_50x100.jpg"];
$paints["SakuraNenuphars"]= $oil->paints["Huile/20240613_Sakura-nenuphars_HU54x73.jpg"];
$paints["BrumesDuSoir"]= $oil->paints["Huile/20240728_Brume_HU54x73.jpg"];
$paints["LeTorrent"]= $oil->paints["Huile/20241225_LeTorrent_HU41x33.jpg"];
$paints["AirMarin"]= $oil->paints["Huile/20250314_AirMarin_HU50x50.jpg"];
$paints["PortraitPascale"]= $oil->paints["Huile/20250319_PortraitPascale_HU50x50.jpg"];

// Acrylics
$paints["JeuxDeRegards"]= $acrylic->paints["Acrylique/20220821_Regards.jpg"];
$paints["Contemplation"]= $acrylic->paints["Acrylique/20230530_Contemplation_A100x73.jpg"];
$paints["Aigrette"]= $acrylic->paints["Acrylique/20240822_Aigrette_AC50x76.jpg"];
$paints["PelicanSeul"]= $acrylic->paints["Acrylique/20240915_Pelican_AC55x38.jpg"];
$paints["LaLectrice"]= $acrylic->paints["Acrylique/20250421_Lectrice_AC50x50.jpg"];
$paints["LaPiscine"]= $acrylic->paints["Acrylique/20250504_La piscine-AC50x50.jpg"];

// Autres
$paints["SanguinePascaleGui"]= $other->paints["Autres/20200920_SanguinePascaleGuillaume.jpg"];


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
$line_generator->generate_style("AirMarin", 50, 50, "white");
$line_generator->generate_style("PortraitPascale", 50, 50, "white");
$line_generator->generate_style("PelicanSeul", 50, 50, "white");
$line_generator->generate_style("ClairDeSoleil", 70, 50, "white");
$line_generator->generate_style("BaigneursRiviere", 0, 100, "white");
$line_generator->generate_style("Contemplation", 70, 70, "black");
$line_generator->generate_style("LeTorrent", 0, 50, "black");
$line_generator->generate_style("TheRiverBankVlaminck", 50, 50, "white");
$line_generator->generate_style("LesDanseuses", 50, 50, "white");
$line_generator->generate_style("BrumesDuSoir", 50, 50, "white");
$line_generator->generate_style("LaPiscine", 70, 50, "white");
$line_generator->generate_style("Aigrette", 50, 100, "white");
$line_generator->generate_style("SanguinePascaleGui", 40, 50, "white");
$line_generator->generate_style("SakuraNenuphars", 50, 50, "white");
$line_generator->generate_style("JeuxDeRegards", 50, 50, "white");
$line_generator->generate_style("LaLectrice", 50, 50, "white");
    ?>
  </style>
  
  <body>

    <!-- Header -->
    <?php include("../public/navbar.php"); ?>
    
    <!-- Page Content -->
    <div class="w3-container w3-padding-16 w3-animate-opacity gem-animate gem-fixed-width">
      
      <!-- Text Part -->
      <div class="w3-container w3-left-align">
        <?= Translator::t("IntroMomentsFem"); ?>
        </div>
      
      <!-- Galerie/Exposition photo -->
<!--      <div class="w3-container w3-center">
	<img src="/public/images/web/expo-seillans.png" alt="" style="width:100%">
      </div>
-->      
      
      <!-- Paintings -->
      <!--   First argument is the height of the line -->
      <!--   The second number is the percent of width allocated to the first paint -->
<?= $line_generator->generate_double_line( "gem-large-height", "AirMarin", 60, "PelicanSeul" ); ?>
<?= $line_generator->generate_single_line( "gem-medium-height", "BaigneursRiviere" ); ?>
<?= $line_generator->generate_double_line( "gem-large-height", "ClairDeSoleil", 60, "LaLectrice" ); ?>
<?= $line_generator->generate_double_line( "gem-large-height", "LeTorrent", 60, "LaPiscine" ); ?>
<?= $line_generator->generate_single_line( "gem-medium-height", "BrumesDuSoir" ); ?>
<?= $line_generator->generate_single_line( "gem-medium-height", "LesDanseuses" ); ?>
<?= $line_generator->generate_double_line( "gem-large-height", "Contemplation", 60, "TheRiverBankVlaminck" ); ?>
<?= $line_generator->generate_double_line( "gem-medium-height", "SakuraNenuphars", 60, "JeuxDeRegards" ); ?>
<?= $line_generator->generate_double_line( "gem-medium-height", "SanguinePascaleGui", 50, "PortraitPascale" ); ?>
<?= $line_generator->generate_single_line( "gem-medium-height", "Aigrette" ); ?>

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
