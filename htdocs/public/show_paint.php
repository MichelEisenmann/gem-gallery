<html>
  <head>
    <title>GEM site</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
    </style>
  </head>

  <body>
<?php include ('../private/initialize.php'); ?>
<?php include ('../private/initialize_galleries.php'); ?>

<?php
     // receives the rank of the image and the dictionnary type
 $dico_type=htmlspecialchars($_GET["type"]);
 $dico= $GALLERY_BROWSER->dictionnaries[$dico_type];
 $rank= $_GET["rank"];
 $paint= $dico->get_paint($rank);
 $count= $dico->get_count();
 $next= $dico->get_next($rank);
 $prev= $dico->get_prev($rank);
?>

<div class="w3-content w3-display-container">
 <a href="../public/galerie_spread.php?type=<?= $dico->type; ?>">GALERIE</a>
 <a href="../public/show_paint.php?type=<?= $dico->type; ?>&rank=<?= $prev; ?>"><i class="fa fa-arrow-left"></i>Previous</a>
 <a href="../public/show_paint.php?type=<?= $dico->type; ?>&rank=<?= $next; ?>"><i class="fa fa-toggle-right"></i>Next</a>
 <img src="images/<?= $paint->file; ?>" style="width:100%">
 <a href="../public/galerie_spread.php?type=<?= $dico->type; ?>">GALERIE</a>
 <a href="../public/show_paint.php?type=<?= $dico->type; ?>&rank=<?= $prev; ?>"><i class="fa fa-arrow-left"></i>Previous</a>
 <a href="../public/show_paint.php?type=<?= $dico->type; ?>&rank=<?= $next; ?>"><i class="fa fa-toggle-right"></i>Next</a>
</div>

<!-- allow including some separate html file -->
<script src="../private/w3-include-html.js"></script>

<script>
          
</script>

</body>
</html>
