<?php
/*
Plugin Name:  AB Content Alterer
Description:  WordPress Content Alterer: Change Unbounce and Leadpages in content to <strong>Instapage</strong>
Version:      0.1.0
Author:       andrzej.bialowas@instapage.com
*/
defined('ABSPATH') or die('No script kiddies please!');
/**
* This class adds an action which replaces strings from array named $textToAlter in 
* content of posts and pages with $alterText string.
*/
class AbAlternateContent {
  public function __construct() {
    add_action('the_content', [$this, 'textAlternate']);
  }
  function textAlternate($text) {
    $textToAlter = [
      'leadpages',
      'unbounce'
    ];
    $alterText = 'Instapage';
    $alteredText = str_ireplace(
      $textToAlter,
      $alterText,
      $text
    );
    return $alteredText;
  }
}
$abAlterContent = new AbAlternateContent();
