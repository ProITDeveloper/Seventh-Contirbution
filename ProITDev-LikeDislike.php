<?php
/*
Plugin Name:  ProITDev-LikeDislike
Plugin URI:   https://www.facebook.com/maizaz.ansari
Description:  This my first custom plugin.
Version:      1.0
Author:       Pro. IT-Developer
Author URI:   https://www.facebook.com/maizaz.ansari
License:      GPL2
License URI:  https://www.facebook.com/maizaz.ansari
Text Domain:  wporg
Domain Path:  /languages
*/

function proitdev_publish_send_mail(){
	global $post;
	$author = $post->post_author; /* Post author ID */
	$name = get_the_author_meta('display_name',$author);
	$mail = get_the_author_meta('user_email',author);
	$title = $post->post_title;
	$permalink = get_permalink( $ID );
	$edit = get_edit_post_link($ID, '');
	$to[] = $sprintf('%s <%s>' , $name, $email);
	$subject = sprintf('Published: %s', $title);
	$message = sprintf('Congratulations, %s! Your article "%s" has been published.'. "\n\n", $name, $title);
	$message .= sprintf('View %s', $permalink);
	$header[] = '';
	wp_mail($to, $subject, $messagge, $header);
}
add_action('publish_post', 'proitdev_publish_send_mail');