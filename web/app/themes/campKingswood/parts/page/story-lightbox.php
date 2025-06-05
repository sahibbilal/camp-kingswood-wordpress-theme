<div class="bio-lightbox">
    <div class="container">
        <div class="bio-lightbox__slider related-slider">
            <?php if (have_rows('bsc_lightbox_buttons')) : ?>
                <?php while (have_rows('bsc_lightbox_buttons')) : the_row();
                    $bio_content = get_sub_field('bio_content');
                    $row_index = get_row_index();
                    $images_count = count(get_sub_field('bio_images'));

                ?>
                    <div class="bio-lightbox__single-slide">
                        <div class="bio-lightbox__row">
                            <div class="bio-lightbox__col bio-lightbox__col--img">
                                <?php if ($images_count !== 1) :  ?>
                                    <div class="bio-lightbox__image-slider-nav"></div>
                                    <div class='bio-lightbox__image-slider'>
                                    <?php endif; ?>

                                    <?php if (have_rows('bio_images')) : ?>


                                        <?php while (have_rows('bio_images')) : the_row();
                                            $bio_image_id = get_sub_field('image');
                                            $bio_image = f_img($bio_image_id, 'thumbnail-square-medium');
                                        ?>
                                            <div class="bio-lightbox__img-wrapper">
                                                <?php if (!empty($bio_image)) : ?>
                                                    <?php echo $bio_image; ?>
                                                <?php endif; ?>
                                            </div>
                                        <?php endwhile; ?>

                                    <?php endif; ?>

                                    <?php if ($images_count !== 1) {
                                        echo "</div>";
                                    }; ?>


                                    </div>

                                    <div class="bio-lightbox__col bio-lightbox__col--text">
                                        <div class="bio-lightbox__content-wrapper">
                                            <?php if (!empty($bio_content)) : ?>
                                                <?php echo $bio_content; ?>
                                            <?php endif; ?>
                                        </div>

                                    </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
                    </div>
                    <div class="bio-lightbox__slider-nav"></div>
        </div>
    </div>