<?php
/*
Plugin Name:  AB Content Alterer
Description:  WordPress Content Alterer: Change Unbounce and Leadpages in content to <strong>Instapage</strong>
Version:      0.1.0
Author:       andrzej.bialowas@instapage.com
*/
defined('ABSPATH') or die('No script kiddies please!');
/**
* This class adds an action which replaces strings from array named $abAlteredNames in 
* content of posts and pages with $abAlterTo string.
*/
class AbAlternateContent {
  public function __construct() {
    add_action('the_content', array($this, 'abAlternateText'));
  }
  function abAlternateText($text) {
    $abAlteredNames = [
      'leadpages',
      'unbounce'
    ];
    $abAlterTo = 'Instapage';
    $abAlteredContent = str_ireplace(
      $abAlteredNames,
      $abAlterTo,
      $text
    );
    return $abAlteredContent;
  }
}
$abAlterContent = new AbAlternateContent();
