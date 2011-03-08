<?php
// $Id$

/**
 * @file
 * Template to render a Ting collection of books.
 */
#krumo(get_defined_vars());


  $image_url = ting_covers_collection_url($object, '80_x');
  if ($image_url) {
    $picture =  l(theme('image', $image_url, '', '', null, false), $object->url, array('html' => true));
  }
?>
  <li class="clear-block">
    <div class="inner">
      <?php if ($picture): ?>
      <div class="picture">
         <?php print $picture; ?>
      </div>
      <?php endif; ?>
  
      <div class="record">
        <h3>
          <?php print l($object->title, $object->url, array('attributes' => array('class' =>'title'))) ;?>
        </h3>
          <?php if ($object->creators_string) : ?>
            <span class="creator">
              <?php echo t('By !creator_name', array('!creator_name' => l($object->creators_string,'ting/search/'.$object->creators_string))) ?>
            </span>
          <?php endif; ?>
  
        <?php if ($object->abstract) : ?>
        <div class="abstract">
          <p>
            <?php print truncate_utf8(check_plain($object->abstract),80,true,true); ?>
          </p>
          
        </div>
        <?php endif; ?>
        
      </div>
      <?php print l(t('Læs mere'),$object->url,array('attributes' => array('class' => 'redlink')))?>
    </div>
  </li>




<?php /*

<a href="<?php echo $object->url ?>" title="<?php print check_plain($object->title) ?><?php if (!empty($object->creators_string)) { print ': ' . check_plain($object->creators_string); } ?>">
  <span class="title"><?php print check_plain($object->title); ?></span>
  <?php if (!empty($object->creators_string)) { ?>
    <span class="creator"><?php print check_plain($object->creators_string); ?></span>
  <?php } ?>
</a>

*/?>