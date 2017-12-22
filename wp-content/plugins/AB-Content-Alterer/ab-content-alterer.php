<?php
/*
Plugin Name:  AB Content Alterer
Description:  WordPress Content Alterer: Change Unnbounce and Leadpages in content to <strong>Instapage</strong>
Version:      0.1.1
Author:       andrzej.bialowas@instapage.com
*/
defined('ABSPATH') or die('No script kiddies please!');

spl_autoload_register(function($className){
  $className = strtolower(str_ireplace("ABContentPlugin\\", "classes/", $className));
  include $className . ".php";
});

if (is_admin()) {
  new ABContentPlugin\SettingsPage();
} else {
  new ABContentPlugin\ContentAlternation();
}
