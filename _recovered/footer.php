<?php
declare(strict_types=1);
?>

<footer class="site-footer">
	<div class="o-container">

		<div class="site-footer__top">
			<div class="site-footer__logo">
				<img
					src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/logo-negativo-scml.png'); ?>"
					alt="Santa Casa Misericórdia de Lisboa"
					width="180"
				>
			</div>
			<div class="site-footer__badge">
				<img
					src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/icon-18.png'); ?>"
					alt="+18"
					width="56"
					height="56"
				>
				<span><?php esc_html_e('Proibido jogar a menores de 18 anos.', 'jr26'); ?></span>
			</div>
		</div>

		<hr class="site-footer__divider">

		<div class="site-footer__bottom">
			<?php wp_nav_menu([
				'theme_location' => 'footer',
				'container'      => false,
				'menu_class'     => 'site-footer__nav',
				'fallback_cb'    => false,
			]); ?>
			<p class="site-footer__copy">
				&copy; <?php echo esc_html(wp_date('Y')); ?> <?php esc_html_e('Santa Casa da Misericórdia de Lisboa', 'jr26'); ?>
			</p>
		</div>

	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
