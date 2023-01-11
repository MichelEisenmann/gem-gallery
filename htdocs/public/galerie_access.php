<!DOCTYPE html>
<html>
  <head>
    <title>GEM site</title>
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
    <div w3-include-html="navbar.html"></div>

<?php include ('../private/initialize.php'); ?>
<?php include ('../private/initialize_galleries.php'); ?>

<div class="w3-container top-container">
<h1>Galeries<h1>
</div>

<?php
         // $GALLERY_BROWSER->print();
foreach ( $GALLERY_BROWSER->dictionnaries as $dico ) {
    // skip empty dictionaries
    if ( count($dico->paints) == 0 ) {
        continue;
    }
    $latest= $dico->mostRecents[0];
    //    echo $dico->type ."<br>";
    //    echo $dico->mostRecents[0]->print() ."<br>";
?>
    <div class="responsive">
     <div class="gallery">
              <a href="../public/galerie_spread.php?type=<?= $dico->type; ?>">
       <img src="images/<?= $latest->file; ?>"
	    >
              </a>
       <div class="desc"><h2><?= ucfirst($dico->name); ?></h2></div>
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
