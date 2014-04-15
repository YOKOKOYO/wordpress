<?php get_header() ?>

<div id="content_index">
<!-- #ici code -->
<?php $loop = new WP_Query( array( 'post_type' => 'produit', 'posts_per_page' => 10 ) );
/*while ( $loop->have_posts() ) : $loop->the_post();
  the_title();
  echo '<div>';
  the_content();
  echo '</div>';
endwhile; */?>
</div>
<?php get_footer() ?>