<?php
/**
 *
 * Plugin Name:       Modify Attachments Meta
 * Plugin URI:        https://github.com/vlood/modify-attachments-meta
 * Description:       Allows modification of meta data of attachments, such as date fields (soon to add more, I guess)
 * Version:           0.1
 * Author:            vloo
 * Author URI:        http://profiles.wordpress.org/vloo
 * Text Domain:       mod-att-meta
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /languages/
 * GitHub Plugin URI: https://github.com/vlood/modify-attachments-meta
 */

/*  Copyright 2014  Vladimir Vassilev  (email : vlood.vassilev@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

if ( ! defined( 'WPINC' ) ) {
        die;
}

function mod_att_meta_init() {
  load_plugin_textdomain( 'mod-att-meta', false, dirname( plugin_basename( __FILE__ ) ) ); 
}
add_action('plugins_loaded', 'mod_att_meta_init');


/* Set attachment post date (thanks to http://wordpress.org/support/profile/herrvollbaer, posting a solution here: http://wordpress.org/support/topic/modify-date-of-attachments?replies=5#post-3070220) */

// Add a custom field to an attachment in WordPress
if(!function_exists('mam_attachment_date_edit')){
	function mam_attachment_date_edit($form_fields, $post) {
	    $form_fields['post_date']['label'] = __('Date & time', 'mod-att-meta');
	    $form_fields['post_date']['value'] = $post->post_date;
	    $form_fields['post_date']['helps'] = __('Modify the original upload date', 'mod-att-meta');
	    return $form_fields;
	}
	
	add_filter( 'attachment_fields_to_edit', 'mam_attachment_date_edit', 10, 2);
}

// save custom field to post_meta
if(!function_exists('mam_attachment_date_save')){
	function mam_attachment_date_save($post, $attachment) {
		if(strtotime($attachment['post_date'])){ //is a valid date?
			$post['post_date'] = $attachment['post_date'];
	    	return $post;	
		} else {
			// Do nothing silently. That's what you get when you don't give us valid input!
		}
	}
	add_filter( 'attachment_fields_to_save', 'mam_attachment_date_save', 10, 2);
}


/* Adding a field for menu_order setting for a file in case you order them by this. Thanks to https://wordpress.org/support/profile/aspacecodyssey for this one: https://wordpress.org/support/topic/adding-menu_order-to-plugin?replies=1 */

if(!function_exists('mam_attachment_menu_order_edit')){
	function mam_attachment_menu_order_edit($form_fields, $post) {
	    $form_fields['post_menu_order']['label'] = __('Menu Order', 'mod-att-meta');
	    $form_fields['post_menu_order']['value'] = $post->menu_order;
	    $form_fields['post_menu_order']['helps'] = __('Modify the original menu order', 'mod-att-meta');
	    return $form_fields;
	}

	add_filter( 'attachment_fields_to_edit', 'mam_attachment_menu_order_edit', 10, 2);
}

if(!function_exists('mam_attachment_menu_order_save')){
	function mam_attachment_menu_order_save($post, $attachment) {
		$post['menu_order'] = $attachment['post_menu_order'];
    	return $post;
	}
	add_filter( 'attachment_fields_to_save', 'mam_attachment_menu_order_save', 10, 2);
}
