<div id="sidebar">
	<ul class="xoxo">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(is_page(9)?2:1) ) : // begin first sidebar widgets ?>
		<?php if ( function_exists('wp_tag_cloud') ) : ?>
		<li id="tag-cloud"><!-- Par defaut on affiche les "mots-cles populaires" s'il n'y a pas de widgets associés à la sidebar -->
			<h3 class="widget-title"><?php _e('Popular Tags'); ?></h3>
			<div>
				<?php wp_tag_cloud('smallest=8&largest=18&number=15'); ?>
			</div>
		</li><!-- end Popular Tags section -->
		<?php endif; ?>
		<?php wp_list_bookmarks('title_before=<h3 class="widget-title">&title_after=</h3>&show_images=0') // Ici les widgets s'ajoutent ?>

		<?php endif; // end first sidebar widgets ?>
		
<?php

	if (isset($_GET['author']) != NULL)
	{
?>		
		<h3 class="widget-title">Some informations</h3>
		<!--  <a href="<?PHP echo esc_attr( get_the_author_meta('address', $user->ID ) );?>">Facebook page</a> </br> -->
		
		Dailymotion : <?PHP echo esc_attr( get_the_author_meta('video_daily', $_GET['author'] ) );?> </br>
		Humeur : <?PHP echo esc_attr( get_the_author_meta('humeur', $_GET['author'] ) );?> </br>
		Facebook : <?php echo esc_attr( get_the_author_meta('facebook', $_GET['author'] ) ); ?> </br>
		Twitter : <?php echo esc_attr( get_the_author_meta('twitter', $_GET['author'] ) ); ?> </br>
<?php } ?>
	</ul>
</div><!-- #sidebar -->