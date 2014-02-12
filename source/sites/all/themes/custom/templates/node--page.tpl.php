<?php
	/**
	 * @file
	 * Returns the HTML for a node.
	 *
	 * Complete documentation for this file is available online.
	 * @see https://drupal.org/node/1728164
	 */
?>
<?php $uno = 1; ?>
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

	<?php
		// We hide the comments and links now so that we can render them later.
		hide($content['comments']);
		hide($content['links']);
	?>
	<div class="inner-content">
		<div class="image 490">
			<?php
				if($node->title == 'Meet our team') {
					$query = new EntityFieldQuery;
					$query->entityCondition('entity_type', 'node');
					$query->propertyCondition('type', 'team_member');
					$query->propertyOrderBy('created', 'DESC');
					$result = $query->execute();
					if(isset($result['node'])) {
						$counter = 0;
						foreach($result['node'] as $nid => $data) {
							$member = node_load($nid);
							$node_view = node_view($member, 'teaser');
							print '<div class="' . (($counter % 2 == 0) ? 'team-even':'team-odd') . '">' . render($node_view) . '</div>';
							$counter++;
						}
					}
				} elseif(isset($node->field_image['und'][0]['uri'])){
                    $variables = array(
                        'style_name' => 'basic_page_image',
                        'path'       => $node->field_image['und'][0]['uri'],
                        'width'      => $node->field_image['und'][0]['width'],
                        'height'     => $node->field_image['und'][0]['height'],
                    );
                    print theme('image_style', $variables);
                } else {
	        ?>
	        <?php drupal_add_library('jquery_plugin', 'cycle'); ?>
            <ul id="fade">
                <?php foreach($node->field_big_text['und'] as $key => $data) : ?>
                <li class="cycle-phrase">
	                <?php print $data['safe_value']; ?>
                </li>
                <?php endforeach; ?>
            </ul>
            <script type="application/javascript">
                jQuery('#fade').cycle({
	                'timeout':5000,
	                'slideResize':0
                });
            </script>
			<?php
                }
			?>
		</div>
		<div class="body">
			<?php print render($title_prefix); ?>
			<?php if($title): ?>
				<h1 class="page__title title" id="page-title"><?php print $title; ?></h1>
			<?php endif; ?>
			<?php print render($title_suffix); ?>

			<div class="column-1">
				<?php print $node->body['und'][0]['value']; ?>
				<?php
					if($node->nid == "2") {
						print views_embed_view('team_members', 'block_team_members');
					}
				?>
			</div>
			<div class="column-2">
				<?php
					if(isset($node->field_additional_column['und'][0]['value'])) {
						print $node->field_additional_column['und'][0]['value'];
					}
				?>
			</div>
			<div style="clear:both;"></div>
		</div>
		<div style="clear:both;"></div>
	</div>

	<?php print render($content['links']); ?>

	<?php print render($content['comments']); ?>

</article>
