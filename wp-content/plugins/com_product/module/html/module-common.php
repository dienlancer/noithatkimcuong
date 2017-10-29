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
$contaced_name=$zendvn_sp_settings['contacted_name'];
$facebook_url=$zendvn_sp_settings['facebook_url'];
$twitter_url=$zendvn_sp_settings['twitter_url'];
$google_plus=$zendvn_sp_settings['google_plus'];
$youtube_url=$zendvn_sp_settings['youtube_url'];
if($instance["status"]=='active'){
	switch ($instance["position"]) {
		case 'search-widget':	
		$page_id_search = $zController->getHelper('GetPageId')->get('_wp_page_template','search.php');  
		$search_link = get_permalink($page_id_search);	
		?>
		<div class="box_search">
			<div class="inner">
				
				<form action="<?php echo $search_link; ?>" method="get" name="frm_search" id="frm_search" onsubmit="return false;">
					<input type="text" id="search_input" name="keyword" onkeypress="doEnter(event)" value="Nhập từ khóa..." onblur="if(this.value=='') this.value='Nhập từ khóa...'" onfocus="if(this.value =='Nhập từ khóa...') this.value=''">
					
					
					<div class="img_search">
						<a href="javascript:void(0);" id="tnSearch" name="searchAct" onclick="$(this).closest('form').submit()"><i class="fa fa-search" aria-hidden="true"></i></a>
					</div>
					
					
				</form>     
				
				<script type="text/javascript">
					jQuery(function(){
						jQuery('#tnSearch').click(function(evt){
							onSearch(evt);
						});
					});
					function onSearch(evt){
						var keyword = document.frm_search.keyword;
						if( keyword.value == '' || keyword.value ==='Nhập từ khóa...'){alert('Bạn chưa nhập từ khóa'); keyword.focus(); return false;}
						location.href='index.php?com=tim-kiem&keyword='+keyword.value; 
					}
					
					function doEnter(evt){
						
						var key;
						if(evt.keyCode == 13 || evt.which == 13){
							onSearch(evt);
						}else{
							return false; 
						}
					}
				</script>
				
			</div>
		</div>
		<?php		
		break;
		case 'slideshow-widget':
		$bannerModel=$zController->getModel("/frontend","BannerModel"); 
		$lstbanner=$bannerModel->getListBanner();
		?>
		<div id="wrapper">
			<div class="slider-wrapper theme-default">
				<div id="slider" class="nivoSlider"> 
					<?php 
					for($i=0 ; $i < count($lstbanner) ; $i++ ){
						$banner=site_url('/wp-content/uploads/'.$lstbanner[$i]['picture']);
						?>
						<img src="<?php echo $banner; ?>" data-thumb="<?php echo $banner; ?>" alt="" />     
						<?php
					} 
					?>

				</div>
				<div id="htmlcaption" class="nivo-html-caption"> <strong>This</strong> is an example of a <em>HTML</em> caption with <a href="#">a link</a>. </div>
			</div>
		</div>
		<script type="text/javascript">
			jQuery(document).ready(function(){
				jQuery('#slider').nivoSlider();
			});    
		</script>
		<script type="text/javascript">

			var _gaq = _gaq || [];
			_gaq.push(['_setAccount', 'UA-36251023-1']);
			_gaq.push(['_setDomainName', 'jqueryscript.net']);
			_gaq.push(['_trackPageview']);

			(function() {
				var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
				ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
				var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
			})();

		</script>
		<?php
		break;
		case 'category-widget':		
		$terms = get_terms( array(
                          'taxonomy' => 'za_category',
                          'hide_empty' => false,  ) );	
        $contacted_phone= $zendvn_sp_settings["contacted_phone"];        
		?>					
		<div class="product">
			<?php 
			$k=1;
			for($i=0;$i<count($terms);$i++){
				$term_id=$terms[$i]->term_id;
				$term_name=$terms[$i]->name;					
				$term_link=get_term_link($terms[$i],'za_category');								
				$option_name 	= 'zendvn-sp-zacategory-' . $term_id;
				$option_value	= get_option($option_name);						
				$term_img=$option_value['picture'];
				$term_img=$vHtml->getFileName($term_img);
				$term_img=site_url('/wp-content/uploads/'.$term_img ,null );
				?>
				<div class="col-sm-4 box-product">
					<div class="box-img"><figure><center><a href="<?php echo $term_link; ?>"><img src="<?php echo $term_img; ?>" /></a></center></figure></div>
					<div class="box-title"><a href="<?php echo $term_link; ?>"><?php echo $term_name; ?></a></div>
					<div class="box-detail">
						<div class="col-xs-8 no-padding">
							<span class="box-contact">Liên hệ: </span>
							<span class="box-phone"><?php echo $contacted_phone; ?></span>
						</div>
						<div class="col-xs-4" ><a href="<?php echo $term_link; ?>">Chi tiết</a></div>
						<div class="clr"></div>
					</div>
				</div>
				<?php
				if($k%3 ==0){
					echo '<div class="clr"></div>';
				}
				$k++;
			}
			?>		
		</div>					
		<?php
		break;
		case 'contact-order-widget':		
		?>
		<div class="lienhe_trong">
				<div class="title_dathang"><h3>Liên hệ đặt hàng</h3></div>
				<div class="holine_r">Hotline:<div class="clr"></div><span><?php echo $contacted_phone; ?></span></div>
				<div class="clr"></div>
				<div class="dienthoai_r">Điện thoại:<div class="clr"></div><span></span></div>
				<div class="clr"></div>
				<div class="email_r"><img src="<?php echo site_url( '/wp-content/uploads/icon_mail.png', null ) ?>" alt="<?php echo $to_name; ?>"> Email:<div class="clr"></div><span><?php echo $email_to; ?></span></div>
				<div class="showrooml_r"> Showroom: <span><?php echo $address; ?></span></div>
				<div class="title_thoigianlv"><h3>Thời gian làm việc</h3></div>
				<div class="thoigianlv">	</div>
				<div class="clr"></div>
			</div>
		<?php
		break;
		case 'slogan-widget':
		?>
			<p><?php echo $to_name; ?></p>
			<p>Địa chỉ: <?php echo $address; ?></p>
			<p>Website: <?php echo $website; ?></p>
			<p>E-mail: <?php echo $email_to; ?></p>
			<p>Tel: <?php echo $telephone; ?></p>
		<?php
		break;
		case 'user-top-widget':
		?>
		<div class="top_bn1">
		<div class="container">
			<div class="mxh_top">
				Email: <?php echo $email_to; ?>  &nbsp;|&nbsp; Hotline: <?php echo $contacted_phone; ?> &nbsp;&nbsp;&nbsp;&nbsp;
				<a href="<?php echo $facebook_url; ?>" target="_blank"><img src="<?php echo site_url('/wp-content/uploads/facebook.png',null) ?>" alt="Facebook"></a>
				<a href="<?php echo $twitter_url; ?>" 	target="_blank"><img src="<?php echo site_url('/wp-content/uploads/twitter.png',null); ?>" alt="Google"></a>
				<a href="<?php echo $google_plus; ?>" 	target="_blank"><img src="<?php echo site_url('/wp-content/uploads/google.png',null); ?>" alt="Tiwter"></a>
				<a href="<?php echo $youtube_url; ?>" 	target="_blank"><img src="<?php echo site_url('/wp-content/uploads/youtube.png',null); ?>" alt="RSS"></a>
			</div>
			<div class="clr"></div>
		</div>
	</div>       
		<?php
		break;
	}
}		
?>
