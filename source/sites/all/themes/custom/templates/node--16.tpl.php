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
					<?php if(isset($node->field_column_a['und'][0]['value'])) : ?>
					<?php print $node->field_column_a['und'][0]['value']; ?>
					<?php endif; ?>
				</div>
				<div class="right">
					<?php if(isset($node->field_column_b['und'][0]['value'])) : ?>
					<?php print $node->field_column_b['und'][0]['value']; ?>
					<?php endif; ?>
				</div>
				<div style="clear: both;"></div>
			</div>
		</div>
		
		<div class="inner_column bottom">
			<div class="wrapper">
				<div class="col-1">
					<?php print $node->field_gmap['und'][0]['value']; ?>
                </div>
				<div class="col-2">
					<?php if(isset($node->field_visit_us_at['und'][0]['value'])) : ?>
					<h1>VISIT US AT</h1>
					<?php print $node->field_visit_us_at['und'][0]['value']; ?>
					<?php endif; ?>
					<?php if(isset($node->field_call_us_on['und'][0]['value'])) : ?>
					<h1>CALL US ON</h1>
					<?php print $node->field_call_us_on['und'][0]['value']; ?>
					<?php endif; ?>
				</div>
				<div class="col-3">
					<?php if(isset($node->field_email_us['und'][0]['value'])) : ?>
					<h1>EMAIL US</h1>
					<?php print $node->field_email_us['und'][0]['value']; ?>
					<?php endif; ?>
					<?php if(isset($node->field_follow_us['und'][0]['value'])) : ?>
					<h1>FOLLOW US</h1>
					<?php print $node->field_follow_us['und'][0]['value']; ?>
					<?php endif; ?>
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
