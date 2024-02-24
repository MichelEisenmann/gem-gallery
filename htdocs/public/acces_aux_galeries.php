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

.grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 10px;
    align-items: center;
    justify-items: center;
    margin: auto;
}
.grid img {
    border: 1px solid #ccc;
    box-shadow: 2px 2px 6px 0px  rgba(0,0,0,0.3);
    max-width: 100%;
}
.grid img:nth-child(2) {
    grid-column: span 4;
}


@media only screen and (max-device-width: 576px) {
    .grid {
        grid-template-columns: repeat(2, 1fr);
    }

    .limited {
        height: 100px;
    }

}

.clearfix:after {
    content: "";
    display: table;
    clear: both;
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
    <a href="/public/acces_a_toutes.php" class="w3-bar-item w3-button w3-hide-small"><i class="fa fa-th"></i> PORTFOLIO</a>
    <a href="/public/contenu_d_une_galerie.php?key=new" class="w3-bar-item w3-button w3-hide-small"><i class="fa fa-th"></i> NOUVEAUTES</a>
    <a href="/index.html#contact" class="w3-bar-item w3-button w3-hide-small"><i class="fa fa-envelope"></i> CONTACT</a>
  </div>

  <!-- Navbar on small screens -->
  <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium">
    <a href="/index.html" class="w3-bar-item w3-button" onclick="toggleFunction()">ACCUEIL</a>
    <a href="/public/expositions.html" class="w3-bar-item w3-button" onclick="toggleFunction()">EXPOSITIONS</a>
    <a href="/public/acces_a_toutes.php" class="w3-bar-item w3-button" onclick="toggleFunction()">PORTFOLIO</a>
    <a href="/public/contenu_d_une_galerie.php?key=new" class="w3-bar-item w3-button" onclick="toggleFunction()">NOUVEAUTES</a>
    <a href="/index.html#contact" class="w3-bar-item w3-button" onclick="toggleFunction()">CONTACT</a>
  </div>
</div>


<div class="w3-container top-container">
<h1>Galeries<h1>
</div>

<div class="w3-content">
    <div class="grid">
      <a href="contenu_d_une_galerie.php?key=oil&file=Huile/20230216_LesDanseuses_Huile.jpg">
        <img class="limited" alt="<?= $GEM_SIGNATURE; ?>" src="images/Huile/20230216_LesDanseuses_Huile_small.jpg" alt="Huiles" /><br>Huiles</br>
      </a>
      <a href="contenu_d_une_galerie.php?key=acrylic&file=Acrylique/20211228_Evocation de Gourdon.jpg">
        <img class="limited" alt="<?= $GEM_SIGNATURE; ?>" src="images/Acrylique/20211228_Evocation de Gourdon_small.jpg" alt="Acrylique" /><br>Acryliques</br>
      </a>
      <a href="contenu_d_une_galerie.php?key=pastel&file=Pastels/20240119_Corentin2Mois.jpg">
        <img class="limited" alt="<?= $GEM_SIGNATURE; ?>" src="images/Pastels/20240119_Corentin2Mois_small.jpg" alt="Pastel" ><br>Pastels</br>			
      </a>
      <a href="contenu_d_une_galerie.php?key=other&file=Autres/20200920_SanguinePascaleGuillaume.jpg">
        <img class="limited" alt="<?= $GEM_SIGNATURE; ?>" src="images/Autres/20200920_SanguinePascaleGuillaume_small.jpg" alt="Autres" /><br>Autres</br>
      </a>
    </div>
</div>

<hr>
<div class="w3-content">
    <div class="grid">
<?php
    $main_galleries= array("oil", "acrylic", "pastel", "other");
      // $ALL_GALLERIES->print();
foreach ( $ALL_GALLERIES->paint_dictionnaries as $dico ) {
    // skip empty dictionaries and dictionaries that are not supposed to be shown
    if ( count($dico->paints) == 0 || $dico->shownInSelector == FALSE ) {
        continue;
    }
    // skip the main types
    if ( in_array($dico->key, $main_galleries) ) {
        continue;
    }
    $latest= $dico->sortedList[0];
?>
     <a href="../public/contenu_d_une_galerie.php?key=<?= $dico->key; ?>">
       <img class="limited" alt="<?= $GEM_SIGNATURE ?>" src="images/<?= $latest->getThumbnailFile(); ?>"
	    >
       <br><?= ucfirst($dico->name); ?> </br>
     </a>
<?php
}
?>
</div>
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
