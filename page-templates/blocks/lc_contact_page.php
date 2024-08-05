<section class="contact_page py-5">
    <div class="container-xl">
        <div class="row g-4">
            <div class="col-md-6">
                <h2>Contact Us</h2>
                <ul class="fa-ul">
                    <li class="mb-3"><span class="fa-li"><i class="fa-solid fa-phone text-green-400"></i></span> <?=do_shortcode('[contact_phone]')?></li>
                    <li><span class="fa-li"><i class="fa-solid fa-paper-plane text-green-400"></i></span> <?=do_shortcode('[contact_email]')?></li>
                </ul>
                <?php
                if (get_field('google_maps_url') ?? null) {
                    ?>
                <iframe
            src="<?=get_field('google_maps_url', 'options')?>"
            width="100%" height="450" class="rounded-lg shadow-1" style="border:0;" allowfullscreen=""
            loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <?php
                }
                else {
                    echo wp_get_attachment_image( get_field('map_image','options'), 'full', false );
                }
                    ?>
            </div>
            <div class="col-md-6">
                <h2>Get in Touch</h2>
                <?=do_shortcode('[contact-form-7 id="' . get_field('contact_form_id','options') . '"]')?>
            </div>
        </div>
    </div>
</section>