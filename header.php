<?php
/**
 * The header for the theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package lc-rjr2024
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta
        charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="preload"
        href="<?=get_stylesheet_directory_uri()?>/fonts/open-sans-v40-latin-regular.woff2"
        as="font" type="font/woff2" crossorigin="anonymous">
    <link rel="preload"
        href="<?=get_stylesheet_directory_uri()?>/fonts/open-sans-v40-latin-700.woff2"
        as="font" type="font/woff2" crossorigin="anonymous">
    <link rel="preload"
        href="<?=get_stylesheet_directory_uri()?>/fonts/open-sans-v40-latin-800.woff2"
        as="font" type="font/woff2" crossorigin="anonymous">
    <?php
    if (get_field('ga_property', 'options')) {
        ?>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async
        src="https://www.googletagmanager.com/gtag/js?id=<?=get_field('ga_property', 'options')?>">
    </script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config',
            '<?=get_field('ga_property', 'options')?>'
        );
    </script>
    <?php
    }
if (get_field('google_site_verification', 'options')) {
    echo '<meta name="google-site-verification" content="' . get_field('google_site_verification', 'options') . '" />';
}
if (get_field('bing_site_verification', 'options')) {
    echo '<meta name="msvalidate.01" content="' . get_field('bing_site_verification', 'options') . '" />';
}
if (is_front_page() || is_page('contact-us')) {
    ?>
    <script type="application/ld+json">
    {
  "@context": "https://schema.org",
  "@type": "LocalBusiness",
  "name": "RJR Waste Clearance",
  "image": "<?=get_stylesheet_directory_uri()?>/img/rjr-logo-full.png",
  "@id": "https://www.rjrwasteclearance.com",
  "url": "https://www.rjrwasteclearance.com",
  "telephone": "<?=parse_phone(get_field('contact_phone', 'options'))?>",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "48 Spring Plat",
    "addressLocality": "Crawley",
    "addressRegion": "West Sussex",
    "postalCode": "RH10 7BG",
    "addressCountry": "GB"
  },
  "geo": {
    "@type": "GeoCoordinates",
    "latitude": 50.924132,
    "longitude": -0.435876
  },
  "openingHoursSpecification": [
    {
      "@type": "OpeningHoursSpecification",
      "dayOfWeek": [
        "Monday",
        "Tuesday",
        "Wednesday",
        "Thursday",
        "Friday",
        "Saturday",
        "Sunday"
      ],
      "opens": "09:00",
      "closes": "17:00"
    }
  ],
  "description": "---",
  "contactPoint": {
    "@type": "ContactPoint",
    "telephone": "<?=parse_phone(get_field('contact_phone', 'options'))?>",
    "contactType": "Customer Service"
  },
}
    </script>
    <?php
}
?>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php
do_action('wp_body_open');

if (get_field('gtm_property', 'options')) {
    ?>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe
            src="https://www.googletagmanager.com/ns.html?id=<?=get_field('ga_property', 'options')?>"
            height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <?php
}
?>
    <header id="navigation">
        <nav id="main-nav" class="navbar navbar-expand-lg d-block px-0" aria-labelledby="main-nav-label">
            <div class="container-xl">
                    <a href="/" class="navbar-brand my-auto" rel="home" aria-label="Home Page"></a>
                    <a class="navCall my-auto d-none d-sm-flex" href="tel:<?=parse_phone(get_field('contact_phone','options'))?>">
                        <i class="fa-solid fa-phone text-green-400"></i>
                        <div>
                            <div class="text-green-400">Call us today</div>
                            <div class="text-white"><?=get_field('contact_phone','options')?></div>
                        </div>
                    </a>
                    <button class="navbar-toggler input-button text-green-400" id="navToggle" data-bs-toggle="collapse"
                      data-bs-target=".navbars" type="button" aria-label="Navigation"><i
                          class="fa fa-navicon"></i></button>

                <?php

                      wp_nav_menu(
                          array(
'theme_location'  => 'primary_nav',
'container_class' => 'collapse navbar-collapse navbars',
'container_id'    => 'primaryNav',
'menu_class'      => 'navbar-nav w-100 justify-content-around align-items-center gap-lg-5 ms-auto',
'fallback_cb'     => '',
'menu_id'         => 'main-menu',
'depth'           => 2,
'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
)
                      );
?>
            </div>
        </nav>
    </header>