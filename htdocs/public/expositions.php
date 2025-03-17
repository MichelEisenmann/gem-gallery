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

<title><?= Translator::t("Expositions"); ?></title>
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

/* Create a Parallax Effect */
.bgimg-1, .bgimg-2, .bgimg-3 {
  background-attachment: fixed;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}

/* First image (Logo. Full height) */
.bgimg-1 {
  background-image: url('images/web/Signa.jpg');
  min-height: 400px;
}

.w3-wide {letter-spacing: 10px;}

.w3-hover-opacity {cursor: pointer;}

/* Turn off parallax scrolling for tablets and phones */
@media only screen and (max-device-width: 580px) {
  .bgimg-1, .bgimg-2, .bgimg-3 {
    background-attachment: scroll;
    min-height: 300px;
  }
  
  .bgimg-1 {
	  background-image: url('images/web/Signa_expo_2.jpg');
	  min-height: 400px;
  }

}

</style>
</head>
<body>

<!-- Navbar (sit on top) -->
<?php include("navbar.php"); ?>
  
<!-- First Parallax Image with Logo Text [affichait un bandeau flamboyance sur lequel glissait le message]-->
<!-- <div class="bgimg-1 w3-display-container w3-opacity-min" id="home">
 </div>
-->

<!-- Container (Exhibit Section) -->
<div class="w3-content w3-container w3-padding-64" id="about">
  <h3 class="w3-center">Expositions / Exhibitions</h3>
   <div>
