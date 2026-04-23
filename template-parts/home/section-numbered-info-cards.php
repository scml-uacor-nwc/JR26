<?php
/**
 * Section: Numbered Info Cards
 */

$items = get_sub_field('items');

if (empty($items) || !is_array($items)) {
    return;
}
?>

<section class="c-numbered-info-cards">
    <div class="o-container">
        <div class="c-numbered-info-cards__list">
            <?php foreach ($items as $index => $item) :
                $title             = $item['title'] ?? '';
                $content           = $item['content'] ?? '';
                $highlight_text    = $item['highlight_text'] ?? '';
                $highlight_variant = $item['highlight_variant'] ?? 'warning';
                $number            = $index + 1;

                $is_success = ($highlight_variant === 'success');

                $highlight_class = 'c-numbered-info-card__highlight';
                $highlight_class .= $is_success
                    ? ' c-numbered-info-card__highlight--success'
                    : ' c-numbered-info-card__highlight--warning';
            ?>
                <article class="c-numbered-info-card">
                    <div class="c-numbered-info-card__badge">
                        <?php echo esc_html((string) $number); ?>
                    </div>

                    <?php if (!empty($title)) : ?>
                        <h3 class="c-numbered-info-card__title">
                            <?php echo esc_html($title); ?>
                        </h3>
                    <?php endif; ?>

                    <?php if (!empty($content)) : ?>
                        <div class="c-numbered-info-card__content">
                            <?php echo wp_kses_post($content); ?>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($highlight_text)) : ?>
                        <div class="<?php echo esc_attr($highlight_class); ?>">
                            <?php if (!$is_success) : ?>
                                <div class="c-numbered-info-card__highlight-icon" aria-hidden="true">
                                    <img
                                        src="<?php echo esc_url(get_template_directory_uri() . '/assets/icons/warning.svg'); ?>"
                                        alt=""
                                        width="28"
                                        height="28"
                                    >
                                </div><br>
                            <?php endif; ?>

                            <div class="c-numbered-info-card__highlight-text">
                                <?php echo wpautop(esc_html($highlight_text)); ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>