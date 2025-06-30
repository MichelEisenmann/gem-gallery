<?php

class ColumnGenerator {
  // for identation purpose
  public $tab= "\t";
  
  // dictionnary of all the paints we work with
  public $paints;

  // dictionnary of the serie
  public $serie_dico;
  
  // paint id
  
  function add_to_column( $id ) {
    $paint= $this->paints[$id];
    
    // errors
    if ( $paint == null ) {
      echo "Cannot find " .$id ." in dictionnary";
      return;
    }

    // no whitespace, no uppercase
    $tagname= $this->create_tag_name( $id );

    $height="";
    $indent= "    ";
    $this->generate_part($paint, $tagname, $height, $indent);
  }
  
  function generate_part( $paint, $tagname, $height_style, $indent) {
    $rank= $this->serie_dico->get_id_rank($paint->id);
    $serie= $this->serie_dico->name;
    $url= Translator::url('/public/contenu_d_une_serie.php?serie=' .$serie .'&rank=' .$rank);
    $file= "images/" .$paint->file;
    $alt= Translator::t($paint->getAltId());
    
    $tt2ab= "    ";
    $tt3ab= $tt2ab .$tt2ab;
    $tt4ab= $tt3ab .$tt2ab;
    $tt5ab= $tt4ab .$tt2ab;
    $this->print_line( $indent, "<a class=\"gem-a\" href=\"" .$url ."\">" );
    $this->print_line( $indent, $tt2ab ."<div class=\"w3-display-container w3-padding" ." gem-" .$tagname ."\" >" );
    $this->print_line( $indent, $tt3ab   ."<img src=\"" .$file ."\" class=\"" ."gem-" .$tagname ."\" alt=\"" .$alt ."\">" );
    $this->print_line( $indent, $tt3ab     ."<div class=\"w3-display-middle w3-hide-small gem-hover\">" );
    $this->print_line( $indent, $tt4ab       .Translator::t($paint->getTitleId()) ." </br> " .Translator::t($paint->type) ." </br> " .$paint->get_size() ." </br> ");
    $this->print_line( $indent, $tt4ab       .Translator::t($paint->get_status()) ." </br> " );
    $this->print_line( $indent, $tt3ab     ."</div>" );
    $this->print_line( $indent, $tt2ab ."</div>" );
    $this->print_line( $indent, "</a>" );
  }
  
  function generate_style( $id, $color ) {
    $paint= $this->paints[$id];
    $tagname= $this->create_tag_name( $id );
    echo ".gem-" .$tagname ." {" ."\n";
    echo "    width: 100%;";
    echo "}" ."\n";
    echo "\n";
    echo ".gem-" .$tagname .":hover {" ."\n";
    echo "    opacity: 0.8;" ."\n";
    echo "}" ."\n";
    echo "\n";
    echo ".gem-" .$tagname .":hover > .gem-hover {" ."\n";
    echo "    color: " .$color .";" ."\n";
    echo "    display: block;" ."\n";
    echo "}" ."\n";
    echo "\n";
  }

  function create_tag_name( $id ) {
    $string = str_replace(' ', '_', $id); // Replaces all spaces with hyphens.
    return preg_replace('/[^A-Za-z0-9\-]/', '', $id); // Removes special chars.
  }
  
  function print_line( $indent, $string ) {
    echo $indent .$string ."\n";
  }
}

?>
