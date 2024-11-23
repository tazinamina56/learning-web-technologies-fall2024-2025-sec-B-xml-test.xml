<?php
function findLargest($num1, $num2, $num3)
{
  $largest = $num1;

  if ($num2 > $largest) {
    $largest = $num2;
  }

  if ($num3 > $largest) {
    $largest = $num3;
  }

  return $largest;
}


$num1 = 58;
$num2 = 43;
$num3 = 10;
$largestNumber = findLargest($num1, $num2, $num3);
echo "The largest number among $num1, $num2, and $num3 is: $largestNumber";
?>