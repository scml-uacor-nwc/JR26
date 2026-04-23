<?php
/**
 * Section: Intro
 */

$icon  = get_sub_field('icon');
$title = get_sub_field('title');
$text  = get_sub_field('text');

if (empty($icon) && empty($title) && empty($text)) {
    return;
}
?>

<section class="c-intro">
    <div class="o-container">
        <div class="c-intro__inner">

            <?php if (!empty($icon)) : ?>
                <div class="c-intro__icon" aria-hidden="true">
                    <img
                        src="<?php echo esc_url($icon['url']); ?>"
                        alt="<?php echo esc_attr($icon['alt'] ?? ''); ?>"
                        class="c-intro__icon-image"
                    >
                </div>
            <?php endif; ?>

            <?php if (!empty($title)) : ?>
                <h2 class="c-intro__title green-underline">
                    <?php echo esc_html($title); ?>
                </h2>
            <?php endif; ?>

            <?php if (!empty($text)) : ?>
                <div class="c-intro__text">
                    <?php echo wpautop(esc_html($text)); ?>
                </div>
            <?php endif; ?>

        </div>
    </div>
</section>