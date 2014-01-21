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
  <?php if ($title_prefix || $title_suffix || $display_submitted || $unpublished || !$page && $title): ?>
    <header>
      <?php print render($title_prefix); ?>
      <?php if (!$page && $title): ?>
        <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
      <?php endif; ?>
      <?php print render($title_suffix); ?>

      <?php if ($display_submitted): ?>
        <p class="submitted">
          <?php print $user_picture; ?>
          <?php print $submitted; ?>
        </p>
      <?php endif; ?>

      <?php if ($unpublished): ?>
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
        $variables = array(
                'style_name' => 'basic_page_image',
                'path' => $node ->field_image['und'][0]['uri'],
                'width' => $node ->field_image['und'][0]['width'],
                'height' => $node ->field_image['und'][0]['height'],
        );
        print theme( 'image_style', $variables );
        ?>


        </div>
        <div class="body">
            <?php print render($title_prefix); ?>
            <?php if ($title): ?>
                <h1 class="page__title title" id="page-title"><?php print $title; ?></h1>
            <?php endif; ?>
            <?php print render($title_suffix); ?>

            <div class="column-1">
                <?php print $node -> body['und'][0]['value']; ?>
                <?php
                if($node -> nid == "2"){
                   print views_embed_view('team_members','block_team_members');
                }
                ?>
            </div>
            <div class="column-2">
                <?php print $node -> field_additional_column['und'][0]['value']; ?>
                
            </div>
            <div style="clear:both;"></div>
        </div>
        <div style="clear:both;"></div>
    </div>

  <?php print render($content['links']); ?>

  <?php print render($content['comments']); ?>

</article>