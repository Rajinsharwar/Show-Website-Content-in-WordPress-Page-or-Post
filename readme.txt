=== Show Website Content in WordPress Page or Post ===
Contributors: horshipsrectors
Plugin URI:
Tags: adopt-me
Donate link:
Requires at least: 4.0.0
Tested up to: 4.8.0
Stable tag: 2017.08.13

Fetches the content of another webpage or URL to display inside the current post or page.

== Description ==

** this plugin is no longer being update. Please feel free to adopt me! **


Fetches the content of another webpage or URL to display inside the current post or page.

The plugin can be run using either get_file_contents() or CURL, please ensure your server is capable of running one of these methods using php_info() or contacting your support team.



== Installation ==

To install the plugin, please upload the folder to your plugins folder and active the plugin.

== Screenshots ==





== Frequently Asked Questions ==

= Where do I ask questions about this plugin? =

Questions can be directed to the WordPress support forums.

= How do I use the plugin? =

Once installed, you can include the shortcode [horshipsrectors_get_html URL] in a page or post to fetch and display the target URL.

= Can I force the plugin to use file_get_contents() or CURL? =

Yes, use [horshipsrectors_get_html_get URL] or [horshipsrectors_get_html_curl URL] instead of the default [horshipsrectors_get_html URL]

= Why can't I see anything? =

While displaying the shortcode on WordPress.org, the closing bracket appears to be lost. Please ensure you're closing the shortcode properly.

It's possible that your web server does not allow get_file_contents() to run, to test this please check your php_info() for the function.





== Change Log ==

= 1.1.0 =

* First release

= 1.0.0 =

* First release