<?php
// Print a triangle of stars
for ($i = 1; $i <= 3; $i++) {
  for ($j = 1; $j <= $i; $j++) {
    echo "* ";
  }
  echo "<br/>";
}
?>

<br>
<?php

$letter = 'A';
for ($i = 1; $i <= 3; $i++) {
  for ($j = 1; $j <= $i; $j++) {
    echo $letter++ . " ";
  }
  echo "<br/>";
}
?>

<br>

<?php

$num = 1;
for ($i = 1; $i <= 3; $i++) {
  for ($j = 1; $j <= $i; $j++) {
    echo $num++ . " ";
  }
  echo "<br/>";
}
?>
