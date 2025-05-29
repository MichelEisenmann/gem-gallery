<?php

require('paint.php');

// Contient les tableaux qui partagent une meme cle (ca peut etre le type ou la serie par exemple)
class PaintDictionnary {
    // name displayed
    public $name;

    // la cle commune aux tableaux du dictionnaire (le type ou le theme)
    public $key;

    // soit un Type (Oil, etc), soit une Serie
    public $kind;

    // array indexed by paint filenames
    public $paints;

    // sorted by rank if available, otherwise by date
    public $sortedList;

    // shown in the gallery selector
    public $shownInSelector;

    const TYPE= "Type";
    const SERIE= "Serie";

    const ALL="all";
    const NEW="new";

    public function __construct() {
        $this->paints= array();
        $this->sortedList= array();
        $this->kind= self::TYPE;
        $this->shownInSelector= TRUE;
    }

    function is_by_type() {
        return $this->kind == self::TYPE;
    }

    function is_by_serie() {
        return $this->kind == self::SERIE;
    }

    // number of paints
    function get_count() {
        $count= count($this->sortedList);
        return $count;
    }

    // at the end, loops back to zero
    function get_next($rank) {
        $count= count($this->sortedList);
        $rank= $rank+1;
        if ( $rank >= $count ) return 0;
        return $rank;
    }

    // at zero, loops to the end of the list
    function get_prev($rank) {
        $count= count($this->sortedList);
        $rank= $rank-1;
        if ( $rank < 0 ) return $count-1;
        return $rank;
    }

    function get_paint( $rank ) {
        $count= count($this->sortedList);
        if ( $rank < 0 ) {
            return $this->sortedList[0];
        }
        if ( $rank >= $count ) {
            return $this->sortedList[count-1];
        }
        return $this->sortedList[$rank];
    }

    // receive the file of a paiting
    // must return its rank
    function get_file_rank( $file ) {
      //      echo $file ." for file <br>";
      $rank= 0;
      foreach ( $this->sortedList as $paint ) {
        //        echo $rank ." as cur rank <br>";
        //        echo $paint->file ." as cur file <br>";
        if ( strcmp( $paint->file, $file ) == 0 ) {
          //          echo $rank ." for rank <br>";
          return $rank;
        }
        $rank= $rank+1;
      }
      return 0;
    }

    function add_paint( $paint ) {
      $this->paints[$paint->file]= $paint;
      $this->sortedList[]=$paint;
    }

    function old_add_paint( $paint, $paint_key ) {
        // case insensitive
        if ( strcasecmp($paint_key, $this->key) == 0 ) {
            $this->paints[$paint->file]= $paint;
            $this->sortedList[]=$paint;
        }
    }

    // must be called to ensure dictionnary is ready to be used
    function finalize() {
      //        $this->print();
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
        echo $this->key ."<br>";
        foreach ( $this->paints as $paint ) {
            echo "-   ";
            $paint->print();
            echo "<br>";
        }
    }
}


?>
