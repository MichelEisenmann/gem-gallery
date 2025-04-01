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

// ---- retrieve all the variables coming with the URL
$dico_key="oil";
if (array_key_exists("key", $_GET) ) {
  $dico_key=htmlspecialchars($_GET["key"]);
} 
$dico= $ALL_GALLERIES->paint_dictionnaries[$dico_key];

// the rank of current selected paint in our gallery
// OPTIONAL. If not given, the image variable must be set
$rank_in_gallery=0;
if (array_key_exists("rank", $_GET) ) {
  $rank_in_gallery=htmlspecialchars($_GET["rank"]);
 }

// the file of the paint. If given, it is used to compute
//   the rank in gallery
// OPTIONAL. Should be provided if the rank is unknown (see index.html)

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

var dicoKey= "<?= $dico_key ?>";
var paintFiles= [];
var paintTitles= [];
var paintDescriptions= [];
var paintStatus= [];
var paintStatusTranslated= [];
var gemSignature= "<?= $GEM_SIGNATURE ?>";
<?php
foreach( $dico->sortedList as $paint ) {
?>
        paintFiles.push( "images/<?= $paint->file ?>" );
        paintTitles.push( "<?= $paint->full_title() ?>" );
        paintDescriptions.push( "<?= $paint->get_description() ?>" );
        paintStatus.push("<?= $paint->get_status() ?>" );
        paintStatusTranslated.push("<?= Translator::t($paint->get_status()) ?>" );
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
    
<title><?= Translator::t($dico->key) ?></title>
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

.center-paint {
    padding-top: 10px;
    padding-bottom: 10px;
    margin: auto;
    max-width: 600px;
    max-height: 500px;
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

.pagination {
	display: inline-block;
}

.pagination img.active {
	color: white;
	border: 3px solid black;
}

.pagination img:hover:not(.active) {
    background-color: #ddd;
}

#gallery_selector {
    font-size: 20px;
}

#central-paint-title {
    font-size: 20px;
}

#central-paint-description {
    font-size: 20px;
}

#central-paint-img {
    width: 100%;
}

.pagination-button {
    font-size: 20px;
}

.espace {
    display: none;
}

.image-bar {
    display: none;
}

/* To display the status on top of the image */
.status-text-container {
  position: relative;
  text-align: center;
  color: white;
}

.status-top-left {
    position: absolute;
    top: 8px;
    left: 16px;
    background-color: black;
    color: white;
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

.gallery_selector {
    display: none;
}

.pagination {
	display: none;
}

#central-paint-title {
    font-size: 10px;
}

#central-paint-description {
    font-size: 10px;
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
if ( $dico->shownInSelector == TRUE ) {
    echo "<div class=\"center gallery_selector\">";
    echo "   <select id=\"gallery_selector\" onChange=\"gallerySelected();\">";
foreach ( $ALL_GALLERIES->paint_dictionnaries as $cur_dico ) {
  // skip empty dictionaries
  if ( count($cur_dico->paints) == 0 || $cur_dico->shownInSelector == FALSE) {
    continue;
  }
  if ( $cur_dico == $dico ) {
    echo "<option value=\"" .$cur_dico->key ."\" selected>" .Translator::t($cur_dico->name) ."</option><br>";
  } else {
    echo "<option value=\"" .$cur_dico->key ."\">" .Translator::t($cur_dico->name) ."</option><br>";
  }
}
    echo "</select>";
    echo "</div>";
} else {
  // space for the navbar
  echo "<div class=\"w3-container top-container\">";
  echo "<h1></h1>";
  echo "</div>";
}
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
    <button class="w3-button w3-round pagination-button"
            onClick="showPrevious();">
<i class="fa fa-step-backward"></i>
    </button>
<?php
  $i= 0;
foreach( $dico->sortedList as $paint ) {
?>
<img id="paint-<?= $i ?>"
     class="fitting-image hidden-image"
     src="images/<?= $paint->getThumbnailFile(); ?>"
     onClick="selectPaint( <?= $i ?> );" >
<?php
$i++;
}
?>

