<?php 
$meta_key = "_zendvn_sp_post_";
?>
<div class="container margin-top-15">
    <form  method="post"  class="frm">
        <div class="title-pro "><h3 class="title-pro-name title-product">Tìm kiếm</h3></div>
        <div class="margin-top-15 box-post">
            <?php                         
            global $zController,$zendvn_sp_settings;    
            $vHtml=new HtmlControl();
            $zController->getController("/frontend","ProductController");
            $productModel=$zController->getModel("/frontend","ProductModel");             
            // begin phân trang
            $keyword=$zController->getParams('keyword');
            $args=array( 's'=> $keyword,'post_type'=>'post' );
            $the_query=new WP_Query($args);
            $totalItemsPerPage=0;
            $pageRange=10;
            $currentPage=1; 
            if(!empty($zendvn_sp_settings["article_number"]))
                $totalItemsPerPage=$zendvn_sp_settings["article_number"];        
            if(!empty(@$_POST["filter_page"]))          
                $currentPage=@$_POST["filter_page"];  
            $productModel->setWpQuery($the_query);   
            $productModel->setPerpage($totalItemsPerPage);        
            $productModel->prepare_items();               
            $totalItems= $productModel->getTotalItems();               
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
                    ?>
                    <div class="col-md-4 box-article">
                        <div class="box-img"><center><figure><a href="<?php echo $permalink; ?>"><img width="380" height="220" src="<?php echo $featureImg; ?>"></a></figure></center></div>
                        <div class="box-article-title"><a href="<?php echo $permalink; ?>"><?php echo $title; ?></a></div>
                        <div class="box-intro"><?php echo $excerpt; ?></div>
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




