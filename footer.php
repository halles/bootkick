		</div>
	</div>

	<footer id="footer">
		<div class="wrap">
			<?php if(is_active_sidebar('footer-first-section')): ?>
			<section class="first-section">
				<?php dynamic_sidebar('footer-first-section'); ?>
			</section>
			<?php endif; ?>
			<?php if(is_active_sidebar('footer-second-section')): ?>
			<section class="second-section">
				<?php dynamic_sidebar('footer-second-section'); ?>
			</section>
			<?php endif; ?>
			<?php if(is_active_sidebar('footer-third-section')): ?>
			<section class="third-section">
				<?php dynamic_sidebar('footer-third-section'); ?>
			</section>
			<?php endif; ?>
			<section class="signature">
				<?php _e('Este sitio funciona gracias a <a href="http://www.wordpress.org/" title="WordPress">WordPress</a> y <a href="https://github.com/ZoupPowered/bootkick/" title="Bootkick™ Wordpress Theme">Bootkick™</a> Wordpress Theme :)', BootKick::$textDomain) ?>
			</section>
		</div>
	</footer>
	
	<?php wp_footer(); ?> 
</div>
</body>
</html>