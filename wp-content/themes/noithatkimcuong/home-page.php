<?php 
	/*
	 Template Name: HomePage
	 */	 
	 global $zController;    
     $zController->getController("/frontend","ProductController");
     ?>
     <?php get_header();     ?>
     <?php if(is_active_sidebar('slideshow-widget')):?>
        <?php dynamic_sidebar('slideshow-widget')?>
    <?php endif; ?>  
    <?php if(is_active_sidebar('contact-widget')):?>
        <?php dynamic_sidebar('contact-widget')?>
    <?php endif; ?>  
    <div class="full_dichvu margin-top-45">
    <?php if(is_active_sidebar('new-product-widget')):?>
        <?php dynamic_sidebar('new-product-widget')?>
    <?php endif; ?>    
    </div>
    <div class="container margin-top-15">           
    <?php if(is_active_sidebar('category-widget')):?>
        <?php dynamic_sidebar('category-widget')?>
    <?php endif; ?>    
    </div> 
    <div class="container margin-top-15 no-padding">
        <div class="col-lg-10">
            <div class="title-pro ">
                <h3 class="title-pro-name title-news">Tin tức - Sự kiện<span class="right-title"></span></h3>                
            </div>
            <div class="margin-top-15">
                <div class="col-lg-6 cot-trai no-padding">
                    <?php if(is_active_sidebar('hot-news-widget')):?>
                        <?php dynamic_sidebar('hot-news-widget')?>
                    <?php endif; ?>    
                </div>
                <div class="col-lg-6 cot-phai featured-article-column">
                    <?php if(is_active_sidebar('featured-article-widget')):?>
                        <?php dynamic_sidebar('featured-article-widget')?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="col-lg-2 lienhe_right pd0">
            <?php if(is_active_sidebar('contact-order-widget')):?>
                <?php dynamic_sidebar('contact-order-widget')?>
            <?php endif; ?>
        </div>
        <div class="clr"></div>
    </div> 
    <div class="container margin-top-15 partner-instruction-phongthuy">
        <div class="col-lg-4">            
            <?php if(is_active_sidebar('partner-widget')):?>
                <?php dynamic_sidebar('partner-widget')?>
            <?php endif; ?>
        </div>
        <div class="col-lg-4">            
           <?php if(is_active_sidebar('instruction-widget')):?>
                <?php dynamic_sidebar('instruction-widget')?>
            <?php endif; ?>
        </div>
        <div class="col-lg-4">
            <?php if(is_active_sidebar('phong-thuy-widget')):?>
                <?php dynamic_sidebar('phong-thuy-widget')?>
            <?php endif; ?>
        </div>
    </div>
    <?php get_footer(); ?>
    <?php wp_footer();?>
</body>
</html>