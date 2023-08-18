<?php

// Contient les paires cle/intitule qui proviennent du fichier dico.csv
class Dictionnary {
    // tableau indexe par les cles
    public $dico;

    public function __construct() {
        $this->dico= array();
    }

    function add_key( $key, $label ) {
        if ( trim($key) != '' ) {
            $this->dico[$key]= trim($label);
        }
    }

    // si la cle n'est pas trouvee, on la renvoit
    function get_label( $key ) {
        if ( array_key_exists( $key, $this->dico ) ) {
            return $this->dico[$key];
        } else {
            return $key;
        }
    }

}


?>
