=== Apply ACF Layout ===

Contributors: tcmulder
Tags: custom scripts, scripts, analytics, acf
Requires at least: 4.7.3
Tested up to: 4.7.3
Stable tag: 1.0.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Add ACF areas for custom scripts in the header or footer.

== Description ==

This plugin adds ACF areas for custom scripts in the header or footer. It's useful for adding 3rd party scripts like analytics. The options page shows up under the main WordPress Settings menu, and you need to paste three pieces of code to get it up and running in your themes.

Usage:
1.  Activate the plugin.

2.  Add the following code just after the opening <body> tag: <?php do_action('custom_script_tags_plugin_before_closing_body'); ?>

3. Add your scripts to the Settings > Custom Scripts options page. The plugin will use wp_head and wp_footer hooks to insert the custom code, in addition to the custom custom_script_tags_plugin_before_closing_body hook you added after <body>.

4. It's uncommon, but you can also manually insert calls to the options (like if you exclude wp_head or wp_footer from a particular page for some reason but still want scripts). Just add the following code in the appropriate locations:

<?php the_field('after_opening_body', 'option'); ?>
<?php the_field('before_closing_body', 'option'); ?>
<?php the_field('before_closing_head', 'option'); ?>
    

== Installation ==

1. Upload "custom-script-tags" to the "/wp-content/plugins/" directory.
2. Activate the plugin through the "Plugins" menu in WordPress.

== Changelog ==

= 1.0.2 =

* Turned this into a plugin.
* Added wp_head, wp_footer, and custom custom_script_tags_plugin_before_closing_body hooks to ease implementation.

= 1.0.1 =

* Made it easier to paste the function with clearer documentation into functions.php

= 1.0.0 =

* Initial release.
