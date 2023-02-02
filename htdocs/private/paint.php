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

    // as read from CSV
    // filename, title, date (YY/MM/DD) , width, height, type, description
    function set_attributes( $array ) {
        $this->rank= $array[0];
        if ( empty($this->rank) ) {
            $this->rank= Paint::UNDEFINED_RANK;
        } else {
            $this->rank= intval($this->rank);
        }
        $this->file= $array[1]; // full path from images. Ex: oils/flamboyance.jpg 
        $this->title= $array[2]; 
        $this->date= DateTimeImmutable::createFromFormat("Ymd", $array[3]);
        $this->width= $array[4];
        $this->height= $array[5];
        $this->type= $array[6];
        $this->description= $array[7];
        //        echo $array[1] ."<br>";
        //        echo date_format($this->date, "Y/m/d") ."<br>";
    }

    function useRankForSort() {
        return $this->rank >= 0;
    }

    // what is displayed in the gallery
    function full_title() {
        //
        $fdate= $this->get_date();
        return $fdate ." - " .$this->title;
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

    function print() {
        echo "[" .$this->rank .", " .$this->file .", " .$this->title .", " .$this->type .", " .date_format($this->date, "Y/m/d") .", " .$this->width ."x" .$this->height ."]";
    }
}
?>
