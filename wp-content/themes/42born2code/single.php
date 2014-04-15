<?php get_header() ?>
<div id="content">
	<?php the_post() ?>
	<div class="entry-single">
		<div class="entry-top">
			<h2 class="entry-title"><?php the_title() ?></h2>
			<div class="entry-meta-top">
				<span class="entry-date"><?php unset($previousday); printf( __( '%1$s', 'wpbx' ), the_date( 'D, j M Y', '', '', false ) ) ?></span>
				<span class="entry-meta-sep">|</span>
				<span class="entry-comm">Publié dans <?php the_category(', '); ?></span>
			</div>
		</div>
		<div class="entry-content clearfix">
			<?php the_content() ?> 
<!--	<?php if ( get_post_meta($post->ID, 'desc_img', true) ) : ?>
 <?php echo get_post_meta($post->ID, 'desc_img', true) ?>
 <?php endif; ?> -->

 <?php
 if (get_the_post_thumbnail( $post->ID ))
 {
	echo get_the_post_thumbnail( $post->ID );
	wp_link_pages('before=<div id="page-links">&after=</div>');
	echo '<br/>';
	echo '<p><em>'; ?>
 <?php if ( get_post_meta($post->ID, 'desc_img', true) ) : ?>
 <?php echo get_post_meta($post->ID, 'desc_img', true) ?>
 <?php endif; 
	echo '</em></p>';
}
else if (get_post_meta($post->ID, 'id_dailymotion', true))
{
	$video_daily = get_post_meta($post->ID, 'id_dailymotion', true); 
	 //echo $video_daily;  affiche le lien du logo de votre ami Google 
	echo '<iframe frameborder="0" width="480" height="270" src="';
	echo 'http://www.dailymotion.com/embed/video/';
	echo $video_daily;
	echo '?logo=0&info=0"';
	//echo '<br/>';
	echo 'allowfullscreen></iframe>';
	echo '<br/>';
	echo '<p><em>'; ?>
 <?php if ( get_post_meta($post->ID, 'desc_img', true) ) : ?>
 <?php echo get_post_meta($post->ID, 'desc_img', true) ?>
 <?php endif; 
	echo '</em></p>';

}
else
{
?>
	<img src="<?php echo bloginfo("template_directory").'/images/logo.png'; ?>" alt="<?php echo bloginfo('name'); ?>" />
<?php
	echo '<br/>';
	echo '<p><em>'; ?>
 <?php if ( get_post_meta($post->ID, 'desc_img', true) ) : ?>
 <?php echo get_post_meta($post->ID, 'desc_img', true) ?>
 <?php endif; 
	echo '</em></p>';
	
	//echo bloginfo("template_directory").'/images/logo.png';
}
?>
		</div>
		<div class="entry-meta entry-bottom">
			<?php the_tags( __( '<span class="tag-links">Tags: ', 'wpbx' ), ", ", "</span>\n" ) ?>
		</div>
	</div><!-- .post -->
	<?php comments_template(); ?>
</div><!-- #content -->
<?php get_sidebar() ?>
<?php get_footer() ?>