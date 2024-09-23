<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $text = $_POST['text'];
    $sort = $_POST['sort'];
    $limit = $_POST['limit'];
    // error handling
    // Validate if text is provided
        if (empty(trim($text))) {
            echo 'Error: Text input is required.';
            return;
        } elseif (ctype_digit($text)) {
            echo 'Error: Text input must not be a number.';
            return;
        }

        echo "<style>
            h2 {
                text-align: center;
                font-family: Arial, sans-serif;
                margin-top: 20px;
            }  
            .word-list {
                background-color: #f0f0f0;
                border: 1px solid #ddd;
                padding: 40px;
                border-radius: 5px;
                max-width: 350px;
                margin: 20px auto;
                list-style-type: decimal;
            }
            .word-item {
                font-family: Arial, sans-serif;
                color: #333;
                font-size: 16px;
                margin-bottom: 5px;
            }
        </style>";
    // functions
    // cleaning text
    function clean_text($text) {
        $text = preg_replace('/[\r\n]+/', ' ', $text); 
        $text = preg_replace('/\s+/', ' ', $text); // multiple spaces into single space
        $remove_special_char = preg_replace('/[^a-zA-Z\s]/', '', $text);
        
        $common_words = [
            'the', 'a', 'an',
            'and', 'but', 'or', 'nor', 'for', 'so', 'yet',
            'in', 'on', 'at', 'to', 'of', 'with', 'by', 'about', 
            'is', 'are', 'am', 'was', 'were', 'be', 
            'have', 'has', 'had', 'do', 'does', 'did'
        ]; // stop words 
        
        $pattern = '/\b(' . implode('|', $common_words) . ')\b(?![a-z])/i'; // remove exact word matches
        $remove_articles = preg_replace($pattern, '', $remove_special_char);
        
        $lowered_txt = strtolower(trim($remove_articles));
        $cleaned = [];
        
        foreach (explode(' ', $lowered_txt) as $word) {
            if (!empty($word)) {
                $cleaned[] = $word;
            }
        }
        
        return $cleaned; // Return the cleaned array
    };
    
    // function to count word frequencies
    function calculate_word_frequencies($words) {
        $frequencies = array_count_values($words); //count frequency ng bawat word sa array ng mga words
        return $frequencies; //return array
    };
      
    // Function to sort word frequencies
    function sort_word_frequencies($frequencies, $sort) {
        // Check if the user wants to sort in ascending or descending order
        if ($sort == 'asc') {
        // Sort the freq array in ascending order
            asort($frequencies);
        } elseif ($sort == 'desc') {
        // Sort the freq array in descending order
            arsort($frequencies);
        }
        return $frequencies;
    };

    // function to specify the number of words to display
    function display_result($frequencies, $limit) {
        $result = '<ol class="word-list">';
        $count = 0; 
        
        // loop in freq array
        foreach ($frequencies as $word => $frequency) {
            $result .= "<li class='word-item'>$word: $frequency</li>"; //
            $count++; // increment counter
            if ($count >= $limit) break; // if we've reached limit, break out the loop
        }
        $result .= '</ol>';
        return $result;
    }


    $words = clean_text($text);
    $frequencies = calculate_word_frequencies($words);
    $frequencies = sort_word_frequencies($frequencies, $sort);
    $result = display_result($frequencies, $limit);
    echo ("<h2>Word Frequencies</h2>");
    echo ($result);
}
?>