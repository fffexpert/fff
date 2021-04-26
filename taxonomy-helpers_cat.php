<?php 
/* 
Template Name: Страница профессионалов 
Template Post Type: page
*/

get_header(); 

if(is_tax()){
    $cat_slug = get_queried_object()->slug;
    $cat_name = get_queried_object()->name;
}
else {
    $cat_slug = '';
    $cat_name = '';
}
?>
<?php get_sidebar(); ?>
	<header class="header header-help" id="header">
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
				<h2 class="header__helptitle"><?php the_field('title', 9); ?></h2>
				<div class="header__violethelp"></div>
				<div class="header__help">
					<a href="<?php echo get_page_link(9); ?>" class="header__all">Показать всех</a>
					<?php                    
                    $terms = get_terms( array(
                    	'hide_empty'  => 0,  
                    	'orderby' => 'meta_value', 
                    	'meta_key' => 'mesto',
                    	'order'       => 'ASC',
                    	'taxonomy'    => 'helpers_cat',
                    	'pad_counts'  => 1
                    ) );
                    if ( !empty( $terms )): ?>
					<ul class="header__list">
					    <?php foreach ($terms as $term) { ?>
						<li>
							<a href="<?php echo get_term_link( $term ); ?>" class="<?php if($cat_name == $term->name){ echo 'active'; } ?>">
							    <?php echo $term->name; ?>
							</a>
						</li>
						<?php } ?>
					</ul>
					<?php endif; 
                        wp_reset_postdata();
                    ?>
				</div>
				<div class="header__addlink">
				    <div class="help__fon">
					    <img src="<?php the_field('help_pic', 14); ?>" alt="" class="header__art">
					</div>
					<a href="<?php echo get_page_link(14); ?>" class="header__morepink">о художнике</a>	
				</div>
			</div>
		</div>
	</header>
	<section class="people" id="people">
		<div class="container">
		    <?php
		    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $help_Query = new WP_Query( array(
                'post_type'	=> 'helpers',
                'helpers_cat' => $cat_slug,
                'paged' => $paged,
                'posts_per_page' => 8,
            )); 
            if ($help_Query->have_posts()):
		    ?>
			<div class="people__box">
			    <?php 
			    $i = 0;
			    while ($help_Query->have_posts()): 
                        $help_Query->the_post(); 
                $i++;        
                ?>
				<div class="people__item">
				    <?php if(!($i % 3) and ($i % 6)){ ?>
				    <div class="people__bgelem1"></div>
				    <?php }elseif(!($i % 8)){ ?>
				    <div class="people__bgelem2"></div>
				    <?php } ?>
					<img src="<?php echo get_template_directory_uri(); ?>/svg/peoplesun.svg" alt="" class="people__bg">
					<div class="card">
					    <div class="front">
					    	<img src="<?php the_field('photo'); ?>" alt="">
					    	<a  class="d-flex d-sm-none people__btn">подробнее</a>
					    </div>
					    <div class="back">
					    	<img src="<?php echo get_template_directory_uri(); ?>/svg/peoplecross.svg" alt="" class="d-flex d-sm-none people__cross">
					    	<div class="people__name">
					    		<?php the_title(); ?>
					    	</div>
					    	<div class="people__job">
					    		<?php //print_r(wp_get_post_terms($post->ID, 'helpers_cat')); 
					    		$texes = wp_get_post_terms($post->ID, 'helpers_cat');
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
					    	</div>
					    	<div class="people__text">
					    		<?php echo wp_trim_words( get_field('descr'), 30, '...' ); ?>
					    	</div>
					    	
					    	<?php if(get_field('rec_name')){ ?>
					    	<a target="_blank" href="<?php the_field('rec_link'); ?>" class="people__flex">
					    	    <div class="rec__img">
					    		    <?php echo wp_get_attachment_image( get_field('rec_photo'), 'thumbnail'); ?>
					    		</div>
					    		<p>
					    			Рекомендует <?php the_field('rec_name'); ?>
					    		</p>
					    	</a>
					    	<?php } ?>
					    	<div class="people__flex">
					    		    <img src="<?php echo get_template_directory_uri(); ?>/svg/rub.svg" alt="">
					    		<p>
					    			<?php the_field('cost'); ?>
					    		</p>
					    	</div>
					    	<a target="_blank" href="<?php the_permalink(); ?>" class="d-none d-sm-flex people__btn"><?php the_field('exprt_btn', 'options'); ?></a>
					    	<a target="_blank" href="<?php the_permalink(); ?>" class="d-flex d-sm-none people__btn people__btn_mob"><?php the_field('exprt_btn', 'options'); ?></a>
					    </div>
					</div>
				</div>
				<?php endwhile; ?>
			</div>
            <?php endif; 
                wp_reset_postdata();
            ?>
            <?php kama_pagenavi($help_Query); ?>
		</div>
	</section>
    <?php 
    if(get_field('banner_exps', 12)){ ?>
        <section class="marketing" id="marketing">
        	<div class="container">
        		<h2>
        			<?php the_field('banner_exps_title', 12); ?>
        		</h2>
        		<div class="marketing__box">
        			<a target="_blank" href="<?php the_field('baner_exps_link', 12); ?>" class="adver__link">
        			    <img src="<?php the_field('banner_exps_img', 12); ?>" alt="">
        			</a>
        		</div>
        	</div>
        </section>
    <?php }
    ?>
<?php get_footer(); ?>