<?php
/*
Plugin Name:  AB Content Alterer old
Description:  WordPress Content Alterer: Change Unbounce and Leadpages in content to <strong>Instapage</strong>
Version:      0.1.0
Author:       andrzej.bialowas@instapage.com
*/
defined('ABSPATH') or die('No script kiddies please!');

class abContentAlererSettingsPage {
    /**
     * Holds the values to be used in the fields callbacks
     */
  private $options;

  /**
   * Start up
   */
  public function __construct() {
    add_action('admin_menu', array( $this, 'add_plugin_page'));
    add_action('admin_init', array( $this, 'page_init'));
  }

  /**
   * Add options page
   */
  public function add_plugin_page() {
    // This page will be under "Settings"
    add_options_page(
      'Settings Admin', 
      'AB Content Alterer Settings', 
      'manage_options', 
      'ab-settings-admin', 
      array($this, 'create_admin_page')
    );
  }

  /**
   * Options page callback
   */
  public function create_admin_page() {
    // Set class property
    $this->options = get_option('ab_alterer_option_group');
    ?>
    <div class="wrap">
      <h1>AB Content Alterer</h1>
      <form method="post" action="options.php">
      <?php
        // This prints out all hidden setting fields
        settings_fields( 'ab_alterer_options' );
        do_settings_sections( 'ab-settings-admin' );
        submit_button();
      ?>
      </form>
    </div>
    <?php
  }

  /**
   * Register and add settings
   */
  public function page_init() {        
    register_setting(
      'ab_alterer_options', // Option group
      'ab_alterer_option_group', // Option name
      array( $this, 'sanitize' ) // Sanitize
    );

    add_settings_section(
      'setting_section_id', // ID
      'Content Altering settings', // Title
      array( $this, 'print_section_info' ), // Callback
      'ab-settings-admin' // Page
    );  

    add_settings_field(
      'alterFrom', // ID
      'Altered Text:', // Title 
      array( $this, 'alterFromCallback' ), // Callback
      'ab-settings-admin', // Page
      'setting_section_id' // Section           
    );      

    add_settings_field(
      'alterTo', 
      'Text to alter:', 
      array( $this, 'alterToCallback' ), 
      'ab-settings-admin', 
      'setting_section_id'
    );      
  }

  /**
   * Sanitize each setting field as needed
   *
   * @param array $input Contains all settings fields as array keys
   */
  public function sanitize( $input ) {
    $new_input = [];
    if( isset( $input['alterFrom'] ) )
      $new_input['alterFrom'] = sanitize_text_field( $input['alterFrom'] );

    if( isset( $input['alterTo'] ) )
      $new_input['alterTo'] = sanitize_text_field( $input['alterTo'] );

    return $new_input;
  }

  /** 
   * Print the Section text
   */
  public function print_section_info() {
    print 'Enter your Content Altering settings below:';
  }

  /** 
   * Get the settings option array and print one of its values
   */
  public function alterFromCallback() {
    printf(
      '<input type="text" id="alterFrom" name="ab_alterer_option_group[alterFrom]" value="%s" />',
      isset( $this->options['alterFrom'] ) ? esc_attr( $this->options['alterFrom']) : ''
    );
  }

  /** 
   * Get the settings option array and print one of its values
   */
  public function alterToCallback() {
    printf(
      '<input type="text" id="alterTo" name="ab_alterer_option_group[alterTo]" value="%s" />',
      isset( $this->options['alterTo'] ) ? esc_attr( $this->options['alterTo']) : ''
    );
  }
}

if( is_admin() ) {
  $my_settings_page = new abContentAlererSettingsPage();
}

/**
* This class adds an action which replaces strings from array named $textToAlter in 
* content of posts and pages with $alterText string.
*/
class AbAlternateContent {
  public function __construct() {
    add_action('the_content', [$this, 'textAlternate']);
  }

  function textAlternate($text) {
    $textToAlter = get_option('ab_alterer_option_group')['alterFrom'];
    $alterText = get_option('ab_alterer_option_group')['alterTo']; 
    $alteredText = str_ireplace(
      $textToAlter,
      $alterText,
      $text
    );

    return $alteredText;
  }
}
$abAlternateContentDo = new AbAlternateContent();
