<?php
$l = get_field('link') ?? null;
$bg = get_field('background') ?? null;
$text = get_field('background') != 'white' && get_field('background') != 'grey-100' ? 'text-white' : 'text-black';
?>
<section class="pushthrough bg-<?=$bg?>">
    <div class="container-xl py-5 <?=$text?> pushthrough__grid">
        <div class="pushthrough__content">
            <h2 class="text-green-400"><?=get_field('title')?></h2>
            <div class="mb-3"><?=get_field('content')?></div>
            <?php
            if ($l) {
                ?>
            <a href="<?=$l['url']?>" target="<?=$l['target']?>" class="button button-green"><?=$l['title']?></a>
                <?php
            }
            ?>
        </div>
        <div class="pushthrough__logos">
            <?php
            foreach (get_field('logos') as $l) {
                echo wp_get_attachment_image( $l, 'medium', false, array('class' => 'pushthrough__image') );
            }
            ?>
        </div>
    </div>
    </a>
</section>