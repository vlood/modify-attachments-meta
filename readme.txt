=== Plugin Name ===
Tags: attachments, modify date, change meta data, edit uploaded files
Requires at least: 3.8
Contributors: vloo
Tested up to: 3.8
Stable tag: /trunk/
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Allows modification of meta data of attachments, such as date fields (soon to add more, I guess).

== Description ==

This is the long description.  No limit, and you can use Markdown (as well as in the following sections).

If a user types invalid input, they should be warned. Currently nothing happens - attachment is updated without updating with the wrong data.

= TODO =
* Metabox like shown here: http://wpsnipp.com/index.php/functions-php/start-date-end-date-metabox-for-events-custom-post-types/;
* Changing file name of the attachment (without the extension, of course);
* Control over which user roles can edit these fields;
* Validation error messages should be displayed;
* Use anonymous functions, instead of worrying what'll happen if a function is defined by someone else;

As I'm lazy as hell, I'll need your help to think of new features to implement!

== Installation ==

= From your WordPress dashboard =

1. Visit 'Plugins > Add New'
1. Search for 'Modify Attachments Meta'
1. Activate Modify Attachments Meta from your Plugins page.

Now you can edit you attachments' date and time of upload. Other features will be coming soon.

= From WordPress.org =

1. Download 'Modify Attachments Meta'.
1. Upload the 'modify-attachments-meta' directory to your '/wp-content/plugins/' directory, using your favorite method (ftp, sftp, scp, etc...)
1. Activate it from your Plugins page.

== Frequently Asked Questions ==

= Does it have a settings page? =

Nope.

== Screenshots ==

1. How "Edit date and time" looks on the attachment edit page.

== Changelog ==
= 0.1 =

* Editing an attachment date and time record is now possible;

== Upgrade Notice ==
