<?php
/**
 * Section: Text Callout
 */
$section_id = get_sub_field('section_id');
$title     = get_sub_field('title');
$content   = get_sub_field('content');
$shortcode = get_sub_field('shortcode');

if (empty($title) && empty($content) && empty($shortcode)) {
    return;
}
?>

<section <?php if (!empty($section_id)) : ?>id="<?php echo esc_attr($section_id); ?>"<?php endif; ?> class="c-text-callout">
    <div class="o-container">
        <div class="c-text-callout__inner">
            <?php if (!empty($title)) : ?>
                <h2 class="c-text-callout__title">
                    <?php echo esc_html($title); ?>
                </h2>
            <?php endif; ?>

            <?php if (!empty($content) || !empty($shortcode)) : ?>
                <div class="c-text-callout__card">
                    <?php if (!empty($content)) : ?>
                        <div class="c-text-callout__content">
                            <?php echo wp_kses_post($content); ?>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($shortcode)) : ?>
                        <div class="c-text-callout__shortcode">
                            <?php echo do_shortcode($shortcode); ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>