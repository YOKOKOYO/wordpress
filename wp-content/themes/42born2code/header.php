<?php

		if (isset($_POST['login']) !== NULL && isset($_POST['email']) !== NULL)
		{
			if ($_POST['login'] != "" && $_POST['email'] != "" && preg_match('/^[[:alnum:][:punct:]]{1,64}@[[:alnum:]-.$nonASCII]{2,253}\.[[:alpha:].]{2,6}$/', $_POST['email']) == 1)
			{
				$user_name = $_POST['login'];
				$user_email = $_POST['email'];
				$user_id = username_exists( $user_name );
				if ( !$user_id && email_exists($user_email) == false )
				{
					$random_password = wp_generate_password( $length = 12, $include_standard_special_chars = false );
					$user_id = wp_create_user( $user_name, $random_password, $user_email );

					$creds = array();
					$creds['user_login'] = $user_name;
					$creds['user_password'] = $random_password;
					$creds['remember'] = true;

					$user = wp_signon( $creds, false );
					
					?>
					<script type="text/javascript">
						alert("Votre mot de passe est : '<?php echo $random_password ?>'. Retenez le !!");
						console.log("Votre mot de passe est : '<?php echo $random_password ?>'. Retenez le !!")
						location.reload() ; 
					 </script>
					<?php
				}
				else
				{
					?>
					  <script type="text/javascript">
					    alert("Ce login / adresse mail est deja utilise");
					    console.log("Ce login / adresse mail est deja utilise")
						location.reload() ; 
					  </script>
					<?php
				}
			}

			// Seems to work fine now... Don't really know what happens, to check.

			else if ($_POST['login'] == "" && $_POST['email'] != "")
			{
			?>
			  <script type="text/javascript">
			    alert("Veuillez renseigner un login.");
			    console.log("Veuillez renseigner un login.")
			    location.reload() ; 
			  </script>
			<?php
			}
			else if ($_POST['email'] == "" && $_POST['login'] != "")
			{
			?>
			  <script type="text/javascript">
			    alert("Veuillez renseigner une adresse mail.");
				console.log("Veuillez renseigner une adresse mail.")
				location.reload() ; 
			  </script>
			<?php
			}
			else if ($_POST['email'] != "" && preg_match('/^[[:alnum:][:punct:]]{1,64}@[[:alnum:]-.$nonASCII]{2,253}\.[[:alpha:].]{2,6}$/', $_POST['email']) != 1)
			{
				?>
			  <script type="text/javascript">
			    alert("Veuillez renseigner une adresse mail VALIDE.");
			    console.log("Veuillez renseigner une adresse mail VALIDE.")
			   location.reload() ; 
			  </script>
			<?php
			}
		}
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes() ?>>
<head profile="http://gmpg.org/xfn/11">
<style>
	:invalid {
   box-shadow: 0 0 2px 1px red;
}
</style>

<meta http-equiv="content-type" content="<?php bloginfo('html_type') ?>; charset=<?php bloginfo('charset') ?>" />
<meta name="description" content="" />
<meta name="keywords" content="" />
<title><?php wp_title( '-', true, 'right' ); echo wp_specialchars( get_bloginfo('name'), 1 ) ?></title>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/style.css" type="text/css" media="screen" />

	<!--[if lte IE 6]><script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/supersleight-min.js"></script><![endif]-->
<?php wp_enqueue_script(get_bloginfo('template_directory').'/js/jquery.js'); ?>
<?php wp_enqueue_script('superfish', get_bloginfo('template_directory').'/js/superfish.js', array('jquery'), '1.7'); ?>
<?php wp_enqueue_script(get_bloginfo('template_directory').'/js/nav.js'); ?>
<?php if (trim(get_option('ft_header_code')) <> "") { echo stripslashes(get_option('ft_header_code')); } ?>
<?php if (is_singular()) wp_enqueue_script('comment-reply'); ?>

<?php wp_head(); ?> <!-- #NE PAS SUPPRIMER cf. codex wp_head() -->
</head>
<body <?php body_class() ?>>
	
	

<?php
/*add_filter('show_admin_bar', '__return_false');
$frontPageUrl = get_site_url()."/";
$pageUrl = get_site_url().$_SERVER['REQUEST_URI'];
if ($pageUrl != $frontPageUrl)
{*/

//}
//else
//{
	?>
	<?php
	add_filter('show_admin_bar', '__return_false');
	if (!is_user_logged_in())
	{ ?>
			<div id="top">
				<div id="ft_top">
				<FORM Method="POST" Action="#">
					<a href="<?php echo $frontPageUrl ?>wp-login.php">
			    	Connection
			    	</a>
			    	| 
		    	Login: <input class="button-valide-or-not" type="text" placeholder="Votre login" name="login" required/>
		    	
				Email: <input class="button-valide-or-not" type="email" placeholder="Votre email" name="email" pattern="^[\w\d-]{1,64}@[\w\d-]{2,253}\.[\w\d.]{2,6}$" required/>
				<INPUT type=submit value=Envoyer>
				<INPUT type=hidden name=afficher value=ok>
			</FORM>
			</div>
			</div>
		<?php
	}
	else
	{ ?>
		<div id="top">
			<div id="ft_top">
				<?php
					global $current_user;
					get_currentuserinfo();

					echo "Salut <u><b>";
					echo $current_user->user_login;
					echo "</b></u>, belle journee n'est ce pas ? ";
				?>
		 		<a href="<?php echo (get_site_url()."/wp-admin/"); ?>">
		 			Espace Admin
		 		</a>
				|
				<a href="<?php echo (wp_logout_url()); ?>">
					Deconnexion
				</a>
			</div>
		</div>
		<?php
	}
	?>




	<!-- <div id="top">
		<div class="pads clearfix"><?php wp_nav_menu( array( 'theme_location' => 'secondary-menu', 'sort_column' => 'menu_order', 'container_class' => 'nav' ) ); ?>
		</div> -->
	</div>
	<div id="wp-ft_header">
		<div class="pads clearfix">
			<a href="<?php echo get_option('home'); ?>">
				<img id="site-logo" src="<?php bloginfo('template_directory'); ?>/images/logo.png" alt="<?php bloginfo('name'); ?>" />
			</a>
			<div id="blocsearch"> <?php include('searchform.php'); ?></div>
	
				
					<div class="ft_test" id="nav">
					<?php wp_nav_menu(array('theme_location'=>'primary-menu', 'sort_column'=>'menu_order', 'container_class'=>'nav' ));?>
	
			
			</div>
		</div>
	</div>

<!--

	<div>
	

		<div id="wp-ft_header">
<img src="<?php bloginfo('template_directory'); ?>/images/logo.png" alt="<?php bloginfo('name'); ?>" />
			<div id="blocsearch"> <?php include('searchform.php'); ?></div>
			<br/>
	<br/>

	<?php wp_nav_menu( array( 'theme_location' => 'primary-menu', 'sort_column' => 'menu_order', 'container_class' => 'nav' ) ); ?>

		</div>
	</div>
	
-->



<?php //} ?>
<!--  #header -->

<div id="container">
	<div class="pads clearfix"> 