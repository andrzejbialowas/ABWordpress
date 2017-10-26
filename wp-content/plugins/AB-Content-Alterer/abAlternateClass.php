<?php 
namespace ABContentPlugin;
/**
* This class adds an action which replaces strings from array named $textToAlter in 
* content of posts and pages with $alterText string.
*/
class ContentAlternation {
  public function __construct() {
    add_action('the_content', [$this, 'textAlternate']);
  }

  function textAlternate($text) {
    $textToAlter = isset(get_option('ab_alterer_option_group')['alterFrom']) ? esc_attr(get_option('ab_alterer_option_group')['alterFrom']) : '';
    $alterText = isset(get_option('ab_alterer_option_group')['alterTo']) ? esc_attr(get_option('ab_alterer_option_group')['alterTo']) : '';
    $alteredText = str_ireplace(
      $textToAlter,
      $alterText,
      $text
    );

    return $alteredText;
  }
}
