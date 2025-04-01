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

<title><?= Translator::t("overview"); ?></title>

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
<?php include("navbar.php"); ?>


<div class="w3-container top-container">
<h1><?= Translator::t("overview"); ?><h1>
</div>

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
    // skip all the non main types
    if ( ! in_array($dico->key, $main_galleries) ) {
        continue;
    }
    $latest= $dico->sortedList[0];
?>
     <a href="<?= Translator::url('../public/contenu_d_une_galerie.php', "?key=" .$dico->key ) ?>">
       <img class="limited" alt="<?= $GEM_SIGNATURE ?>" src="images/<?= $latest->getThumbnailFile(); ?>"
	    >
       <br><?=  Translator::t($dico->key); ?> </br>
     </a>
<?php
 }
?>
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
     <a href="<?= Translator::url('../public/contenu_d_une_galerie.php', "?key=" .$dico->key ) ?>">
       <img class="limited" alt="<?= $GEM_SIGNATURE ?>" src="images/<?= $latest->getThumbnailFile(); ?>"
	    >
       <br><?=  Translator::t($dico->key); ?> </br>
     </a>
<?php
}
?>
</div>
</div>

</div>

<div class="clearfix"></div>    

</body>
</html>
