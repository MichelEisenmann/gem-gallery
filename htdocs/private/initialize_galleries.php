<?php
include (PRIVATE_PATH . '/all_galleries.php');

$ALL_GALLERIES= new AllGalleries();
$ALL_GALLERIES->load_dico( "images/dico.csv" );
$ALL_GALLERIES->load_paint_data( "images/paint-data.csv" );

$GEM_SIGNATURE="Gisele Eisenmann (gem)";

?>
