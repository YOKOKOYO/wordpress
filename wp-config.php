<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clefs secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur 
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C'est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d'installation. Vous n'avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'db_hmoutaou');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'root');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', '05021994');

/** Adresse de l'hébergement MySQL. */
define('DB_HOST', 'localhost:3306');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8');

/** Type de collation de la base de données. 
  * N'y touchez que si vous savez ce que vous faites. 
  */
define('DB_COLLATE', '');

/**#@+
 * Clefs uniques d'authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant 
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n'importe quel moment, afin d'invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'oz;axf+q)6#5r`xrevkG@Y#M#<m43yc^@vL/N|;x^t$.YShIg2f<b|~6,&htI5Nh');
define('SECURE_AUTH_KEY',  'waOSi#/%5(!DIKM4h+<OqUiW<,*-1h)TzLM|*MuEew-J-]=|1_7|*rriS;4pprS1');
define('LOGGED_IN_KEY',    'N*~X+d.<6:2{lOLq2,@GcO;`*%/pi-AT75+vk9}k8J#w_w+G4r>+e@SE5Ciz.-Jt');
define('NONCE_KEY',        '.fdw<}FG$b~df_{k&KRl$y)V[<hcWJV|Vwnx$.E+A$x(f5Nz1C.Kr8UhFh)ejRkp');
define('AUTH_SALT',        '|wWy;(=nStG+G90blxtTa;jn274U>[>rfThfTQ]q}VscJ=0WlbGG/RawR{N45BEl');
define('SECURE_AUTH_SALT', 'Se?PC<j)BRL<{N@riJzTOo7PRm)3dOE(gu.*X;&Ya&-AqN,0X#grcPr#70UZQp?Z');
define('LOGGED_IN_SALT',   'HXI,*3O8`hv:cp1BR(.)n+(!9:D-z908K9p.S.0h;y;?y*gx};d1iS77usY+K.i8');
define('NONCE_SALT',       'BjgseVCt%g4..cq?;c^+=Ze4$Qu6hi|UTp&z_BGUokx.%Z#G=eM|qO`_VWhN96Gs');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique. 
 * N'utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés!
 */
$table_prefix  = 'wp_';

/**
 * Langue de localisation de WordPress, par défaut en Anglais.
 *
 * Modifiez cette valeur pour localiser WordPress. Un fichier MO correspondant
 * au langage choisi doit être installé dans le dossier wp-content/languages.
 * Par exemple, pour mettre en place une traduction française, mettez le fichier
 * fr_FR.mo dans wp-content/languages, et réglez l'option ci-dessous à "fr_FR".
 */
define('WPLANG', 'fr_FR');

/** 
 * Pour les développeurs : le mode deboguage de WordPress.
 * 
 * En passant la valeur suivante à "true", vous activez l'affichage des
 * notifications d'erreurs pendant votre essais.
 * Il est fortemment recommandé que les développeurs d'extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de 
 * développement.
 */ 
define('WP_DEBUG', false); 

/* C'est tout, ne touchez pas à ce qui suit ! Bon blogging ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');