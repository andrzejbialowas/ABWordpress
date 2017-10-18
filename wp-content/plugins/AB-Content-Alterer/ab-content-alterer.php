<?php
/*
Plugin Name:  AB Content Alterer
Description:  WordPress Content Alterer: Change Unbounce and Leadpages in content to <strong>Instapage</strong>
Version:      0.7
Author:       andrzej.bialowas@instapage.com
*/
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
add_action('the_content', 'abAlterContent');
function abAlterContent($abTextToAlter) {
  $abTextToAlter = strtolower($abTextToAlter);
  $abAlteredNames = [
    'leadpages',
    'unbounce'
  ];
  $abAlterTo = 'Instapage';
  $abAlteredContent = str_replace(
    $abAlteredNames,
    $abAlterTo,
    $abTextToAlter
  );
  return $abAlteredContent;
}