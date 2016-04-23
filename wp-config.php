<?php
/** 
 * A WordPress fő konfigurációs állománya
 *
 * Ebben a fájlban a következő beállításokat lehet megtenni: MySQL beállítások
 * tábla előtagok, titkos kulcsok, a WordPress nyelve, és ABSPATH.
 * További információ a fájl lehetséges opcióiról angolul itt található:
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php} 
 *  A MySQL beállításokat a szolgáltatónktól kell kérni.
 *
 * Ebből a fájlból készül el a telepítési folyamat közben a wp-config.php
 * állomány. Nem kötelező a webes telepítés használata, elegendő átnevezni 
 * "wp-config.php" névre, és kitölteni az értékeket.
 *
 * @package WordPress
 */

// ** MySQL beállítások - Ezeket a szolgálatótól lehet beszerezni ** //
/** Adatbázis neve */
define('DB_NAME', 'speed');

/** MySQL felhasználónév */
define('DB_USER', 'root');

/** MySQL jelszó. */
define('DB_PASSWORD', 'root');

/** MySQL  kiszolgáló neve */
define('DB_HOST', 'localhost');

/** Az adatbázis karakter kódolása */
define('DB_CHARSET', 'utf8mb4');

/** Az adatbázis egybevetése */
define('DB_COLLATE', '');

/**#@+
 * Bejelentkezést tikosító kulcsok
 *
 * Változtassuk meg a lenti konstansok értékét egy-egy tetszóleges mondatra.
 * Generálhatunk is ilyen kulcsokat a {@link http://api.wordpress.org/secret-key/1.1/ WordPress.org titkos kulcs szolgáltatásával}
 * Ezeknek a kulcsoknak a módosításával bármikor kiléptethető az összes bejelentkezett felhasználó az oldalról. 
 *
 * @since 2.6.0
 */
define('AUTH_KEY', '=mm%h1L,.5#cS||-}-paK<}z>o-7QEN1,IT}R@u$VZT*-/fQ8^[aW~@G`HwkULeQ');
define('SECURE_AUTH_KEY', 't1]S%pl{Uc6+3NRp,hbX}R,UOKb!`W+PBb^@bQK|@r|$Zq((92/ ITCsk(M ehSL');
define('LOGGED_IN_KEY', '+-|-S-KZkCc9zcAHrz$ilGQs&sc^rUyVw/_U>tnl-9}:nSR7bc;d*6zaA0USU%UH');
define('NONCE_KEY', 'BCR(x+2Q:ucrNCY1g*Zm@rS-8t(tv?++#A@n[#>[a55+l5:tgq2+,^5OX>82,]!)');
define('AUTH_SALT',        'Ab,/CWRLa-||6LX6-{-/$ePeY7>_zvrBmlILI;90[=l2n.7BXqIPu>#U?91ii_cr');
define('SECURE_AUTH_SALT', '%#pSqp]]!+/r+HTC]qcpCC 2!n-#5.)jZni`0*c5(.?Nz;xVd[TM/u%Hu|H l)!o');
define('LOGGED_IN_SALT',   '4>GEy{HyN-;@JbRhi:P}]OVCwzImz]ptJNFC:XW@}([.lB1>ew!^/uI_%nFP_lVK');
define('NONCE_SALT',       'hhj{odGoq[?)nRrXuX -so/T -B&`Xb=Su;3NvLFhX&iauPSfj5V- qklSp-U2dA');

/**#@-*/

/**
 * WordPress-adatbázis tábla előtag.
 *
 * Több blogot is telepíthetünk egy adatbázisba, ha valamennyinek egyedi
 * előtagot adunk. Csak számokat, betűket és alulvonásokat adhatunk meg.
 */
$table_prefix  = 'wp_';

/**
 * Fejlesztőknek: WordPress hibakereső mód.
 *
 * Engedélyezzük ezt a megjegyzések megjelenítéséhez a fejlesztés során. 
 * Erősen ajánlott, hogy a bővítmény- és sablonfejlesztők használják a WP_DEBUG
 * konstansot.
 */
define('WP_DEBUG', false);

/* Ennyi volt, kellemes blogolást! */

/** A WordPress könyvtár abszolút elérési útja. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Betöltjük a WordPress változókat és szükséges fájlokat. */
require_once(ABSPATH . 'wp-settings.php');
