<?php 
$meta_key = "_zendvn_sp_zaproduct_";                   
global $zController,$zendvn_sp_settings;    
$vHtml=new HtmlControl();
$zController->getController("/frontend","ProductController");
$productModel=$zController->getModel("/frontend","ProductModel"); 
/* begin load config contact */
$width=$zendvn_sp_settings["product_width"];    
$height=$zendvn_sp_settings["product_height"];    
$width_thumbnail=$width/5;
$height_thumbnail=$height/5;  
$contacted_phone=$zendvn_sp_settings['contacted_phone'];
$email_to=$zendvn_sp_settings['email_to'];
$address=$zendvn_sp_settings['address'];
$to_name=$zendvn_sp_settings['to_name'];
$telephone=$zendvn_sp_settings['telephone'];
$website=$zendvn_sp_settings['website'];
$opened_time=$zendvn_sp_settings['opened_time'];
$opened_date=$zendvn_sp_settings['opened_date'];
$contaced_name=$zendvn_sp_settings['contacted_name'];
/* end load config contact */
$the_query=$wp_query;
$post_id=0;
if($the_query->have_posts()){
    while ($the_query->have_posts()) {
        $the_query->the_post();                            
        $post_id=$the_query->post->ID;                                             
        $permalink=get_the_permalink($post_id);                    
        $title=get_the_title($post_id);                    
        $excerpt='';
        $excerpt=get_post_meta($post_id,$meta_key."intro",true);   
        $excerpt=substr($excerpt, 0,250) . '...';                 
        $content=get_the_content($post_id);        
        $arrPicture=array();
        $featureImg=wp_get_attachment_url(get_post_thumbnail_id($post_id));        
        $featureImg=$vHtml->getFileName($featureImg);
        $small_img=$width.'x'.$height.'-'.$featureImg;                    
        $small_img=site_url( '/wp-content/uploads/'.$small_img, null ) ; 
        $large_img=site_url( '/wp-content/uploads/'.$featureImg, null ) ; 
        $term = wp_get_object_terms( $post_id,  'za_category' );                    
        $term_name=$term[0]->name;
        $intro=get_post_meta( $post_id, $meta_key . 'intro', true );
        $price=get_post_meta( $post_id, $meta_key . 'price', true );
        $sale_price=get_post_meta( $post_id, $meta_key . 'sale_price', true );        
        if(!empty($price)){
            $price =$vHtml->fnPrice($price);
        }
        else{
            $price =0;
        }
        if(!empty($sale_price)){
            $sale_price =$vHtml->fnPrice($sale_price);        
        }
        else{
            $sale_price =0;        
        }
        $arrPicture = get_post_meta($post_id, $meta_key . 'img-url', true);
        $arrPicture[]=$large_img;         
        $count_view_post=get_post_meta( $post_id, $meta_key . 'count_view_post', true );           
        $count  =   0;
        $count  =   (int)$count_view_post;                
        $count++;        
        update_post_meta($post_id, $meta_key . 'count_view_post', $count);
        ?>
        <div class="container margin-top-15">
            <div class="title-pro "><h3 class="title-pro-name title-product"><?php echo $title; ?></h3></div>
            <div class="margin-top-15">
                <div class="col-lg-4 no-padding">
                    <div class="box-img" id="image-detail"><img id="zoom_01" src="<?php echo $small_img; ?>" data-zoom-image="<?php echo $large_img; ?>"></div>
                    <div class="thumbnails">
                        <script type="text/javascript" language="javascript">
                            jQuery(document).ready(function(){
                                jQuery(".owl-carousel").owlCarousel({
                                    autoplay:true,
                                    loop:true,
                                    margin:2,
                                    nav:true,
                                    responsive:{
                                        1000:{
                                            items:5
                                        },
                                        600:{
                                            items:1
                                        }                                
                                    }
                                })
                            });
                        </script> 
                        <section class="slider">
                            <div class="owl-carousel owl-theme">
                                <?php 
                                if(count($arrPicture) > 0){
                                    for($i=0;$i<count($arrPicture);$i++){
                                        $thumbnail_img=$arrPicture[$i];
                                        $image_name=$vHtml->getFileName($thumbnail_img);      
                                        $small_thumbnail=$width.'x'.$height.'-'.$image_name;                    
                                        $small_thumbnail=site_url( '/wp-content/uploads/'.$small_thumbnail, null ) ;
                                        $large_thumbnail=site_url( '/wp-content/uploads/'.$image_name, null ) ;                                     
                                        ?>
                                        <div class="items"><a href="javascript:void(0)" onclick="changeImage('<?php echo $small_thumbnail; ?>','<?php echo $large_thumbnail; ?>');"><img  src="<?php echo $small_thumbnail; ?>" width="<?php echo $width_thumbnail; ?>" height="<?php echo $height_thumbnail; ?>" /></a></div>
                                        <?php                                    
                                    }
                                }                            
                                ?>         
                            </div>
                        </section>                                                                                
                        <div class="clr"></div>
                    </div>
                </div>
                <div class="col-lg-8 no-padding-right">
                    <div class="product-detail">
                        <h1 class="product-name"><?php echo $title; ?></h1>
                        <div class="product-regular-price"><b>Giá gốc:&nbsp;</b><span><font color="#F00"><?php echo $price ?> đ</font></span></div>
                        <div class="product-sale-price"><span class="sale-title">Giá khuyến mãi:&nbsp;</span><span class="sale-price"><?php echo $sale_price; ?> đ</span></div>
                        <div class="product-view"><span class="sale-title">Lượt xem:&nbsp;</span><span class="sale-price"><?php echo $count; ?></span></div>
                        <div class="product-hotline">Hotline: <?php echo $contacted_phone; ?></div>
                        <div class="product-detail-small"><?php echo $intro; ?></div>
                    </div>
                </div>
            </div>    
            <div class="clr"></div>
            <div class="information">
                <div class="information-pane">Thông tin chi tiết</div>
                <div class="clr"></div>
                <div class="information-bg">
                    <?php echo $content; ?>
                </div>
            </div>
        </div>
        <?php
    }
    wp_reset_postdata();  
}
?>
<script type="text/javascript" language="javascript">
   function changeImage(small_thumbnail,large_thumbnail){    
    var image_detail=jQuery("#image-detail");
    var imghtml='<img id="zoom_01" src="'+small_thumbnail+'" data-zoom-image="'+large_thumbnail+'">';        
    jQuery(image_detail).empty();
    jQuery(image_detail).append(imghtml);
    jQuery('#zoom_01').elevateZoom({
        zoomType: "inner",
        cursor: "crosshair",
        zoomWindowFadeIn: 500,
        zoomWindowFadeOut: 750
    });
}
</script>
<script language="javascript" type="text/javascript">
    jQuery('#zoom_01').elevateZoom({
        zoomType: "inner",
        cursor: "crosshair",
        zoomWindowFadeIn: 500,
        zoomWindowFadeOut: 750
    });
