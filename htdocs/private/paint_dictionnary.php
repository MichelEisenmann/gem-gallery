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

    // sorted by rank if available, otherwise by date
    public $sortedList;

    public function __construct() {
        $this->paints= array();
        $this->sortedList= array();
    }

    function add_paint( $paint ) {
        // case insensitive
        if ( strcasecmp($paint->type, $this->type) == 0 ) {
            $this->paints[$paint->file]= $paint;
            $this->sortedList[]=$paint;
        }
    }

    // must be called to ensure dictionnary is ready to be used
    function finalize() {
        usort( $this->sortedList, "PaintDictionnary::latest" );
    }

    // ranked paintings are shown first (highest values come first)
    // non-ranked paintings are shown afterward (most recent come first)
    function latest($p1, $p2) {
        if ( $p1->useRankForSort() ) {
            if ( $p2->useRankForSort() ) {
                if ( $p1->rank > $p2->rank ) {
                    return -1;
                } else {
                    return 1;
                }
            } else {
                return -1;
            }
        } else {
            if ( $p2->useRankForSort() ) {
                return 1;
            } else {
                $interval= $p1->date->diff($p2->date);
                if ( $interval->invert == 1 ) {
                    return -1;
                } else {
                    return 1;
                }
            }
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
