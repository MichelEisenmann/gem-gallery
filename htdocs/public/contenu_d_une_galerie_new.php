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

// Pagination:
//
//    0 1 2 3 4 5 6 7 8 ...... 40
//          |-X-----|
//              
//  total_number= 41
//  rank_in_gallery= 4
//  pagination_start= 3
//  pagination_size= 5  (constant)


// total number of paints
$total_number= count($dico->sortedList);

// size of pagination
$pagination_size= 5;
if ( $total_number < $pagination_size ) {
  $pagination_size= $total_number;
 }

// the rank of current selected paint in our gallery
$rank_in_gallery=0;
if (array_key_exists("rank", $_GET) ) {
  $rank_in_gallery=htmlspecialchars($_GET["rank"]);
 }
if ( $rank_in_gallery >= $total_number ) {
  $rank_in_gallery= $total_number-1;
 }

// the rank of the first paint shown in the pagination
$pagination_start=0;
if (array_key_exists("pagination", $_GET) ) {
  $pagination_start=htmlspecialchars($_GET["pagination"]);
 }

// adjust the pagination start so that it fits 
if ( $rank_in_gallery < $pagination_start ) {
  $pagination_start= $rank_in_gallery;
 } else if ( $rank_in_gallery > $pagination_start + $pagination_size ) {
  $pagination_start= $rank_in_gallery;
 }
if ( $pagination_start > $total_number - $pagination_size ) {
  $pagination_start= $total_number - $pagination_size -1;
 }

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

.center-pagination {
    padding-top: 10px;
    padding-bottom: 10px;
    margin: auto;
    width: 60%;
    border: 1px solid;
}

.fitting-image {
    width: 100px;
    height: 100px;
    object-fit: scale-down;
    border: 1px solid;
}

.hidden-image {
    display: none;
}

.pagination-button {
    font-size: 20px;
}

.visible-image {
}

.pagination {
	display: inline-block;
}

.pagination img.active {
	background-color: #4CAF50;
	color: white;
	border: 1px solid #4CAF50;
}

.pagination img:hover:not(.active) {background-color: #ddd;}
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

     <!-- ------------------------------------------------------- -->
     <!-- pagination with images -->

     <div class="center-pagination">
       <!-- necessaire pour etre centre a l'interieur du div de dessus -->
       <div class="pagination w3-center" style="width:100%;margin:auto;">
         <button class="w3-button w3-round pagination-button"
                 onClick="paginatePrevious(<?= $pagination_start ."," .$pagination_size ."," .$rank_in_gallery ?>);">
         &laquo;</button>
	     <?php
$i= 0;
foreach( $dico->sortedList as $paint ) {
  $status= "visible-image";
  if ( $i < $pagination_start || $i > $pagination_start + $pagination_size ) {
    $status= "hidden-image";
  }
  if ( $i == $rank_in_gallery ) {
      $status= $status ." active";
  }
     ?>
       <img class="fitting-image <?= $status ?>"
          src="images/<?= $paint->getThumbnailFile(); ?>"
          alt="<?= htmlspecialchars($paint->full_title()); ?>"
          onClick="selectPaint(<?= $pagination_start ."," .$i ?>);"
          >
	   <?php
  $i++;
}
       ?>
         <button class="w3-button w3-round pagination-button"
                 onClick="paginateNext(<?= $pagination_start ."," .$pagination_size ."," .$rank_in_gallery ?>);">
           &raquo;</button>
         </div>
       </div>

     <!-- ------------------------------------------------------- -->
     <!-- the selected paint -->

     <?php
$paint= $dico->get_paint($rank_in_gallery);
     ?>
     <div class="center-pagination">
       <div class="w3-container w3-center" style="width:100%;margin:auto;">
         <div class="w3-card-4" >
           <div class="w3-container">
             <h4><?= $rank_in_gallery+1 ."/" .$total_number ?>
           </div>
           <div class="w3-container">
             <h4><b><?= htmlspecialchars($paint->full_title()); ?></b>
           </div>
           <a href="../public/affichage_peinture.php?key=<?= $dico->key; ?>&rank=<?= $rank_in_gallery; ?>">
           <img src="images/<?= $paint->getThumbnailFile(); ?>"
                alt="<?= htmlspecialchars($paint->full_title()); ?>"
		        style="width:100%" >
           </a>
         </div>
       </div>
     </div>


     <!-- ------------------------------------------------------- -->

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
    location.replace("/public/contenu_d_une_galerie_new.php?key=" + x);
}

function paginatePrevious(page, size, rank) {
    var x = document.getElementById("gallery_selector").value;
    var nextRank= rank-1;
    if ( nextRank < 0 ) {
        nextRank= 0;
    }
    location.replace("/public/contenu_d_une_galerie_new.php?key=" + x
                     + "&rank=" + nextRank
                     + "&pagination=" + page );
}

function paginateNext(page, size, rank) {
    var x = document.getElementById("gallery_selector").value;
    var nextRank= rank+1;
    location.replace("/public/contenu_d_une_galerie_new.php?key=" + x
                     + "&rank=" + nextRank
                     + "&pagination=" + page );
}

function selectPaint(page, rank) {
    var x = document.getElementById("gallery_selector").value;
    location.replace("/public/contenu_d_une_galerie_new.php?key=" + x
                     + "&rank=" + rank
                     + "&pagination=" + page );
}

</script>

  </body>
</html>
