<?php
	/**
	 * @file
	 * Returns the HTML for a single Drupal page.
	 *
	 * Complete documentation for this file is available online.
	 * @see https://drupal.org/node/1728148
	 */
?>

<?php $uno = 1; ?>

<div id="page">

	<header class="header" id="header" role="banner">
        <div class="logo-wrapper">
            <a href="/">
                <img src="/sites/all/themes/custom/logo.png" />
            </a>
        </div>

		<div id="navigation">

			<?php
				/* if ($main_menu): ?>
					<nav id="main-menu" role="navigation" tabindex="-1">
						<?php
						// This code snippet is hard to modify. We recommend turning off the
						// "Main menu" on your sub-theme's settings form, deleting this PHP
						// code block, and, instead, using the "Menu block" module.
						// @see https://drupal.org/project/menu_block
						print theme('links__system_main_menu', array(
							'links' => $main_menu,
							'attributes' => array(
								'class' => array('links', 'inline', 'clearfix'),
							),
							'heading' => array(
								'text' => t('Main menu'),
								'level' => 'h2',
								'class' => array('element-invisible'),
							),
						)); ?>
					</nav>
				<?php endif; */
			?>

			<div style="clear:both;"></div>
			<nav id="main-menu" role="navigation" tabindex="-1">
				<?php print render($page['navigation']); ?>
			</nav>
		</div>
	</header>


  <div class="services-description" id="service-page">
      <?php print $messages; ?>
      <?php print render($tabs); ?>
      <?php print render($page['help']); ?>
      <?php if($action_links): ?>
          <ul class="action-links"><?php print render($action_links); ?></ul>
      <?php endif; ?>
		<div class="left">
			<?php
				if(isset($node->field_column_a['und'][0]['value'])) {
					print $node->field_column_a['und'][0]['value'];
				}

			?>

            <div class="service-icon">
                <?php print  theme_image(array('path' => $node -> field_image["und"][0]["uri"], 'attributes' => array('class' => array('')))); ?>
            </div>
		</div>
		<div class="right">
			<?php
				if(isset($node->field_column_b['und'][0]['value'])) {
					print $node->field_column_b['und'][0]['value'];
				}
			?>
            <div class="sub-services">
                <?php print views_embed_view('services', 'block_sub_services', $node->nid); ?>
            </div>
		</div>



	</div>

	<?php print render($page['footer']); ?>

</div>

<?php print render($page['bottom']); ?>