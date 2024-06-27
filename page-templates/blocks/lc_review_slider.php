<section class="review_slider pt-5 pb-4">
    <div class="container-xl">
        <h2 class="text-center mb-4">What Our Customers Say</h2>
        <div class="review_slider__slider">
            <div class="swiper-wrapper">
            <?php
            $q = new WP_Query(array(
                'post_type' => 'review',
                'post_per_page' => -1,
            ));
            while ($q->have_posts()) {
                $q->the_post();
                ?>
                <div class="review_slider__slide swiper-slide">
                    <div class="review_slider__card">
                        <div class="review_slider__title"><?=get_the_title()?>, <span class="text-green-400"><?=get_field('location', get_the_ID())?></div>
                        <div class="review_slider__review"><?=get_the_content()?></div>
                    </div>
                </div>
                <?php
            }
            wp_reset_postdata();
            ?>
            </div>
        </div>
    </div>
</section>
<?php
add_action('wp_footer', function(){
    ?>
<script>

    function setEqualHeight(slider) {
        let maxHeight = 0;
        const slides = document.querySelectorAll(slider);

        // Remove existing heights to recalculate
        slides.forEach(slide => {
            slide.style.height = 'auto';
        });

        // Find the maximum height
        slides.forEach(slide => {
            if (slide.offsetHeight > maxHeight) {
                maxHeight = slide.offsetHeight;
            }
        });

        // Set all slides to the maximum height
        slides.forEach(slide => {
            slide.style.height = `${maxHeight}px`;
        });
    }

    var latestSlider = new Swiper('.review_slider__slider', {
        loop: true,
        autoplay: {
            delay: 4000,
            disableOnInteraction: true,
        },
        slidesPerView: 1,
        slidesPerGroup: 1,
        spaceBetween: 0,
        on: {
            init: function() {
                setEqualHeight('.review_slider__slide');
            },
            resize: function() {
                setEqualHeight('.review_slider__slide');
            }
        },
        breakpoints: {
            768: {
            slidesPerView: 2,
            spaceBetween: 0
            },
            992: {
            slidesPerView: 3,
            spaceBetween: 0
            }
        }
    });
</script>
    <?php
},9999);