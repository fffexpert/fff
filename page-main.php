<?php 
/*
Template Name: Главная страница
Template Post Type: page
*/
get_header(); ?>

<header class="header" id="header">
	<?php get_sidebar(); ?>
	<div class="container">
		<div class="header__box">
			<div class="menu">
			    <a href="#" class="button ">
    				<span></span>
				    <svg width="96" height="96" viewBox="0 0 96 96" fill="none" class="menu__svg">
                        <circle class="menu__circle" cx="48" cy="48" r="48"/>
                        <path d="M34.2 42H32.8333L28.2667 51.8167L23.6833 42H22.3333V54H23.7V45L27.8667 54H28.6667L32.8333 45V53.9833H34.2V42ZM44.3146 43.35V42H36.8646V54H44.3146V52.65H38.2146V48.6833H43.3146V47.3167H38.2146V43.35H44.3146ZM54.4792 42V48.1833H47.9958V42H46.6458V54H47.9958V49.55H54.4792V54H55.8292V42H54.4792ZM72.4729 43.6667C71.4563 42.3833 69.8896 41.7833 68.2229 41.7667C66.5563 41.7333 64.9563 42.3833 63.9729 43.6667C63.1563 44.7167 62.7563 46 62.6729 47.3167H59.8396V42H58.4896V54H59.8396V48.6833H62.6896C62.7896 49.9833 63.1563 51.2833 63.9729 52.3167C64.9563 53.6167 66.5063 54.25 68.2229 54.25C69.9229 54.25 71.4729 53.6167 72.4729 52.3167C73.4396 51.0833 73.7729 49.5667 73.7896 48C73.7563 46.45 73.4563 44.9167 72.4729 43.6667ZM72.3396 48C72.3396 49.25 72.1063 50.55 71.3729 51.5C70.6729 52.4667 69.4563 52.95 68.2229 52.95C66.9896 52.9667 65.7729 52.4667 65.0563 51.5C64.3229 50.55 64.0896 49.25 64.0896 48C64.1063 46.75 64.3229 45.45 65.0563 44.5167C65.7729 43.5333 66.9896 43.0667 68.2229 43.05C69.4563 43.0333 70.6729 43.5333 71.3729 44.5167C72.1063 45.45 72.3563 46.75 72.3396 48Z" fill="white"/>
                    </svg>
                </a>
			</div>
			
			<div class="header__bottom">
			    <svg width="58" height="92" viewBox="0 0 58 92" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M47.7227 52.9091L57.6274 62.8138L38.7184 81.7229L38.7185 81.7229L28.8137 91.6277L28.8137 91.6276L28.8136 91.6277L18.9089 81.7229L18.9089 81.7229L-7.11835e-05 62.8139L9.90467 52.9091L20 63.0044L20 3.28949e-06L38 1.71589e-06L38 62.6318L47.7227 52.9091Z" fill="#FC7DA2"/>
                </svg>
			</div>
			
			
			<!--
			<div class="header__pink"><?php //the_field('top_b'); ?></div>
			-->
			<img src="<?php echo get_template_directory_uri(); ?>/images/main_sun.png" alt="" class="header__img">
			<div class="header__picture">
			    <img src="<?php the_field('main_fon', 14); ?>" alt="" class="header__img">
			</div>
			<h1><?php the_field('main_title'); ?></h1>
			<!--
			<div class="header__violet"><?php //the_field('bot_b'); ?></div>
			-->
		</div>
	</div>
