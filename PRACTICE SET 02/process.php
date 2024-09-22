<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $text = $_POST['text'];
    $sort = $_POST['sort'];
    $limit = $_POST['limit'];

    // functions
    //cleaning text
    function clean_text($text) {
        $remove_special_char = preg_replace('/[^a-zA-Z\s]/', '', $text);
        $articles = ['the', 'a', 'an', 'for', 'and', 'nor', 'but', 'or', 'yet', 'so', 'is', 'are', 'am']; // array of words to be ignored
        $pattern = '/\b(' . implode('|', $articles) . ')\b/i'; // the regex pattern for articles, commmon verb, and conjuctions    
        $remove_articles = str_ireplace($pattern, '', $remove_special_char);
        $lowered_txt = strtolower($remove_articles);
        $words = explode(' ', $lowered_txt);
        return $words;
    }

};

?>