<?php
/**
 * Plugin Name:     WPDK Sample Menu #2
 * Plugin URI:      https://wpxtre.me
 * Description:     Hello World! in WordPress menu of admin area with WPDK framework - intermediate usage
 * Version:         1.0.0
 * Author:          wpXtreme
 * Author URI:      https://wpxtre.me
 * Text Domain:     wpdk-sample-menu-2
 * Domain Path:     localization
 */

// Include WPDK framework - the root directory name of WPDK may be different.
// Please change the line below according to your environment.
require_once( trailingslashit( dirname( dirname( __FILE__ ))) . 'wpdk-production/wpdk.php' );

// Hook a function to the WordPress action that generates the Hello World menu item in admin menu
add_action( 'admin_menu', 'wpdk_create_admin_menu_2' );

// This function creates the Hello World menu item in admin menu through WPDK
function wpdk_create_admin_menu_2() {

  // Set my own plugin icon URL, shown in main navigation menu of WordPress Administration Screen
  $icon_menu = plugin_dir_url( __FILE__ ) . 'logo-16x16.png';

  // Build menu as an array. See documentation of method renderByArray of class WPDKMenu for details
  $menus = array(
    'wpdk_samplemenu' => array(
      // Menu title shown as first entry in main navigation menu
      'menuTitle'  => __( 'Hello World!' ),
      // WordPress capability needed to see this menu - if current WordPress user does not have this capability, the menu will be hidden
      'capability' => 'manage_options',
      // Icon to show in menu - see above
      'icon'       => $icon_menu,
      // Create two submenu item to this main menu
      'subMenus'   => array(

        array(
          // Menu item shown as first submenu in main navigation menu
          'menuTitle'      => __( 'Show Hello World' ),
          // The web page title shown when this item is clicked
          'pageTitle'  => __( 'Hello World! wpdk sample plugin - Show Hello World!' ),
          // WordPress capability needed to see this menu item - if current WordPress user does not have this capability, this menu item will be hidden
          'capability'     => 'manage_options',
          // Function called whenever this menu item is clicked
          'viewController' => 'wpdk_display_hello_world_2',
        ),

        // Add a divider to separate the first submenu item from the second
        WPDKSubMenuDivider::DIVIDER,

        array(
          // Menu item shown as second submenu in main navigation menu
          'menuTitle'      => __( 'Show About' ),
          // The web page title shown when this item is clicked
          'pageTitle'  => __( 'Hello World! wpdk sample plugin - Show About' ),
          // Function called whenever this menu item is clicked
          'viewController' => 'wpdk_display_about_2',
        ),
      )
    )
  );

  // Physically build the menu added to main navigation menu when this plugin is activated
  WPDKMenu::renderByArray( $menus );

}

// This function does nothing more than displays Hello World! in admin area when plugin menu item 'Show Hello World' is clicked in admin menu
function wpdk_display_hello_world_2() {
  echo '<h1>' . 'Hello World!' . '</h1>';
}

// This function displays a string in admin area when plugin menu item 'Show About' is clicked in admin menu
function wpdk_display_about_2() {
  echo '<h1 style="color:#000090">' . 'This is a WPDK sample plugin - about section - Thanks!' . '</h1>';
}
