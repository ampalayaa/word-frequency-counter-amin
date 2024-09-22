<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $text = $_POST['text'];
    $sort = $_POST['sort'];
    $limit = $_POST['limit'];

    // functions
    //cleaning text
    function clean_text($text) {
        $text = preg_replace('/[\r\n]+/', ' ', $text); 
        $text = preg_replace('/\s+/', ' ', $text); // papalitan ng single space ang multiple space
        $remove_special_char = preg_replace('/[^a-zA-Z\s]/', '', $text);
        $articles = ['the', 'a', 'an', 'for', 'and', 'nor', 'but', 'or', 'yet', 'so', 'is', 'are', 'am']; // array of words to be ignored
        $pattern = '/\b(' . implode('|', $articles) . ')\b/i'; // regex pattern for articles, common verbs, and conjunctions    
        $remove_articles = preg_replace($pattern, '', $remove_special_char);
        $lowered_txt = strtolower(trim($remove_articles));
        $cleaned = explode(' ', $lowered_txt);
        
        return array_filter($cleaned); // return non-empty values
    }
    
    $words = clean_text($text);
    print_r($words);
};
?>