<?php
/**
 * Section: Section Intro CTA
 */
$section_id = get_sub_field('section_id');
$title        = get_sub_field('title');
$text         = get_sub_field('text');
$button_label = get_sub_field('button_label');
$button_file  = get_sub_field('button_file');
$button_icon  = get_sub_field('button_icon');

$file_url   = is_array($button_file) ? ($button_file['url']   ?? '') : '';
$file_label = !empty($button_label)  ? $button_label : (is_array($button_file) ? ($button_file['title'] ?? 'Download') : 'Download');

if (empty($title) && empty($text) && empty($file_url)) {
    return;
}

$button_classes = 'c-section-intro-cta__button';
?>

<section <?php if (!empty($section_id)) : ?>id="<?php echo esc_attr($section_id); ?>"<?php endif; ?> class="c-section-intro-cta">
    <div class="o-container">
        <div class="c-section-intro-cta__inner">

            <?php if (!empty($title)) : ?>
                <h2 class="c-section-intro-cta__title">
                    <?php echo esc_html($title); ?>
                </h2>
            <?php endif; ?>

            <?php if (!empty($text)) : ?>
                <div class="c-section-intro-cta__text">
                    <?php echo wp_kses_post($text); ?>
                </div>
            <?php endif; ?>

            <?php if (!empty($file_url)) : ?>
                <div class="c-section-intro-cta__actions">
                    <a
                        class="<?php echo esc_attr($button_classes); ?>"
                        href="<?php echo esc_url($file_url); ?>"
                        target="_blank" rel="noopener noreferrer"
                    >
                        <?php if (!empty($button_icon)) : ?>
                            <?php echo jr26_get_icon($button_icon, 'c-section-intro-cta__button-icon'); // phpcs:ignore ?>
                        <?php endif; ?>

                        <span class="c-section-intro-cta__button-label">
                            <?php echo esc_html($file_label); ?>
                        </span>
                    </a>
                </div>
            <?php endif; ?>

        </div>
    </div>
</section>