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
$sanguine = $ALL_GALLERIES->paint_dictionnaries["sanguine"];

// On recupere toutes les peintures qu'on veut voir dans cette serie
// On les stocke dans "$paints" et on leur donne un ID qui doit etre sans caractere special.
// Cet ID servira a les designer le moment venu.
// Oils
$paints["ClairDeSoleil"]= $oil->paints["ClairDeSoleil"];
$paints["BaignadeRiviereCudgen"]= $oil->paints["BaignadeRiviereCudgen"];
$paints["SakuraNenuphars"]= $oil->paints["SakuraNenuphars"];
$paints["BrumesDuSoir"]= $oil->paints["BrumesDuSoir"];
$paints["MilieuTorrent"]= $oil->paints["MilieuTorrent"];
$paints["EgretYellowSunset"]= $oil->paints["EgretYellowSunset"];
$paints["IlotMangrove"]= $oil->paints["IlotMangrove"];
$paints["RiverBank"]= $oil->paints["RiverBank"];
$paints["LacBleu"]= $oil->paints["LacBleu"];

// Acrylics
$paints["JeuxVagues"]= $acrylic->paints["JeuxVagues"];
$paints["ParisQuaiSeine"]= $acrylic->paints["ParisQuaiSeine"];
$paints["AustralianPelican"]= $acrylic->paints["AustralianPelican"];
$paints["PinkSunset"]= $acrylic->paints["PinkSunset"];
$paints["BlueSunset"]= $acrylic->paints["BlueSunset"];
$paints["MangroveCockatoo"]= $acrylic->paints["MangroveCockatoo"];
$paints["LaVague"]= $acrylic->paints["LaVague"];
$paints["MarinaKeithCurran"]= $acrylic->paints["MarinaKeithCurran"];
$paints["Contemplation"]= $acrylic->paints["Contemplation"];
$paints["YellowAigrette"]= $acrylic->paints["YellowAigrette"];
$paints["PelicanToutSeul"]= $acrylic->paints["PelicanToutSeul"];
$paints["Leman"]= $acrylic->paints["Leman"];


// Pastels
$paints["LaBragueTamarin"]= $pastel->paints["LaBragueTamarin"];
$paints["BrisbaneNorthBank"]= $pastel->paints["BrisbaneNorthBank"];
$paints["OlenSiagneDoree"]= $pastel->paints["OlenSiagneDoree"];




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

$column_generator->generate_style("ClairDeSoleil", "black");
$column_generator->generate_style("BaignadeRiviereCudgen", "black");
$column_generator->generate_style("SakuraNenuphars", "black");
$column_generator->generate_style("BrumesDuSoir", "white");
$column_generator->generate_style("MilieuTorrent", "black");
$column_generator->generate_style("EgretYellowSunset", "noir");
$column_generator->generate_style("IlotMangrove", "white");
$column_generator->generate_style("RiverBank", "white");
$column_generator->generate_style("LacBleu", "black");
$column_generator->generate_style("JeuxVagues", "black");
$column_generator->generate_style("ParisQuaiSeine", "white");
$column_generator->generate_style("AustralianPelican", "white");
$column_generator->generate_style("PinkSunset", "black");
$column_generator->generate_style("BlueSunset", "black");
$column_generator->generate_style("MangroveCockatoo", "white");
$column_generator->generate_style("LaVague", "white");
$column_generator->generate_style("MarinaKeithCurran", "white");
$column_generator->generate_style("Contemplation", "black");
$column_generator->generate_style("YellowAigrette", "white");
$column_generator->generate_style("PelicanToutSeul", "white");
$column_generator->generate_style("Leman", "noir");
$column_generator->generate_style("LaBragueTamarin", "white");
$column_generator->generate_style("BrisbaneNorthBank", "black");
$column_generator->generate_style("OlenSiagneDoree", "black");



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
      <div class="w3-grid" style="grid-template-columns:100%">
    
		  <!-- single column --> 
	  <div class="w3-grid" style="grid-template-columns:100%">
        <div class="w3-grid" style="grid-template-columns:auto; align-content:flex-start">
		  <?= $column_generator->add_to_column( "BaignadeRiviereCudgen" ); ?>
        </div>
      </div>
	  
	  <!-- first column --> 
      <div class="w3-grid" style="grid-template-columns:40% 30% 30%">
	  
        <div class="w3-grid" style="grid-template-columns:auto; align-content:flex-start">
		<?= $column_generator->add_to_column( "ClairDeSoleil" ); ?>
		<?= $column_generator->add_to_column( "BrumesDuSoir" ); ?>
		<?= $column_generator->add_to_column( "EgretYellowSunset" ); ?>
		  <?= $column_generator->add_to_column( "MangroveCockatoo" ); ?>
		  <?= $column_generator->add_to_column( "RiverBank" ); ?>
		 <?= $column_generator->add_to_column( "JeuxVagues" ); ?>
		 <?= $column_generator->add_to_column( "AustralianPelican" ); ?>
		  <?= $column_generator->add_to_column( "BlueSunset" ); ?>
         <?= $column_generator->add_to_column( "LaVague" ); ?>
         <?= $column_generator->add_to_column( "Contemplation" ); ?>
        </div>

		
       <!-- second column --> 	    
       <div class="w3-grid" style="grid-template-columns:auto; align-content:flex-start">		
		  <?= $column_generator->add_to_column( "PelicanToutSeul" ); ?>
		  <?= $column_generator->add_to_column( "LaBragueTamarin" ); ?>
		  <?= $column_generator->add_to_column( "OlenSiagneDoree" ); ?>
		  <?= $column_generator->add_to_column( "Leman" ); ?>		  
		  <?= $column_generator->add_to_column( "BrisbaneNorthBank" ); ?>
		  <?= $column_generator->add_to_column( "OlenSiagneDoree" ); ?>
		</div>
	   
	   
	   
        <!-- third column -->        
        <div class="w3-grid" style="grid-template-columns:auto; align-content:flex-start">
		  <?= $column_generator->add_to_column( "SakuraNenuphars" ); ?>
		  <?= $column_generator->add_to_column( "MilieuTorrent" ); ?>
		  <?= $column_generator->add_to_column( "IlotMangrove" ); ?>
		  <?= $column_generator->add_to_column( "LacBleu" ); ?>
          <?= $column_generator->add_to_column( "ParisQuaiSeine" ); ?> 
		  <?= $column_generator->add_to_column( "PinkSunset" ); ?>
		  <?= $column_generator->add_to_column( "MangroveCockatoo" ); ?>
		  <?= $column_generator->add_to_column( "MarinaKeithCurran" ); ?>
		  <?= $column_generator->add_to_column( "YellowAigrette" ); ?>
        </div>
  

      </div>

      </div>
 
      
     <!-- Footer -->
    <?php include("../public/copyright.php"); ?>
    
    </div>
  </body>
</html>
