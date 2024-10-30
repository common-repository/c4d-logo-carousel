<?php 
$uid = 'c4d-wplc-'.uniqid();
?>
<script>
	(function($){
		$(document).ready(function(){
			c4dwplc['<?php echo $uid; ?>'] = <?php echo json_encode($params); ?>;
		});	
	})(jQuery);
</script>
<div class="c4d-wplc">
	<div class="c4d-wplc__slider">
		<div id="<?php echo esc_attr($uid); ?>">
			<?php 
				$cols = isset($params['group_item']) ? $params['group_item'] : 2;
				$count = 1;
				$maxCount = $q->post_count;
			?>
			<div class="item">
				<div class="item-inner">
				<?php while ( $q->have_posts() ) :
					$p = $q->the_post(); 
					global $post;
					$pid = get_the_ID();
					//$role = get_post_meta($pid, 'c4d_testimonial_role', true);
					?>
					<div class="image">
						<?php the_post_thumbnail('full', array( 'alt' => get_the_title() )); ?>
					</div>
					<?php //the_title( '<h3 class="title">', '</h3>'); ?>
					<!-- <div class="role"><?php //echo $role; ?></div> -->
					<?php the_content(); ?>
					<?php 
						// var_dump($count, $cols, $count % $cols, $maxCount);
						if ($count % $cols >= 1 && $count < $maxCount) {
							echo '</div><div class="item-inner">';
						} else if($count % $cols < 1 && $count < $maxCount) {
							echo '</div></div><div class="item"><div class="item-inner">';
						}
					?>
					<?php $count++; ?>
				<?php endwhile; // end of the loop. ?>
				</div>
			</div>
		</div>
	</div>
</div>