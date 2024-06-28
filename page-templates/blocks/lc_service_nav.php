<section class="service_nav py-5 bg-grey-100">
    <div class="container-xl">
        <h2 class="text-center"><?=get_field('title')?></h2>
        <div class="text-center w-constrain mb-4"><?=get_field('content')?></div>
        <div class="service_nav__grid">
            <?php
            $services = get_page_by_path('services');
            $args = array(
                'post_type' => 'page',
                'post_parent' => $services->ID,
                'orderby' => 'title',
                'order' => 'ASC',
                'posts_per_page' => -1
            );
            
            $query = new WP_Query($args);

            if ($query->have_posts()) {
                while ($query->have_posts()) {
                    $query->the_post();
                    ?>
    <a class="service_nav__card" href="<?=get_the_permalink(get_the_ID())?>">
        <img src="<?=get_field('service_icon',get_the_ID())?>" alt="<?=get_the_title()?>" class="service_nav__icon">
        <h3 class="service_nav__title"><?=get_the_title()?></h3>
        <div class="service_nav__desc"><?=get_field('description',get_the_ID())?></div>
    </a>
                    <?php
                }
                wp_reset_postdata();
            }
            ?>
        </div>
    </div>
</section>