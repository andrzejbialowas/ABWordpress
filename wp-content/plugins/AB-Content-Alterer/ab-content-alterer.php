<?php
/*
Plugin Name:  AB Content Alterer
Description:  WordPress Content Alterer: Change Unnbounce and Leadpages in content to <strong>Instapage</strong>
Version:      0.1.1
Author:       andrzej.bialowas@instapage.com
*/
defined('ABSPATH') or die('No script kiddies please!');

include 'abAlternateClass.php';
include 'abContentAltererSettingsPage.php';



if (is_admin()) {
  new abContentAltererSettingsPage();
}

new ABContentPlugin\ContentAlternation();
