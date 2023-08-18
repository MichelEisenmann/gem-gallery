<?php

class Paint {
    // used to denote an unset rank
    const UNDEFINED_RANK= -1;
    
    public $rank; // lowest values are shown first. If value is negative, it is ignored
    public $file;
    public $title;
    public $date;
    public $width;
    public $height;
    public $type;
    public $description;
    public $cycle;

    // as read from CSV
    // filename, title, date (YY/MM/DD) , width, height, type, description, cycle
    function set_attributes( $array ) {
        $this->rank= $array[0];
        if ( empty($this->rank) ) {
            $this->rank= Paint::UNDEFINED_RANK;
        } else {
            $this->rank= intval($this->rank);
        }
        $this->file= $array[1]; // le path complet en partant dans images/. Ex: oils/flamboyance.jpg 
        $this->title= $array[2]; 
        $this->date= DateTimeImmutable::createFromFormat("Ymd", $array[3]);
        $this->width= $array[4];
        $this->height= $array[5];
        $this->type= $array[6];
        $this->description= $array[7];
        // au cas ou cycle n'est pas renseigne
        $this->cycle='';
        if ( count($array) > 8 ) {
            $this->cycle= trim($array[8]); // on enleve tous les blancs
        }
        //        echo $array[1] ."<br>";
        //        echo date_format($this->date, "Y/m/d") ."<br>";
    }

    /**
     * Receives an image path and creates the corresponding thumbnail name
     *     images/public/toto.jpg -> images/public/toto_thumb.jpg
     */
    function getThumbnailFile() {
        // get extension
        $ext= pathinfo($this->file)['extension'];
        // get filename (no extension)
        $base= pathinfo($this->file)['filename'];
        // get directory
        $dir= pathinfo($this->file)['dirname'];

        // compute thumbnail name
        return $dir ."/" .$base ."_small." .$ext;
    }


    function useRankForSort() {
        return $this->rank >= 0;
    }

    // what is displayed in the gallery
    function full_title() {
        //
        //$fdate= $this->get_date();
		$fsize= $this->get_size();
        return $this->title ." - " .$fsize ;
    }

    function get_date() {
        return date_format($this->date, "m/Y");
    }

    // return a label that shows the dimensions
    function get_size() {
        return $this->width ."x" .$this->height ." cm";
    }

    // return a protected description
    function get_description() {
        return addslashes($this->description);
    }

    function get_cycle() {
        return $this->cycle;
    }

    function print() {
        echo "[" .$this->rank .", " .$this->file .", " .$this->title .", " .$this->type .", " .date_format($this->date, "Y/m/d") .", " .$this->width ."x" .$this->height .", " .$this->cycle ."]";
    }
}
?>
