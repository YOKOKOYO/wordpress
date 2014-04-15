<?php
/*
Plugin Name: More Infos
Description: Et un plugin
Licence: GPL (mais tous les profits vont dans ma poche !!)
Author: hmoutaou
Version: 0.1
*/

function my_new_contactmethods( $contactmethods )
{
	$contactmethods['twitter'] = 'Twitter';
	$contactmethods['facebook'] = 'Facebook';
	return $contactmethods;
}
add_filter('user_contactmethods','my_new_contactmethods',10,1);

add_action( 'show_user_profile', 'extra_user_profile_fields' );
add_action( 'edit_user_profile', 'extra_user_profile_fields' );
 
function extra_user_profile_fields( $user ) { ?>
<h3><?php _e('i_gRek', 'your_textdomain'); ?></h3>
<table class="form-table">
<tbody>
<tr>
<th><label for="address"><?php _e('Id d\'une video Dailymotion', 'your_textdomain'); ?></label></th>
<td><input class="regular-text" id="video_daily" type="text" name="video_daily" value="<?php echo esc_attr( get_the_author_meta( 'video_daily', $user->ID ) ); ?>" /><br/>
 <span class="description"> 
 <?php _e('Video Dailymotion', 'your_textdomain'); ?></span></td>
</tr>
<tr>
<th><label for="address"><?php _e('Humeur', 'your_textdomain'); ?></label></th>
<td>
	<SELECT NAME="humeur">
	<?php 
		echo '<OPTION VALUE="';
		echo esc_attr( get_the_author_meta( 'humeur', $user->ID ) );
		echo '" SELECTED>';
		echo esc_attr( get_the_author_meta( 'humeur', $user->ID ) );
	if (esc_attr( get_the_author_meta( 'humeur', $user->ID ) ) != "Joyeux")
	{
		echo '<OPTION VALUE="Joyeux">Joyeux';
	}
	if (esc_attr( get_the_author_meta( 'humeur', $user->ID ) ) != "Enerve")
	{
		echo '<OPTION VALUE="Enerve">Enerve';
	}
	if (esc_attr( get_the_author_meta( 'humeur', $user->ID ) ) != "Fatigue")
	{
		echo '<OPTION VALUE="Fatigue">Fatigue';
	}
	if (esc_attr( get_the_author_meta( 'humeur', $user->ID ) ) != "Serpillere")
	{
		echo '<OPTION VALUE="Serpillere">Serpillere';
	}

	?>
	</SELECT><br/>
	<span class="description"> 
 <?php _e('T\'es de quel humeur ?', 'your_textdomain'); ?></span>
</td>
</tr>
</tbody>
</table>
<?php }
 
add_action( 'personal_options_update', 'save_extra_user_profile_fields' );
add_action( 'edit_user_profile_update', 'save_extra_user_profile_fields' );
 
function save_extra_user_profile_fields( $user_id ) {
 
if ( !current_user_can( 'edit_user', $user_id ) ) { return false; }
 
update_usermeta( $user_id, 'video_daily', $_POST['video_daily'] );
update_usermeta( $user_id, 'humeur', $_POST['humeur'] );
}









?>

