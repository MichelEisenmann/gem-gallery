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
$serie_key='momentsfeminins';
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
$paints["LesDanseusesNoires"]= $oil->paints["LesDanseusesNoires"];
$paints["ClairDeSoleil"]= $oil->paints["ClairDeSoleil"];
$paints["RiverBank"]= $oil->paints["RiverBank"];
$paints["BaignadeRiviereCudgen"]= $oil->paints["BaignadeRiviereCudgen"];
$paints["SakuraNenuphars"]= $oil->paints["SakuraNenuphars"];
$paints["BrumesDuSoir"]= $oil->paints["BrumesDuSoir"];
$paints["MilieuTorrent"]= $oil->paints["MilieuTorrent"];
$paints["AirMarin"]= $oil->paints["AirMarin"];
$paints["PortraitPascale"]= $oil->paints["PortraitPascale"];
$paints["Nightclub"]= $oil->paints["Nightclub"];

// Acrylics
$paints["JeuDeRegard"]= $acrylic->paints["JeuDeRegard"];
$paints["Contemplation"]= $acrylic->paints["Contemplation"];
$paints["YellowAigrette"]= $acrylic->paints["YellowAigrette"];
$paints["PelicanToutSeul"]= $acrylic->paints["PelicanToutSeul"];
$paints["LectriceChaton"]= $acrylic->paints["LectriceChaton"];
$paints["LaPiscine"]= $acrylic->paints["LaPiscine"];


// Autres
$paints["SanguinePascale"]= $sanguine->paints["SanguinePascale"];


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
$column_generator->generate_style("AirMarin", "white");
$column_generator->generate_style("Nightclub", "white");
$column_generator->generate_style("PortraitPascale", "black");
$column_generator->generate_style("PelicanToutSeul", "white");
$column_generator->generate_style("ClairDeSoleil", "white");
$column_generator->generate_style("BaignadeRiviereCudgen", "white");
$column_generator->generate_style("Contemplation", "black");
$column_generator->generate_style("MilieuTorrent", "white");
$column_generator->generate_style("RiverBank", "white");
$column_generator->generate_style("LesDanseusesNoires", "white");
$column_generator->generate_style("BrumesDuSoir", "white");
$column_generator->generate_style("LaPiscine", "white");
$column_generator->generate_style("YellowAigrette", "white");
$column_generator->generate_style("SanguinePascale", "white");
$column_generator->generate_style("SakuraNenuphars", "white");
$column_generator->generate_style("JeuDeRegard", "white");
$column_generator->generate_style("LectriceChaton", "white");

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

      <!-- Paintings -->
      <div class="w3-grid" style="grid-template-columns:30% 40% 30%">
        <!-- First column --> 
        <div class="w3-grid" style="grid-template-columns:auto; align-content:flex-start">
          <?= $column_generator->add_to_column( "AirMarin" ); ?>
          <?= $column_generator->add_to_column( "PortraitPascale" ); ?>
          <?= $column_generator->add_to_column( "LectriceChaton" ); ?>
          <?= $column_generator->add_to_column( "LesDanseusesNoires" ); ?>
          <?= $column_generator->add_to_column( "MilieuTorrent" ); ?>
        </div>
        <!-- Second column --> 
        <div class="w3-grid" style="grid-template-columns:auto; align-content:flex-start">
          <?= $column_generator->add_to_column( "BaignadeRiviereCudgen" ); ?>
          <?= $column_generator->add_to_column( "ClairDeSoleil" ); ?>
          <?= $column_generator->add_to_column( "Nightclub" ); ?>
          <?= $column_generator->add_to_column( "BrumesDuSoir" ); ?>
          <?= $column_generator->add_to_column( "LaPiscine" ); ?>
        </div>
        <!-- Third column --> 
        <div class="w3-grid" style="grid-template-columns:auto; align-content:flex-start">
          <?= $column_generator->add_to_column( "SakuraNenuphars" ); ?>
          <?= $column_generator->add_to_column( "SanguinePascale" ); ?>
          <?= $column_generator->add_to_column( "Contemplation" ); ?>
          <?= $column_generator->add_to_column( "JeuDeRegard" ); ?>
          <?= $column_generator->add_to_column( "YellowAigrette" ); ?>
          <?= $column_generator->add_to_column( "PelicanToutSeul" ); ?>
        </div>
      </div>
      
     <!-- Footer -->
    <?php include("../public/copyright.php"); ?>
    
    </div>
  </body>
</html>
