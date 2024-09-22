<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $text = $_POST['text'];
    $sort = $_POST['sort'];
    $limit = $_POST['limit'];

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
   }
    
    $words = clean_text($text);
    $frequencies = calculate_word_frequencies($words);
    $frequencies = sort_word_frequencies($frequencies, $sort);
    print_r($frequencies);
};
?>