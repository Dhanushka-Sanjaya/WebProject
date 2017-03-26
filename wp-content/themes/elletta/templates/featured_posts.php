<?php 
// Prevent loading this file directly
if ( ! defined( 'ABSPATH' ) ) { exit; }
$elletta_featured_area_columns = get_theme_mod('featured_area_columns');
?>

<div class="featured-posts-container">
	<div class="container">

		<div class="featured-post-wrapper">
			<div class="featured-posts side-item <?php echo 'column-'.$elletta_featured_area_columns; ?>">
				<?php
					// retrieve posts information from database
					$query_featured = array(
					  'posts_per_page' => $elletta_featured_area_columns,
					  'nopaging' => 0,
					  'post_status' => 'publish',
					  'ignore_sticky_posts' => 1,
					  'category__in'     => get_theme_mod('category_posts_featured_area') ,
					  'tax_query' => array(
					    array(
					      'taxonomy' => 'post_format',
					      'field' => 'slug',
					      'terms' => array('post-format-link', 'post-format-quote' ),
					      'operator' => 'NOT IN'
					    )
					  )
					);
			 		$elletta_posts_featured = new WP_Query($query_featured);

				   	$out = '<ul class="clearfix">';

				  	while ($elletta_posts_featured->have_posts()) : $elletta_posts_featured->the_post();


						$latest_posts_categories = get_the_category();
						$latest_posts_separator = ', ';
						$latest_posts_output = '';
                                                $thumb = '';
						if($latest_posts_categories){
							foreach($latest_posts_categories as $latest_posts_category) {
								$latest_posts_output .= $latest_posts_category->cat_name.$latest_posts_separator;
							}
						}

					  	if(has_post_thumbnail()) :
					  		$thumb = '<div class="featured-thumb"><a href="'.get_permalink().'">'. get_the_post_thumbnail($elletta_posts_featured->id, 'elletta_thumbnail-featured-3') . '</a>';
					  		if(get_theme_mod('show_categories_featured_area')){
					  			$thumb .= '<span class="side-item-category"><span class="side-item-category-inner">'. trim($latest_posts_output, $latest_posts_separator).'</span></span>';
					  		}
					  		$thumb .= '</div>' ;			  	
					  	 endif;

                                                        $out .= '<li class="side-image"><div class="item-container clearfix">'. $thumb . '<div class="featured_post_text"><h4><a href="'.get_permalink().'" class="featured_post_header">'.get_the_title().'</a></h4>';
                                                        if(get_theme_mod('show_date_featured_area')){
                                                                $out .= '<span class="post-date">'.get_the_date().'</span>';
                                                        }
                                                        $out .= '</div></div></li>';
                                               

				  endwhile;
				  $out .= '</ul>';
				  echo wp_kses($out, wp_kses_allowed_html( 'post' ));
				?>
			</div>
		</div>
	</div>
</div>