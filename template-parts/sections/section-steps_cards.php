<?php
/**
 * Section: Steps Cards
 */

$items = get_sub_field('items');

if (empty($items)) {
    return;
}
?>

<section class="c-steps-cards">
    <div class="o-container">
        <div class="c-steps-cards__grid">
            <?php foreach ($items as $index => $item) :
                $title = $item['title'] ?? '';
                $text  = $item['text'] ?? '';
                $number = $index + 1;
            ?>
                <article class="c-step-card">
                    <div class="c-step-card__badge">
                        <?php echo esc_html((string) $number); ?>
                    </div>

                    <?php if (!empty($title)) : ?>
                        <h3 class="c-step-card__title">
                            <?php echo esc_html($title); ?>
                        </h3>
                    <?php endif; ?>

                    <?php if (!empty($text)) : ?>
                        <p class="c-step-card__text">
                            <?php echo esc_html($text); ?>
                        </p>
                    <?php endif; ?>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>