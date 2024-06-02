<div class="w3-top">
  <!-- on veut la navbar toujours au dessus -> modification de la classe des le depart -->
  <div class="w3-bar w3-card w3-animate-top w3-white" id="myNavbar">
    <a class="w3-bar-item w3-button w3-hover-black w3-hide-medium w3-hide-large w3-right" href="javascript:void(0);" onclick="toggleFunction()" title="Toggle Navigation Menu">
      <i class="fa fa-bars"></i>
    </a>
    <a href="/index.php" class="w3-bar-item w3-button"><?= Translator::t('ACCUEIL') ?></a>
    <a href="/public/expositions.php" class="w3-bar-item w3-button w3-hide-small"><i class="fa fa-globe"></i> <?= Translator::t('EXPOSITIONS') ?></a>
    <a href="/public/acces_a_toutes.php" class="w3-bar-item w3-button w3-hide-small"><i class="fa fa-th"></i> <?= Translator::t('GALERIE') ?></a>
    <a href="/public/contenu_d_une_galerie.php?key=new" class="w3-bar-item w3-button w3-hide-small"><i class="fa fa-th"></i> <?= Translator::t('NOUVEAUTES') ?></a>
    <a href="/index.php#contact" class="w3-bar-item w3-button w3-hide-small"><i class="fa fa-envelope"></i> <?= Translator::t('CONTACT') ?></a>
  </div>

  <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium">
    <a href="/index.php" class="w3-bar-item w3-button" onclick="toggleFunction()"><?= Translator::t('ACCUEIL') ?></a>
    <a href="/public/expositions.php" class="w3-bar-item w3-button" onclick="toggleFunction()"><?= Translator::t('EXPOSITIONS') ?></a>
    <a href="/public/acces_a_toutes.php" class="w3-bar-item w3-button" onclick="toggleFunction()"><?= Translator::t('GALERIE') ?></a>
    <a href="/public/contenu_d_une_galerie.php?key=new" class="w3-bar-item w3-button" onclick="toggleFunction()"><?= Translator::t('NOUVEAUTES') ?></a>
    <a href="/index.php#contact" class="w3-bar-item w3-button" onclick="toggleFunction()"><?= Translator::t('CONTACT') ?></a>
  </div>
</div>