<ol>
     <h5 style="background-color:orange"><b>2025</b></h5>
   <ul>
        <li><b>11ème édition annuelle du Luxembourg Art prize</b>
		</li>
		<li><b>30 Mai-12 Juin / JUNE</b>	    
			    <b>GOURDON (06, France)</b></a>
		    - Exposition SOLO - Salle de la Mairie
			</br>
		</li>
		<li><b>Antibes (06, France)</b> Antibes Art Fair - 12-21 Avril 
		<br><a href="images/Huile/20250314_AirMarin_HU50x50.jpg" alt="Air Marin" />
          <img src="images/Huile/20250314_AirMarin_HU50x50_small.jpg" width="60" height="60"/>Air Marin</a>
		  </br> 
		</li>
		<li><b>Antibes (06, France)</b> Femin'Arte - FEMIN'EXPO Les Casemates - Boulevard d'Aguillon - 27 F&eacute;vrier au samedi 22 Mars <br> 
		["Icones"]
		<br><a href="images/Acrylique/20241109_IconesDechues_AC28x35_small.jpg" alt="Icones Déchues" />
          <img src="images/web/20241109_IconesDechues_AC28x35_mini.jpg" width="50" height="40"/>Icones d&eacute;chues</a>
		  </br> 
		</li>
     <i><h5 style="background-color:powderblue;">2024</h5>
   <ul>
        <li><b>10ème édition annuelle du Luxembourg Art prize</b>
		<p style="color:green;">CERTIFICAT DE MERITE ARTISTIQUE
        <a href="images/web/2024-12_LuxembourgArtPrize.png">
          <img src="images/web/2024-12_LuxembourgArtPrize_small.png" width="38"/>
	    </a>
		</li>
		<li><b>Exposition virtuelle internationale Arts & Sports 2024 - La maison des artistes</b>
		  <br><a href="https://www.lamaisondesartistes.fr/site/musee-virtuel-arts-et-sports-2024-galerie/?_nationalit=francaise&_dpartements=06" alt="Arts & Sports 2024" />
		  International virtual exhibition Arts & Sports 2024: Gallery</a></br>
		  
		  </li>
		<li><b>2-6 OCTOBRE / OCTOBER</b>
		<br><b>ANTIBES (06, France)</b> - "Fa&icirc;tes de la peinture" 14ème édition - (association les amis du mus&eacute;e Picasso)</br> 
		<p style="color:green;">Prix TROPHEE DE LA VILLE D'ANTIBES
		<a href="images/web/20241006_Video-FaitesPeinture_Pelican.mp4">[video 19s]</a></p>
        <a href="images/Acrylique/20240915_Pelican_AC55x38.jpg">
          <img src="images/Acrylique/20240915_Pelican_AC55x38_small.jpg" width="38"/><i>Le pélican qui s'en va tout seul</i>
	    </a>
		</li>
		
		<li><b>5-11 JUILLET / JULY</b>
		    <br><a href="images/web/Expo-JUL24.jpg" alt="Exhibition Gourdon" />
		    <img src="images/web/Expo-JUL24_small.jpg" width="60" height="80"/>
			    <b>GOURDON (06, France)</b></a>
		    - Exposition SOLO - Salle de la Mairie
			</br>
		  </li>
		  <li><b> 23-30 JUIN /JUNE</b>
		    <br><a href="images/web/Affichette_Expo-Juin24.jpg" alt="Exhibition Seillans" />
		    <img src="images/web/Affichette_Expo-Juin24_small.jpg" width="60" height="80"/>
			   <b>SEILLANS (83, France)</b></a>
		    - Exposition SOLO - Salle du Couvent Place du Thouron
			</br>
		  </li>
		 <li><b>18 MAI-15 JUIN</b><b> ROQUEFORT LES PINS (06, France)</b>- Les artistes Roquefortois
		  </li>
		<li><b>MAR 2024</b><b> ANTIBES (06, France)</b> - FEMIN'EXPO Mars "LA COULEUR DES MOTS"
		</li>
		<li><b>JAN 2024</b>
		    <br><a href="images/web/20240106_Roquefort.png" alt="Expo Pole image" />
		     <img src="images/web/20240106_Roquefort_small.png" width="60" height="80"/><b>ROQUEFORT LES PINS (06, France)</b></a>
		- Exposition SOLO
		  </br> 
		</li>
	</ul>
	</i>

     <i><h5 style="background-color:powderblue;">2023</h5>
		<ul>
		<li><a href="images/web/Expo-Aout23_small.jpg" alt="Expo Gourdon" />
		<img src="images/web/Expo-Aout23_small.jpg" width="60" height="80"/><b>Gourdon (06, France)</b></a>
		- Salle de la Mairie - 4 au 10 Ao&ucirc;t / exhibition 4-10 August 2023	
		</li>
		<li><b>Antibes (06, France)</b> - Spectacles Femin'Arte - FEMIN'EXPO M&eacute;diath&egrave;que Albert Camus - 28 F&eacute;vrier au samedi 11 Mars <br> 
		["Dansons, sinon nous sommes perdus! (Pina Bausch)"]
		<br><a href="images/Huile/20230216_LesDanseuses_Huile_small.jpg" alt="Les danseuses" />
          <img src="images/web/20230216_LesDanseuses_Huile_mini.jpg" width="100" height="80"/>Les danseuses</a>
		  </br> 
		</li>
		</ul>
    </i>
    <i><h5 style="background-color:powderblue;">2022</h5>
        <p><b>Antibes (06, France)</b> - "Fa&icirc;tes de la peinture" (association les amis du mus&eacute;e Picasso)</p> 
    </i>
    <i><h5 style="background-color:powderblue;">2021</h5>
        <p><b>Antibes (06, France)</b> - "Fa&icirc;tes de la peinture" (association les amis du mus&eacute;e Picasso)</p> 
        <p style="color:green;">2&egrave;me prix, cat&eacute;gorie Aquarelle/pastel </p>
        <a href="images/Pastels/20210917_Michel en Polynesie_small.jpg">
          <img src="images/Pastels/20210917_Michel en Polynesie_small.jpg" width="100"/>Torride
	    </a>
    </i>
  </ol>
  </div>

</div>

<!-- Footer -->
<!--
<footer class="w3-center w3-black w3-padding-64 w3-opacity w3-hover-opacity-off">
  <a href="#home" class="w3-button w3-light-grey"><i class="fa fa-arrow-up w3-margin-right"></i>To the top</a>
  <div class="w3-xlarge w3-section">
    <i class="fa fa-instagram w3-hover-opacity">@gem.eisenmann</i>
  </div>
</footer>
-->
 
</body>
</html>
