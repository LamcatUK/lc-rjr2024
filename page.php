<?php
// Exit if accessed directly.
defined('ABSPATH') || exit;

if (strpos($_SERVER['REQUEST_URI'], '/services/') !== false) {
    add_action('wp_head', function() {
        generate_pricing_table_schema();
        generate_breadcrumb_schema();
    });
}


get_header();

?>
<main id="main">
    <?php
    the_post();
the_content();
?>
</main>
<?php
get_footer();
