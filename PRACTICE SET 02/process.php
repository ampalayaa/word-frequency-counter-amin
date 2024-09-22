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
        $common_words = [
            'the', 'a', 'an', // articles
            'and', 'but', 'or', 'nor', 'for', 'so', 'yet', // conjunctions
            'in', 'on', 'at', 'to', 'of', 'with', 'by', 'about', 
            'against', 'between', 'among', 'through', 'during', 
            'before', 'after', // prepositions
            'is', 'are', 'am', 'was', 'were', 'be', 'being', 'been', 
            'have', 'has', 'had', 'do', 'does', 'did' // other common words
        ]; // array of words to be ignored
        $pattern = '/\b(' . implode('|', $common_words) . ')\b/i'; // regex pattern ng iignore na words  
        $remove_articles = preg_replace($pattern, '', $remove_special_char);
        $lowered_txt = strtolower(trim($remove_articles));
        $cleaned = explode(' ', $lowered_txt);
        
        return array_filter($cleaned); // return non-empty values
    }
    
    $words = clean_text($text);
    print_r($words);
};
?>