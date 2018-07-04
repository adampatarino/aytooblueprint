<footer id="footer" class="clearfix" role="contentinfo">
	
	<section class="footer-links">
		<div class="footer-links-top">
			<nav id="nav-footer">
				<?php scratch_footer_nav(); ?>
			</nav>
		</div>
		<div class="footer-links-bottom">
			<p class="copyright center">
			    &copy; <?php echo date( 'Y' ); ?>
			    <?php bloginfo( 'name' ); ?><sup>&reg;</sup>
			</p>
		</div>
	</section>
</footer>

<?php wp_footer(); ?>

</body>
</html>
