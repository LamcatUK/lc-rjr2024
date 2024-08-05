<section class="form_cta py-5 bg-grey-100">
    <div class="container-xl">
        <div class="row g-4 justify-content-center">
            <div class="col-md-6">
                <div class="form_cta__form">
                    <h2><?=get_field('title')?></h2>
                    <p><?=get_field('content')?></p>
                    <?=do_shortcode('[contact-form-7 id="' . get_field('contact_form_id','options') . '"]')?>
                </div>
            </div>
        </div>
    </div>
</section>