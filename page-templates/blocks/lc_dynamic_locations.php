<section class="dynamic_locations py-5">
    <div class="container-xl">
        <div class="row g-4">
            <div class="col-md-6">
                <h2><?=get_field('title')?></h2>
                <div class="mb-4"><?=get_field('content')?></div>
                <ul class="fa-ul cols-lg-2">
                <?php
                $locations = get_page_by_path('locations');
                $args = array(
                    'post_type' => 'page',
                    'post_parent' => $locations->ID,
                    'orderby' => 'title',
                    'order' => 'ASC',
                    'posts_per_page' => -1
                );
                
                $query = new WP_Query($args);
    
                if ($query->have_posts()) {
                    while ($query->have_posts()) {
                        $query->the_post();
                        ?>
                    <li class="mb-2"><span class="fa-li"><i class="fa-solid fa-map-marker-alt text-green-400"></i></span> <a href="<?=get_the_permalink(get_the_ID())?>"><?=get_the_title()?></a></li>
                        <?php
                    }
                    wp_reset_postdata();
                }
                ?>
                </ul>
            </div>
            <div class="col-md-6 text-center">
                <?=wp_get_attachment_image( get_field('map'), 'large', false, null)?>
            </div>
        </div>
    </div>
</section>