</header>
<section class="top" id="top">
	<div class="container">
		<h2>
			<?php the_field('help_title'); ?>
		</h2>
		<div class="top__box">
			<img src="<?php echo get_template_directory_uri(); ?>/images/top.png" alt="" class="top__sun">
			<div class="top__block d-flex">
				<div class="top__wrap">
				    
				    <?php if( have_rows('help_helpers') ):
				        $h = 0;
				        while ( have_rows('help_helpers') ) : the_row(); 
				            $h++;
				            $link = get_sub_field('link');
				            if($h == 1){
				        ?>

					<div class="people__item top__card">
						<div class="card">
						    <div class="front">
						    	<img src="<?php the_field('photo', $link); ?>" alt="">
								<a  class="d-flex d-sm-none people__btn">подробнее</a>
						    </div>
						    <div class="back">
						    	<img src="<?php echo get_template_directory_uri(); ?>/svg/peoplecross.svg" alt="" class="d-flex d-sm-none people__cross">
						    	<p class="people__name">
						    	    <?php echo get_the_title($link); ?>
								</p>
								<p class="people__job">
    					    		<?php
        					    		$texes = wp_get_post_terms($link, 'helpers_cat');
        					    		if($texes){
        					    		    $t = 0;
            					    		foreach($texes as $tax){
            					    		    $t++;
            					    		    if($t == 1){
            					    		        the_field('shot', $tax);
            					    		    }else{
            					    		        echo ', '; the_field('shot', $tax);
            					    		    }
            					    		}
        					    		}
    					    		?>
								</p>
								<div class="people__text">
								    <?php echo wp_trim_words( get_field('descr', $link), 25, '...' ); ?>
									<?php //trim_text_chars(get_field('descr', $link), 212, '...'); ?>
								</div>
								<?php if(get_field('rec_name', $link)){ ?>
								<a href="<?php the_field('rec_link', $link); ?>" class="people__flex" target="_blank">
								    
								    <div class="rec__img">
									    <?php echo wp_get_attachment_image( get_field('rec_photo', $link), 'thumbnail'); ?>
									</div>
									
									<p>
										Рекомендует<br> 
										<?php the_field('rec_name', $link); ?>
									</p>
								</a>
								<?php } ?>
								<div class="people__flex">
									<img src="<?php echo get_template_directory_uri(); ?>/svg/top-money.svg" alt="">
									<p>
									    <?php the_field('cost', $link); ?>
									</p>
								</div>
						    	<a target="_blank" href="<?php the_permalink($link); ?>" class="d-none d-sm-flex people__btn"><?php the_field('exprt_btn', 'options'); ?></a>
						    	<a target="_blank" href="<?php the_permalink($link); ?>" class="d-flex d-sm-none people__btn people__btn_mob"><?php the_field('exprt_btn', 'options'); ?></a>
						    </div>
						</div>
					</div>
					
					<?php }elseif($h == 2){ ?>
					
					<div class="people__item top__card top__two">
						<div class="card">
						    <div class="front">
						    	<img src="<?php the_field('photo', $link); ?>" alt="">
								<a class="d-flex d-sm-none people__btn">подробнее</a>
						    </div>
						    <div class="back">
						    	<img src="<?php echo get_template_directory_uri(); ?>/svg/peoplecross.svg" alt="" class="d-flex d-sm-none people__cross">
						    	<p class="people__name">
									<?php echo get_the_title($link); ?>
								</p>
								<p class="people__job">
					    		    <?php
        					    		$texes = wp_get_post_terms($link, 'helpers_cat');
        					    		if($texes){
        					    		    $t = 0;
            					    		foreach($texes as $tax){
            					    		    $t++;
            					    		    if($t == 1){
            					    		        the_field('shot', $tax);
            					    		    }else{
            					    		        echo ', '; the_field('shot', $tax);
            					    		    }
            					    		}
        					    		}
    					    		?>
								</p>
								<div class="people__text">
								    <?php echo wp_trim_words( get_field('descr', $link), 25, '...' ); ?>
									<?php //trim_text_chars(get_field('descr', $link), 212, '...'); ?>
								</div>
								<?php if(get_field('rec_name', $link)){ ?>
								<a target="_blank" href="<?php the_field('rec_link', $link); ?>" class="people__flex">
								    <div class="rec__img">
									    <?php echo wp_get_attachment_image( get_field('rec_photo', $link), 'thumbnail'); ?>
									</div>
									<p>
										Рекомендует<br> <?php the_field('rec_name', $link); ?>
									</p>
								</a>
								<?php } ?>
								<div class="people__flex d-flex">
									<img src="<?php echo get_template_directory_uri(); ?>/svg/top-money.svg" alt="">
									<p>
										<?php the_field('cost', $link); ?>
									</p>
								</div>
						    	<a target="_blank" href="<?php the_permalink($link); ?>" class="d-none d-sm-flex people__btn"><?php the_field('exprt_btn', 'options'); ?></a>
						    	<a target="_blank" href="<?php the_permalink($link); ?>" class="d-flex d-sm-none people__btn people__btn_mob"><?php the_field('exprt_btn', 'options'); ?></a>
						    </div>
						</div>
					</div>
				</div>
				
				<?php }elseif($h == 3){ ?>

				<div class="top__content">
					<p class="top__text">
						<?php the_field('help_descr'); ?>
					</p>
					<div class="people__item top__card ">
						<div class="card">
						    <div class="front">
						    	<img src="<?php the_field('photo', $link); ?>" alt="">
								<a  class="d-flex d-sm-none people__btn">подробнее</a>
						    </div>
						    <div class="back">
						    	<img src="<?php echo get_template_directory_uri(); ?>/svg/peoplecross.svg" alt="" class="d-flex d-sm-none people__cross">
						    	<p class="people__name">
									<?php echo get_the_title($link); ?>
								</p>
								<p class="people__job">
    					    		<?php
        					    		$texes = wp_get_post_terms($link, 'helpers_cat');
        					    		if($texes){
        					    		    $t = 0;
            					    		foreach($texes as $tax){
            					    		    $t++;
            					    		    if($t == 1){
            					    		        the_field('shot', $tax);
            					    		    }else{
            					    		        echo ', '; the_field('shot', $tax);
            					    		    }
            					    		}
        					    		}
    					    		?>
								</p>
								<div class="people__text">
								    <?php echo wp_trim_words( get_field('descr', $link), 25, '...' ); ?>
									<?php //trim_text_chars(get_field('descr', $link), 212, '...'); ?>
								</div>
								<?php if(get_field('rec_name', $link)){ ?>
								<a target="_blank" href="<?php the_field('rec_link', $link); ?>" class="people__flex">
								    <div class="rec__img">
									    <?php echo wp_get_attachment_image( get_field('rec_photo', $link), 'thumbnail'); ?>
									</div>
									<p>
										Рекомендует<br> <?php the_field('rec_name', $link); ?>
									</p>
								</a>
								<?php } ?>
								<div class="people__flex">
									<img src="<?php echo get_template_directory_uri(); ?>/svg/top-money.svg" alt="">
									<p>
										<?php the_field('cost', $link); ?>
									</p>
								</div>
						    	<a target="_blank" href="<?php the_permalink($link); ?>" class="d-none d-sm-flex people__btn"><?php the_field('exprt_btn', 'options'); ?></a>
						    	<a target="_blank" href="<?php the_permalink($link); ?>" class="d-flex d-sm-none people__btn people__btn_mob"><?php the_field('exprt_btn', 'options'); ?></a>
						    </div>
						</div>
					</div>
					
					<?php }
					endwhile;
					endif;
					?>
					
					<a href="<?php echo get_page_link(9); ?>" class="bttn top__link">
						<span>Смотреть<br> всех</span>
					</a>
				</div>
			</div>
		</div>
	</div>
