<?php
$scroll_hook_sections = get_sub_field('scroll_hook_sections' );
$scroll_hook_section_navigation = array();

if ( !empty( $scroll_hook_sections ) ) : ?>
    <section id="shs-wrapper">
        <?php foreach ( $scroll_hook_sections as $scroll_hook_section ) {
            if ( !empty( $scroll_hook_section['scroll_hook_heading'] ) ) {
                $scroll_hook_section_navigation[] = array(
                    'heading' => $scroll_hook_section['scroll_hook_heading'],
                    'target' => '#' . sanitize_title( $scroll_hook_section['scroll_hook_heading'] )
                );
            }
        }

        if ( !empty( $scroll_hook_section_navigation ) ) {
            get_theme_part('page/scroll-hook-sections/shs_navigation', ['scroll_hook_section_navigation' => $scroll_hook_section_navigation]);
        } ?>

        <div id="shs-wrapper-inner">
            <div class="section-texture section-texture--top">
                <?php echo get_texture('sepia-3'); ?>
                <?php echo get_texture('sepia-4'); ?>
            </div>

            <?php foreach ( $scroll_hook_sections as $scroll_hook_section ) {
                if ( !empty( $scroll_hook_section['scroll_hook_section_format'] ) ) {
                    get_theme_part('page/scroll-hook-sections/shs_' . $scroll_hook_section['scroll_hook_section_format'], ['scroll_hook_section' => $scroll_hook_section]);
                }
            } ?>
        </div>
    </section>
<?php endif; ?>