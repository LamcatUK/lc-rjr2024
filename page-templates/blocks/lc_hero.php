<section class="hero">
    <div class="container-xl py-5 text-center">
        <h1 class="text-green-400"><?=get_field('title')?></h1>
        <?php
        if (get_field('content') ?? null) {
            ?>
        <div class="fs-800 text-white mb-4 w-constrain-sm"><?=get_field('content')?></div>
            <?php
        }
        if (get_field('cta') ?? null) {
            $l = get_field('cta');
            ?>
        <a href="<?=$l['url']?>" target="<?=$l['target']?>" class="button button-green"><?=$l['title']?></a>
            <?php
        }
        ?>
    </div>
</section>