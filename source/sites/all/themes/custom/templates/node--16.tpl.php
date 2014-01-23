<?php
	/**
	 * @file
	 * Returns the HTML for a node.
	 *
	 * Complete documentation for this file is available online.
	 * @see https://drupal.org/node/1728164
	 */
?>
<article class="node-<?php print $node->nid; ?> <?php print $classes; ?> clearfix"<?php print $attributes; ?>>

	<?php if($title_prefix || $title_suffix || $display_submitted || $unpublished || !$page && $title): ?>
		<header>
			<?php print render($title_prefix); ?>
			<?php if(!$page && $title): ?>
				
			<?php endif; ?>
			<?php print render($title_suffix); ?>

			<?php if($display_submitted): ?>
				<p class="submitted">
					<?php print $user_picture; ?>
					<?php print $submitted; ?>
				</p>
			<?php endif; ?>

			<?php if($unpublished): ?>
				<mark class="unpublished"><?php print t('Unpublished'); ?></mark>
			<?php endif; ?>
		</header>
	<?php endif; ?>


		<div class="inner_column top">
			<div class="wrapper">
				<div class="left">
					<?php print $node->field_column_a['und'][0]['value']; ?>
					<!--Much of the time we’re afraid to reach out.  We worry it’s a sign of inner weakness, that somehow we’re letting others down.  But quite the opposite is true.  If we spend time on our own emotional wellbeing, we’re in a better position to help others.  And that’s not a sign of weakness; that shows we’re committed and compassionate human beings. You don’t have to push on and on until breaking point.-->
				</div>
				<div class="right">
					<?php print $node->field_column_b['und'][0]['value']; ?>
					<!--Whether you need healing as a result of trauma, or developmental workshops because you’re leading a team, reach out to Eximia – because that’s what we’re here for.-->
				</div>
				<div style="clear: both;"></div>
			</div>
		</div>
		
		<div class="inner_column bottom">
			<div class="wrapper">
				<div class="col-1">
					<?php print theme_image(array('attributes' => array(), 'path' => file_create_url($node->field_contact_map['und'][0]['uri']))); ?>
					<!--<img src="/sites/all/themes/custom/images/contact_map.png" />-->
				</div>
				<div class="col-2">
					<h1>VISIT US AT</h1>
					<?php print $node->field_visit_us_at['und'][0]['value']; ?>
					<!--<p>
						24 Grosvenor Square,
						<br />
						W1A 2LQ
						<br />
						London
					</p>-->
					
					<h1>CALL US ON</h1>
					<?php print $node->field_call_us_on['und'][0]['value']; ?>
					<!--<p>
						(0) 778 574 5896
						<br />
						(0) 778 574 5896
					</p>-->
				</div>
				<div class="col-3">
					<h1>EMAIL US</h1>
					<?php print $node->field_email_us['und'][0]['value']; ?>
					<!--<p>
						practice@eximi
					</p>-->
					
					<h1>FOLLOW US</h1>
					<?php print $node->field_follow_us['und'][0]['value']; ?>
					<!--<p>
						twitter @eximia
					</p>-->
				</div>
				<div class="col-4">
					<?php
						//<!--Invoke the contact form block-->
						$block = block_load('webform', 'client-block-5');
						$block = array($block);
						$render_blocks = _block_render_blocks(
							$block
						);
						$renderable_array = _block_get_renderable_array(
							$render_blocks
						);
						$rendered_block = drupal_render(
							$renderable_array
						);
						print $rendered_block;
					?>
				</div>
				<div style="clear: both;"></div>
			</div>
			
		</div>

	

	<?php
		// We hide the comments and links now so that we can render them later.
		hide($content['comments']);
		hide($content['links']);
		print render($content);
	?>

	<?php print render($content['links']); ?>

	<?php print render($content['comments']); ?>

</article>