<button class="w3-button w3-round pagination-button"
        onClick="showNext();">
<i class="fa fa-step-forward"></i>
</button>
</div>
</div>

<!-- ------------------------------------------------------- -->
<!-- the central selected paint -->
<!-- this will be updated via updateCentralPaint() function -->

<div class="center-paint">
  <div class="w3-container w3-center">
    
    <div class="w3-card-4" >

      <div class="w3-container">
        <button class="w3-button w3-round pagination-button image-bar"
                onClick="showPrevious();">
          <i class="fa fa-step-backward"></i>
        </button>
        <button class="w3-button w3-round pagination-button image-bar"
                onClick="showNext();">
          <i class="fa fa-step-forward"></i>
        </button>
        <button id="start-button" class="w3-button w3-round pagination-button"
                onClick="startTimer();">
          <i class="fa fa-play"></i>
        </button>
        <button id="stop-button" class="w3-button w3-round pagination-button"
                onClick="stopTimer();">
          <i class="fa fa-stop"></i>
        </button>
      </div>

      <div class="w3-container">
        <div class="status-text-container">
          <a id="central-paint-href" href="">
            <img id="central-paint-img"/>
          </a>
          <div class="status-top-left">
            <span id="status"></span>
          </div>
        </div>
      </div>
      
      <div class="w3-container">
        <div>
          <span id="central-paint-title"></span>
     	</div>
        <div>
          <span id="central-paint-description"></span>
     	</div>
      </div>
      
    </div>
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

function gallerySelected() {
    // retrieve current language
    const queryString= window.location.search;
    const params= new URLSearchParams(queryString);
    var language= params.get('lang');
    //
    var x = document.getElementById("gallery_selector").value;
    location.replace("/public/contenu_d_une_galerie.php?key=" + x + "&lang=" + language);
}

function showPrevious() {
    var x = dicoKey;
//    var x = document.getElementById("gallery_selector").value;
    rank_in_gallery= rank_in_gallery-1;
    adjustPaginationValues();
    updateDocument();
}

function showNext() {
    var x= dicoKey;
//    var x = document.getElementById("gallery_selector").value;
    rank_in_gallery= rank_in_gallery+1;
    adjustPaginationValues();
    updateDocument();
}

function selectPaint( rank ) {
    rank_in_gallery= rank;
    updateDocument();
}

var repeatId= null;
function startTimer() {
    // just in case..
    stopTimer();
    //
    var startBut= document.getElementById("start-button");
    startBut.disabled= true;
    var stopBut= document.getElementById("stop-button");
    stopBut.disabled= false;
    //
    showNext();
    repeatId= setInterval( showNext, 3000 );
}

function stopTimer() {
    if ( repeatId != null) {
        clearInterval(repeatId);
        repeatId= null;
        var startBut= document.getElementById("start-button");
        startBut.disabled= false;
        var stopBut= document.getElementById("stop-button");
        stopBut.disabled= true;
    }
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
    // show the active paint
    updateCentralPaint();
}

function updateCentralPaint() {
    var img = document.getElementById("central-paint-img");
    img.src= paintFiles[rank_in_gallery];
    img.alt= paintTitles[rank_in_gallery] + " " + gemSignature;

    // retrieve current language
    const queryString= window.location.search;
    const params= new URLSearchParams(queryString);
    var language= params.get('lang');

    var a= document.getElementById("central-paint-href");
    a.href="../public/affichage_peinture.php?key=" + dicoKey + "&rank=" + rank_in_gallery + "&lang=" + language;
    //
    var count= "(" + (rank_in_gallery+1) + "/" + total_number + ")";
    //        
    var b= document.getElementById("central-paint-title");
    b.textContent= count + " - " + paintTitles[rank_in_gallery];
    var b= document.getElementById("central-paint-description");
    b.textContent= paintDescriptions[rank_in_gallery];

    // status part
    var st= document.getElementById("status");
    var status= paintStatus[rank_in_gallery];
    st.textContent= "";
    if ( status.length != 0 ) {
        st.textContent= paintStatusTranslated[rank_in_gallery];
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