</script>
<div class="container margin-top-15">
    <div class="title-pro "><h3 class="title-pro-name title-product">Sản phẩm liên quan</h3></div>
    <div class="margin-top-15 box-post">
        <?php 
        $args = array(
            'post_type' => 'zaproduct',  
            'orderby' => 'date',
            'order'   => 'DESC',  
            'posts_per_page' => 6,        
            'post__not_in'=>array($post_id),
            'tax_query' => array(
                array(
                    'taxonomy' => 'za_category',
                    'field'    => 'slug',
                    'terms'    => 'ban-sofa',
                ),
            ),
        );
        $the_query_2=new WP_Query($args);
        if($the_query_2->have_posts()){
            $k=1;
            while ($the_query_2->have_posts()) {
                $the_query_2->the_post();                            
                $post_id=$the_query_2->post->ID;                                             
                $permalink=get_the_permalink($post_id);                    
                $title=get_the_title($post_id);                    
                $excerpt='';
                $excerpt=get_post_meta($post_id,$meta_key."intro",true);   
                $excerpt=substr($excerpt, 0,250) . '...';                 
                $content=get_the_content($post_id);        
                $featureImg=wp_get_attachment_url(get_post_thumbnail_id($post_id));
                $featureImg=$vHtml->getFileName($featureImg);
                $featureImg=$width.'x'.$height.'-'.$featureImg;                    
                $featureImg=site_url( '/wp-content/uploads/'.$featureImg, null ) ; 
                $term = wp_get_object_terms( $post_id,  'za_category' );                    
                $term_name=$term[0]->name;
                $price=get_post_meta( $post_id, $meta_key . 'price', true );
                $sale_price=get_post_meta( $post_id, $meta_key . 'sale_price', true );        
                if(empty($price)){
                    $price='Liên hệ';
                }else{
                    $price ='<span class="price-regular">'.$vHtml->fnPrice($price).' đ</span>';
                }
                if(empty($sale_price)){
                    $sale_price='Liên hệ';
                }else{
                    $sale_price=$vHtml->fnPrice($sale_price) . ' đ';
                }
                ?>
                <div class="col-md-4 box-product">
                    <div class="box-img"><figure><center><a href="<?php echo $permalink; ?>"><img src="<?php echo $featureImg; ?>" /></a></center></figure></div>
                    <div class="box-title"><a href="<?php echo $permalink; ?>"><?php echo $title; ?></a></div>
                    <div class="box-price">
                        <span class="box-contact">Giá gốc:</span>
                        <span class="box-phone"><?php echo $price; ?></span>
                    </div>
                    <div class="box-price">
                            <span class="box-contact">Giá khuyến mãi:</span>
                            <span class="box-phone"><?php echo $sale_price; ?></span>
                        </div>
                    <div class="box-detail">
                        <div class="col-md-8 no-padding">
                            <span class="box-contact">Liên hệ:</span>
                            <span class="box-phone"><?php echo $contacted_phone; ?></span>
                        </div>
                        <div class="col-md-4" ><a href="<?php echo $permalink; ?>">Chi tiết</a></div>
                        <div class="clr"></div>
                    </div>
                    <div class="box-category-product">
                        <span class="box-contact">Thuộc danh mục:</span>
                        <span class="box-phone"><?php echo $term_name; ?></span>
                    </div>
                </div>
                <?php
                if($k%3 ==0){
                    echo '<div class="clr"></div>';
                }
                $k++;
            }
            wp_reset_postdata();                 
        }
        ?>
    </div>
</div>