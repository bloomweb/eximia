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
           		WE ARE 
				OFFERING LIFE SKILLS TO 
				EMPOWER 
				INDIVIDUALS AND GROUPS
           	</li>
           	<li class="story">
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
           </div>
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
	<div style="clear: both;"></div>
</div>

<?php print render($page['bottom']); ?>
