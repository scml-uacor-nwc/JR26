<?php
/**
 * Section: Page Navigation
 */

$title = get_sub_field('title');
$items = get_sub_field('items');

if (empty($title) && empty($items)) {
    return;
}
?>

<section class="c-page-navigation">
    <div class="o-container">
        <div class="c-page-navigation__inner">

            <?php if (!empty($title)) : ?>
                <h2 class="c-page-navigation__title">
                    <?php echo esc_html($title); ?>
                </h2>
            <?php endif; ?>

            <?php if (!empty($items)) : ?>
                <nav class="c-page-navigation__nav" aria-label="<?php echo esc_attr($title ?: 'Page navigation'); ?>">
                    <ul class="c-page-navigation__list">
                        <?php foreach ($items as $item) :
                            $label = $item['label'] ?? '';
                            $anchor_id = $item['anchor_id'] ?? '';

                            if (empty($label) || empty($anchor_id)) {
                                continue;
                            }
                        ?>
                            <li class="c-page-navigation__item">
                                <a class="c-page-navigation__link" href="#<?php echo esc_attr($anchor_id); ?>">
                                    <span class="c-page-navigation__link-text">
                                        <?php echo esc_html($label); ?>
                                    </span>
                                    <span class="c-page-navigation__icon" aria-hidden="true">
                                        ↓
                                    </span>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </nav>
            <?php endif; ?>

        </div>
    </div>
</section>