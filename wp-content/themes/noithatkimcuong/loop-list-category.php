<?php
if(have_posts()){
	while (have_posts()) {
		the_post();                    
        $permalink=get_the_permalink();
        $title=get_the_title();
        $excerpt=get_the_excerpt();
        $content=get_the_content( );
        $featureImg=wp_get_attachment_url(get_post_thumbnail_id());			
		echo '<h1 class="title-category">'.$title.'</h1><hr>';		
		$arrCategoryID=explode(",",$content);			
		$args = array(
	      'include' => $arrCategoryID
  		);
  		$arrCategory=get_categories($args);  	  		
  		$i=1; 
  		foreach ($arrCategory as $key => $value) {
  			$categoryLink=get_category_link($value->term_id);
  			$categoryName=$value->name;
  			$prefix_id="mp-taxonomy-category-";
  			$option_name = $prefix_id . $value->term_id;  					
			$option_value = get_option($option_name,array());
			$imageCategory=$option_value["picture"];
  			?>
  			<div class="col-sm-4">
					<div>
					<center><figure><a href="<?php echo $categoryLink; ?>"><img src="<?php echo $imageCategory ?>"></a></figure></center>
					</div>
					<div class="item-row-title-category-article"><a href="<?php echo $categoryLink; ?>" class="a_1"><?php echo $categoryName; ?></a></div>

			</div>
  			<?php
  			if($i%3==0)
	                echo '<div class="clr"></div>';
	        $i++;
  		}
	}
} ?>


		


