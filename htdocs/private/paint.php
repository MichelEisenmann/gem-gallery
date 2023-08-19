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
    public $themes; // an array of strings

    // as read from CSV
    // filename, title, date (YY/MM/DD) , width, height, type, description, themes
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
        // au cas ou les themes ne sont pas donnes
        $this->themes=array();
        if ( count($array) > 8 ) {
            // array[8] contient les themes separes par des espaces
            $themes= explode(" ", trim($array[8]));
            //
            foreach( $themes as $theme ) {
                $cur= trim($theme);
                if ( strlen($cur) > 0 ) {
                    array_push($this->themes, $cur);
                }
            }
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

    function get_themes() {
        return $this->themes;
    }

    function print() {
        echo "[" .$this->rank .", " .$this->file .", " .$this->title .", " .$this->type .", " .date_format($this->date, "Y/m/d") .", " .$this->width ."x" .$this->height .", " .$this->themes ."]";
    }
}
?>
