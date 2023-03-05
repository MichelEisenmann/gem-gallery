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
     // receives the rank of the image and the dictionnary type
 $dico_type=htmlspecialchars($_GET["type"]);
 $dico= $GALLERY_BROWSER->dictionnaries[$dico_type];
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
      padding-top: 50px;
      }
	.containerBtn {
		position: relative;
	}
	.containerBtn img {
		  width: 100%;
          height: auto;
	}
	.containerBtn .leftbtn {
       position: absolute;
       top: 5%;
       left: 5%;
       transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);
      background-color: #555;
      color: white;
      font-size: 16px;
      padding: 5px 5px;
      border: none;
      cursor: pointer;
      border-radius: 5px;
      text-align: center;
   }
   .containerBtn .leftbtn:hover {
     background-color: blue;
   }
   	.containerBtn .rightbtn {
       position: absolute;
       top: 5%;
       left: 95%;
       transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);
      background-color: #555;
      color: white;
      font-size: 16px;
      padding: 5px 5px;
      border: none;
      cursor: pointer;
      border-radius: 5px;
      text-align: center;
   }
   .containerBtn .rightbtn:hover {
     background-color: blue;
   }
    </style>
  </head>

  <body>
<div class="w3-container top-container">
<div class="w3-content w3-display-container">
 <a href="../index.html"><i class="fa fa-arrow-circle-up"> Accueil </i></a>
 <a href="../public/galerie_spread.php?type=<?= $dico->type; ?>"><i class="fa fa-step-backward"> Galerie <?= $dico->name ?></i></a>
 <p>
    <div class="containerBtn">
     <img src="images/<?= $paint->file; ?>" style="width:100%">
     <button class="leftbtn"><a href="../public/show_paint.php?type=<?= $dico->type; ?>&rank=<?= $prev; ?>">
		<i class="fa fa-arrow-left"></i></a>
	 </button>
     <button class="rightbtn"><a href="../public/show_paint.php?type=<?= $dico->type; ?>&rank=<?= $next; ?>">
	    <i class="fa fa-arrow-right"></i></a>
	 </button>
   </div>
   <p><?= ucfirst(htmlspecialchars($paint->full_title())); ?> </p>
  </p> 
 </div>
</div>
<!-- allow including some separate html file -->
<script src="../private/w3-include-html.js"></script>

<script>
          
</script>

</body>
</html>
