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

// the latest paint is displayed on top of the
// gallery browser
$dico= $ALL_GALLERIES->all_paint_dictionnary;
$latest= $dico->sortedList[0];

// the rank of current selected paint in our gallery
// OPTIONAL. If not given, the image variable must be set
$rank_in_gallery=0;
if (array_key_exists("rank", $_GET) ) {
  $rank_in_gallery=htmlspecialchars($_GET["rank"]);
 }

// the file of the paint. If given, it is used to compute
//   the rank in gallery
// OPTIONAL. Should be provided if the rank is unknown

$file_in_gallery="";
if (array_key_exists("file", $_GET) ) {
  $file_in_gallery=htmlspecialchars($_GET["file"]);
  $rank_in_gallery=$dico->get_file_rank($file_in_gallery);
 }

// the rank of the first paint shown in the pagination
$pagination_start=0;
if (array_key_exists("pagination", $_GET) ) {
  $pagination_start=htmlspecialchars($_GET["pagination"]);
 }

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
//          |-X-----|
//              
//  total_number= 41
//  rank_in_gallery= 4
//  pagination_start= 3
//  pagination_size= 5  (constant)

// total number of paints
var total_number= <?= count($dico->sortedList) ?>;

// size of pagination
var pagination_size= 5;

// the rank of current selected paint in our gallery
var rank_in_gallery= <?= $rank_in_gallery ?>;

// the rank of the first paint shown in the pagination
var pagination_start= <?= $pagination_start ?>;

// ensure that the received values are consistent
function adjustPaginationValues() {
    if ( total_number < pagination_size ) {
        pagination_size= total_number;
    }
    // loops when arriving at the extremities
    if ( rank_in_gallery < 0 ) {
        rank_in_gallery= total_number-1;
    }
    if ( rank_in_gallery >= total_number ) {
        rank_in_gallery= 0;
    }
    // adjust the pagination start so that it fits 
    if ( rank_in_gallery < pagination_start ) {
        pagination_start= rank_in_gallery;
    } else if ( rank_in_gallery >= pagination_start + pagination_size ) {
        pagination_start++;
        // special case when the pagination was totally off, we reset it to a valid value
        // (typically when arriving from index.html)
        if ( rank_in_gallery >= pagination_start + pagination_size ) {
            pagination_start= rank_in_gallery;
        }
    }
    if ( pagination_start > total_number - pagination_size ) {
        pagination_start= total_number - pagination_size;
    }
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
    //    border: 1px solid;
}

.fitting-image {
    width: 50px;
    height: 50px;
    object-fit: scale-down;
    border: 1px solid grey;
}

.hidden-image {
    display: none;
}

.visible-image {
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

.image-bar {
    display: none;
}

/* Adjustments for phones */
@media only screen and (max-device-width: 576px) {
.espace {
    display: block;
    height: 50px;
}

#pagination-bar {
    display: none;
}

.image-bar {
    display: inline;
}

.pagination-button {
    font-size: 15px;
}

.pagination {
	display: none;
}

</style>
  </head>

<body>
<!-- Navbar (sit on top) -->
<?php include("navbar.php"); ?>

<!-- ------------------------------------------------------- -->
<!-- gallery selector -->
<!-- not shown for special galeries like "all" or "new" -->

<?php
  // space for the navbar
  echo "<div class=\"w3-container top-container\">";
  echo "<h1></h1>";
  echo "</div>";
?>

<!-- seulement visible sur les petits ecrans (reserve un peu de hauteur) -->
<div class="w3-center espace" style="width:100%;margin:auto;">
</div>

<!-- ------------------------------------------------------- -->
<!-- pagination with images -->

<div id="pagination-bar"  class="center-pagination">
  <!-- seulement visible sur les grands ecrans -->
  <!-- necessaire pour etre centre a l'interieur du div de dessus -->
  <div class="pagination w3-center" style="width:100%;margin:auto;">

<?php
  $i= 0;
foreach( $dico->sortedList as $paint ) {
?>
<img id="paint-<?= $i ?>"
     class="fitting-image hidden-image"
     src="images/<?= $paint->getThumbnailFile(); ?>"
     >
<?php
$i++;
}
?>

</div>
</div>

<div id="pagination-bar-2"  class="center-pagination">
  <!-- seulement visible sur les grands ecrans -->
  <!-- necessaire pour etre centre a l'interieur du div de dessus -->
  <div class="pagination w3-center" style="width:100%;margin:auto;">
    <a href="#">&laquo;</a>
    <a href="#">1</a>
    <a class="active" href="#">2</a>
    <a href="#">3</a>
    <a href="#">4</a>
    <a href="#">5</a>
    <a href="#">6</a>
    <a href="#">&raquo;</a>
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

function showPrevious() {
    rank_in_gallery= rank_in_gallery-1;
    adjustPaginationValues();
    updateDocument();
}

function showNext() {
    rank_in_gallery= rank_in_gallery+1;
    adjustPaginationValues();
    updateDocument();
}

function selectPaint( rank ) {
    rank_in_gallery= rank;
    updateDocument();
}


function updateDocument() {
    // update the pagination part
    for ( i= 0; i < total_number; i++ ) {
        var img= document.getElementById("paint-" + i);
        if ( img == null ) continue;
        if ( i < pagination_start ) {
            makeHidden(img);
        } else if ( i >= pagination_start + pagination_size ) {
            makeHidden(img);
        } else {
            makeVisible(img);
        }
        if ( i == rank_in_gallery ) {
            makeActive(img);
        } else {
            makeInactive(img);
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
    console.log( "pagination_start: " + pagination_start );
    console.log( "total_number: " + total_number );
}

</script>

</body>
</html>
