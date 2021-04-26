<?php
/*
Template Name: Страница художника
Template Post Type: page
*/
get_header(); ?>
	<section class="assist" id="assist">
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
			<div class="assist__box d-flex">
				<div class="assist__content">
					<p class="assist__name">
					    <?php the_field('name'); ?>
					</p>
					<p class="assist__work">
						<?php the_field('country'); ?>
					</p>
					<a target="_blank" href="<?php the_field('rec_link'); ?>" class="assist__ava d-flex"  target="_blank">
					    <div class="rec__img">
						    <?php echo wp_get_attachment_image( get_field('rec_photo'), 'thumbnail'); ?>
						</div>
						<p>
							Рекомендует<br>
							<?php the_field('rec_name'); ?>
						</p>
					</a>
                    <div class="assist__text">
					    <div class="assist__sm">
					        <?php trim_text_chars(get_field('descr'), 212, '...'); ?>
    					    <a class="assist__add" href="#">развернуть</a>
            			</div>

						<div style="display: none;" class="assist__more">
						    <?php the_field('descr'); ?>
						    <a href="#" class="assist__less">свернуть</a>
						</div>
					</div>
					<div class="assist__line d-flex">
						<div class="assist__item col-12 col-sm-5">
							<p>
								Стоимость картин
							</p>
							<h5>
								<?php the_field('cost'); ?>
							</h5>
						</div>
						<div class="col-12 col-sm-7">
                    <a href="#" class="bttn wh__link d-flex">
                      						<?php if( get_field('draw_wh', 'option') ) {
                                    echo get_field('draw_wh', 'option');
                                  } else {
                                    echo 'Написать<br>художнику';
                                  }?>
                    </a>
						</div>
   		<div style="display:none;" >
    		<div class="box-modal" id="popup-wh">
    			<div class="popup">
    				<div class="popup-rew__box">
    					<div class="box-modal__close articmodal-close">
    						<img src="<?php echo get_template_directory_uri(); ?>/svg/close.svg" alt="" class="close__pic">
    					</div>
    					<h5 class="rewi__title">написать<br> художнику</h5>
    					<?php echo do_shortcode('[contact-form-7 id="1884" title="Написать эксперту" html_class="market__form"]'); ?>
    				</div>
    			</div>
    		</div>
       </div>
					</div>
				</div>
				<div class="assist__block">
				    <div class="assist__thumb">
					    <img src="<?php the_field('photo'); ?>" alt="" class="assist__pic">
					</div>
					<img src="<?php echo get_template_directory_uri(); ?>/images/assist-sun.png" alt="" class="assist__fig">
					<!--
					<a href="#" class="header__morepink header__addbtn">купить картину</a>
					-->
				</div>
			</div>
		</div>
	</section>

	<?php if(get_field('video')){ ?>

	<section class="video" id="video">
		<div class="container">
			<h2>
				видео
			</h2>
			<div class="video__box">
				<img src="<?php echo get_template_directory_uri(); ?>/images/video-sun.png" alt="" class="video__fig">
				<div class="video__item" onclick="$('#show_video_window').arcticmodal();">
					<iframe width="100%" height="100%" src="https://www.youtube.com/embed/<?php the_field('video'); ?>"></iframe>
				</div>
			</div>
		</div>
	</section>

	<?php } ?>
	<?php
	$gallery = get_field('galery');
	if($gallery){ ?>


	<section class="gal" id="gal">
		<div class="container">
			<h2>
				галерея
			</h2>
			<div class="gal__box">

				<img src="<?php echo get_template_directory_uri(); ?>/images/gal-bg.png" alt="" class="gal__fig">
				<div class="gal__slider">
				    <?php foreach( $gallery as $gallery_id ): ?>
					<a data-fancybox="gallery" class="gal__item" href="<?php echo esc_url($gallery_id['url']); ?>">
						<img src="<?php echo get_template_directory_uri(); ?>/svg/lupa.svg" alt="" class="gal__pos">
						<img src="<?php echo esc_url($gallery_id['url']); ?>" alt="" class="gal__one">
					</a>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</section>

	<?php } ?>
	<?php if( have_rows('revs') ){ ?>

	<section class="rew" id="rew">
		<div class="container">
			<h2>
				отзывы
			</h2>
			<div class="rew__box">
			    <div class="rews__fon">
				    <img src="<?php the_field('revs_fon'); ?>" alt="">
				</div>
				<div class="rew__slider d-none d-lg-flex">
				    <?php
				    $i = 0;
				    while( have_rows('revs') ) :
				    $i++;
				    the_row(); ?>

				    <?php if(($i == 1) or !($i % 5)){ ?>
					<div class="rew__item">
						<div class="rew__flex d-flex">
						    <div class="rew__content">
				    <?php } ?>

								<div class="rew__one">
									<p class="rew__name">
										<?php the_sub_field('name'); ?>
									</p>
									<p class="rew__data">
										<?php the_sub_field('data'); ?>
									</p>
									<p class="rew__text">
										<?php the_sub_field('rev'); ?>
									</p>
								</div>

							<?php if(!($i % 2) and ($i % 4)){ ?>

								<a href="#" class="bttn rew__link">
									написать<br> отзыв
								</a>
							</div>
							<div class="rew__block">

							<?php } ?>


					<?php if((count(get_field('revs')) == $i) or !($i % 4)){ ?>
        					</div>
						</div>
					</div>
					<?php } ?>
					<?php endwhile; ?>
				</div>




				<div class="rew__slider_mob d-flex d-lg-none">
				    <?php while( have_rows('revs') ) : the_row(); ?>
					<div class="rew__one">
						<p class="rew__name">
							<?php the_sub_field('name'); ?>
						</p>
						<p class="rew__data">
							<?php the_sub_field('data'); ?>
						</p>
						<p class="rew__text">
							<?php the_sub_field('rev'); ?>
						</p>
					</div>
					<?php endwhile; ?>
				</div>

				<a href="#" class="bttn rew__link d-flex d-lg-none">
					                            <?php if( get_field('draw_otzyv', 'option') ) {
                                        echo get_field('draw_otzyv', 'option');
                                      } else {
                                        echo 'Написать<br>ещё';
                                      }?>
				</a>
			</div>
		</div>
		<div style="display:none;" >
    		<div class="box-modal" id="popup-rew">
    			<div class="popup">
    				<div class="popup-rew__box">
    					<div class="box-modal__close articmodal-close">
    						<img src="<?php echo get_template_directory_uri(); ?>/svg/close.svg" alt="" class="close__pic">
    					</div>
    					<h5 class="rewi__title">написать<br> отзыв</h5>
    					<?php echo do_shortcode('[contact-form-7 id="209" title="Написать отзыв" html_class="market__form"]'); ?>
    				</div>
    			</div>
    		</div>
       </div>
	</section>

	<?php }else{ ?>

	<section class="rew__empty" id="rew">
		<div class="container">
			<h2>
				отзывы
			</h2>
			<div class="rew__box">
			    <div class="rews__fon">
				    <img src="<?php the_field('revs_fon', 14); ?>" alt="" class="">
				</div>
				<div class="rew__nocontent">
    				<a href="#" class="bttn rew__link d-flex">
    					                    <?php if( get_field('draw_nootzyv', 'option') ) {
                                    echo get_field('draw_nootzyv', 'option');
                                  } else {
                                    echo 'Написать<br>отзыв';
                                  }?>
    				</a>
				</div>
    		</div>
       </div>
   		<div style="display:none;" >
    		<div class="box-modal" id="popup-rew">
    			<div class="popup">
    				<div class="popup-rew__box">
    					<div class="box-modal__close articmodal-close">
    						<img src="<?php echo get_template_directory_uri(); ?>/svg/close.svg" alt="" class="close__pic">
    					</div>
    					<h5 class="rewi__title">написать<br> отзыв</h5>
    					<?php echo do_shortcode('[contact-form-7 id="209" title="Написать отзыв" html_class="market__form"]'); ?>
    				</div>
    			</div>
    		</div>
       </div>
	</section>
	<?php } ?>
    <?php
    if(get_field('banner_draw', 12)){ ?>
        <section class="marketing" id="marketing">
        	<div class="container">
        		<h2>
        			<?php the_field('banner_draw_title', 12); ?>
        		</h2>
        		<div class="marketing__box">
        			<a target="_blank" href="<?php the_field('baner_draw_link', 12); ?>" class="adver__link">
        			    <img src="<?php the_field('banner_draw_img', 12); ?>" alt="">
        			</a>
        		</div>
        	</div>
        </section>
    <?php }
    ?>
<?php get_footer(); ?>
