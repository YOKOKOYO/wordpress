

<?php get_header() ?>

<div id="content_index">
<!-- #ici code -->
<?php $loop = new WP_Query( array( 'post_type' => 'produit', 'posts_per_page' => 10 ) );
while ( $loop->have_posts() ) : $loop->the_post();
echo '<div class="ft_div_shop" >';
echo '<h2 class="ft_title_shop" >';
  the_title();
  echo '<div class="ft_img_shop">'.get_the_post_thumbnail( $post->ID ).'</div>';
  echo '</h2>';
  echo '<div>';
  the_content();
  echo '</div>';
  ?>
 
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="8CEX5Y8K5KPTY">
<table class="ft_box_paypal_shop">
<tr><td><input type="hidden" name="on0" value="Tailles">Tailles</td></tr><tr><td><select name="os0">
	<option value="S">S €50,00 EUR</option>
	<option value="M">M €55,00 EUR</option>
	<option value="L">L €60,00 EUR</option>
</select> </td></tr>
</table>
<input type="hidden" name="currency_code" value="EUR">
<input type="image" src="https://www.paypalobjects.com/fr_FR/FR/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - la solution de paiement en ligne la plus simple et la plus sécurisée !">
<img alt="" border="0" src="https://www.paypalobjects.com/fr_FR/i/scr/pixel.gif" width="1" height="1">
</form>

<?php
echo '</div>';
endwhile;?>
</div>
<?php get_footer() ?>