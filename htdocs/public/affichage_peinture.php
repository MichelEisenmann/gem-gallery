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
     // receives the rank of the image and the dictionnary key
 $dico_key=htmlspecialchars($_GET["key"]);
 $dico= $ALL_GALLERIES->paint_dictionnaries[$dico_key];
 $rank= $_GET["rank"];
 $paint= $dico->get_paint($rank);
 $count= $dico->get_count();
 $next= $dico->get_next($rank);
 $prev= $dico->get_prev($rank);
?>

    <title><?= ucfirst(htmlspecialchars($paint->full_title())); ?> </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
	.top-container {
      padding-top: 10px;
      }
	.containerBtn {
		position: relative;
        padding-top: 40px;
	}
	.containerBtn .leftbtn {
       position: absolute;
       top: 5px;
       left: 40px;
      background-color: #555;
      color: white;
      font-size: 16px;
      border: none;
      cursor: pointer;
   }
   .containerBtn .leftbtn:hover {
     background-color: blue;
   }
   	.containerBtn .rightbtn {
       position: absolute;
       top: 5px;
       right: 40px;
      background-color: #555;
      color: white;
      font-size: 16px;
      border: none;
      cursor: pointer;
   }
   .containerBtn .rightbtn:hover {
     background-color: blue;
   }
    </style>
  </head>

  <body>
<div class="w3-container top-container">
<div class="w3-content w3-display-container">
 <a href="../index.html"><i class="fa fa-arrow-circle-up"></i> Accueil</a>
 >
 <a href="../public/contenu_d_une_galerie.php?key=<?= $dico->key ."&rank=" .$rank ?>">Galerie <?= $dico->name ?></i></a>
 <p>
    <div class="containerBtn">
     <img src="images/<?= $paint->file; ?>" style="width:100%">
     <button class="w3-button w3-round pagination-button leftbtn" onClick="goto_page(<?= "'".$dico->key ."'," .$prev ?>);">
<i class="fa fa-backward"></i>
	 </button>
     <button class="w3-button w3-round pagination-button rightbtn" onClick="goto_page(<?= "'".$dico->key ."'," .$next ?>);">
<i class="fa fa-forward"></i>
	 </button>
   </div>
   <p><?= ucfirst(htmlspecialchars($paint->full_title())); ?> </p>
   <p><?= ucfirst(htmlspecialchars($paint->get_description())); ?> </p>
 </p> 
 </div>
</div>
<!-- allow including some separate html file -->
<script src="../private/w3-include-html.js"></script>

<script>
          
function goto_page(key, rank) {
    location.replace("/public/affichage_peinture.php?key=" + key
                     + "&rank=" + rank );
}

</script>

</body>
</html>
