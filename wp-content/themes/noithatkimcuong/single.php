<?php 
     global $zController;
     $zController->getController("/frontend","ProductController"); 
?>
<?php get_header();?>
<?php get_template_part("loop","single"); ?>
<?php get_footer(); ?>
<?php wp_footer();?>
</body>
</html>