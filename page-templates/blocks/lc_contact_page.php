<section class="contact_page py-5">
    <div class="container-xl">
        <div class="row g-4">
            <div class="col-md-6">
                <h2>Contact Us</h2>
                <ul class="fa-ul">
                    <li class="mb-3"><span class="fa-li"><i class="fa-solid fa-phone text-green-400"></i></span> <?=do_shortcode('[contact_phone]')?></li>
                    <li><span class="fa-li"><i class="fa-solid fa-paper-plane text-green-400"></i></span> <?=do_shortcode('[contact_email]')?></li>
                </ul>
            </div>
            <div class="col-md-6">
                <h2>Get in Touch</h2>
                <?=do_shortcode('[contact-form-7 id="' . get_field('contact_form_id','options') . '"]')?>
            </div>
        </div>
    </div>
</section>