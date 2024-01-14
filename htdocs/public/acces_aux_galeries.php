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

.responsive {
  padding: 0 6px;
  float: left;
  width: 24.99999%;
}

@media only screen and (max-width: 700px) {
  .responsive {
    width: 49.99999%;
    margin: 6px 0;
  }
}

// mobile vertical
@media only screen and (max-width: 500px) {
  .responsive {
    width: 100%;
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
    <a href="/public/acces_aux_galeries.php" class="w3-bar-item w3-button"><i class="fa fa-th"></i> GALERIE</a>
    <a href="/index.html#contact" class="w3-bar-item w3-button w3-hide-small"><i class="fa fa-envelope"></i> CONTACT</a>
  </div>

  <!-- Navbar on small screens -->
  <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium">
    <a href="/index.html" class="w3-bar-item w3-button" onclick="toggleFunction()">ACCUEIL</a>
    <a href="/public/expositions.html" class="w3-bar-item w3-button" onclick="toggleFunction()">EXPOSITIONS</a>
    <a href="/public/acces_aux_galeries.php" class="w3-bar-item w3-button" onclick="toggleFunction()">GALERIE</a>
    <a href="/index.html#contact" class="w3-bar-item w3-button" onclick="toggleFunction()">CONTACT</a>
  </div>
</div>


<div class="w3-container top-container">
<h1>Galerie<h1>
</div>

<?php
         // $ALL_GALLERIES->print();
foreach ( $ALL_GALLERIES->paint_dictionnaries as $dico ) {
    // skip empty dictionaries
    if ( count($dico->paints) == 0 ) {
        continue;
    }
    $latest= $dico->sortedList[0];
    //    echo $dico->key ."<br>";
    //    echo $dico->sortedList[0]->print() ."<br>";
?>
    <div class="responsive">
     <div class="gallery">
              <a href="../public/contenu_d_une_galerie.php?key=<?= $dico->key; ?>">
       <img src="images/<?= $latest->getThumbnailFile(); ?>"
	    >
              </a>
       <div class="desc"><a href="../public/contenu_d_une_galerie.php?key=<?= $dico->key; ?>">
	   <?= ucfirst($dico->name); ?>
	          </a>
	   </div>
     </div>              
    </div>
<?php
}
?>
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
