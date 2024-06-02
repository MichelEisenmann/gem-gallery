<?php
include (PRIVATE_PATH . '/all_galleries.php');

$ALL_GALLERIES= new AllGalleries();
$ALL_GALLERIES->initialize_contents( PUBLIC_PATH );

$GEM_SIGNATURE="Gisele Eisenmann (gem)";

?>
