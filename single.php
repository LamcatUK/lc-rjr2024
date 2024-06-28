<?php
// Exit if accessed directly.
defined('ABSPATH') || exit;
$img = get_the_post_thumbnail(get_the_ID(), 'full', array('class' => 'single-blog__image'));

add_action('wp_head',function() {
    global $schema;
    echo $schema;
});

get_header();
// $img = get_the_post_thumbnail_url(get_the_ID(),'full');

?>
<main id="main" class="single-blog">
    <?php
    $content = get_the_content();
$blocks = parse_blocks($content);
$sidebar = array();
$after;
?>
    <section class="breadcrumbs container-xl">
        <?php
if (function_exists('yoast_breadcrumb')) {
    yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
}
?>
    </section>
    <div class="container-xl">
        <div class="row g-4 pb-4">
            <div class="col-lg-9 order-2">
                <h1 class="single-blog__title"><?=get_the_title()?>
                </h1>
                <?=$img?>
                <div class="single-blog__read">
                    <?=get_the_date()?> |
                    <?=estimate_reading_time_in_minutes(get_the_content(), 200, true, true)?>
                </div>
                <?php
foreach ($blocks as $block) {
    if ($block['blockName'] == 'core/heading') {
        if (!array_key_exists('level', $block['attrs'])) {
            $heading = strip_tags($block['innerHTML']);
            $id = acf_slugify($heading);
            echo '<a id="' . $id . '" class="anchor"></a>';
            $sidebar[$heading] = $id;
        }
    }
    // echo render_block($block);
    echo apply_filters('the_content', render_block($block));
}
?>
            </div>
            <div class="col-lg-3 order-1">
                <div class="sidebar">
                    <?php
    if ($sidebar) {
        ?>
                    <div class="quicklinks">
                        <div class="h5 has-line d-none d-lg-inline-block">Quick Links</div>
                        <button class="d-lg-none accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#links" aria-expanded="true" aria-controls="links">Quick Links</button>

                        <!-- <div class="h5 d-lg-none" data-bs-toggle="collapse" href="#links" role="button">Quick Links</div> -->
                        <div class="collapse d-lg-block" id="links">
                            <div class="pt-3 pt-lg-0">
                                <?php
                foreach ($sidebar as $heading => $id) {
                    ?>
                                <li><a
                                        href="#<?=$id?>"><?=$heading?></a>
                                </li>
                                <?php
                }
        ?>
                            </div>
                        </div>
                    </div>
                    <?php
    }
?>
                    <a href="/get-quote/" class="button button-green text-center d-none d-lg-block">Get a Quote Today!</a>
                </div>
            </div>
        </div>
        <?php
        $cats = get_the_category();
$ids = wp_list_pluck($cats, 'term_id');
$r = new WP_Query(array(
    'category__in' => $ids,
    'posts_per_page' => 4,
    'post__not_in' => array(get_the_ID())
));
if ($r->have_posts()) {
    ?>
        <section class="related pb-5">
            <h3><span>Related</span> Posts</h3>
            <div class="row g-4">
                <?php
while ($r->have_posts()) {
    $r->the_post();
    ?>
                <div class="col-md-6 col-xl-3">
                    <a class="blog_card"
                        href="<?=get_the_permalink()?>">
                        <img src="<?=get_the_post_thumbnail_url(get_the_ID(), 'large')?>"
                            alt="" class="blog_card__image">
                        <div class="blog_card__content">
                            <h3 class="blog_card__title">
                                <?=get_the_title()?>
                            </h3>
                        </div>
                    </a>
                </div>
                <?php
}
    ?>
            </div>
        </section>
        <?php
}
?>
    </div>
</main>
<?php
get_footer();
?>