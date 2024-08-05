<section class="dynamic_locations py-5">
    <div class="container-xl">
        <div class="row g-4">
            <div class="col-md-6">
                <h2><?=get_field('title')?></h2>
                <div class="mb-4"><?=get_field('content')?></div>
                <ul class="fa-ul cols-lg-2">
                <?php
                $locas = textarea_array(get_field('locations')) ?? null;
                    foreach ($locas as $l) {
                            ?>
                    <li class="mb-2"><span class="fa-li"><i class="fa-solid fa-map-marker-alt text-green-400"></i></span> <?=$l?></li>
                        <?php
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