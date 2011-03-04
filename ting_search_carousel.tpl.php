<?php 

drupal_add_css(path_to_theme().'/stylesheets/carousel.css','theme');
drupal_add_js(path_to_theme().'/scripts/carousel.js');


?>
<div class="ting-search-carousel">
  <ul class="search-results">
    <?php foreach ($searches as $i => $search) :?>
      <li class="<?php echo ($i == 0) ? 'active' : ''; ?>">
        <div class="subtitle">
          <?php echo $search['subtitle']; ?>
        </div>
        <ul class="jcarousel-skin-ting-search-carousel">
        </ul>
      </li>
    <?php endforeach; ?>
  </ul>

  <ul class="search-controller">
    <?php foreach ($searches as $i => $search) : ?>
      <li class="<?php echo ($i == 0) ? 'active' : ''; ?>">
        <a href="#"><?php echo $search['title'] ?></a>
      </li>
    <?php endforeach; ?>
  </ul>
</div>
