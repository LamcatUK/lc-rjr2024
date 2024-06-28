<section class="usps">
    <div class="container-xl usps__grid">
        <?php
        while (have_rows('usps')) {
            the_row();
            ?>
        <div class="usps__card">
            <img src="<?=get_sub_field('icon')?>" alt="" class="usps__icon">
            <h3 class="usps__title"><?=get_sub_field('title')?></h3>
            <div class="usps__desc"><?=get_sub_field('description')?></div>
        </div>
            <?php
        }
        ?>
    </div>
</section>