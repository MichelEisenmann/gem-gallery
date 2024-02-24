<!DOCTYPE html>
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

<title>Galeries</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif;}

.top-container {
    padding-top: 50px;
}

div.gallery {
    border: 1px solid #ccc;
}

div.gallery:hover {
    border: 1px solid #777;
}

div.gallery img {
    float: left;
    width: 100%;
    aspect-ratio: 1;
    object-fit: contain;
}

div.desc {
    padding: 15px;
    text-align: center;
}

* {
    box-sizing: border-box;
}

.limited {
    height: 200px;
}

.smalltextref {
  text-decoration: none;
}

.smalltextref:link, .smalltextref:visited {
  background-color: #FAFAFA;
  color: black;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}

.smalltextgrid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 2px;
    align-items: center;
    justify-items: center;
    margin: auto;
    font-size: 20px;
}

.textref {
  text-decoration: none;
}

.textgrid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 2px;
    align-items: center;
    justify-items: center;
    margin: auto;
    font-size: 30px;
}

.grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 10px;
    align-items: center;
    justify-items: center;
    margin: auto;
    font-size: 30px;
}
.grid img {
    border: 1px solid #ccc;
    box-shadow: 2px 2px 6px 0px  rgba(0,0,0,0.3);
    max-width: 100%;
}


@media only screen and (max-device-width: 576px) {
    .textgrid {
        grid-template-columns: repeat(4, 1fr);
        font-size: 15px;
    }

    .smalltextgrid {
        grid-template-columns: repeat(4, 1fr);
        font-size: 15px;
    }

    .limited {
        height: 100px;
        gap: 2px;
    }

}

.clearfix:after {
    content: "";
    display: table;
    clear: both;
}
</style>

</head>

<script>
// Transfer the PHP variables into script global variables
// Paint information

var dicoKey= "all";
var gemSignature= "<?= $GEM_SIGNATURE ?>";
</script>

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
    <a href="/public/acces_a_toutes.php" class="w3-bar-item w3-button w3-hide-small"><i class="fa fa-th"></i> PORTFOLIO</a>
    <a href="/public/contenu_d_une_galerie.php?key=new" class="w3-bar-item w3-button w3-hide-small"><i class="fa fa-th"></i> NOUVELLES OEUVRES</a>
    <a href="/index.html#contact" class="w3-bar-item w3-button w3-hide-small"><i class="fa fa-envelope"></i> CONTACT</a>
  </div>

  <!-- Navbar on small screens -->
  <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium">
    <a href="/index.html" class="w3-bar-item w3-button" onclick="toggleFunction()">ACCUEIL</a>
    <a href="/public/expositions.html" class="w3-bar-item w3-button" onclick="toggleFunction()">EXPOSITIONS</a>
    <a href="/public/acces_a_toutes.php" class="w3-bar-item w3-button" onclick="toggleFunction()">PORTFOLIO</a>
    <a href="/public/contenu_d_une_galerie.php?key=new" class="w3-bar-item w3-button" onclick="toggleFunction()">NOUVELLES OEUVRES</a>
    <a href="/index.html#contact" class="w3-bar-item w3-button" onclick="toggleFunction()">CONTACT</a>
  </div>
</div>

<!-- reserve some space for the navbar -->
<div class="w3-container top-container">
<h1></h1>
</div>

<div class="w3-content">

<?php
$main_galleries_ids= array("oil", "acrylic", "pastel", "other");
$main_galleries= array();
$other_valid_galleries= array();

// we want the main_galleries in the order of their ids
foreach ( $main_galleries_ids as $gallery_id ) {
    $main_galleries[]= $ALL_GALLERIES->paint_dictionnaries[$gallery_id];
}

foreach ( $ALL_GALLERIES->paint_dictionnaries as $dico ) {
  // skip empty dictionaries and dictionaries that are not supposed to be shown
  if ( count($dico->paints) == 0 || $dico->shownInSelector == FALSE ) {
    continue;
  }
  // skip the main types
  if ( ! in_array($dico->key, $main_galleries_ids) ) {
    $other_valid_galleries[]= $dico;
  }
}
?>

  <div class="textgrid">
<?php
foreach ( $main_galleries as $dico ) {
?>
     <a class="textref w3-hover-grey" href="../public/contenu_d_une_galerie.php?key=<?= $dico->key; ?>">
       <?= ucfirst($dico->name); ?>
     </a>
<?php
}
?>
  </div>

<hr style="width:100%;text-align:left;margin-left:0">

  <div class="smalltextgrid">
<?php
foreach ( $other_valid_galleries as $dico ) {
?>
     <a class="smalltextref w3-hover-grey" href="../public/contenu_d_une_galerie.php?key=<?= $dico->key; ?>">
       <?= ucfirst($dico->name); ?>
     </a>
<?php
}
?>
  </div>

<hr style="width:100%;text-align:left;margin-left:0">

</div>

<div class="w3-content">
    <div class="grid">
<?php
    $rank= 0;
   $dico= $ALL_GALLERIES->all_paint_dictionnary;
foreach( $dico->sortedList as $paint ) {
  ?>
      <a href="../public/affichage_peinture.php?key=all&rank=<?= $rank ?>">
        <img class="limited" alt="<?= $GEM_SIGNATURE; ?>" src="images/<?= $paint->getThumbnailFile() ?>" alt="" />
      </a>

<?php
    $rank=$rank+1;
        }  
   ?>
</div>
</div>

<div class="clearfix"></div>    

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
</script>

</body>
</html>
