<?php 
class abContentAltererSettingsPage {
  /**
   * Holds the values to be used in the fields callbacks
   */
  private $options;

  /**
   * Start up
   */
  public function __construct() {
    add_action('admin_menu', [$this, 'addPluginPage']);
    add_action('admin_init', [$this, 'pageInit']);
  }

  /**
   * Add options page
   */
  public function addPluginPage() {
    // This page will be under "Settings"
    add_options_page(
      'Settings Admin', 
      __('AB Content Alterer Settings'), 
      'manage_options', 
      'ab-settings-admin', 
      [$this, 'createAdminPage']
    );
  }

  /**
   * Options page callback
   */
  public function createAdminPage() {
    // Set class property
    $this->options = get_option('ab_alterer_option_group');
    ?>
    <div class="wrap">
      <h1><?php __('AB Content Alterer'); ?></h1>
      <form method="post" action="options.php">
      <?php
        // This prints out all hidden setting fields
        settings_fields('ab_alterer_options');
        do_settings_sections('ab_settings_admin');
        submit_button();
      ?>
      </form>
    </div>
    <?php
  }

  /**
   * Register and add settings
   */
  public function pageInit() {        
    register_setting(
      'ab_alterer_options', // Option group
      'ab_alterer_option_group', // Option name
      [$this, 'sanitize'] // Sanitize
    );

    add_settings_section(
      'setting_section_id', // ID
      __('Content Altering settings'), // Title
      [$this, 'printSectionInfo'], // Callback
      'ab_settings_admin' // Page
    );  

    add_settings_field(
      'alterFrom', // ID
      __('Altered Text:'), // Title 
      [$this, 'alterFromCallback'], // Callback
      'ab_settings_admin', // Page
      'setting_section_id' // Section           
    );      

    add_settings_field(
      'alterTo', 
      __('Text to alter:'), 
      [$this, 'alterToCallback'], 
      'ab_settings_admin', 
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
    if (isset($input['alterFrom']))
      $new_input['alterFrom'] = sanitize_text_field($input['alterFrom']);

    if (isset($input['alterTo']))
      $new_input['alterTo'] = sanitize_text_field($input['alterTo']);

    return $new_input;
  }

  /** 
   * Print the Section text
   */
  public function printSectionInfo() {
    print __('Enter your Content Altering settings below:');
  }

  /** 
   * Get the settings option array and print one of its values
   */
  public function alterFromCallback() {
    printf(
      '<input type="text" id="alterFrom" name="ab_alterer_option_group[alterFrom]" value="%s" />',
      isset($this->options['alterFrom']) ? esc_attr($this->options['alterFrom']) : ''
    );
  }

  /** 
   * Get the settings option array and print one of its values
   */
  public function alterToCallback() {
    printf(
      '<input type="text" id="alterTo" name="ab_alterer_option_group[alterTo]" value="%s" />',
      isset($this->options['alterTo']) ? esc_attr($this->options['alterTo']) : ''
    );
  }
}