<?php get_header();?>
<div class="container index-slot">
    <div class="col-md-9">
    <!-- begin loop -->    
    <?php 
	global $zController; 
    $pageIDLoginCheckout = $zController->getHelper('GetPageId')->get('_wp_page_template','login-checkout.php'); 
    $pageIDzcart = $zController->getHelper('GetPageId')->get('_wp_page_template','zcart.php');    
    $permarlinkLoginCheckout = get_permalink($pageIDLoginCheckout);            
    $permarlinkZCart = get_permalink($pageIDzcart);
    $ssValueUser="userlogin";
    $ssValueCart="zcart";
    $ssUser       = $zController->getSession('SessionHelper',"vmuser",$ssValueUser);
    $ssCart        = $zController->getSession('SessionHelper',"vmart",$ssValueCart);    
    $arrUser = @$ssUser->get($ssValueUser)["userInfo"]; 
    $arrCart = $ssCart->get($ssValueCart)["cart"];     
    $result=true;      
    if(count($arrUser) == 0)        {
        wp_redirect($permarlinkLoginCheckout); 
        $result=false;
    }           
    if(count($arrCart) == 0){        
        wp_redirect($permarlinkZCart);
        $result=false;
    }	
    if($result==true){
        $ssValueCart="zcart";
        $ssCart        = $zController->getSession('SessionHelper',"vmart",$ssValueCart);     
        $ssCart->reset();   
    }	
    ?>
    <div class="comproduct35">Thanh toán thành công</div>
	<!-- end loop -->
    </div>
    <div class="col-md-3">
    	<?php require_once get_template_directory() . DS . "sidebar.php"; ?>
    </div>     
</div>
<?php get_footer(); ?>
<?php wp_footer();?>
</body>
</html>