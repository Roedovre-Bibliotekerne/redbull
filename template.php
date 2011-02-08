<?php 

function redbull_office_hours_format_time($time) {
  list($hours, $minutes, $seconds) = explode(':', $time);

  if (is_numeric($hours) && $hours >= 0 && $hours < 24) {
    if(is_numeric($minutes) && $minutes > 0){
      return intval($hours) .sprintf(':%02u', $minutes);
    }
    return intval($hours);
  }
}

function redbull_ting_search_form($form){
   
  $form['#prefix'] = '<h2 class="search-title">'.t('Søg her').'</h2>';
  $form['keys']['#prefix'] = '<div class="btn-container">';
  $form['submit']['#type'] = "submit";
  $form['submit']['#suffix'] = '</div>';
  unset($form['example_text']);
  
  //var_dump($form);

  return drupal_render($form);
}

function redbull_user_login_block($form){
  $form['submit']['#type'] = "submit" ;

  $name = drupal_render($form['name']);
  $pass = drupal_render($form['pass']);
  $submit = drupal_render($form['submit']);
  $remember = drupal_render($form['remember_me']);

  $before = '<h3>'.t('Login').'</h3>'.l(t('> NemLog-in'),'/nemlogin',array('attributes' => array('class' => 'nemlogin')));
  return $before . $name . '<div>' . $pass . $submit . '</div>' . $remember . drupal_render($form);
}



?>