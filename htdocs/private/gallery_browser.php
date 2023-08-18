<?php

require('dictionnary.php');
require('paint_dictionnary.php');

class GalleryBrowser {
    // provient du fichier "dico.csv"
    // sert a associer une cle et un intitule
    public $dictionnary;

    // indexed by paint types (oil, pastel, etc.) and by cyles
    public $paint_dictionnaries;

    function load_dico( $dico_file ) {
        // creation du dictionnaire
        $dictionnary= new Dictionnary();

        // ouvre le fichier csv - separateur doit etre ';'
        $row= 1;
        if (($handle = fopen($dico_file, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
                $num = count($data);
                //                echo "<p> $num fields in line $row: <br /></p>\n";
                // on saute les commentaires (lignes qui commencent par '#')
                if ( !str_starts_with($data[0], '#') ) {
                    //                    for ($c=0; $c < $num; $c++) {
                    //                        echo $data[$c] . "<br />\n";
                    //                    }
                    // premier element est la cle, le second est l'intitule
                    $dictionnary->add_key( $data[0], $data[1] );
                }
                $row++;
            }
            fclose($handle);
        }
    }

    // le dictionnaire doit avoir ete deja charge (cf "load_dico")
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
                    $this->register_paint( $paint );
                }
                $row++;
            }
            fclose($handle);
        }
        // finalize the dicos
        foreach ($this->paint_dictionnaries as $dico ) {
            $dico->finalize();
        }
    }

    // un tableau est present au plus dans deux dictionnaires
    // - son cycle si il est present
    // - son type (huile, pastel, etc...)
    function register_paint( $paint ) {
        if ( $cur_paint->cycle != '' ) {
            $dico= $this->get_or_create_dictionnary($cur_paint->cycle);
            $dico->add_paint($cur_paint, $cur_paint->cycle);
        }
        $dico= $this->get_or_create_dictionnary($cur_paint->type);
        $dico->add_paint($cur_paint, cur_paint->type );
    }

    function get_or_create_dictionnary( $key ) {
        if ( array_key_exists( $key, $this->paint_dictionnaries ) ) {
            return $this->paint_dictionnaries($key);
        } else {
            $dico= new PaintDictionnary();
            $dico->key= $key;
            $dico->name= $this->$dictionnary->get_label( $key );
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
