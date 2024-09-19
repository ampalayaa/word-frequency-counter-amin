<?php

// Function to calculate the total price of items in a shopping cart
function calculate_Total_Price($items) {
  $total = 0;
  foreach ($items as $item) {
    $total += $item['price'];
  }
  return $total;
}

// Function to perform a series of string manipulations
function modify_String_Value($string) {
  // Remove spaces and convert to lowercase
  $string = str_replace(' ', '', $string);
  $string = strtolower($string);
  return $string;
}

// Function to check if a number is even or odd
function is_Number_Even($number) {
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

$totalPrice = calculate_Total_Price($items);
echo "Total price: $" . $totalPrice;

$string = "This is a poorly written program with little structure and readability.";
$modifiedString = modify_String_Value($string);
echo "\nModified string: " . $modifiedString;

$number = 42;
if (is_Number_Even($number)) {
  echo "\nThe number " . $number . " is even.";
} else {
  echo "\nThe number " . $number . " is odd.";
}

?>