<?php 
/*
 Template Name: page_list_category
*/
	global $zController;
    $zController->getController("/frontend","ProductController"); 
?>
<?php get_header();?>
<div class="container index-slot">
    <div class="col-md-9">
    <!-- begin loop -->
    	<?php get_template_part("loop","list-category"); ?>
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