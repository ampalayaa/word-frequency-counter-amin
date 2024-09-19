<?php

// Function to calculate the total price of items in a shopping cart
function calculateTotalPrice($items) {
  $total = 0;
  foreach ($items as $item) {
    $total += $item['price'];
  }
  return $total;
}

// Function to perform a series of string manipulations
function modifyString($string) {
  // Remove spaces and convert to lowercase
  $string = str_replace(' ', '', $string);
  $string = strtolower($string);
  return $string;
}

// Function to check if a number is even or odd
function isEven($number) {
  if ($number % 2 == 0) {
    return true;
  } else {
    return false;
  }
}

$items = [
  ['name' => 'Widget A', 'price' => 10],
  ['name' => 'Widget B', 'price' => 15],
  ['name' => 'Widget C', 'price' => 20],
];

$totalPrice = calculateTotalPrice($items);
echo "Total price: $" . $totalPrice;

$string = "This is a poorly written program with little structure and readability.";
$modifiedString = modifyString($string);
echo "\nModified string: " . $modifiedString;

$number = 42;
if (isEven($number)) {
  echo "\nThe number " . $number . " is even.";
} else {
  echo "\nThe number " . $number . " is odd.";
}

?>