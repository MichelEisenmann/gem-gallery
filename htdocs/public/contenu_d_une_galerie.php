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
    $dico_key=htmlspecialchars($_GET["key"]);
    $dico= $ALL_GALLERIES->paint_dictionnaries[$dico_key];
?>

    <title><?= ucfirst($dico->name) ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
      .top-container {
      padding-top: 50px;
      }
	  
	  .description {
		  font-size: 10px; 
	  }

.center {
        text-align: center;
        padding-top: 50px;
        padding-bottom: 10px;
        margin: auto;
        width: 40%;
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



<?php
    $count= $dico->get_count();
    $first= true;
    $cur= 1;
    // change row every 6
    $every= 6;
?>


<div class="center">
<select id="gallery_selector" onChange="gallerySelected();">
<?php
foreach ( $ALL_GALLERIES->paint_dictionnaries as $cur_dico ) {
    // skip empty dictionaries
    if ( count($cur_dico->paints) == 0 ) {
        continue;
    }
    if ( $cur_dico == $dico ) {
        echo "<option value=\"" .$cur_dico->key ."\" selected>" .$cur_dico->name ."</option><br>";
    } else {
        echo "<option value=\"" .$cur_dico->key ."\">" .$cur_dico->name ."</option><br>";
    }
}
?>
</select>
</div>

<div class="w3-row-padding w3-container">
<div class="w3-row-padding">



<?php
foreach( $dico->sortedList as $paint ) {
  if ( $cur % $every == 1 && !$first ) {
?>
</div>
<br>
<div class="w3-row-padding">
<?php
  }
  $first= false;
?>

<div class="w3-col m2 w3-center">
  <div class="w3-card-4">
       <a href="../public/affichage_peinture.php?key=<?= $dico->key; ?>&rank=<?= $cur-1; ?>">
            <img src="images/<?= $paint->getThumbnailFile(); ?>"
                 alt="<?= htmlspecialchars($paint->full_title()); ?>"
		 style="width:100%"
	    >
       </a>
       <div class="w3-container description">
          <button onclick="openAdditionalInfo('<?= $cur; ?>')" class="w3-button w3-block w3-left-align">
          <p><?= ucfirst(htmlspecialchars($paint->full_title())); ?> <i class="fa fa-arrow-circle-down"></i></p>

	  </button>
       </div>
       <div id='<?= $cur; ?>' class="w3-container w3-hide description">
	 <p><?= htmlspecialchars($paint->get_description()); ?></p>
	 <p><?= $paint->get_date(); ?></p>
       </div>
  </div>
</div>

<?php
   $cur++;
}
?>

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

// Used to open the part that shows description + size
function openAdditionalInfo(id) {
  var x = document.getElementById(id);
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else {
    x.className = x.className.replace(" w3-show", "");
  }
}          

function gallerySelected() {
    var x = document.getElementById("gallery_selector").value;
    location.replace("/public/contenu_d_une_galerie.php?key=" + x);
}

</script>

</body>
</html>
