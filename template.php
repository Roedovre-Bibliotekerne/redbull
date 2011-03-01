<?php 

function redbull_office_hours_format_time($time) {
  list($hours, $minutes, $seconds) = explode(':', $time);

if (is_numeric($hours) && $hours >= 0 && $hours < 24) {
    return sprintf('%02u.%02u', $hours, $minutes);
  }
  
  if (is_numeric($hours) && $hours >= 0 && $hours < 24) {
    
    
    
    //if(is_numeric($minutes) && $minutes > 0){
      return intval($hours) .sprintf(':%02u', $minutes);
    //}
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

function redbull_preprocess_ding_library_user_status_block(&$variables) {
  $account = $variables['user'];

  // If has secure role is not set, ding_user's user_load has not been
  // called for this user object. Let's do it manually.
  if (!isset($account->has_secure_role)) {
    $edit = array();
    ding_user_user('load', $edit, $account);
  }

  $variables['wrapper_classes'] = '';
  // Use alma_name if available.
  if (!empty($account->display_name)) {
    $variables['display_name'] = $account->display_name;
  }
  else {
    $variables['display_name'] = $account->name;
  }

  if ($account->library_user_id && !$account->has_secure_role) {
    $variables['profile_link'] = 'user/' . $account->uid . '/profile';
  }
  else {
    $variables['profile_link'] = 'user/' . $account->uid;
  }

  $variables['status_available'] = $variables['user_status']['status_available'];
  if (!$variables['status_available']) {
    if (!empty($account->library_user_id)) {
      $variables['status_unavailable_message'] = t('Please !log_in to view your loaner status', array('!log_in' => l(t('log in'), 'user/' . $account->uid . '/authenticate')));
    }
    else {
      // If user doesn't have an library system ID, don't show a message, since we
      // can't just log him in to get the status. This should usually
      // only be the case for admin users.
      $variables['status_unavailable_message'] = '';
    }
  }
  else {
    if ($variables['user_status']['loan_overdue_count'] > 0) {
      $variables['wrapper_classes'] .= 'loans-overdue';
    }

    // Get the item count from ding_cart, if the module is available.
    if (function_exists('ding_cart_user_count')) {
      $variables['has_cart'] = TRUE;
      $variables['cart_count'] = ding_cart_user_count($account);
    }
    else {
      $variables['has_cart'] = FALSE;
    }
  }
}



?>