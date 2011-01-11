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



?>