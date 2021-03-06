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


	
	<div class="wrapper">
		
		
	<div class="body-content">
        <?php if($title_prefix || $title_suffix || $display_submitted || $unpublished || $title): ?>

            <?php print render($title_prefix); ?>
            <?php if($title): ?>
                <h2<?php print $title_attributes; ?>><?php print $title; ?></h2>
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

        <?php endif; ?>

        <?php

			// We hide the comments and links now so that we can render them later.
			hide($content['comments']);
			hide($content['links']);

			print render($content);
		?>
	</div>

		<div class="faq-block-wrapper">
			<?php print views_embed_view('faqs', 'block_faqs_a'); ?>
		</div>
		<div class="faq-block-wrapper">
			<?php print views_embed_view('faqs', 'block_faqs_b'); ?>
		</div>
		
		<div style="clear: both;"></div>
	</div>
	

	

	<?php print render($content['links']); ?>

	<?php print render($content['comments']); ?>

</article>

<div class="faq-details">
	<div class="faq-wrapper">
		<!--to be replaced by ajax-->
	</div>
</div>