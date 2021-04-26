	<footer class="footer" id="footer">
		<div class="container">
			<div class="footer__box d-flex">
				<a href="<?php the_field('fb', 'option'); ?>" target="_blank" class="footer__fb">
					<img src="<?php echo get_template_directory_uri(); ?>/svg/fb-fio.svg" alt="">
				</a>
				<div class="footer__site">
					<div class="footer__fig"></div>
					<a href="mailto:<?php the_field('email', 'option'); ?>" data-mail="<?php the_field('email', 'option'); ?>" id="email">
						<?php the_field('email', 'option'); ?>
					</a>
				</div>
				<a href="<?php the_field('hand', 'option'); ?>" class="footer__hand">
					<img src="<?php echo get_template_directory_uri(); ?>/svg/hands.svg" alt="">
				</a>
			</div>
			<div class="footer__line d-flex">
				<a href="<?php the_field('conf', 'option'); ?>" target="_blank">
					Политика конфиденциальности
				</a>
				<a href="<?php echo get_page_link(12); ?>">
					Реклама на сайте
				</a>
				<a href="https://borodaboroda.com/" target="_blank">
					Сделано в Boroda Digital
				</a>
			</div>
		</div>
	</footer>
    <?php wp_footer(); ?>
</body>
</html>