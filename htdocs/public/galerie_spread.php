<html>
  <head>
    <title>GEM site</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
      .top-container {
      padding-top: 50px;
      }

    </style>
  </head>

  <body>
    <!-- Navbar (sit on top) -->
    <div w3-include-html="navbar.html"></div>

<?php include ('../private/initialize.php'); ?>
<?php include ('../private/initialize_galleries.php'); ?>


<?php
 $dico_type=htmlspecialchars($_GET["type"]);
 $dico= $GALLERY_BROWSER->dictionnaries[$dico_type];
    $count= count($dico->mostRecents);
    $first= true;
 $cur= 1;
    // change row every 6
    $every= 6;
?>

<div class="w3-container top-container">
<h1><?= $dico->name ?><h1>
</div>

<div class="w3-row-padding w3-container">
<div class="w3-row-padding">

<?php
foreach( $dico->mostRecents as $paint ) {
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
       <a target="_blank" href="images/<?= $paint->file; ?>">
            <img src="images/<?= $paint->file; ?>"
                 alt="<?= htmlspecialchars($paint->title); ?>"
		 style="width:100%"
	    >
       </a>
       <div class="w3-container w3-center">
          <p><?= ucfirst(htmlspecialchars($paint->title)); ?></p>
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

</body>
</html>
