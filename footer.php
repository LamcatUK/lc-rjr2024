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
            <div id="footer_logo" class="mx-auto ms-sm-0">
                <img src="<?=get_stylesheet_directory_uri()?>/img/rjr-logo--colour.svg" width=205 height=40 alt="RJR Waste Clearance" class="mb-5">
                <?=display_waste_carriers_info(get_field('waste_licence_number','options'))?>
            </div>
            <div id="footer_services" class="text-center text-sm-start">
                <div class="footer__title">Services</div>
                <div class="footer__content">
                <?php wp_nav_menu(array('theme_location' => 'footer_menu_1')); ?>
                </div>
            </div>
            <div id="footer_locations" class="text-center text-sm-start">
                <div class="footer__title">Locations</div>
                <div class="menu-footer-locations-container">
                    <ul id="menu-footer-locations" class="menu">
                <?php
                $live = get_field('locations_are_live','options') ?? null;
                $locations = get_page_by_path('locations');
                $args = array(
                    'post_type' => 'page',
                    'post_parent' => $locations->ID,
                    'orderby' => 'title',
                    'order' => 'ASC',
                    'posts_per_page' => -1,
                    'post_status' => 'any'
                );
                
                $query = new WP_Query($args);
                
                if ($query->have_posts()) {
                    while ($query->have_posts()) {
                        $query->the_post();
                        if (get_post_status() == 'publish') {
                            ?>
                        <li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="<?=get_the_permalink()?>"><?=get_the_title()?></a></li>
                            <?php
                        }
                        else {
                            ?>
                        <li class="menu-item menu-item-type-post_type menu-item-object-page"><?=get_the_title()?></li>
                            <?php
                        }
                    }
                }
                ?>  
                    </ul>
                </div>
            </div>
            <div id="footer_links" class="text-center text-sm-start">
                <div class="footer__title">Quick Links</div>
                <?php wp_nav_menu(array('theme_location' => 'footer_menu_3')); ?>
            </div>
            <div id="footer_call" class="mx-auto ms-sm-0">
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
        <div class="container-xl">
            <div class="row g-2">
                <div class="col-lg-8 text-center text-lg-start">
                    &copy; <?=date('Y')?> RJR Waste Clearance Ltd. Registered in England, no <a href="http://business.data.gov.uk/id/company/15793151" target="_blank">15793151</a>. Registered Office: 48 Spring Plat, Crawley, West Sussex, RH10 7BG
                </div>
                <div class="col-lg-4 text-center text-lg-end">
                    <a href="/privacy-policy/">Privacy</a> &amp; <a href="/cookie-policy/">Cookie</a> Policies | Site by <a
                        href="https://www.lamcat.co.uk/" target="_blank">Lamcat</a>
                </div>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>