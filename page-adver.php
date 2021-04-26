<?php 
/*
Template Name: Страница рекламы
Template Post Type: page
*/
get_header(); ?>
	<section class="market" id="market">
		<?php get_sidebar(); ?>
		<div class="container">
			<div class="header__menubox">
				<div class="menu">
					<a href="#" class="button ">
					    <span></span>
					    <svg width="96" height="96" viewBox="0 0 96 96" fill="none" class="menu__svg">
                            <circle class="menu__circle" cx="48" cy="48" r="48"/>
                            <path d="M34.2 42H32.8333L28.2667 51.8167L23.6833 42H22.3333V54H23.7V45L27.8667 54H28.6667L32.8333 45V53.9833H34.2V42ZM44.3146 43.35V42H36.8646V54H44.3146V52.65H38.2146V48.6833H43.3146V47.3167H38.2146V43.35H44.3146ZM54.4792 42V48.1833H47.9958V42H46.6458V54H47.9958V49.55H54.4792V54H55.8292V42H54.4792ZM72.4729 43.6667C71.4563 42.3833 69.8896 41.7833 68.2229 41.7667C66.5563 41.7333 64.9563 42.3833 63.9729 43.6667C63.1563 44.7167 62.7563 46 62.6729 47.3167H59.8396V42H58.4896V54H59.8396V48.6833H62.6896C62.7896 49.9833 63.1563 51.2833 63.9729 52.3167C64.9563 53.6167 66.5063 54.25 68.2229 54.25C69.9229 54.25 71.4729 53.6167 72.4729 52.3167C73.4396 51.0833 73.7729 49.5667 73.7896 48C73.7563 46.45 73.4563 44.9167 72.4729 43.6667ZM72.3396 48C72.3396 49.25 72.1063 50.55 71.3729 51.5C70.6729 52.4667 69.4563 52.95 68.2229 52.95C66.9896 52.9667 65.7729 52.4667 65.0563 51.5C64.3229 50.55 64.0896 49.25 64.0896 48C64.1063 46.75 64.3229 45.45 65.0563 44.5167C65.7729 43.5333 66.9896 43.0667 68.2229 43.05C69.4563 43.0333 70.6729 43.5333 71.3729 44.5167C72.1063 45.45 72.3563 46.75 72.3396 48Z" fill="white"/>
                        </svg>
				    </a> 
				</div>
			</div>
		</div>
		<div class="container">
			<h2>
			    <?php if(get_field('title')){ 
			        the_field('title');
			    }else{
			        the_title();
			    }
			    ?>
			</h2>
			<div class="market__box">
				<img src="<?php echo get_template_directory_uri(); ?>/svg/adver-sun.svg" alt="" class="market__fig">
				<p>
					<?php the_field('text'); ?>
				</p>

				    <?php echo do_shortcode('[contact-form-7 id="208" title="Реклама" html_class="market__form"]'); ?>

			</div>
		</div>
	</section>
<?php get_footer(); ?>