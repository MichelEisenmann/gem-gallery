<?php

class Paint {
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
        $this->file= $array[0]; // full path from images. Ex: oils/flamboyance.jpg 
        $this->title= $array[1]; 
        $this->date= DateTimeImmutable::createFromFormat("Ymd", $array[2]);
        $this->width= $array[3];
        $this->height= $array[4];
        $this->type= $array[5];
        $this->description= $array[6];
        //        echo $array[1] ."<br>";
        //        echo date_format($this->date, "Y/m/d") ."<br>";
    }

    // what is displayed in the gallery
    function full_title() {
        //
        $fdate= date_format($this->date, "m/Y");
        return $fdate ." - " .$this->title;
    }

    function print() {
        echo "[" .$this->file .", " .$this->title .", " .$this->type .", " .date_format($this->date, "Y/m/d") .", " .$this->width ."x" .$this->height ."]";
    }
}
?>
