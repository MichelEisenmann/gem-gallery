<?php

class Translator {

  // append the current language to the given url
  // and the additional keys if given
  static function url($original, $additional ='') {
    //
    $original= $original .$additional;
    if ( str_contains($original, '?' ) ) {
      return $original . "&lang=" .Translator::getLanguage();
    } else {
      return $original . "?lang=" .Translator::getLanguage();
    }
  }
  
  static function t($key){
    $language = Translator::getLanguage();
    $messages = require "{$_SERVER['DOCUMENT_ROOT']}/private/locale/{$language}/messages.php";
    
    return (array_key_exists($key, $messages))
      ? $messages[$key]
      : $key . "(missing translation)";
  }
  
  /**
   * Returns the language as defined by either the URL, session, or browser setting.
   * If a language could not be determined, or is not in a list of supported languages, the default
   * language passed in to this method will be returned.
   *
   * @param string $defaultLanguage
   * @return string
   */
  static function getLanguage($defaultLanguage = 'fr')
  {
    $language = null;
    
    if (isset($_GET['lang'])) {
      $language = $_GET['lang'];
    } elseif (isset($_SESSION['LANG'])) {
      $language = $_SESSION['LANG'];
    } else {
      $language = Translator::getLanguageFromBrowser($defaultLanguage);
    }
    
    // If the language given to us is not in our list of supported languages, use the default language.
    if (!isset($language) || !in_array($language, Translator::getSupportedLanguages())) {
      $language = $defaultLanguage;
    }
    
    // Store the current language to the session for future use.
    $_SESSION['LANG'] = $language;
    
    return $language;
  }

  static function setLanguage($newLanguage = 'fr') {
    $language = $newLanguage;

    // If the language given to us is not in our list of supported languages, use the default language.
    if (!isset($language) || !in_array($language, Translator::getSupportedLanguages())) {
      $language = 'fr';
    }

    $_SESSION['LANG']= $language;
  }

  /**
   * Returns the language that the client's browser is set to use. If we're unable to
   * determine a language from the browser this will return the default language passed
   * in.
   *
   * @param string $defaultLanguage
   * @return int|string
   */
  static function getLanguageFromBrowser($defaultLanguage = 'fr')
  {
    $languages = [];
    if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
      // break up string into pieces (languages and q factors)
      preg_match_all('/([a-z]{1,8}(-[a-z]{1,8})?)\s*(;\s*q\s*=\s*(1|0\.[0-9]+))?/i', $_SERVER['HTTP_ACCEPT_LANGUAGE'], $lang_parse);
      
      if (count($lang_parse[1])) {
        // create a list like "en" => 0.8
        $languages = array_combine($lang_parse[1], $lang_parse[4]);
        
        // set default to 1 for any without q factor
        foreach ($languages as $lang => $val) {
          if ($val === '') $languages[$lang] = 1;
        }
        
        // sort list based on value
        arsort($languages, SORT_NUMERIC);
      }
    }
    
    $supportedLanguages = Translator::getSupportedLanguages();
    
    foreach ($languages as $locale => $weighting) {
      
      // We're dealing with locale: Ex. en-US
      if (preg_match("/[a-z]{2}-[A-Z]{2}/", $locale)) {
        $browserLanguage = substr($locale, 0, 2);
      } else {
        // Probably dealing with a language: Ex. en
        $browserLanguage = $locale;
      }

      if (in_array($browserLanguage, $supportedLanguages)) {
        return $browserLanguage;
      }
    }
    
    return $defaultLanguage;
  }
  
  /**
   * Returns an array of languages this web application supports.
   *
   * @return array
   */
  static function getSupportedLanguages()
  {
    return [
            'en',
            'fr'
            ];
  }
}
?>
