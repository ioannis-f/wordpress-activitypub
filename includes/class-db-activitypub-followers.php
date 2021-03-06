<?php

class Db_Activitypub_Followers {

	public static function get_followers( $author_id ) {
		return get_user_option( 'activitypub_followers', $author_id );
	}

	public static function add_follower( $actor, $author_id ) {
		$followers = get_user_option( 'activitypub_followers', $author_id );

		if ( ! is_string( $actor ) ) {
			if (
				is_array( $actor ) &&
				isset( $actor['type'] ) &&
				'Person' === $actor['type'] &&
				isset( $actor['id'] ) &&
				true === filter_var( $actor['id'], FILTER_VALIDATE_URL )
			) {
				$actor = $actor['id'];
			}

			return new WP_Error( 'invalid_actor_object', __( 'Unknown Actor schema', 'activitypub' ), array(
				'status' => 404
			) );
		}

		if ( ! is_array( $followers ) ) {
			$followers = array( $actor );
		} else {
			$followers[] = $actor;
		}

		$followers = array_unique( $followers );

		update_user_meta( $author_id, 'activitypub_followers', $followers );
	}

	public static function remove_follower( $actor, $author_id ) {
		$followers = get_user_option( 'activitypub_followers', $author_id );

		foreach ( $followers as $key => $value ) {
			if ( $value === $actor) {
				unset( $followers[$key] );
			}
		}

		update_user_meta( $author_id, 'activitypub_followers', $followers );
	}
}
