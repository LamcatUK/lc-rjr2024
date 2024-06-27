<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package cb-peoplesafe
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

?>
<footer>
    <div class="container-xl">
        <div class="footer__grid py-5">
            <div>
                <img src="<?=get_stylesheet_directory_uri()?>/img/rjr-logo--colour.svg" width=140 height=40 alt="RJR Waste Clearance">
            </div>
            <div>
                <div class="footer__title">Services</div>
                <div class="footer__content">
                <?php wp_nav_menu(array('theme_location' => 'footer_menu_1')); ?>
                </div>
            </div>
            <div>
                <div class="footer__title">Locations</div>
                <?php wp_nav_menu(array('theme_location' => 'footer_menu_2')); ?>
            </div>
            <div>
                <div class="footer__title">Quick Links</div>
                <?php wp_nav_menu(array('theme_location' => 'footer_menu_3')); ?>
            </div>
            <div>
                <a class="footer__call mb-4" href="tel:<?=parse_phone(get_field('contact_phone','options'))?>">
                    <i class="fa-solid fa-phone text-green-400"></i>
                    <div>
                        <div class="text-green-400">Call us today</div>
                        <div class="text-white"><?=get_field('contact_phone','options')?></div>
                    </div>
                </a>
                <div>
                    <a href="/get-quote/" class="button button-green">Get a Quote</a>
                </div>
            </div>
        </div>
    </div>
    <div class="colophon">
        <div class="container-xl d-flex justify-content-between flex-wrap">
            <div>&copy; <?=date('Y')?> RJR Waste Clearance Ltd. Registered in England, no 15793151. Registered Office: 48 Spring Plat, Crawley, West Sussex, RH10 7BG</div>
            <div>
                <a href="/privacy-policy/">Privacy</a> &amp; <a href="/cookie-policy/">Cookie</a> Policies | Site by <a
                    href="https://www.lamcat.co.uk/" target="_blank">Lamcat</a>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>