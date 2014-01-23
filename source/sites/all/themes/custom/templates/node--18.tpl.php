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
				<h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
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
	
	<div class="wrapper">
		<?php
			// We hide the comments and links now so that we can render them later.
			hide($content['comments']);
			hide($content['links']);
			print render($content);
		?>
		<div class="faq-block-wrapper">
			<?php print views_embed_view('faqs', 'block_faqs'); ?>
		</div>
		<div class="faq-block-wrapper">
			<a class="faq-link" href="#">Will you make notes during the session, and if so, what happens to these?</a>
			<a class="faq-link" href="#">Can I contact my therapist in between sessions? </a>
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