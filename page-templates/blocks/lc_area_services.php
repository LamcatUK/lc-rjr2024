<?php
$l = get_field('linked') == 'Yes' ?? null;

$cards = get_field('services');
$cols = (count($cards) % 2 == 0) ? 'two_col' : '';
?>
<section class="service_nav">
    <div class="container-xl">
        <h2 class="text-center"><?=get_field('title')?></h2>
        <div class="text-center w-constrain mb-4"><?=get_field('content')?></div>
        <div class="service_nav__grid <?=$cols?>">
        <?php

        while(have_rows('services')) {
            the_row();
            /*
            if ($l) {
                ?>
    <a class="service_nav__card" href="<?=get_the_permalink(get_the_ID())?>">
                <?php
            }
            else {
            */
                ?>
    <div class="service_nav__card">
                <?php
            // }
            ?>
        <img src="<?=get_sub_field('icon')?>" alt="<?=get_sub_field('service_name')?>" class="service_nav__icon">
        <h3 class="service_nav__title"><?=get_sub_field('service_name')?></h3>
        <div class="service_nav__desc"><?=get_sub_field('description',get_the_ID())?></div>
            <?php
            /*
            if ($l) {
                ?>
    </a>
                <?php
            }
            else {
            */
                ?>
    </div>
                <?php
            // }
        }
        ?>
    </div>
</section>