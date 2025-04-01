<?php

require('dictionnary.php');
require('paint_dictionnary.php');

class AllGalleries {
    // provient du fichier "dico.csv"
    // sert a associer une cle et un intitule
    public $dictionnary;

    // indexed by paint types (oil, pastel, etc.) and by cyles
    public $paint_dictionnaries;

    // specific dictionnaries (not indexed in paint_dictionnaries
    public $all_paint_dictionnary;
    public $new_paints_dictionnary;

    // how many paints are inserted in the new_paints_dictionnary
    const NUMBER_OF_NEW_PAINTS=5;

    public function __construct() {
        $this->dictionnary= new Dictionnary();
        $this->paint_dictionnaries= array();
    }

    function initialize_contents($public_path) {
      //        echo "<p> $public_path";
      $this->load_dico( $public_path . "/images/dico.csv" );
      $this->create_specific_dictionnaries();
      $this->load_paint_data( $public_path . "/images/paint-data.csv" );
      $this->fill_new_paints();
    }

    function load_dico( $dico_file ) {
        // ouvre le fichier csv - separateur doit etre ';'
        $row= 1;
        if (($handle = fopen($dico_file, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
                $num = count($data);
                // echo "<p> $num fields in line $row: <br /></p>\n";
                // on saute les commentaires (lignes qui commencent par '#')
                if ( $data[0] != null && !str_starts_with($data[0], '#') && $num == 1 ) {
                    //                                        for ($c=0; $c < $num; $c++) {
                    //                                            echo $data[$c] . "<br />\n";
                    //                                        }
                    // premier element est la cle
                    $key= trim($data[0]);
                    if ( $key != '' ) {
                        $this->dictionnary->add_key( $key, $key );
                    }
                }
                $row++;
            }
            fclose($handle);
        }
    }

    // must be called after load_dico so that labels are available
    function create_specific_dictionnaries() {
      $dico= $this->get_or_create_dictionnary(PaintDictionnary::ALL);
      $this->all_paint_dictionnary= $dico;
      $dico->shownInSelector= FALSE;
      //
      $dico= $this->get_or_create_dictionnary(PaintDictionnary::NEW);
      $this->new_paints_dictionnary= $dico;
      $dico->shownInSelector= FALSE;
    }

    // le dictionnaire doit avoir ete deja charge (cf "load_dico")
    // all_paint_dictionnary doit etre cree
    function load_paint_data( $paint_data_file ) {
        // open the csv file
        $row = 1;
        if (($handle = fopen($paint_data_file, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
                $num = count($data);
                //                echo "<p> $num fields in line $row: <br /></p>\n";
                // skip commented lines (starts with '#')
                if ( !str_starts_with($data[0], '#') ) {
                  //                    for ($c=0; $c < $num; $c++) {
                    //                        echo $data[$c] . "<br />\n";
                    //                    }
                    // create the paint
                    $cur_paint= new Paint();
                    $cur_paint->set_attributes($data);
                    // ajoute le tableau dans ses dictionnaires associes (Type et cycle)
                    // les dictionnaires sont crees si necessaire
                    $this->register_paint( $cur_paint );
                }
                $row++;
            }
            fclose($handle);
        }
        // finalize the dicos
        foreach ($this->paint_dictionnaries as $dico ) {
            $dico->finalize();
        }
        // sort the list of dicos alphabetically
        asort( $this->paint_dictionnaries );
    }

    // load_paint_data doit avoir ete appele pour que le all_paint_dictionnary soit rempli
    function fill_new_paints() {
      $count= 0;
      // on prend les 5 dernieres peintures
      foreach( $this->all_paint_dictionnary->sortedList as $paint ) {
        if ($count >= self::NUMBER_OF_NEW_PAINTS ) return;
          $this->new_paints_dictionnary->add_paint( $paint );
          $count++;
      }
    }

    // un tableau est present au plus dans deux dictionnaires
    // - son cycle si il est present
    // - son type (huile, pastel, etc...)
    function register_paint( $paint ) {
        if ( count($paint->themes) > 0 ) {
            foreach( $paint->themes as $theme ) {
                $dico= $this->get_or_create_dictionnary($theme);
                $dico->add_paint($paint);
            }
        }
        $dico= $this->get_or_create_dictionnary($paint->type);
        $dico->kind= PaintDictionnary::TYPE;
        $dico->add_paint($paint);
        // paints are all put into the all_paint_dictionnary
        $this->all_paint_dictionnary->add_paint($paint);
    }

    function get_or_create_dictionnary( $key ) {
        if ( array_key_exists( $key, $this->paint_dictionnaries ) ) {
            return $this->paint_dictionnaries[$key];
        } else {
            $dico= new PaintDictionnary();
            $dico->key= $key;
            //            $dico->name= $this->dictionnary->get_label( $key ); 
            $dico->name= $key;
           $this->paint_dictionnaries[$dico->key]= $dico;
            return $dico;
        }
    }

    function load_contents( $directory_name ) {
        $this->directoryName= $directory_name;
        // 
        $this->imageFiles= array();
        $this->textFiles= array();
        $dir = new DirectoryIterator($directory_name );
        foreach ($dir as $fileinfo) {
            if ($fileinfo->isFile()) {
                if ( str_ends_with($fileinfo->getFilename(), "jpg")) {
                    $this->imageFiles[]= $fileinfo->getFilename();
                }
                if ( str_ends_with($fileinfo->getFilename(), "png")) {
                    $this->imageFiles[]= $fileinfo->getFilename();
                }
            }
        }
    }

    function print() {
        foreach ($this->paint_dictionnaries as $dico) {
            $dico->print();
        }
    }
}


?>
