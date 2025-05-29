<?php

class LineGenerator {
  // for identation purpose
  public $tab= "\t";
  
  // dictionnary of all the paints we work with
  public $paints;

  // dictionnary of the serie
  public $serie_dico;
  
  // height: height of the line
  // width1: width of the first paint on the line (other width will be automatically computed
  // id1, id2: ids in the $paints ditionnary
  
  function generate_double_line( $height, $id1, $width1, $id2 ) {
    $paint1= $this->paints[$id1];
    $paint2= $this->paints[$id2];
    
    // errors
    if ( $paint1 == null ) {
      echo "Cannot find " .$id1 ." in dictionnary";
      return;
    }
    if ( $paint2 == null ) {
      echo "Cannot find " .$id2 ." in dictionnary";
      return;
    }
    
    // no whitespace, no uppercase
    $tagname1= $this->create_tag_name( $id1 );
    $tagname2= $this->create_tag_name( $id2 );
    
    //
    $available_width= 885;
    $indent= "\t";
    //
    $this->print_line( $indent, "<div class=\"w3-container\">" );
    $this->generate_part($paint1, $tagname1, $width1, $height, "gem-background-left", $indent);
    //    $width2= $available_width - $width1;
    $width2= 100 - $width1 - 4;
    $this->generate_part($paint2, $tagname2, $width2, $height, "gem-background-right", $indent);
    //
    $this->print_line( $indent, "</div>" );
  }
  
  // height: height of the line
  // id1: id in the $paints ditionnary
  
  function generate_single_line( $height_style, $id1 ) {
    $paint1= $this->paints[$id1];
    
    // errors
    if ( $paint1 == null ) {
      echo "Cannot find " .$id1 ." in dictionnary";
      return;
    }
    
    // no whitespace, no uppercase
    $tagname1= $this->create_tag_name( $id1 );
    
    // larger for single
    $available_width= 900;
    $indent= "\t";
    $this->print_line( $indent, "<div class=\"w3-container\">" );
    $this->generate_part($paint1, $tagname1, 100, $height_style, "gem-background-single", $indent);
    $this->print_line( $indent, "</div>" );
  }
  
  function generate_part( $paint, $tagname, $width, $height_style, $style, $indent) {
    $rank= $this->serie_dico->get_file_rank($paint->file);
    $serie= $this->serie_dico->name;
    $url= Translator::url('/public/contenu_d_une_serie.php?serie=' .$serie .'&rank=' .$rank);
    
    $ttab= $this->tab;	
    $this->print_line( $indent, "<a class=\"gem-a\" href=\"" .$url ."\">" );
    $this->print_line( $indent, "<div class=\"w3-display-container gem-inline " .$height_style ." " .$style ." gem-" .$tagname ."\"" );
    $this->print_line( $indent, $ttab .$ttab ."style=\"width:" .$width ."%;\">" );
    $this->print_line( $indent, $ttab ."<div class=\"w3-display-middle gem-hover\">" );
    $this->print_line( $indent, $ttab .$ttab .$paint->title ." </br> " .$paint->get_size() ." </br> ");
    $this->print_line( $indent, $ttab .$ttab .Translator::t($paint->get_status()) ." </br> " );
    $this->print_line( $indent, $ttab ."</div>" );
    $this->print_line( $indent, "</div>" );
    $this->print_line( $indent, "</a>" );
  }
  
  function generate_style( $id, $xpos, $ypos, $color ) {
    $paint= $this->paints[$id];
    $tagname= $this->create_tag_name( $id );
      
    echo ".gem-" .$tagname ." {" ."\n";
    echo "    background: url('images/" .$paint->file ."');" ."\n";
    echo "    background-position: " .$xpos ."% " .$ypos ."%;" ."\n";
    echo "    background-size: cover;" ."\n";
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
