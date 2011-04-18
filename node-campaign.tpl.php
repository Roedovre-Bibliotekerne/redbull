<?php
// $Id$

/**
 * @file
 * Template to render campaign nodes.
 */
//print var_export($node->field_campaign_link['0'],true);


if ($node->campaign_type == "image-only"): ?>
  <div class="campaign-image campaign-type-<?php print $node->campaign_type;  ?> clearfix">
    <?php print l($node->field_campaign_image['0']['view'], $node->field_campaign_link['0']['url'], $options= array('html'=>TRUE,'query' => $node->field_campaign_link['0']['query'])); ?>
  </div>
<?php else: ?>
  <div class="campaign-text clearfix">
    <div class="campaign-inner">
      <div class="campaign-type-<?php print $node->campaign_type;?>">
        <div class="campaign-theme campaign-theme-<?php print $node->campaign_theme; ?>">
          <?php print l($node->field_campaign_image['0']['view'], $node->field_campaign_link['0']['url'], $options= array('html'=>TRUE,'query' => $node->field_campaign_link['0']['query'])); ?>
        </div>
      </div>
    </div>
</div>
<?php endif; ?>

