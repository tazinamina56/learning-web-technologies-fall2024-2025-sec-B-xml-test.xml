<?php

function searchElement($array, $element)
{

  foreach ($array as $value) {

    if ($value === $element) {

      return true;
    }
  }

  return false;
}


$numbers = array(6, 8, 9, 21, 23);


$searchElement = 8;


if (searchElement($numbers, $searchElement)) {
  echo "$searchElement is found in the array.";
} else {
  echo "$searchElement is not found in the array.";
}
?>