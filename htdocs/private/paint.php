<?php

class Paint {
    // used to denote an unset rank
    const UNDEFINED_RANK= -1;

    // different status
    const SOLD_STATUS="vendu";
    const UNAVAILABLE_STATUS="indisponible";
    const AVAILABLE_STATUS="disponible";
    
    public $rank; // lowest values are shown first. If value is negative, it is ignored
    public $file;
    public $title;
    public $date;
    public $width;
    public $height;
    public $type;
    public $status;  // SOLD_STATUS, UNAVAILABLE_STATUS
    public $description;
    public $series; // an array of strings

    // as read from CSV
    // filename, title, date (YYYYMMDD) , width, height, type, status, description, series
    function set_attributes( $array ) {
        $this->rank= $array[0];
        if ( empty($this->rank) ) {
            $this->rank= Paint::UNDEFINED_RANK;
        } else {
            $this->rank= intval($this->rank);
        }
        if ( strlen($array[3]) != 8 ) {
            echo "** Invalid date for " . $array[1] . ": received " .$array[3] ."<br>";
        }
        $this->file= $array[1]; // le path complet en partant dans images/. Ex: oils/flamboyance.jpg 
        $this->title= $array[2]; 
        $this->date= DateTimeImmutable::createFromFormat("Ymd", $array[3]);
        $this->height= $array[4];
        $this->width= $array[5];
        $this->type= $array[6];
        $this->setStatus($array[7]);
        $this->description= $array[8];
        // au cas ou les series ne sont pas donnees
        $this->series=array();
        if ( count($array) > 9 ) {
            // array[9] contient les series separees par des espaces
            $series= explode(" ", trim($array[9]));
            //
            foreach( $series as $serie ) {
                $cur= trim($serie);
                if ( strlen($cur) > 0 ) {
                    array_push($this->series, $cur);
                }
            }
        }
        //        echo $array[1] ."<br>";
        //        echo date_format($this->date, "Y/m/d") ."<br>";
    }

    /**
     *
     */
    function setStatus( $status ) {
      $status= trim(strtolower($status));
      if ( empty($status) ) {
        $this->status= Paint::AVAILABLE_STATUS;
      } else if ( strcmp( $status, Paint::SOLD_STATUS ) == 0 ) {
        $this->status= Paint::SOLD_STATUS;
      } else if ( strcmp ($status, Paint::UNAVAILABLE_STATUS ) == 0 ) {
        $this->status= Paint::UNAVAILABLE_STATUS;
      } else {
        $this->status= $status;
      }
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
        return $this->title ." - " .$fsize;
    }

    function get_status() {
        return $this->status;
    }

    function get_description_and_status() {
        if ( empty($this->status) ) {
          return $this->description;
        } else {
          return $this->description ." (" .Translator::t($this->status) .")";
        }
    }

    function get_date() {
        return date_format($this->date, "m/Y");
    }

    // return a label that shows the dimensions
    function get_size() {
        return $this->height ."x" .$this->width ." cm";
    }

    // return a protected description
    function get_description() {
        return addslashes($this->description);
    }

    function get_series() {
        return $this->series;
    }

    function print() {
        echo "[" .$this->rank .", " .$this->file .", " .$this->title .", " .$this->type .", " .$this->status .", " .date_format($this->date, "Y/m/d") .", " .$this->width ."x" .$this->height .", " .$this->series ."]";
    }
}
?>
