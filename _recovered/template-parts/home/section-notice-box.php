<?php
/**
 * Section: Notice Box
 */

$title   = get_sub_field('title');
$content = get_sub_field('content');
$variant = get_sub_field('variant') ?: 'success-light';

if (empty($title) && empty($content)) {
    return;
}

$classes = 'c-notice-box';
$classes .= ' c-notice-box--' . sanitize_html_class($variant);
?>

<section class="<?php echo esc_attr($classes); ?>">
    <div class="o-container">
        <div class="c-notice-box__inner">
            <?php if (!empty($title)) : ?>
                <h2 class="c-notice-box__title">
                    <?php echo esc_html($title); ?>
                </h2>
            <?php endif; ?>

            <?php if (!empty($content)) : ?>
                <div class="c-notice-box__content">
                    <?php echo wp_kses_post($content); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>