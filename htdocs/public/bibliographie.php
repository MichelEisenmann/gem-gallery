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

<title><?= Translator::t("Bibliographie"); ?></title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
  body,h1,h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif;}
  body, html {
      height: 100%;
      color: #777;
      line-height: 1.8;
  }

  .w3-wide {letter-spacing: 10px;}
  .w3-hover-opacity {cursor: pointer;}

  blockquote {
      font-family: 'Lucida Handwriting','Zapfino', cursive;
      text-align: center;
  }
  .australie_theme {
      width: 176px ;
      height: 250px ;
  }
  .paysage_theme {
      width: 182px ;
      height: 250px ;
  }
  .artiste {
      width: 236px ;
      height: 240px ;
  }
  .video {
      width: 50px ;
      height: 35px ;
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

  .visible-on-computer {
      display: block;
  }

  .visible-on-mobile {
      display: none;
  }

  .limited {
      height: 150px;
  }
  
  .cliping { height: 100%; width: 200px; overflow: hidden; }
  

/* Turn off parallax scrolling for tablets and phones */
@media only screen and (max-device-width: 576px) {
    .visible-on-computer {
	display: none;
    }
    
    .visible-on-mobile {
	display: block;
    }
    
    .limited {
	height: 100px;
    }
    
    .cliping { height: 100%; width: 200px; overflow: hidden; }
    
    blockquote {
	font-family: 'Lucida Handwriting','Zapfino', cursive;
	text-align: center;
    }

    .title {
	margin-top: 60px;
    }

    .australie_theme {
	width: 80px ;
	height: 114px ;
    }
    .paysage_theme {
	width: 80px ;
	height: 114px ;
    }
    .artiste {
	width: 236px ;
	height: 240px ;
    }
    .video {
	width: 30px ;
	height: 18px ;
    }
    .title-grid {
	display: grid;
	grid-template-rows: repeat(1, 1fr);
	grid-template-columns: repeat(2, 1fr);
	justify-items: center;
	grid-gap: 1px;
	align-items: center;
    }
    .grid {
	display: grid;
	grid-template-rows: repeat(2, 1fr);
	grid-template-columns: repeat(2, 1fr);
	justify-items: center;
	grid-gap: 1px;
	gap: 10px;
	align-items: center;
	margin: auto;
	padding: 10px;
    }
    .box {
	margin: 0;
    }
    .box:nth-child(1) ,
	 .box:nth-child(2);
    .box:nth-child(3), 
    .box:nth-child(4) {
	grid-column: span 2;
    }
    
    .grid img {
	border: 1px solid #ccc;
	box-shadow: 2px 2px 6px 0px  rgba(0,0,0,0.3);
	max-width: 100%;
    }
    .grid img:nth-child(2) {
	grid-column: span 4;
    }
    
}


</style>
</head>
<body>


<!-- Navbar (sit on top) -->
<?php include("navbar.php"); ?>

<!-- Mobile version -->
<div class="visible-on-mobile w3-content title" id="about">
  <div class="w3-center">
    <div >
      <a href="<?= Translator::url('../public/acces_aux_galeries.php') ?>">
	<img class="artiste to-be-signed" src="public/images/web/gisele.jpg" alt="Artist's photo" />
      </a>
    </div>
  </div>

  <div>
	<div class="w3-center">
	      <img src="public/images/web/gem.png" alt="Artist's signature" />
        </div>
    <div class="grid">
		<div class="cliping">
	        <a href="<?= Translator::url('public/contenu_d_une_galerie.php?key=oil&file=Huile/20250314_AirMarin_HU50x50.jpg') ?>">
<!--   <img class="limited to-be-signed" src="public/images/Huile/20230216_LesDanseuses_Huile_small.jpg" alt="<?= Translator::t("oil") ?>" />  -->
              <img class="limited to-be-signed" src="public/images/Huile/20250314_AirMarin_HU50x50.jpg" alt="<?= Translator::t("oil") ?>" />
              <br><?= Translator::t("oil") ?></br>
	        </a>
	      </div>

	      <div class="cliping">
	        <a href="<?= Translator::url('public/contenu_d_une_galerie.php?key=acrylic&file=Acrylique/20240822_Aigrette_AC50x76.jpg') ?>">
		      <img class="limited to-be-signed" src="public/images/Acrylique/20240822_Aigrette_AC50x76_small.jpg" alt="<?= Translator::t("acrylic") ?>" />
              <br><?= Translator::t("acrylic") ?></br>
	        </a>
	      </div>
 
      <div class="cliping">
	<a href="<?= Translator::url('public/contenu_d_une_galerie.php?key=pastel&file=Pastels/20240119_Corentin2Mois.jpg') ?>">
          <img class="limited to-be-signed" src="public/images/Pastels/20240119_Corentin2Mois_small.jpg" alt="<?= Translator::t("pastel") ?>" >
            <br><?= Translator::t("pastel") ?></br>			
	</a>
      </div>
      <div class="cliping">
	<a href="<?= Translator::url('public/contenu_d_une_galerie.php?key=other&file=Autres/20200920_SanguinePascaleGuillaume.jpg') ?>">
          <img class="limited to-be-signed" src="public/images/Autres/20200920_SanguinePascaleGuillaume_small.jpg" alt="<?= Translator::t("other") ?>" />
          <br><?= Translator::t("other") ?></br>
	</a>
      </div>
    </div>
  </div>	   
</div>
<!-- Mobile version -->

<!-- Computer version -->
<div class="visible-on-computer w3-content w3-container w3-padding-64" id="about">
  <h3 class="w3-center">
    <blockquote>
    Gis&egrave;le EISENMANN MONTAGNE (Gem)</blockquote> 
  </h3>
  <!-- GRID -->
  
  <!-- Theme grid -->
  <div class="w3-content w3-container " id="grid_theme">
      <main class="grid">
	    <div>
          <a href="<?= Translator::url('../public/acces_aux_galeries.php') ?>">
            <img class="artiste to-be-signed" src="../public/images/web/gisele.jpg" alt="Artist's photo" />
	      </a>
	    </div>
            
	    <div></div>
	    <div><a href="<?= Translator::url('../public/contenu_d_une_galerie.php?key=oil&file=Huile/20230708_ClairDeSoleil_Huile_30P.jpg') ?>">
          <img class="australie_theme to-be-signed" src="../public/images/Huile/20230708_ClairDeSoleil_Huile_30P_small.jpg" alt="Australie" />
	    </a>
	    </div>
        
	    <div><a href="<?= Translator::url('../public/contenu_d_une_galerie.php?key=acrylic&file=Acrylique/20230530_Contemplation_A100x73.jpg') ?>">
          <img class="paysage_theme to-be-signed" src="../public/images/Acrylique/20230530_Contemplation_A100x73_small.jpg" alt="Paysage" />
	    </a>
	    </div>
      </main>
    </div>
  </div>
  
<!--  <div class="visible-on-computer w3-center"><em><?= Translator::t('Slogan') ?></em></div> -->
  
  <!-- common part -->
  <div class="w3-content w3-container" id="">
    
    <?= Translator::t('Introduction'); ?>
    <div class="visible-on-computer">
      <div class="w3-content w3-container " id="grid">
	    <p/>
	    <main class="grid">
	      <div class="cliping">
	        <a href="<?= Translator::url('../public/contenu_d_une_galerie.php?key=oil&file=Huile/20250314_AirMarin_HU50x50.jpg') ?>">
<!--   <img class="limited to-be-signed" src="../public/images/Huile/20230216_LesDanseuses_Huile_small.jpg" alt="<?= Translator::t("oil") ?>" />  -->
              <img class="limited to-be-signed" src="../public/images/Huile/20250314_AirMarin_HU50x50.jpg" alt="<?= Translator::t("oil") ?>" />
              <br><?= Translator::t("oil") ?></br>
	        </a>
	      </div>

	      <div class="cliping">
	        <a href="<?= Translator::url('../public/contenu_d_une_galerie.php?key=acrylic&file=Acrylique/20240822_Aigrette_AC50x76.jpg') ?>">
		      <img class="limited to-be-signed" src="../public/images/Acrylique/20240822_Aigrette_AC50x76_small.jpg" alt="<?= Translator::t("acrylic") ?>" />
              <br><?= Translator::t("acrylic") ?></br>
	        </a>
	      </div>

	      <div class="cliping">
 	        <a href="<?= Translator::url('../public/contenu_d_une_galerie.php?key=pastel&file=Pastels/20240119_Corentin2Mois.jpg') ?>">
		      <img class="limited to-be-signed" src="../public/images/Pastels/20240119_Corentin2Mois_small.jpg" alt="<?= Translator::t("pastel") ?>" >
                <br><?= Translator::t("pastel") ?></br>			
	          </a>
          </div>

          <div class="cliping">
	        <a href="<?= Translator::url('../public/contenu_d_une_galerie.php?key=other&file=Autres/20200920_SanguinePascaleGuillaume.jpg') ?>">
		        <img class="limited to-be-signed" src="../public/images/Autres/20200920_SanguinePascaleGuillaume_small.jpg" alt="<?= Translator::t("other") ?>" />
                <br><?= Translator::t("other") ?></br>
	          </a>
	      </div>
	    </main>
      </div>	   
    </div>	   
    
  <!-- </div> -->

<!-- Container (Contact Section) class="w3-center" w3-padding-32-->
<div class="w3-content w3-container w3-padding-64" id="contact">
  <div><em><?= Translator::t("Contacter") ?></em></div>

<div class="w3-row  w3-section">

<!--    <div class="w3-col m8 w3-panel"> -->
      <div class="w3-large w3-margin-bottom">
        <a class="list-group-item" href="https://www.instagram.com/gem.eisenmann/">
		     <i class="fa fa-instagram fa-fw w3-hover-text-black w3-xlarge w3-margin-right"></i></a>
	    <a class="list-group-item" href="http://www.linkedin.com/in/gisele-m-42918b42">	
	        <i class="fa fa-linkedin fa-fw w3-hover-text-black w3-xlarge w3-margin-right"></i></a></br>  
        <i class="fa fa-envelope fa-fw w3-hover-text-black w3-xlarge w3-margin-right"></i>contact@giseleeisenmann.com</br>
		</br>

<!-- 
		<i class="fa fa-map-marker fa-fw w3-hover-text-black w3-xlarge w3-margin-right"></i> Roquefort-les-pins / Valbonne, 06, FR</br>
        <i class="fa fa-play-circle fa-fw w3-hover-text-black w3-xlarge w3-margin-right"></i>
	    <a href="../public/images/web/20230725_GEM_painting.mp4">
	          <img class="video" src="../public/images/web/2023_artist-working_small.png" alt="Atelier" /> At the studio
	    </a> 
-->		
      </div>
<!--     </div> -->
 </div> 
  
  &copy; Gisèle Eisenmann Montagné </br><?= Translator::t("Avertissement") ?>
</div>
 
<script>
// add the "alt" attribute to all "to-be-signed" images
function signImages() {
  var gemSignature= "Gisele Eisenmann (gem)";
  let images= document.querySelectorAll(".to-be-signed");
  for ( let i= 0; i < images.length; i++ ) {
      images[i].setAttribute( 'alt', gemSignature );
  }
}

document.addEventListener('DOMContentLoaded', function() {
   signImages();
}, false);  
</script>

</body>
</html>
