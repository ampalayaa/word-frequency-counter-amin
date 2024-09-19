<?php

/**
 * Calculate the total price of items in a shopping cart
 * 
 * @param array $items An array of items with 'name' and 'price' keys
 * @return float The total price of the items
 */
function calculateTotalPrice($items) {
    $total = 0;
    foreach ($items as $item) {
        $total += $item['price'];
    }
    return $total;
}

/**
 * Remove spaces from a string
 * 
 * @param string $string The input string
 * @return string The string with spaces removed
 */
function removeSpacesFromInput($string) {
    return str_replace(' ', '', $string);
}

/**
 * Convert a string to lowercase
 * 
 * @param string $string The input string
 * @return string The string in lowercase
 */
function convertStringToLowerCase($string) {
    return strtolower($string);
}

/**
 * Modify a string by removing spaces and converting to lowercase
 * 
 * @param string $string The input string
 * @return string The modified string
 */
function modifyStringValue($string) {
    return convertStringToLowerCase(removeSpacesFromInput($string));
}

/**
 * Check if a number is even
 * 
 * @param int $number The input number
 * @return bool True if the number is even, false otherwise
 */
function isNumberEven($number) {
    return $number % 2 === 0;
}

/**
 * Main function to demonstrate the usage of the above functions
 */
function demonstrateFunctions() {
    $items = [
        ['name' => 'Widget A', 'price' => 10],
        ['name' => 'Widget B', 'price' => 15],
        ['name' => 'Widget C', 'price' => 20],
    ];

    $totalPrice = calculateTotalPrice($items);
    echo "Total price: $" . $totalPrice . "\n";

    $string = "This is a poorly written program with little structure and readability.";
    $modifiedString = modifyStringValue($string);
    echo "Modified string: " . $modifiedString . "\n";

    $number = 42;
    if (isNumberEven($number)) {
        echo "The number " . $number . " is even.\n";
    } else {
        echo "The number " . $number . " is odd.\n";
    }
}

demonstrateFunctions();

?>