<?php

/**
 * Calculate the total price of items in a shopping cart
 * 
 * @param array $items An array of items with 'name' and 'price' keys
 * @return float The total price of the items
 */
function calculate_total_price($items) {
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
function remove_spaces($string) {
    return str_replace(' ', '', $string);
}

/**
 * Convert a string to lowercase
 * 
 * @param string $string The input string
 * @return string The string in lowercase
 */
function convert_to_lower_case($string) {
    return strtolower($string);
}

/**
 * Modify a string by removing spaces and converting to lowercase
 * 
 * @param string $string The input string
 * @return string The modified string
 */
function modify_string_value($string) {
    return convert_to_lower_case(remove_spaces($string));
}

/**
 * Check if a number is even
 * 
 * @param int $number The input number
 * @return bool True if the number is even, false otherwise
 */
function is_number_even($number) {
    return $number % 2 === 0;
}

/**
 * Main function to demonstrate the usage of the above functions
 */
function demonstrate_functions() {
    $items = [
        ['name' => 'Widget A', 'price' => 10],
        ['name' => 'Widget B', 'price' => 15],
        ['name' => 'Widget C', 'price' => 20],
    ];

    $totalPrice = calculate_total_price($items);
    echo "Total price: $" . $totalPrice . "\n";

    $string = "This is a poorly written program with little structure and readability.";
    $modifiedString = modify_string_value($string);
    echo "Modified string: " . $modifiedString . "\n";

    $number = 42;
    if (is_number_even($number)) { 
        echo "The number " . $number . " is even.\n";
    } else {
        echo "The number " . $number . " is odd.\n";
    }
}

demonstrate_functions();

?>