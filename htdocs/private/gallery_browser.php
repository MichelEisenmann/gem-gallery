<?php

require('paint_dictionnary.php');

class GalleryBrowser {
    // must match the CSV file
    const OIL= "oil";
    const PASTEL= "pastel";
    const OTHER= "other";
    const ACRYLIC= "acrylic";
    // what is displayed
    const OIL_NAME= "Huiles";
    const PASTEL_NAME= "Pastels";
    const OTHER_NAME= "Autres";
    
    const ACRYLIC_NAME= "acryliques";
    
    // indexed by paint types (oil, pastel, etc.)
    public $dictionnaries;

    function load_paint_data( $paint_data_file ) {
        // create the dictionnaries
        $oils= new PaintDictionnary();
        $oils->name= GalleryBrowser::OIL_NAME;
        $oils->type= GalleryBrowser::OIL;
        $this->dictionnaries[$oils->type]= $oils;

        $pastels= new PaintDictionnary();
        $pastels->name= GalleryBrowser::PASTEL_NAME;
        $pastels->type= GalleryBrowser::PASTEL;
        $this->dictionnaries[$pastels->type]= $pastels;

        $acrylics= new PaintDictionnary();
        $acrylics->name= GalleryBrowser::ACRYLIC_NAME;
        $acrylics->type= GalleryBrowser::ACRYLIC;
        $this->dictionnaries[$acrylics->type]= $acrylics;

        $others= new PaintDictionnary();
        $others->name= GalleryBrowser::OTHER_NAME;
        $others->type= GalleryBrowser::OTHER;
        $this->dictionnaries[$others->type]= $others;

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
                    //
                    $dico= $this->dictionnaries[$cur_paint->type];
                    $dico->add_paint($cur_paint);
                }
                $row++;
            }
            fclose($handle);
        }
        // finalize the dicos
        foreach ($this->dictionnaries as $dico ) {
            $dico->finalize();
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
        foreach ($this->dictionnaries as $dico) {
            $dico->print();
        }
    }
}


?>
