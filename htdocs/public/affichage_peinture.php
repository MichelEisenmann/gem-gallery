<html>
  <head>

        <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-R9KWX3PWND"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-R9KWX3PWND');
</script>

<?php include ('../private/initialize.php'); ?>
<?php include ('../private/initialize_galleries.php'); ?>

<?php
     // receives the rank of the image and the dictionnary key
 $dico_key=htmlspecialchars($_GET["key"]);
 $dico= $ALL_GALLERIES->paint_dictionnaries[$dico_key];
 $rank= $_GET["rank"];
 $paint= $dico->get_paint($rank);
 $count= $dico->get_count();
 $next= $dico->get_next($rank);
 $prev= $dico->get_prev($rank);
?>

<title><?= ucfirst(htmlspecialchars($paint->full_title())); ?> </title>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
          
          <style>
.top-container {
    padding-top: 10px;
}
.title {
	font-size: 12px; 
}
.limited {
    max-height: 800px;
    max-width: 900px;
     display: block;
     margin-left: auto;
     margin-right: auto;
}


/* Adjustments for phones */
@media only screen and (max-device-width: 576px) {
.limited {
    width: 100%;
}
}

          </style>

        </head>

  <body>
<!-- Navbar (sit on top) -->
<!-- <div w3-include-html="public/navbar.html"></div> -->
<!-- Navbar (sit on top) -->
<div class="w3-top">
  <!-- on veut la navbar toujours au dessus -> modification de la classe des le depart -->
  <div class="w3-bar w3-card w3-animate-top w3-white" id="myNavbar">
    <a class="w3-bar-item w3-button w3-hover-black w3-hide-medium w3-hide-large w3-right" href="javascript:void(0);" onclick="toggleFunction()" title="Toggle Navigation Menu">
      <i class="fa fa-bars"></i>
    </a>
    <a href="/index.html" class="w3-bar-item w3-button">ACCUEIL</a>
    <a href="/public/expositions.html" class="w3-bar-item w3-button w3-hide-small"><i class="fa fa-globe"></i> EXPOSITIONS</a>
    <a href="/public/acces_aux_galeries.php" class="w3-bar-item w3-button"><i class="fa fa-th"></i> GALERIES</a>
    <a href="/public/acces_a_toutes.php" class="w3-bar-item w3-button w3-hide-small"><i class="fa fa-th"></i> PORTFOLIO</a>
    <a href="/public/contenu_d_une_galerie.php?key=new" class="w3-bar-item w3-button w3-hide-small"><i class="fa fa-th"></i> NOUVELLES OEUVRES</a>
    <a href="/index.html#contact" class="w3-bar-item w3-button w3-hide-small"><i class="fa fa-envelope"></i> CONTACT</a>
  </div>

  <!-- Navbar on small screens -->
  <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium">
    <a href="/index.html" class="w3-bar-item w3-button" onclick="toggleFunction()">ACCUEIL</a>
    <a href="/public/expositions.html" class="w3-bar-item w3-button" onclick="toggleFunction()">EXPOSITIONS</a>
    <a href="/public/acces_aux_galeries.php" class="w3-bar-item w3-button" onclick="toggleFunction()">GALERIES</a>
    <a href="/public/acces_a_toutes.php" class="w3-bar-item w3-button" onclick="toggleFunction()">PORTFOLIO</a>
    <a href="/public/contenu_d_une_galerie.php?key=new" class="w3-bar-item w3-button" onclick="toggleFunction()">NOUVELLES OEUVRES</a>
    <a href="/index.html#contact" class="w3-bar-item w3-button" onclick="toggleFunction()">CONTACT</a>
  </div>
</div>



<div class="w3-container top-container">
  <a href="../index.html"><i class="fa fa-arrow-circle-up"></i> Accueil</a>
  >
  <a href="../public/contenu_d_une_galerie.php?key=<?= $dico->key ."&rank=" .$rank ?>">Galerie <?= $dico->name ?></i></a>
  
  <div class="w3-container top-container">
    <div class="w3-card-4" >
      <div class="w3-row">

        <div class="w3-col w3-center s1">
          <button class="w3-button w3-round" onClick="goto_page(<?= "'".$dico->key ."'," .$prev ?>);"><i class="fa fa-step-backward"></i>
          </button>
        </div>

        <div class="w3-col w3-center s10 title">
          <?= ucfirst($paint->full_title()); ?> <br>
            <?= ucfirst($paint->description); ?>
        </div>

        <div class="w3-col w3-center s1">
            <button class="w3-button w3-round" onClick="goto_page(<?= "'".$dico->key ."'," .$next ?>);"><i class="fa fa-step-forward"></i>
            </button>
        </div>

      </div>
    </div>
  </div>
    
  <div class="w3-container">
    <div class="w3-card-4" >
      <img src="images/<?= $paint->file; ?>" class="limited" style=""/>
    </div>
  </div>

</div>
    
<!-- allow including some separate html file -->
<script src="../private/w3-include-html.js"></script>

<script>

// Used to toggle the menu on small screens when clicking on the menu button
function toggleFunction() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else {
        x.className = x.className.replace(" w3-show", "");
    }
}
          
function goto_page(key, rank) {
    location.replace("/public/affichage_peinture.php?key=" + key
                     + "&rank=" + rank );
}

</script>

</body>
</html>
