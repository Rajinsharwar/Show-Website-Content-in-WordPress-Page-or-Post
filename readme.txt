=== Show Website Content in WordPress Page or Post ===
Contributors: horshipsrectors, rajinsharwar
Plugin URI:
Tags: shortcode
Requires at least: 4.0.0
Tested up to: 6.2
Stable tag: 2.0.0

Fetches the content of another webpage or URL to display inside the current post or page.

== Description ==

The Show Website Content in WordPress Page or Post plugin fetches the content of another webpage or URL to display inside the current post or page. This plugin is useful for displaying content from another website or webpage without leaving the current WordPress page.

The plugin can use either file_get_contents() or CURL to fetch the content. Please ensure that your server is capable of running one of these methods using php_info() or by contacting your support team.

== Installation ==

To install the plugin, follow these steps:

* Download the plugin ZIP file.
* Upload the plugin ZIP file to the WordPress plugins directory (wp-content/plugins/).
* Extract the ZIP file.
* Activate the plugin through the 'Plugins' menu in WordPress.

== Usage ==

To use the plugin, include one of the following shortcodes in a WordPress page or post:

* [show_web_con_get URL] - Uses file_get_contents() to fetch the content.
* [show_web_con_curl URL] - Uses CURL to fetch the content.
* [show_web_con URL] - The default shortcode that uses either file_get_contents() or CURL.
* Replace 'URL' with the URL of the website or webpage you want to display.

== Frequently Asked Questions ==

= Where do I ask questions about this plugin? =

Questions can be directed to the WordPress support forums.

= How do I know if my server can run this plugin? =

You can check if your server is capable of running this plugin by using php_info() or by contacting your support team.

= Why can't I see anything? =

Please ensure that you're using the correct shortcode and that it's closed properly. If you're still having issues, try switching between file_get_contents() and CURL.

== Change Log ==

= 2.1.0 =

* Updated the plugin to follow the best practices for the latest WordPress and PHP versions.
* Renamed the shortcodes with the prefix 'show_web_con_' to avoid conflicts with other plugins.

= 1.1.0 =

*First release

= 1.0.0 =

* First release