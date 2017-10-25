<footer class="footer margin-top-15">
	<div class="container">
		<div class="col-md-8 user-footer">
			<?php if(is_active_sidebar('slogan-widget')):?>
				<?php dynamic_sidebar('slogan-widget')?>
			<?php endif; ?>
		</div>
		<div class="col-md-4 padding-top-15">
			<?php if(is_active_sidebar('facebook-fanpage-widget')):?>
				<?php dynamic_sidebar('facebook-fanpage-widget')?>
			<?php endif; ?>
		</div>				
	</div>
</footer>
<div class="footer-bottom">
	<?php if(is_active_sidebar('copy-right-widget')):?>
		<?php dynamic_sidebar('copy-right-widget')?>
	<?php endif; ?>
	
</div>