</section>


    <?php 
    if(get_field('banner_main', 12)){ ?>
    <section class="marketing" id="marketing">
    	<div class="container">
    		<h2>
    			<?php the_field('banner_main_title', 12); ?>
    		</h2>
    		<?php if(get_field('banorvid', 12) == 'ban'){ ?>
    		
    		<div class="marketing__box">
    			<a target="_blank" href="<?php the_field('baner_main_link', 12); ?>" class="adver__link">
    			    <img src="<?php the_field('banner_main_img', 12); ?>" alt="">
    			</a>
    		</div>
    		
    		<?php }else if(get_field('banorvid', 12) == 'vid'){ ?>

			<div class="marketing__box">
				<div class="video__item">
					<iframe width="100%" height="100%" src="https://www.youtube.com/embed/<?php the_field('banner_main_vid', 12); ?>"></iframe>
				</div>
			</div>

			<?php } ?>
    	</div>
    </section>
    <?php }
    ?>
    
    
<section class="draw" id="draw">
	<div class="container">
		<h2><?php the_field('draw_title'); ?></h2>
		<div class="draw__box d-flex">
			<div class="draw__left">
				<img src="<?php echo get_template_directory_uri(); ?>/svg/drawsun.svg" alt="" class="draw__sun">
				<div class="draw__info">
					<div class="draw__subtitle">
						<?php the_field('draw_descr'); ?>
					</div>
					<div class="draw__name">
						<?php the_field('name', 14); ?>
					</div>
					<div class="draw__country">
						<?php the_field('country', 14); ?>
					</div>
					<div class="draw__text">
						<?php the_field('main_descr', 14); ?>
					</div>

				</div>
					
				<a href="<?php echo get_page_link(14); ?>" class="d-none d-lg-flex draw__pink">
					подробнее
				</a>
			</div>
			<div class="draw__right">
				<div class="draw__violet"></div>
				<div class="draw__slider">
					<a class="draw__img" data-fancybox="gallery" href="<?php the_field('main_top_right', 14); ?>"><img src="<?php the_field('main_top_right', 14); ?>" alt=""></a>
					<a class="draw__img" data-fancybox="gallery" href="<?php the_field('main_top_left', 14); ?>"><img src="<?php the_field('main_top_left', 14); ?>" alt=""></a>
					<a class="draw__img" data-fancybox="gallery" href="<?php the_field('main_bot_left', 14); ?>"><img src="<?php the_field('main_bot_left', 14); ?>" alt=""></a>
					<a class="draw__img" data-fancybox="gallery" href="<?php the_field('main_bot_right', 14); ?>"><img src="<?php the_field('main_bot_right', 14); ?>" alt=""></a>
				</div>
			</div>
			<a href="<?php echo get_page_link(14); ?>" class="d-flex d-lg-none draw__pink">
				Подробнее
			</a>
		</div>
	</div>
