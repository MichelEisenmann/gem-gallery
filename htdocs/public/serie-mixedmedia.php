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
$serie_key='mixedmedia';
$serie= $ALL_GALLERIES->paint_dictionnaries[$serie_key];

// ces dictionnaires sont les dictionnaires standard
$oil= $ALL_GALLERIES->paint_dictionnaries["oil"];
$pastel= $ALL_GALLERIES->paint_dictionnaries["pastel"];
$acrylic= $ALL_GALLERIES->paint_dictionnaries["acrylic"];

// On recupere toutes les peintures qu'on veut voir dans cette serie
// On les stocke dans "$paints" et on leur donne un ID qui doit etre sans caractere special.
// Cet ID servira a les designer le moment venu.
// Oils

// Acrylics
$paints["FlamandsRouges"]= $acrylic->paints["FlamandsRouges"];
$paints["LaVague"]= $acrylic->paints["LaVague"];
$paints["LesTournesols"]= $acrylic->paints["LesTournesols"];
$paints["Farandole"]= $acrylic->paints["Farandole"];
$paints["EtangAustral"]= $acrylic->paints["EtangAustral"];
$paints["Cathedrale"]= $acrylic->paints["Cathedrale"];
$paints["Poisson"]= $acrylic->paints["Poisson"];
$paints["LeverSoleilRouge"]= $acrylic->paints["LeverSoleilRouge"];
$paints["Savana"]= $acrylic->paints["Savana"];
$paints["PurpleSeagull"]= $acrylic->paints["PurpleSeagull"];
$paints["YellowSunset"]= $acrylic->paints["YellowSunset"];
$paints["ApresMidiOiseau"]= $acrylic->paints["ApresMidiOiseau"];
$paints["ApresLaPluie"]= $acrylic->paints["ApresLaPluie"];
$paints["RencontreAuSommet"]= $acrylic->paints["RencontreAuSommet"];
$paints["Carnaval"]= $acrylic->paints["Carnaval"];
$paints["Dryade"]= $acrylic->paints["Dryade"];
$paints["Spirale"]= $acrylic->paints["Spirale"];
$paints["Cavalcade"]= $acrylic->paints["Cavalcade"];
$paints["Leman"]= $acrylic->paints["Leman"];
$paints["TroisReveurs"]= $acrylic->paints["TroisReveurs"];

// Pastels

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
$column_generator->generate_style("FlamandsRouges", "noir");
$column_generator->generate_style("LaVague", "noir");
$column_generator->generate_style("LesTournesols", "noir");
$column_generator->generate_style("Farandole", "noir");
$column_generator->generate_style("EtangAustral", "noir");
$column_generator->generate_style("Cathedrale", "noir");
$column_generator->generate_style("Poisson", "noir");
$column_generator->generate_style("LeverSoleilRouge", "noir");
$column_generator->generate_style("Savana", "noir");
$column_generator->generate_style("PurpleSeagull", "noir");
$column_generator->generate_style("YellowSunset", "noir");
$column_generator->generate_style("ApresMidiOiseau", "noir");
$column_generator->generate_style("ApresLaPluie", "noir");
$column_generator->generate_style("RencontreAuSommet", "noir");
$column_generator->generate_style("Carnaval", "noir");
$column_generator->generate_style("Dryade", "noir");
$column_generator->generate_style("Spirale", "noir");
$column_generator->generate_style("Cavalcade", "noir");
$column_generator->generate_style("Leman", "noir");
$column_generator->generate_style("TroisReveurs", "noir");

    ?>

  </style>
  
  <body>

    <!-- Header -->
    <?php include("../public/navbar.php"); ?>
    
    <!-- Page Content -->
    <div class="w3-container w3-padding-16 w3-animate-opacity gem-animate gem-fixed-width">
      
      <!-- Text Part -->
      <div class="w3-container w3-left-align">
       <?= Translator::t("IntroComposition"); ?>
      </div>
      
       
      <!-- Paintings -->
      <div class="w3-grid" style="grid-template-columns:30% 70%">

        <!-- First column --> 
        <div class="w3-grid" style="grid-template-columns:auto; align-content:flex-start">
          <?= $column_generator->add_to_column("FlamandsRouges" ); ?>
          <?= $column_generator->add_to_column("LaVague" ); ?>
          <?= $column_generator->add_to_column("LesTournesols" ); ?>
          <?= $column_generator->add_to_column("Farandole" ); ?>
          <?= $column_generator->add_to_column("EtangAustral" ); ?>
          <?= $column_generator->add_to_column("Cathedrale" ); ?>
          <?= $column_generator->add_to_column("Poisson" ); ?>
          <?= $column_generator->add_to_column("LeverSoleilRouge" ); ?>
          <?= $column_generator->add_to_column("Savana" ); ?>
          <?= $column_generator->add_to_column("PurpleSeagull" ); ?>
          <?= $column_generator->add_to_column("YellowSunset" ); ?>

        </div>

        <!-- Second column --> 
        <div class="w3-grid" style="grid-template-columns:auto; align-content:flex-start">
          <?= $column_generator->add_to_column("ApresMidiOiseau" ); ?>
          <?= $column_generator->add_to_column("ApresLaPluie" ); ?>
          <?= $column_generator->add_to_column("RencontreAuSommet" ); ?>
          <?= $column_generator->add_to_column("Carnaval" ); ?>
          <?= $column_generator->add_to_column("Dryade" ); ?>
          <?= $column_generator->add_to_column("Spirale" ); ?>
          <?= $column_generator->add_to_column("Cavalcade" ); ?>
          <?= $column_generator->add_to_column("Leman" ); ?>
          <?= $column_generator->add_to_column("TroisReveurs" ); ?>

        </div>

      </div>
      
      <!-- Footer -->
      <?php include("../public/copyright.php"); ?>
      
    </div>
    
  </body>
</html>
