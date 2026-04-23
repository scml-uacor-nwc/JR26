<?php
/**
 * Section: Info Cards Grid
 */

$section_title = get_sub_field('section_title');
$columns       = get_sub_field('columns') ?: '2';
$cards         = get_sub_field('cards');

if (empty($section_title) && empty($cards)) {
    return;
}

$grid_modifier = 'c-info-cards-grid__grid--cols-' . $columns;
?>

<section class="c-info-cards-grid">
    <div class="o-container">

        <?php if (!empty($section_title)) : ?>
            <header class="c-info-cards-grid__header">
                <h2 class="c-info-cards-grid__title">
                    <?php echo esc_html($section_title); ?>
                </h2>
            </header>
        <?php endif; ?>

        <?php if (!empty($cards) && is_array($cards)) : ?>
            <div class="c-info-cards-grid__grid <?php echo esc_attr($grid_modifier); ?>">
                <?php foreach ($cards as $card) :
                    $icon     = $card['icon'] ?? null;
                    $title    = $card['title'] ?? '';
                    $subtitle = $card['subtitle'] ?? '';
                    $content  = $card['content'] ?? '';
                ?>
                    <article class="c-info-card">
                        <?php if (!empty($icon) || !empty($title) || !empty($subtitle)) : ?>
                            <div class="c-info-card__header">
                                <?php if (!empty($icon) && is_array($icon) && !empty($icon['url'])) : ?>
                                    <div class="c-info-card__icon" aria-hidden="true">
                                        <img
                                            src="<?php echo esc_url($icon['url']); ?>"
                                            alt="<?php echo esc_attr($icon['alt'] ?? ''); ?>"
                                            width="32"
                                            height="32"
                                        >
                                    </div>
                                <?php endif; ?>

                                <div class="c-info-card__heading-group">
                                    <?php if (!empty($title)) : ?>
                                        <h3 class="c-info-card__title">
                                            <?php echo esc_html($title); ?>
                                        </h3>
                                    <?php endif; ?>

                                    <?php if (!empty($subtitle)) : ?>
                                        <p class="c-info-card__subtitle">
                                            <?php echo esc_html($subtitle); ?>
                                        </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if (!empty($content)) : ?>
                            <div class="c-info-card__content">
                                <?php echo wp_kses_post($content); ?>
                            </div>
                        <?php endif; ?>
                    </article>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

    </div>
</section>