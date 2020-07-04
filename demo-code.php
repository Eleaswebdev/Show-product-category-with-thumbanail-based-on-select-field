  $taxonomyName = "product_cat";
        $terms = get_terms($taxonomyName, array('parent' => 0, 'orderby' => 'slug', 'hide_empty' => false));
		$terms = get_field('associated_category');
		
       if($terms){
       	foreach ($terms as $term) {

            echo '<li><a href="' . get_term_link($term->name, $taxonomyName) . '">' . $term->name . '</a></li>';
            $thumbnail_id = get_woocommerce_term_meta($term->term_id, 'thumbnail_id', true);
	        // get the image URL for parent category
	        $image = wp_get_attachment_url($thumbnail_id);
	        // print the IMG HTML for parent category
	        $image_url = wp_get_attachment_image_src($image,'thumbnail_id');  

	        echo '<?php the_title(); ?>' ;

	        echo '<a href="'.get_term_link( $term ) .'"><img src="'.$image.'" alt="Status"></a><br>';

	        echo '<a href="' . get_term_link($term->name, $taxonomyName) . '">View all ' . $term->name . '</a>';

        }
       }
