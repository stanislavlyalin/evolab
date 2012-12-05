=== WP-NOTCAPTCHA ===
Contributors: WebJema
Donate link: http://notcaptcha.webjema.com/
Tags: captcha, comments, spam
Requires at least: 2.3
Tested up to: 3.1.3
Stable tag: 1.3.1

New kind of human test. Adds CAPTCHA anti-spam method to WordPress on the comment form, registration form, or both. 

== Description ==

Adds CAPTCHA anti-spam methods to WordPress on the comment form, registration form, or both.
In order to post comments, users will have to range icons in right (upright) place.
This can help prevent spam from automated bots (100%). This will also increase the quantity of comments because of funny icons.

[Plugin URI]: (http://notcaptcha.webjema.com)


Requirements/Restrictions:
-------------------------

- Works with Wordpress 2.x, 3.x.
- PHP 4.3.0 or above with GD2 library support.
- Your theme must have a `<?php do_action('comment_form', $post->ID); ?>` tag inside your comments.php form. Most themes do.
  The best place to locate the tag is before the comment textarea, you may want to move it if it is below the comment textarea.

Features:
--------
 * Configure from Admin panel
 * JavaScript is not required (but desirable)
 * Allows Trackbacks and Pingbacks
 * Setting to hide the CAPTCHA from logged in users and or admins
 * Setting to show the CAPTCHA on the comment form, registration form, or both
 * I18n language translation support (see FAQ)


== Installation ==
1. Edit /lib/notcaptcha_config.php file for settings (can be skipped). Settings can be changed by your preference.

2. Upload the `wp-notcaptcha` folder to the `/wp-content/plugins/` directory

3. Activate the plugin through the `Plugins` menu in WordPress


= Troubleshooting if the CAPTCHA images are not being shown: =

Make this as a test:
Activate the NOTCAPTCHA plugin and temporarily change your theme to the "Wordpress Default" theme.
Are the captcha images seen now?
If they are, the theme you are using is the reason.

Your theme must have a `<?php do_action('comment_form', $post->ID); ?>` tag inside your comments.php form. Most themes do.
The best place to locate the tag is before the comment textarea, you may want to move it if it is below the comment textarea.
This tag is exactly where the captcha image and captcha code entry will display on the form, so
move the line to before the comment textarea.


== Screenshots ==

1. screenshot-1.jpg is the captcha on the comment form.

2. screenshot-2.jpg is the captcha on the registration form.

3. screenshot-3.jpg is the `Captcha options` tab on the `Admin Plugins` page.


== Configuration ==

After the plugin is activated, you can configure it by selecting the `NotCaptcha options` tab on the `Admin Plugins` page.
Here is a list of the options:

1. NotCaptcha on Register Form: - Enable captcha on the register form.

2. NotCaptcha on Comment Form:  - Enable captcha on the comment form.

3. NotCaptcha on Comment Form:  - Hide captcha for registered users (select permission level)

4. Noise on captcha:  - Add some shapes to protect the image from auto-recognition

5. Background color of images: - Set color similar to your blog background

== Usage ==

Once activated, a captcha section is added to the comment and register forms.


== Frequently Asked Questions ==

= Sometimes the captcha images are displayed AFTER the submit button on the comment form. =

Your theme must have a `<?php do_action('comment_form', $post->ID); ?>` tag inside your comments.php form. Most themes do.
  The best place to locate the tag is before the comment textarea, you may want to move it if it is below the comment textarea.
This tag is exactly where the captcha image and captcha code entry will display on the form, so
move the line to before the comment textarea and the problem should be fixed.

= Is this plugin available in other languages? =

Yes. To use a translated version, you need to obtain or make the language file for it. 
At this point it would be useful to read [Installing WordPress in Your Language](http://codex.wordpress.org/Installing_WordPress_in_Your_Language "Installing WordPress in Your Language") from the Codex. You will need an .mo file for NOTCAPTCHA that corresponds with the "WPLANG" setting in your wp-config.php file. Translations are listed below -- if a translation for your language is available, all you need to do is place it in the `/wp-content/plugins/wp-notcaptcha` directory of your WordPress installation. If one is not available, and you also speak English well, please consider doing a translation yourself (see the next question).


The following translations are included in the download zip file:

* Russian (ru_RU) - Translated by [Webjema](http://www.webjema.com "Webjema")
* Italian (it_IT) - Translated by [Gianni](http://gidibao.net "gidibao&#8217;s Cafe")
* Simplified Chinese (zh_CN) - Translated by [Donald Z](http://zuoshen.com "ZUOSHEN.COM")
* Byelorussian (by_BY) - Translated by FatCow
* Spanish (es_ES) - Translated by [InMotion](http://www.inmotionhosting.com "inmotionhosting.com")


= Can I provide a translation? =

Of course! It will be very gratefully received. Please read [Translating WordPress](http://codex.wordpress.org/Translating_WordPress "Translating WordPress") first for background information on translating.
* There are some strings with a space in front or end -- please make sure you remember the space!
* When you have a translation ready, please send the .po and .mo files to webjema [at ] gmail ddot com. 
* If you have any questions, feel free to email me also. Thanks!


== Version History ==
rel 1.3.1 (30 October 2011)
-------
- Added function "imagerotateEquivalent" (works if your php installation do not has "imagerotate" function)
- Gallery folder disabled from listing
- Added new noise to images
- Added new icons to gallery 
- Added Spanish language

rel 1.3 (27 June 2011)
-------
- Added mobile devices support (rotate by clicking on image)
- Code optimization (no captcha form - no css and js in page header)
- Added new icons to gallery

rel 1.2 (3 May 2010)
-------
- The method to check the correct answer has changed
- Corrected problem if blog installed in subfolder
- Added "Reload images" button
- CSS problems corrected
- Added "noise" option
- Added "background color" option
- Added new icons to gallery
- A lot of small corrections

rel 1.1 (3 Jul 2009)
-------
- Initial Release