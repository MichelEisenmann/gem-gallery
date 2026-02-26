<?php

class Paint {
    // used to denote an unset rank
    const UNDEFINED_RANK= -1;

    // different status
    const SOLD_STATUS="vendu";
    const UNAVAILABLE_STATUS="indisponible";
    const AVAILABLE_STATUS="disponible";
    
    public $rank; // lowest values are shown first. If value is negative, it is ignored
	public $id;
    public $file;
    public $date;
    public $width;
    public $height;
    public $type;
    public $status;  // SOLD_STATUS, UNAVAILABLE_STATUS
    public $series; // an array of strings

    // as read from CSV
    // filename, date (YYYYMMDD) , width, height, type, status, series
    function set_attributes( $array ) {
    //    echo $array[0] ."<br>";

      // column of information in CSV
        $rank_column= 0;
        $id_column= 1;
        $filename_column= 2;
        $date_column= 3;
        $height_column= 4;
        $width_column= 5;
        $type_column= 6;
        $status_column= 7;
        $series_column= 8;
      
        $this->rank= $array[$rank_column];
        if ( empty($this->rank) ) {
            $this->rank= Paint::UNDEFINED_RANK;
        } else {
            $this->rank= intval($this->rank);
        }
        if ( strlen($array[$date_column]) != 8 ) {
            echo "** Invalid date for " . $array[$id_column] . ": received " .$array[$date_column] ."<br>";
        }
		$this->id= $array[$id_column];
        $this->file= $array[$filename_column]; // le path complet en partant dans images/. Ex: oils/flamboyance.jpg 
        $this->date= DateTimeImmutable::createFromFormat("Ymd", $array[$date_column]);
        $this->height= $array[$height_column];
        $this->width= $array[$width_column];
        $this->type= $array[$type_column];
        $this->setStatus($array[$status_column]);
        // au cas ou les series ne sont pas donnees
        $this->series=array();
        if ( count($array) > $series_column ) {
            // array[$series_column] contient les series separees par des espaces
            $series= explode(" ", trim($array[$series_column]));
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

    function getTitleId() {
        return $this->id ."_Titre";
    }

    function getAltId() {
        return $this->id ."_Alt";
    }

    function getDescriptionId() {
        return $this->id ."_Desc";
    }

    // what is displayed in the gallery
    function full_title() {
        //
        //$fdate= $this->get_date();
		$fsize= $this->get_size();
        return Translator::t($this->getTitleId()) ." - " .Translator::t($this->type) ." - " .$fsize;
    }

    function get_status() {
        return $this->status;
    }

    function get_description_and_status() {
        if ( empty($this->status) ) {
          return Translator::t($this->getDescriptionId());
        } else {
          return Translator::t($this->getDescriptionId()) ." (" .Translator::t($this->status) .")";
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
        return addslashes(Translator::t($this->getDescriptionId()));
    }

    function get_series() {
        return $this->series;
    }

    function print() {
        echo "[" .$this->rank .", " .$this->file .", " .$this->id .", " .$this->type .", " .$this->status .", " .date_format($this->date, "Y/m/d") .", " .$this->width ."x" .$this->height .", " .$this->series ."]";
    }
}
?>
