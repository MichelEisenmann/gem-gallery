<?php
include (PRIVATE_PATH . '/gallery_browser.php');

$GALLERY_BROWSER= new GalleryBrowser();
$GALLERY_BROWSER->load_dico( "images/dico.csv" );
$GALLERY_BROWSER->load_paint_data( "images/paint-data.csv" );

?>
