<div class="container margin-top-15">
    <form  method="post"  class="frm">
        <div class="title-pro "><h3 class="title-pro-name title-product"><?php single_cat_title(); ?></h3></div>
        <div class="margin-top-15 box-post">
            <?php              
            $meta_key = "_zendvn_sp_zaproduct_";                   
            global $zController,$zendvn_sp_settings;    
            $vHtml=new HtmlControl();
            $zController->getController("/frontend","ProductController");
            $productModel=$zController->getModel("/frontend","ProductModel"); 
            /* begin load config contact */
            $width=$zendvn_sp_settings["product_width"];    
            $height=$zendvn_sp_settings["product_height"];      
            $contacted_phone=$zendvn_sp_settings['contacted_phone'];
            $email_to=$zendvn_sp_settings['email_to'];
            $address=$zendvn_sp_settings['address'];
            $to_name=$zendvn_sp_settings['to_name'];
            $telephone=$zendvn_sp_settings['telephone'];
            $website=$zendvn_sp_settings['website'];
            $opened_time=$zendvn_sp_settings['opened_time'];
            $opened_date=$zendvn_sp_settings['opened_date'];
            $contaced_name=$zendvn_sp_settings['contacted_name'];
            $product_number=$zendvn_sp_settings["product_number"];
            /* end load config contact */
            /* begin load term */
            $terms = get_terms( array(
              'taxonomy' => 'za_category',
              'hide_empty' => false,  ) );  
            /* end load term */            
            $the_query=$wp_query;

            // begin phân trang
            $totalItemsPerPage=0;
            $pageRange=10;
            $currentPage=1; 
            if(!empty($zendvn_sp_settings["product_number"]))
                $totalItemsPerPage=$product_number;        
            if(!empty(@$_POST["filter_page"]))          
                $currentPage=@$_POST["filter_page"];  
            $productModel->setWpQuery($the_query);   
            $productModel->setPerpage($totalItemsPerPage);        
            $productModel->prepare_items();               
            $totalItems= $productModel->getTotalItems();   
            $the_query=$productModel->getItems();                
            $arrPagination=array(
              "totalItems"=>$totalItems,
              "totalItemsPerPage"=>$totalItemsPerPage,
              "pageRange"=>$pageRange,
              "currentPage"=>$currentPage   
            );    
            $pagination=$zController->getPagination("Pagination",$arrPagination);                
            if($the_query->have_posts()){
                $k=1;
                while ($the_query->have_posts()) {
                    $the_query->the_post();                            
                    $post_id=$the_query->post->ID;                                             
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
        <div class="clr"></div>
        <?php echo $pagination->showPagination();            ?>
        <input type="hidden" name="filter_page" value="1" /> 
    </form>    
</div>





