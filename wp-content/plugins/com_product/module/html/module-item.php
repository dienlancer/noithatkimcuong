<?php 
global $zController,$zendvn_sp_settings;
$vHtml=new HtmlControl();
$zController->getController("/frontend","ProductController"); 
$contacted_phone=$zendvn_sp_settings['contacted_phone'];
$email_to=$zendvn_sp_settings['email_to'];
$address=$zendvn_sp_settings['address'];
$to_name=$zendvn_sp_settings['to_name'];
$telephone=$zendvn_sp_settings['telephone'];
$website=$zendvn_sp_settings['website'];
$opened_time=$zendvn_sp_settings['opened_time'];
$opened_date=$zendvn_sp_settings['opened_date'];
$contacted_name=$zendvn_sp_settings['contacted_name'];
$post_meta_key = "_zendvn_sp_post_";
$page_meta_key = "_zendvn_sp_page_";
if(!empty($instance['item_id'])){
	$arrItemID=explode(",",$instance["item_id"]);
	if(count($arrItemID) > 0){
		if($instance["status"]=='active'){		
			switch ($instance["position"]) {
				case 'contact-widget':       
				echo '<div class="container">';             
				$args = array(
					'post__in'         => $arrItemID, 
					'post_type' => 'page'
				);
				$query = new WP_Query($args);         
				if($query->have_posts()){
					while ($query->have_posts()) {
						$query->the_post();      
						$post_id=$query->post->ID;                       
						$permalink=get_the_permalink($post_id);
						$title=get_the_title($post_id);
						$excerpt=get_post_meta($post_id,$page_meta_key."intro",true);
						$featureImg=wp_get_attachment_url(get_post_thumbnail_id($post_id));             
						?>
						<div class="row">
							<div class="col-sm-4"><center><img src="<?php echo $featureImg; ?>" /></center>
							</div>
							<div class="col-sm-8 ttuser">            
								<div><span class="dc-dt-gmc">Địa chỉ:</span> <?php echo $address; ?></div>
								<div><span class="dc-dt-gmc">Điện thoại:</span> <font color="#FF0000"><?php echo $contacted_phone; ?></font>  <b><?php echo $contacted_name; ?></b></div>
								<div><span class="dc-dt-gmc">Giờ mở cửa:</span> <b><font color="#006400"><?php echo $opened_time; ?></font></b> <?php echo $opened_date; ?></div>
								<div>
									<?php echo substr($excerpt, 0,250) . '...'  ; ?>
									<a href="<?php echo $permalink; ?>" class="readmore"><i class="fa fa-angle-double-right" aria-hidden="true"></i>&nbsp;Xem thêm</a>                            
								</div>
							</div>        
							<?php
						}
					}  
					wp_reset_postdata();    
					?>        
				</div>          
				<?php
				echo '</div>';    
				break;	
				case "hot-news-widget":	
				$args = array(
					'post__in' => $arrItemID,
					'post_type' => 'post'
				);			 
				$query = new WP_Query($args);		
				if($query->have_posts()){
					while ($query->have_posts()) {
						$query->the_post();		
						$post_id=$query->post->ID;							
						$permalink=get_the_permalink($post_id);
						$title=get_the_title($post_id);
						$excerpt=get_post_meta($post_id,$post_meta_key."intro",true);
						$featureImg=wp_get_attachment_url(get_post_thumbnail_id($post_id));		   
						$featureImg=$vHtml->getFileName($featureImg);
						$featureImg=site_url('/wp-content/uploads/'.$featureImg ,null );  
						?>
						<center><a title="" href="<?php echo $permalink; ?>"><img src="<?php echo $featureImg; ?>" alt=""></a></center>
						<div><h3> <a title="" href="<?php echo $permalink; ?>"><?php echo $title; ?></a></h3></div>
						<div><?php echo substr($excerpt, 0,250) . '...'; ?></div>
						<?php
					}
					wp_reset_postdata();  
				}
				break;		
				case "featured-article-widget":		
				?>
				<script type="text/javascript">
					(function($) {
						$(function() {
							$("#scroller").simplyScroll({orientation:'vertical',customClass:'vert'});
						});
					})(jQuery);
				</script>		
				<ul id="scroller">
					<?php
					$args = array(
						'post__in' => $arrItemID,
						'post_type' => 'post'
					);			 
					$query = new WP_Query($args);		
					if($query->have_posts()){
						while ($query->have_posts()) {
							$query->the_post();		
							$post_id=$query->post->ID;							
							$permalink=get_the_permalink($post_id);
							$title=get_the_title($post_id);
							$excerpt=get_post_meta($post_id,$post_meta_key."intro",true);
							$featureImg=wp_get_attachment_url(get_post_thumbnail_id($post_id));		   
							$featureImg=$vHtml->getFileName($featureImg);
							$featureImg=site_url('/wp-content/uploads/'.$featureImg ,null );  
							?>
							<li>
								<div class="col-md-4 scroller-column-left"><img src="<?php echo $featureImg; ?>" /></div>
								<div class="col-md-8 scroller-column-right">
									<h3><a href="<?php echo $permalink; ?>" title="Không gian mở phòng khách liên thông với phòng bếp ăn"><?php echo $title; ?></a></h3>
									<div><?php echo substr($excerpt, 0,250) . '...'; ?>
									</div>
								</div>
							</li>    
							<?php
						}
						wp_reset_postdata();  
					}
					?>			
				</ul>
				<?php
				break;	
				case 'partner-widget':
				?>
				<script type="text/javascript" language="javascript">
					jQuery(document).ready(function(){
						jQuery('.bx_doitac').bxSlider({
							slideWidth: 362,
							minSlides: 1,
							maxSlides: 1,
							slideMargin: 10,
							pager:false,
						});
					});
				</script>	
				<div class="box_doitac margin-top-15"> 
					<div class="bx-wrapper"><div class="bx-viewport" aria-live="polite" ><ul class="bx_doitac" >
						<?php 
						$args = array(
							'post__in'         => $arrItemID, 
							'post_type' => 'post'
						);
						$query = new WP_Query($args);         
						if($query->have_posts()){
							while ($query->have_posts()) {
								$query->the_post();      
								$post_id=$query->post->ID;                       
								$permalink=get_the_permalink($post_id);
								$title=get_the_title($post_id);
								$excerpt=get_post_meta($post_id,$post_meta_key."intro",true);
								$featureImg=wp_get_attachment_url(get_post_thumbnail_id($post_id));             
								?>
								<li>                            
									<center><img src="<?php echo $featureImg; ?>" alt="" /></center>					
								</li>      
								<?php
							}
						}  
						wp_reset_postdata();   
						?>
						
					</ul>
				</div><div class="bx-controls bx-has-controls-direction"></div></div>              
			</div>
			<?php
			break;	
			case 'instruction-widget':
			?>
			<script type="text/javascript">
				(function($) {
					$(function() {
						$("#scroller-congtrinh").simplyScroll({orientation:'vertical',customClass:'vert'});
					});
				})(jQuery);
			</script>
			<div class="margin-top-15 cong-trinh"> 
				<ul id="scroller-congtrinh">
					<?php 
					$args = array(
						'post__in' => $arrItemID,
						'post_type' => 'post'
					);			 
					$query = new WP_Query($args);		
					if($query->have_posts()){
						while ($query->have_posts()) {
							$query->the_post();		
							$post_id=$query->post->ID;							
							$permalink=get_the_permalink($post_id);
							$title=get_the_title($post_id);
							$excerpt=get_post_meta($post_id,$post_meta_key."intro",true);
							$featureImg=wp_get_attachment_url(get_post_thumbnail_id($post_id));		   
							$featureImg=$vHtml->getFileName($featureImg);
							$featureImg=site_url('/wp-content/uploads/'.$featureImg ,null );  
							?>
							<li>
								<div><center><img src="<?php echo $featureImg; ?>" alt="coteccons" /></center></div>
								<div class="cong-trinh-title"><a href="<?php echo $permalink; ?>"><?php echo $title; ?></a></div>
							</li>
							<?php
						}
						wp_reset_postdata();  
					}
					?>		
				</ul>
			</div>
			<?php
			break;
			case 'phong-thuy-widget':
			?>
			<div class="margin-top-15 phongthuy-news">
				<script type="text/javascript">
					(function($) {
						$(function() {
							$("#scrollerphongthuy").simplyScroll({orientation:'vertical',customClass:'vert'});
						});
					})(jQuery);
				</script>
				<ul id="scrollerphongthuy">
					<?php
					$args = array(
						'post__in' => $arrItemID,
						'post_type' => 'post'
					);			 
					$query = new WP_Query($args);		
					if($query->have_posts()){
						while ($query->have_posts()) {
							$query->the_post();		
							$post_id=$query->post->ID;							
							$permalink=get_the_permalink($post_id);
							$title=get_the_title($post_id);
							$excerpt=get_post_meta($post_id,$post_meta_key."intro",true);
							$featureImg=wp_get_attachment_url(get_post_thumbnail_id($post_id));		   
							$featureImg=$vHtml->getFileName($featureImg);
							$featureImg=site_url('/wp-content/uploads/'.$featureImg ,null );  
							?>
							<li>
								<div class="col-md-4 scroller-column-left"><img src="<?php echo $featureImg; ?>" /></div>
								<div class="col-md-8 scroller-column-right">
									<h3><a href="<?php echo $permalink; ?>" title="<?php echo $title; ?>"><?php echo $title; ?></a></h3>
									<div><?php echo substr($excerpt, 0,250) . '...'; ?>
									</div>
								</div>
							</li>    
							<?php
						}
						wp_reset_postdata();  
					}
					?>		
				</ul>
			</div>
			<?php
			break;
			case "new-product-widget":				
		?>		
		<script type="text/javascript" language="javascript">
			jQuery(document).ready(function(){
				jQuery(".owl-carousel").owlCarousel({
					autoplay:true,
					loop:true,
					margin:10,
					responsiveClass:true,
					responsive:{
						0:{
							items:1,
							nav:true
						},
						600:{
							items:3,
							nav:false
						},
						1000:{
							items:3,
							nav:true,
							loop:false
						}
					}
				})
			});
		</script>			
		<div class="container margin-top-15">
			<section class="slider">
				<div class="owl-carousel owl-theme">
					<?php						
					$args = array(
						'post__in' => $arrItemID,
						'post_type' => 'zaproduct'
					);			 
					$query = new WP_Query($args);		
					if($query->have_posts()){
						while ($query->have_posts()) {
							$query->the_post();		
							$post_id=$query->post->ID;							
							$permalink=get_the_permalink($post_id);
							$title=get_the_title($post_id);
							$excerpt=get_post_meta($post_id,$post_meta_key."intro",true);
							$featureImg=wp_get_attachment_url(get_post_thumbnail_id($post_id));		   
							$featureImg=$vHtml->getFileName($featureImg);
							$featureImg=site_url('/wp-content/uploads/'.$featureImg ,null );  
							?>
							<div class="items">
								<img src="<?php echo $featureImg; ?>" alt="" />                            
							</div>
							<?php
						}
						wp_reset_postdata();  
					}
					?>					
				</div>
			</section>
		</div>    		
		<?php		
		break;		
		}
	}
}	
}
?>






