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
            <?php print render($page['highlighted']); ?>
            <?php print $breadcrumb; ?>
            <a id="main-content"></a>
            <?php print render($title_prefix); ?>
            <?php if ($title): ?>
                <h1 class="page__title title hidden" id="page-title"><?php print $title; ?></h1>
            <?php endif; ?>
            <?php print render($title_suffix); ?>
            <?php print $messages; ?>
            <?php print render($tabs); ?>
            <?php print render($page['help']); ?>
            <?php if ($action_links): ?>
                <ul class="action-links"><?php print render($action_links); ?></ul>
            <?php endif; ?>

                <div id="home-container">
                    <div class="main-text default">
                        <?php print $node->field_default_text['und']['0']['value']; ?>
                    </div>
                    <div class="contact home-box">
                        <div class="main-text">
                            <?php print $node->field_contact_hover['und']['0']['value']; ?>
                        </div>
                        <div class="content">
                            <p>
                                <?php print $node->field_contact_text['und']['0']['value']; ?>
                            </p>
                            <a href="/contact" class="go-to" > + </a>
                        </div>
                        <h2><a href="/contact">Contact</a></h2>

                    </div>

                    <div class="who-we-are  home-box">
                        <div class="main-text">
                            <?php print $node->field_who_we_are_hover['und']['0']['value']; ?>
                        </div>
                        <div class="content">
                            <p>
                                <?php print $node->field_who_we_are_text['und']['0']['value']; ?>
                            </p>
                            <a href="/who-we-are" class="go-to"> + </a>
                        </div>
                        <h2><a href="/who-we-are">who we are</a></h2>
                    </div>

                    <div class="services-and-fees  home-box">
                        <div class="main-text">
                            <?php print $node->field_services_hover['und']['0']['value']; ?>
                        </div>
                        <div class="content">
                            <p>
                                <?php print $node->field_services_text['und']['0']['value']; ?>
                            </p>
                            <a href="/services-and-fees" class="go-to"> + </a>
                        </div>
                        <h2><a href="/services-and-fees">services and fees</a></h2>
                    </div>

                    <div class="resources  home-box">
                        <div class="main-text">
                            <?php print $node->field_resources_hover['und']['0']['value']; ?>
                        </div>
                        <div class="content">
                            <p>
                                <?php print $node->field_resources_text['und']['0']['value']; ?>
                            </p>
                            <a href="/resources" class="go-to"> + </a>
                        </div>
                        <h2><a href="/resources">resources</a></h2>
                    </div>
                </div>


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
