<?php
	/**
	 * @file
	 * Returns the HTML for a single Drupal page.
	 *
	 * Complete documentation for this file is available online.
	 * @see https://drupal.org/node/1728148
	 */
?>
<?php drupal_add_library('jquery_plugin', 'cycle'); ?>
<div id="page">

	<header class="header" id="header" role="banner">
		<div class="logo-wrapper">

			<div class="sprite sprite-logo"></div>
		</div>

	</header>


	<div id="main">

		<div id="content" class="column" role="main">
			<ul>
				<li class="phrase">
					<ul id="fade">
						<?php foreach($node->field_phrase['und'] as $key => $data) : ?>
						<li class="cycle-phrase">
							<?php print $data['safe_value']; ?>
						</li>
						<?php endforeach; ?>
					</ul>
				</li>

				<?php foreach ($node->field_columns['und'] as $i => $column) : ?>
				<li class="<?php print $column['entity']->field_column_class['und'][0]['value']; ?>">
					<!--<a><?php //print $column['entity']->title; ?></a>-->
					<?php print l($column['entity']->title, $column['entity']->field_link['und'][0]['value'], array('attributes' => array('class' => array('home-menu-link')))); ?>
					<div class="text-box" data-url="<?php print $column['entity']->field_link['und'][0]['value'] ?>">
						<?php print $column['entity']->field_phrase['und'][0]['value']; ?>
						<?php if(isset($column['entity']->field_phrase_extra['und'][0]['value'])) : ?>
							<br/>
							<?php print $column['entity']->field_phrase_extra['und'][0]['value']; ?>
						<?php endif; ?>
						<?php print l('+', $column['entity']->field_link['und'][0]['value'], array('attributes' => array('class' => 'more'))); ?>
					</div>
					<?php if(isset($column['entity']->field_links_box['und'][0]['target_id'])) : ?>
						<?php foreach($column['entity']->field_links_box['und'] as $j => $nid) : ?>
							<?php $links_box = node_load($nid); ?>
							<div class="cursive">
								<?php
									if($links_box->field_display_title['und'][0]['value']) {
										?>
										<div class="left">
											<?php print $links_box->title; ?>
										</div>
										<div class="right">
											<?php
												$tmp_title = strtoupper($links_box->title);
												switch($links_box->title) {
													case 'READ':
														print views_embed_view('things_we_like', 'block_things_we_like', 9);
														break;
													case 'SURF':
														print views_embed_view('things_we_like', 'block_things_we_like', 8);
														break;
													case 'WATCH':
														print views_embed_view('things_we_like', 'block_things_we_like', 10);
														break;
													default:
														foreach($links_box->field_links['und'] as $k => $link) {
															$link_data = explode('<->', $link['value']);
															if(count($link_data) == 2) {
																print l($link_data[0], $link_data[1]);
															}
														}
														break;
												}
											?>
										</div>
									<?php
									} else {
										foreach($links_box->field_links['und'] as $k => $link) {
											$link_data = explode('<->', $link['value']);
											if(count($link_data) == 2) {
												print l($link_data[0], $link_data[1]);
											}
										}
									}
								?>
							</div>
						<?php endforeach; ?>
					<?php endif; ?>
					<?php endforeach; ?>
				</li>
			</ul>

			<div class="pictures">
				<?php //print theme_image(array('attributes' => array(), 'path' => file_create_url($node->field_home_image['und'][0]['uri']))); ?>
				<?php
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
				?>
			</div>
            <?php /*
			<div class="map">
				<?php //print theme_image(array('attributes' => array(), 'path' => file_create_url($node->field_home_map['und'][0]['uri']))); ?>
				<iframe
					width="141"
					height="138"
					frameborder="0"
					scrolling="no"
					marginheight="0"
					marginwidth="0"
					src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en-419&amp;geocode=&amp;q=24+Grosvenor+Square,+W1A+2LQ+London&amp;aq=&amp;sll=4.645345,-74.341812&amp;sspn=31.569905,65.302734&amp;ie=UTF8&amp;hq=&amp;hnear=24+Grosvenor+Square,+London+W1A+2LQ,+Reino+Unido&amp;t=m&amp;z=12&amp;ll=51.510612,-0.152907&amp;output=embed"
					>
				</iframe>
				<br />
				<small>
					<a target="_blank" href="https://maps.google.com/maps?f=q&amp;source=embed&amp;hl=es-419&amp;geocode=&amp;q=24+Grosvenor+Square,+W1A+2LQ+London&amp;aq=&amp;sll=4.645345,-74.341812&amp;sspn=31.569905,65.302734&amp;ie=UTF8&amp;hq=&amp;hnear=24+Grosvenor+Square,+London+W1A+2LQ,+Reino+Unido&amp;t=m&amp;z=14&amp;ll=51.510612,-0.152907" style="color:#686967;text-align:left;text-decoration:none;">View larger map</a>
				</small>
			</div>
         */ ?>

			<!--<li class="story">
				   <a>THE EXIMIA STORY</a>
				   <div class="text-box">
					   “The greatest gift we can give another is the purity of our attention”
					<br /><br />
					–Richard Moss
					<a href="#" class="more">+</a>
				   </div>
			   </li>
			   <li class="help">
				   <a>HOW CAN WE HELP</a>
				   <div class="text-box">
					   Whatever is happening around you or inside you, there is a way of happening back.
					   <br />
					Start reaching out. Fulfill your emotional wellbeing. Become your best self.
					<br /><br />
					GO HAPPEN
					<a href="#" class="more">+</a>
				   </div>
				   <div class="cursive">
					   <a href="#">Coaching</a>
					   <a href="#">Psychotheraphy</a>
					   <a href="#">Training and Consulting</a>
					   <a href="#">Signature Programmes</a>
				   </div>
			   </li>
			   <li class="contact">
				   <a>CONTACT US</a>
				   <div class="text-box">
					   Reach out to Eximia. We are committed to your we  llbeing.
					<a href="#" class="more">+</a>
				   </div>
			   </li>
			   <li class="like">
				   <a>THINGS WE LIKE</a>
				   <div class="text-box">
					   Eximia has an ear to the ground for great resources regarding personal wellbeing and here are a few of our favourites
					<a href="#" class="more">+</a>
				   </div>
				   <div class="cursive">
					   <div class="left">
						   WATCH
					   </div>
					   <div class="right">
						   <a href="#">CoachingParents</a>
						   <a href="#">Aenean commodo(...)</a>
					   </div>
				   </div>
				   <div class="cursive">
					   <div class="left">
						   READ
					   </div>
					   <div class="right">
						   <a href="#">Teens for Dummies</a>
						   <a href="#">Lorem Ipsum</a>
					   </div>
				   </div>
				   <div class="cursive">
					   <div class="left">
						   SURF
					   </div>
					   <div class="right">
						   <a href="#">gurd.com</a>
						   <a href="#">psicho.com.co</a>
					   </div>
				   </div>
			   </li>
			   <li class="faq">
				   <a>FAQ</a>
				   <div class="text-box">
					   Lorem Ipsum.
					<a href="#" class="more">+</a>
				   </div>
			   </li>
		   </ul>
		   <div class="pictures">
				   <img src="/sites/all/themes/custom/images/fotos_home.png" />
		   </div>
		   <div class="map">
				   <img src="/sites/all/themes/custom/images/mapa.png" />
		   </div>-->
		</div>



		<?php
			// Render the sidebars to see if there's anything in them.
			$sidebar_first = render($page['sidebar_first']);
			$sidebar_second = render($page['sidebar_second']);
		?>

		<?php if($sidebar_first || $sidebar_second): ?>
			<aside class="sidebars">
				<?php print $sidebar_first; ?>
				<?php print $sidebar_second; ?>
			</aside>
		<?php endif; ?>

	</div>

	<?php print render($page['footer']); ?>
	<div style="clear: both;"></div>
</div>

<?php print render($page['bottom']); ?>
