<?php

require('paint.php');

// should contain all paints of the same type
class PaintDictionnary {
    // name displayed
    public $name;

    // type of paints (must match CSV)
    public $type;

    // array indexed by paint filenames
    public $paints;

    // sorted list (most recent first)
    public $mostRecents;

    public function __construct() {
        $this->paints= array();
        $this->mostRecents= array();
    }

    function add_paint( $paint ) {
        // case insensitive
        if ( strcasecmp($paint->type, $this->type) == 0 ) {
            $this->paints[$paint->file]= $paint;
            $this->mostRecents[]=$paint;
        }
    }

    // must be called to ensure dictionnary is ready to be used
    function finalize() {
        usort( $this->mostRecents, "PaintDictionnary::latest" );
    }

    function latest($p1, $p2) {
        $interval= $p1->date->diff($p2->date);
        if ( $interval->invert == 1 ) {
            return -1;
        } else {
            return 1;
        }
    }

    function print() {
        echo $this->type ."<br>";
        foreach ( $this->paints as $paint ) {
            echo "-   ";
            $paint->print();
            echo "<br>";
        }
    }
}


?>
