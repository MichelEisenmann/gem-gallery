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
<?php include ('../private/initialize_translator.php'); ?>
<?php include ('../private/initialize_galleries.php'); ?>

<?php
// This page displays
//  - the latest paint amongst all the known paints
//  - a paint browser that will let the user move through
//    paints set by set. The size of a set is fixed by pagination_size (see below)

// the latest paint is displayed on top of the gallery browser
$dico= $ALL_GALLERIES->all_paint_dictionnary;
$latest= $dico->sortedList[0];

// the rank of the active page
$current_page=0;
if (array_key_exists("pagination", $_GET) ) {
  $current_page=htmlspecialchars($_GET["pagination"]);
 }

$pagination_size= 5;

$number_of_pages= intdiv(sizeof($dico->sortedList), $pagination_size);
if ( $number_of_pages * $pagination_size < sizeof($dico->sortedList) ) {
    $number_of_pages= $number_of_pages +1;
}

// computed from the active page later
$rank_in_gallery=0;

?>


<script>
// Transfer the PHP variables into script global variables
// Paint information

var paintFiles= [];
var paintTitles= [];
var paintDescriptions= [];

<?php
foreach( $dico->sortedList as $paint ) {
?>
        paintFiles.push( "images/<?= $paint->file ?>" );
        paintTitles.push( "<?= $paint->full_title() ?>" );
        paintDescriptions.push( "<?= $paint->get_description() ?>" );
<?php
}
?>


// Pagination:
//
//    0 1 2 3 4 5 6 7 8 ...... 40
//            | - - - |
//              
//  total_number= 41 (number of paints)
//  current_page= 1 (starts at 0)
//  pagination_size= 5 (number of paints shown in one page - constant)
//  rank_in_gallery= 4 (computed from pagination_rank)

// total number of paints
var total_number= <?= count($dico->sortedList) ?>;

// size of pagination
var pagination_size= <?= $pagination_size ?>;

// number of pages
var number_of_pages= <?= $number_of_pages ?>;

// the rank of current selected paint in our gallery
var rank_in_gallery= <?= $rank_in_gallery ?>;

// the rank of the current page
var current_page= <?= $current_page ?>;

// ensure that the received values are consistent
function adjustPaginationValues() {
    if ( total_number < pagination_size ) {
        pagination_size= total_number;
    }
    
    // loops when arriving at the extremities
    if ( current_page < 0 ) {
        current_page= number_of_pages-1;
    }
    if ( current_page >= number_of_pages ) {
        current_page= 0;
    }

    // compute rank_in_gallery from pagination_rank
    rank_in_gallery= current_page * pagination_size;
}

adjustPaginationValues();

</script>

<title>GEM</title>
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

.center-paint {
    padding-top: 10px;
    padding-bottom: 10px;
    margin: auto;
    max-width: 600px;
    max-height: 500px;
    //    border: 1px solid;
}

.center-images {
    padding-top: 20px;
    padding-bottom: 10px;
}

.limited-image {
    max-width: 600px;
     margin-left: auto;
     margin-right: auto;
}

.fitting-image {
    width: 100px;
    height: 100px;
    object-fit: scale-down;
    border: 1px solid grey;
}

.hidden-image {
    display: none;
}

.visible-image {
}

.colored {
    background-color: dodgerblue;
  }


/* Pagination links */
.pagination a {
  color: black;
  float: left;
  padding: 8px 16px;
  text-decoration: none;
  transition: background-color .3s;
}

/* Style the active/current link */
.pagination a.active {
  background-color: dodgerblue;
  color: white;
}

/* Add a grey background color on mouse-over */
.pagination a:hover:not(.active) {background-color: #ddd;}


.espace {
    display: none;
}

/* Adjustments for phones */
@media only screen and (max-device-width: 576px) {
.limited-image {
    max-width: 100%;
     margin-left: auto;
     margin-right: auto;
}


.fitting-image {
    width: 60px;
    height: 60px;
    object-fit: scale-down;
    border: 1px solid grey;
}

</style>
  </head>

<body>
<!-- Navbar (sit on top) -->
<?php include("navbar.php"); ?>

<?php
  // space for the navbar
  echo "<div class=\"w3-container top-container\">";
  echo "<h1></h1>";
  echo "</div>";
?>

<div class="w3-container">

<!-- ------------------------------------------------------- -->
<!-- latest paint -->

<div class="w3-center">
  <a
      href="<?= Translator::url('../public/affichage_peinture.php', "?key=all&rank=0" ) ?>">
    <img class="limited-image" alt="<?= $GEM_SIGNATURE; ?>" src="images/<?= $latest->file ?>" alt="" />

  </a>
</div>


<!-- ------------------------------------------------------- -->
<!-- pagination with images -->

<div class="w3-center">
<?php
  $i= 0;
foreach( $dico->sortedList as $paint ) {
?>
<a id="paint-<?= $i ?>" class="hidden-image" href="<?= Translator::url('../public/affichage_peinture.php', "?key=all&rank=" .$i ) ?>">
  <img 
       class="fitting-image"
       src="images/<?= $paint->getThumbnailFile(); ?>"
       >
</a>
<?php
$i++;
}
?>

</div>

<div class="w3-center pagination">
<div class="w3-bar">
<a href="#" onClick="showPrevious();">&laquo;</a>
<?php
     for ($i= 0; $i < $number_of_pages; $i++ ) {
?>
<a id="page-<?= $i ?>" href="#" onClick="showPage(<?= $i ?>);"><?= $i ?></a>

<?php
 }
?>
<a href="#" onClick="showNext();">&raquo;</a>

</div>
</div>


<!-- ------------------------------------------------------- -->

<script>

// used to intialize the pagination bar
updateDocument();

// Used to toggle the menu on small screens when clicking on the menu button
function toggleFunction() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else {
        x.className = x.className.replace(" w3-show", "");
    }
}

function showPage( page) {
    current_page= page;
    adjustPaginationValues();
    updateDocument();
}

function showPrevious() {
    current_page= current_page -1;
    adjustPaginationValues();
    updateDocument();
}

function showNext() {
    current_page= current_page + 1;
    adjustPaginationValues();
    updateDocument();
}

function updateDocument() {
    // update the visible images
    for ( i= 0; i < total_number; i++ ) {
        var img= document.getElementById("paint-" + i);
        if ( img == null ) continue;
        if ( i < rank_in_gallery ) {
            makeHidden(img);
        } else if ( i >= rank_in_gallery + pagination_size ) {
            makeHidden(img);
        } else {
            makeVisible(img);
        }
    }
    // activate the current page
    for ( i= 0; i < number_of_pages; i++ ) {
        var mark= document.getElementById("page-" + i);
        if ( i == current_page ) {
            makeActive(mark);
        } else {
            makeInactive(mark);
        }
    }
}

function makeVisible( img ) {
    if ( img.classList.contains("hidden-image" ) ) {
        img.classList.remove("hidden-image");
        img.classList.add( "visible-image" );
    } 
}

function makeHidden( img ) {
    if ( img.classList.contains("visible-image" ) ) {
        img.classList.remove("visible-image");
        img.classList.add( "hidden-image" );
    } 
}

function makeActive( img ) {
    if ( !img.classList.contains("active" ) ) {
        img.classList.add("active");
    }
}

function makeInactive( img ) {
    if ( img.classList.contains("active" ) ) {
        img.classList.remove("active");
    }
}

function printVariables() {
    console.log( "rank: " + rank_in_gallery );
    console.log( "current_page: " + current_page );
    console.log( "total_number: " + total_number );
}

</script>

</div>
</body>
</html>
