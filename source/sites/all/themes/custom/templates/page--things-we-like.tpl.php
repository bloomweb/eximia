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
			<?php /* if ($main_menu): ?>
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
            <?php endif; */ ?>
			<div style="clear:both;"></div>
			<nav id="main-menu" role="navigation" tabindex="-1">
				<?php print render($page['navigation']); ?>
			</nav>
		</div>
	</header>
	<?php
		$block = block_load('taxonomy_menu_block', '2');
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
	<div id="main">
		<div id="content" class="column" role="main">
			<?php print render($page['highlighted']); ?>
			<?php print $breadcrumb; ?>
			<a id="main-content"></a>

			<?php print $messages; ?>
			<?php print render($tabs); ?>
			<?php print render($page['help']); ?>
			<?php if ($action_links): ?>
				<ul class="action-links"><?php print render($action_links); ?></ul>
			<?php endif; ?>
			<?php print render($page['content']); ?>
			<?php print $feed_icons; ?>
		</div>



		<?php
			// Render the sidebars to see if there's anything in them.
			$sidebar_first = render($page['sidebar_first']);
			$sidebar_second = render($page['sidebar_second']);
		?>

		<?php if ($sidebar_first || $sidebar_second): ?>
			<aside class="sidebars">
				<?php print $sidebar_first; ?>
				<?php print $sidebar_second; ?>
			</aside>
		<?php endif; ?>

	</div>

	<?php print render($page['footer']); ?>

</div>

<?php print render($page['bottom']); ?>