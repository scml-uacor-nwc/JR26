<?php
/**
 * Section: Recommendations Grid
 */

$section_title = get_sub_field('section_title');
$items = get_sub_field('items');

if (empty($section_title) && empty($items)) {
    return;
}
?>

<section class="c-recommendations">
    <div class="o-container">

        <?php if ($section_title) : ?>
            <header class="c-recommendations__header">
                <h2 class="c-recommendations__title green-underline">
                    <?php echo esc_html($section_title); ?>
                </h2>
            </header>
        <?php endif; ?>

        <?php if ($items) : ?>
            <div class="c-recommendations__grid">
                <?php foreach ($items as $index => $item) : 
                    $title = $item['title'] ?? '';
                    $text  = $item['text'] ?? '';
                    $number = $index + 1;
                ?>
                    <article class="c-recommendation-card">
                        <div class="c-recommendation-card__header">
                            <span class="c-recommendation-card__badge">
                                <?php echo esc_html((string) $number); ?>
                            </span>

                            <?php if ($title) : ?>
                                <h3 class="c-recommendation-card__title">
                                    <?php echo esc_html($title); ?>
                                </h3>
                            <?php endif; ?>
                        </div>

                        <?php if ($text) : ?>
                            <p class="c-recommendation-card__text">
                                <?php echo esc_html($text); ?>
                            </p>
                        <?php endif; ?>
                    </article>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

    </div>
</section>