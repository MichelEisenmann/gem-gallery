<div class="w3-top">
  <!-- on veut la navbar toujours au dessus -> modification de la classe des le depart -->
  <div class="w3-bar w3-card w3-white" id="myNavbar">
    <a class="w3-bar-item w3-button w3-hover-black w3-hide-medium w3-hide-large w3-left" href="javascript:void(0);" onclick="toggleFunction()" title="Toggle Navigation Menu">
      <i class="fa fa-bars"></i>
    </a>
    <a href="<?= Translator::url('/index.php') ?>"
       class="w3-bar-item w3-button w3-hide-small"><?= Translator::t('ACCUEIL') ?></a>
    <a href="<?= Translator::url('/public/acces_a_toutes.php') ?>"
       class="w3-bar-item w3-button w3-hide-small"><i class="fa fa-th"></i> <?= Translator::t('GALERIE') ?></a>
    <a href="<?= Translator::url('/public/expositions.php') ?>"
       class="w3-bar-item w3-button w3-hide-small"><i class="fa fa-globe"></i> <?= Translator::t('EXPOSITIONS') ?></a>
    <a href="<?= Translator::url('/public/contenu_d_une_galerie.php?key=new') ?>"
       class="w3-bar-item w3-button w3-hide-small"><i class="fa fa-th"></i> <?= Translator::t('NOUVEAUTES') ?></a>
    <a href="<?= Translator::url('/index.php') ?>#contact"
       class="w3-bar-item w3-button w3-hide-small"><i class="fa fa-envelope"></i> <?= Translator::t('CONTACT') ?></a>

    <button class="w3-button w3-right" onclick="useEnglish()">
      <img src="/public/images/uk-48.png" alt="english"></img>
    </button>
    <button class="w3-button w3-right" onclick="useFrench()">
      <img src="/public/images/france-48.png" alt="francais"></img>
    </button>
  </div>

  <!-- this is the menu that will be displayed when not enough space is available (accessed through the 3 bars) -->
  <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium">
    <a href="<?= Translator::url('/index.php') ?>"
       class="w3-bar-item w3-button" onclick="toggleFunction()"><?= Translator::t('ACCUEIL') ?></a>
    <a href="<?= Translator::url('/public/acces_a_toutes.php') ?>"
       class="w3-bar-item w3-button" onclick="toggleFunction()"><?= Translator::t('GALERIE') ?></a>
	<a href="<?= Translator::url('/public/expositions.php') ?>"
       class="w3-bar-item w3-button" onclick="toggleFunction()"><?= Translator::t('EXPOSITIONS') ?></a>
    <a href="<?= Translator::url('/public/contenu_d_une_galerie.php?key=new') ?>"
       class="w3-bar-item w3-button" onclick="toggleFunction()"><?= Translator::t('NOUVEAUTES') ?></a>
    <a href="<?= Translator::url('/index.php') ?>#contact"
       class="w3-bar-item w3-button" onclick="toggleFunction()"><?= Translator::t('CONTACT') ?></a>

  </div>
</div>

<script>
// Used to toggle the menu on small screens when clicking on the menu button
function toggleFunction() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else {
        x.className = x.className.replace(" w3-show", "");
    }
}

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
