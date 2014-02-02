<?php
	/**
	 * @file
	 * Returns the HTML for a single Drupal page.
	 *
	 * Complete documentation for this file is available online.
	 * @see https://drupal.org/node/1728148
	 */
?>
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
					<?php print $node->field_phrase['und'][0]['safe_value']; ?>
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
				<?php print theme_image(array('attributes' => array(), 'path' => file_create_url($node->field_home_image['und'][0]['uri']))); ?>
			</div>
			<div class="map">
				<?php print theme_image(array('attributes' => array(), 'path' => file_create_url($node->field_home_map['und'][0]['uri']))); ?>
			</div>
			<?php $uno = 1; ?>
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
