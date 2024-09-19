<?php

// Function to calculate the total price of items in a shopping cart
function calculate_total_price($items) {
    $total = 0;
    foreach ($items as $item) {
        $total += $item['price'];
    }
    return $total;
}

// Function to remove spaces from a string
function remove_Spaces($string) {
    return str_replace(' ', '', $string);
}

// Function to convert a string to lowercase
function convert_To_Lower_Case($string) {
    return strtolower($string);
}

// Function to modify a string by removing spaces and converting to lowercase
function modifyStringValue($string) {
    return convert_To_Lower_Case(remove_Spaces($string));
}

// Function to check if a number is even
function is_Number_Even($number) {
    return $number % 2 === 0;
}

$items = [
    ['name' => 'Widget A', 'price' => 10],
    ['name' => 'Widget B', 'price' => 15],
    ['name' => 'Widget C', 'price' => 20],
];

$totalPrice = calculate_total_price($items);
echo "Total price: $" . $totalPrice;

$string = "This is a poorly written program with little structure and readability.";
$modifiedString = modifyStringValue($string);
echo "\nModified string: " . $modifiedString;

$number = 42;
if (is_Number_Even($number)) {
    echo "\nThe number " . $number . " is even.";
} else {
    echo "\nThe number " . $number . " is odd.";
}