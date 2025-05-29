<?php
 // add here all the series you want to see in the menu
 // The ids must match the names that are in the excel file
 $series[0]= "momentsfeminins";
 $series[1]= "watermirror";
 $series[2]= "metamorphose";
 //$series[3]= "origine";
 ?>

<!-- LARGE screens -->
<div class="w3-container w3-padding-32 w3-animate-opacity gem-animate gem-fixed-width w3-hide-small w3-hide-medium">
  <div class="w3-bar">
    <div class="w3-bar-item">
      <a href="<?= Translator::url('/index.php') ?>" class="gem-name gem-a">GISÈLE EISENMANN MONTAGNÉ</a>
    </div>
    
    <div class="w3-right">
      <div class="w3-dropdown-hover">
	<div class="w3-button gem-menu">
          <?= Translator::t('Work') ?> <i class="fa fa-caret-down"></i>
	</div>
	<div class="w3-dropdown-content w3-bar-block w3-card-4">
	  
	  <?php
	   foreach ( $series as $serie ) {
	   ?>
          <a href="<?= Translator::url('/public/serie-' .$serie .'.php') ?>"
             class="w3-bar-item w3-button gem-menu"><?= Translator::t($serie); ?></a>
	  <?php
	   }
	   
	   ?>
	</div>
      </div>
      <a href="<?= Translator::url('/public/expositions.php') ?>" class="w3-bar-item w3-button gem-menu"><?= Translator::t('Expositions') ?></a>
      <a href="<?= Translator::url('/public/about.php') ?>" class="w3-bar-item w3-button gem-menu"><?= Translator::t('About') ?></a>
      <a href="<?= Translator::url('/public/contact.php') ?>" class="w3-bar-item w3-button gem-menu"><?= Translator::t('Contact') ?></a>
    </div>
  </div>
</div>

<!-- SMALL screens-->
<div class="w3-container w3-padding-32 w3-animate-opacity gem-animate gem-fixed-width w3-hide-large">
  <div class="w3-bar">
    <div class="w3-bar-item">
      <a href="<?= Translator::url('/index.php') ?>" class="gem-name gem-a">GISÈLE EISENMANN MONTAGNÉ</a>
    </div>
  </div>
  
  <div class="w3-bar">
    <div class="w3-dropdown-hover">
      <div class="w3-button gem-menu">
	<?= Translator::t('Work') ?> <i class="fa fa-caret-down"></i>
      </div>
      <div class="w3-dropdown-content w3-bar-block w3-card-4">
        
	<?php
	 foreach ( $series as $serie ) {
	 ?>
        <a href="<?= Translator::url('/public/serie-' .$serie .'.php') ?>"
           class="w3-bar-item w3-button gem-menu"><?= Translator::t($serie); ?></a>
	<?php
	 }

	 ?>
      </div>
    </div>
    <a href="<?= Translator::url('/public/expositions.php') ?>" class="w3-bar-item w3-button gem-menu"><?= Translator::t('Expositions') ?></a>
    <a href="<?= Translator::url('/public/about.php') ?>" class="w3-bar-item w3-button gem-menu"><?= Translator::t('About') ?></a>
    <a href="<?= Translator::url('/public/contact.php') ?>" class="w3-bar-item w3-button gem-menu"><?= Translator::t('Contact') ?></a>
  </div>
</div>

<script>
  // Used to toggle the menu on small screens when clicking on the menu button

  function useEnglish() {
      use('en');
  }

  function useFrench() {
      use('fr');
  }

  // change the lang parameter in the URL and reloads
  function use( lang ) {
      const url= new URL(window.location.href);
      //    console.log(url);
      const queryString= window.location.search;
      //    console.log(queryString);
      const params= new URLSearchParams(queryString);
      params.set('lang', lang );
      //    console.log(params.toString());
      url.search=params.toString();
      //    console.log(url);
      location.replace(url.toString());
  }
</script>
