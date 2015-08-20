<?php
/**
 * @TODO What this does.
 *
 * @package   @TODO
 * @author    Josh Pollock <Josh@JoshPress.net>
 * @license   GPL-2.0+
 * @link
 * @copyright 2015 Josh Pollock
 */

namespace postmatic\epoch;


use postmatic\epoch\front\api_helper;

class preset_comment_counts {


	public function __construct() {
		add_action('wp_insert_comment', array( __CLASS__ , 'post_comment' ), 51, 2 );
		add_action(  'publish_post',  array( __CLASS__, 'post_published' ) );
	}

	public static function post_comment( $comment_id, $comment ) {
		$post_id = $comment[ 'comment_post_ID' ];
		api_helper::write_comment_count( $post_id );
	}

	public static function post_published( $post_id ) {
		api_helper::write_comment_count( $post_id );
	}
}