</section>
<section class="about" id="about">
	<div class="container">
		<h2>
			<?php the_field('slider_title'); ?>
		</h2>
		<div class="about__box">
			<img src="<?php echo get_template_directory_uri(); ?>/images/about.png" alt="" class="about__sun">
			<div class="about__line d-flex">
				<div class="about__col">
					<?php the_field('slider_text_l'); ?>
				</div>
				<div class="about__col">
					<?php the_field('slider_text_r'); ?>
				</div>
			</div>
			
			<?php if( have_rows('slider_slider') ): ?>
			
			<div class="about__slider">
			    
			    <?php while ( have_rows('slider_slider') ) : the_row(); ?>
			    
				<div class="about__item">
					<div class="people__item">
						<div class="card">
						    <div class="front">
						    	<img src="<?php the_sub_field('photo'); ?>" alt="">
								<a  class="d-flex d-sm-none people__btn">подробнее</a>
						    </div>
						    <div class="back">
						    	<img src="<?php echo get_template_directory_uri(); ?>/svg/peoplecross.svg" alt="" class="d-flex d-sm-none people__cross">
						    	<p class="people__name">
									<?php the_sub_field('name'); ?>
								</p>
								<p class="about__work">
									<?php the_sub_field('pos'); ?>
								</p>
								<div class="people__text">
									<?php the_sub_field('descr'); ?>
								</div>
								<a target="_blank" href="<?php the_sub_field('fb'); ?>">
									<img src="<?php echo get_template_directory_uri(); ?>/svg/fb.svg" alt="">
								</a>
						    </div>
						</div>
					</div>
				</div>
				
				<?php endwhile; ?>
				
			</div>
			
			<?php endif; ?>
			
		</div>
	</div>
</section>
<?php get_footer(); ?>