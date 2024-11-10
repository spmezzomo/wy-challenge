<?php

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our theme. We will simply require it into the script here so that we
| don't have to worry about manually loading any of our classes later on.
|
*/

if (! file_exists($composer = __DIR__.'/vendor/autoload.php')) {
    wp_die(__('Error locating autoloader. Please run <code>composer install</code>.', 'sage'));
}

require $composer;

/*
|--------------------------------------------------------------------------
| Register The Bootloader
|--------------------------------------------------------------------------
|
| The first thing we will do is schedule a new Acorn application container
| to boot when WordPress is finished loading the theme. The application
| serves as the "glue" for all the components of Laravel and is
| the IoC container for the system binding all of the various parts.
|
*/

if (! function_exists('\Roots\bootloader')) {
    wp_die(
        __('You need to install Acorn to use this theme.', 'sage'),
        '',
        [
            'link_url' => 'https://roots.io/acorn/docs/installation/',
            'link_text' => __('Acorn Docs: Installation', 'sage'),
        ]
    );
}

\Roots\bootloader()->boot();

/*
|--------------------------------------------------------------------------
| Register Sage Theme Files
|--------------------------------------------------------------------------
|
| Out of the box, Sage ships with categorically named theme files
| containing common functionality and setup to be bootstrapped with your
| theme. Simply add (or remove) files from the array below to change what
| is registered alongside Sage.
|
*/

collect(['setup', 'filters'])
    ->each(function ($file) {
        if (! locate_template($file = "app/{$file}.php", true, true)) {
            wp_die(
                /* translators: %s is replaced with the relative file path */
                sprintf(__('Error locating <code>%s</code> for inclusion.', 'sage'), $file)
            );
        }
    });

/**
 * Debug
 */
if (!function_exists('pr')) {
    function pr($v, $return = false)
    {
        $dump = sprintf('<pre class="dump" style="text-align:left;">%s</pre>', print_r($v, true));
        if ($return)
            return $dump;
        echo $dump;
    }
}

function is_dev(){
    return isset($_SERVER['HTTP_HOST']) && preg_match('@(git|local|test)@', $_SERVER['HTTP_HOST']);
}

function is_staging(){
    return isset($_SERVER['HTTP_HOST']) && preg_match('@staging@', $_SERVER['HTTP_HOST']);
}

if( function_exists('acf_add_options_page') ) {   
    acf_add_options_page();  
}

function register_new_menu() {
    register_nav_menu('footer_menu', __('Footer Menu'));
    register_nav_menu('language_switcher', __('Language Switcher'));
}
add_action('init', 'register_new_menu');

/**
* Shortcode
*/
$shortcodes = [
    'accordion',
];

foreach($shortcodes as $shortcode){
    add_shortcode( $shortcode, function( $atts ) use ($shortcode){
        return App\template('shortcodes.' . $shortcode, ['atts' => $atts]);
    });
}

add_shortcode( 'accordion', function( $atts ){
    //return  App\template('shortcodes.accordion');
    return view('shortcodes.accordion')->render();
});

/***** HEADER TAGS ******/

if (!is_dev() && !is_staging())
    add_action( 'wp_head', 'gtm' );

function gtm() { ?>
   <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-W3MMXG3L');</script>
    <!-- End Google Tag Manager -->
<?php }
