<div class="wrap">
	<h1><?php esc_html_e( 'ActivityPub Settings', 'activitypub' ); ?></h1>

	<p><?php esc_html_e( 'ActivityPub turns your blog into a federated social network. This means you can share and talk to everyone using the ActivityPub protocol, including users of Friendi.ca, Pleroma and Mastodon.', 'activitypub' ); ?></p>

	<form method="post" action="options.php">
		<?php settings_fields( 'activitypub' ); ?>

		<h2><?php esc_html_e( 'Activities', 'activitypub' ); ?></h2>

		<p><?php esc_html_e( 'All activity related settings.', 'activitypub' ); ?></p>

		<table class="form-table">
			<tbody>
				<tr>
					<th scope="row">
						<?php esc_html_e( 'Post-Content', 'activitypub' ); ?>
					</th>
					<td>
						<p>
							<label><input type="radio" name="activitypub_post_content_type" id="activitypub_post_content_type_excerpt" value="excerpt" <?php echo checked( 'excerpt', get_option( 'activitypub_post_content_type', 'content' ) ); ?> /> <?php esc_html_e( 'Excerpt', 'activitypub' ); ?></label> - <span class="description"><?php esc_html_e( 'A content summary, shortened to 400 characters and without markup.', 'activitypub' ); ?></span>
						</p>
						<p>
							<label><input type="radio" name="activitypub_post_content_type" id="activitypub_post_content_type_content" value="content" <?php echo checked( 'content', get_option( 'activitypub_post_content_type', 'content' ) ); ?> /> <?php esc_html_e( 'Content (default)', 'activitypub' ); ?></label> - <span class="description"><?php esc_html_e( 'The full content.', 'activitypub' ); ?></span>
						</p>
					</td>
				</tr>
				<tr>
					<th scope="row">
						<?php esc_html_e( 'Backlink', 'activitypub' ); ?>
					</th>
					<td>
						<p>
							<label><input type="checkbox" name="activitypub_use_shortlink" id="activitypub_use_shortlink" value="1" <?php echo checked( '1', get_option( 'activitypub_use_shortlink', '0' ) ); ?> /> <?php esc_html_e( 'Use the Shortlink instead of the permalink', 'activitypub' ); ?></label>
							<p class="description"><?php printf( esc_html( 'I can recommend %sHum%s, to prettify the Shortlinks', 'activitypub' ), '<a href="https://wordpress.org/plugins/hum/" target="_blank">', '</a>' ); ?></p>
						</p>
					</td>
				</tr>
				<tr>
					<th scope="row">
						<?php esc_html_e( 'Activtity-Object-Type', 'activitypub' ); ?>
					</th>
					<td>
						<p>
							<label><input type="radio" name="activitypub_object_type" id="activitypub_object_type_note" value="note" <?php echo checked( 'note', get_option( 'activitypub_object_type', 'note' ) ); ?> /> <?php esc_html_e( 'Note (default)', 'activitypub' ); ?></label> - <span class="description"><?php esc_html_e( 'Should work with most plattforms.', 'activitypub' ); ?></span>
						</p>
						<p>
							<label><input type="radio" name="activitypub_object_type" id="activitypub_object_type_article" value="article" <?php echo checked( 'article', get_option( 'activitypub_object_type', 'note' ) ); ?> /> <?php esc_html_e( 'Article', 'activitypub' ); ?></label> - <span class="description"><?php esc_html_e( 'The presentation of the "Article" might change on different plattforms. Mastodon for example shows the "Article" type as a simple link.', 'activitypub' ); ?></span>
						</p>
						<p>
							<label><input type="radio" name="activitypub_object_type" id="activitypub_object_type" value="wordpress-post-format" <?php echo checked( 'wordpress-post-format', get_option( 'activitypub_object_type', 'note' ) ); ?> /> <?php esc_html_e( 'WordPress Post-Format', 'activitypub' ); ?></label> - <span class="description"><?php esc_html_e( 'Maps the WordPress Post-Format to the ActivityPub Object Type.', 'activitypub' ); ?></span>
						</p>
					</td>
				</tr>
			</tbody>
		</table>

		<?php do_settings_fields( 'activitypub', 'activity' ); ?>

		<h2><?php esc_html_e( 'Profile', 'activitypub' ); ?></h2>

		<p><?php esc_html_e( 'All profile related settings.', 'activitypub' ); ?></p>

		<?php activitypub_get_identifier_settings( get_current_user_id() ); ?>

		<?php do_settings_fields( 'activitypub', 'profile' ); ?>

		<h2><?php esc_html_e( 'Followers', 'activitypub' ); ?></h2>

		<p><?php esc_html_e( 'All follower related settings.', 'activitypub' ); ?></p>

		<table class="form-table">
			<tbody>
				<tr>
					<th scope="row">
						<label><?php esc_html_e( 'List of followers', 'activitypub' ); ?></label>
					</th>
					<td>
						<?php if ( Db_Activitypub_Followers::get_followers( get_current_user_id() ) ) { ?>
						<ul>
							<?php foreach( Db_Activitypub_Followers::get_followers( get_current_user_id() ) as $follower ) { ?>
							<li><?php echo esc_attr( $follower ); ?></li>
							<?php } ?>
						</ul>
						<?php } else { ?>
						<p><?php esc_html_e( 'No followers yet', 'activitypub' ); ?></p>
						<?php } ?>
					</td>
				</tr>
			</tbody>
		</table>

		<?php do_settings_fields( 'activitypub', 'followers' ); ?>

		<?php do_settings_sections( 'activitypub' ); ?>

		<?php submit_button(); ?>
	</form>

	<p>
		<small><?php _e( 'If you like this plugin, what about a small <a href="https://notiz.blog/donate">donation</a>?', 'activitypub' ); ?></small>
	</p>
</div>
