<?php
/*
Template Name: Archives Page
*/
?>
<?php get_header() ?>
<?php the_post() ?>
 
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
	echo "<div class=\"ft_daily_div\" >";
	$video_daily = get_post_meta($post->ID, 'id_dailymotion', true); 
	
	echo '<div = id=\"ft_video_daily\" ><iframe frameborder="0" width="480" height="270" src="';
	echo 'http://www.dailymotion.com/embed/video/';
	echo $video_daily;
	echo '?logo=0&info=0"';
	//echo '<br/>';
	echo 'allowfullscreen></iframe></div>';
	//echo '<br/>';
	echo '<p id="ft_comm_daily" ><em>'; ?>
 <?php if ( get_post_meta($post->ID, 'desc_img', true) ) : ?>
 <?php echo get_post_meta($post->ID, 'desc_img', true) ?>
 <?php endif; 
	echo '</em></p>';
	echo "</div>";

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

<div id="content">
	<div class="entry">
		<h2 class="page-title"><?php the_title() ?></h2>
		<div class="entry-content">
			<div class="archives-page-left">
				<strong><?php _e("By Page", 'star'); ?>:</strong>
					<ul>
					<?php wp_list_pages('title_li='); ?>
					</ul>
				<strong><?php _e("By Category", 'star'); ?>:</strong>
					<ul>
					<?php wp_list_categories('sort_column=name&title_li='); ?>
					</ul>
				<strong><?php _e("By Month", 'star'); ?>:</strong>
					<ul>
					<?php wp_get_archives('type=monthly'); ?>
					</ul>
			</div>
			<div class="archives-page-right">
				<strong><?php _e("Last 50 Posts", 'star'); ?>:</strong>
					<ul>
					<?php wp_get_archives('type=postbypost&limit=50'); ?>
					</ul>
			</div>
			<div class="clear"></div>
		</div>
	</div><!-- entry -->
</div><!-- #content -->
<?php get_sidebar() ?>
<?php get_footer() ?>