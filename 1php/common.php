<?php

// to access the functions defined in template file
require('./lib/template.php');

// to access the class defined in DatabaseAdapter.php file
require('./lib/DatabaseAdapter.php');
        
// A Variable for your site name
$mySiteName = 'Assignment One'; 

// function that'll read and print from a file (DEBUGGING)
// function readz() {
//     $daFile = fopen("data/words.txt", "r") or die("Unable to find file!");
//     $words = fread($daFile,filesize("data/words.txt"));
//     // forces all text to lower case
//     echo (strtolower($words));
//     fclose($daFile);
// }

// function that should generate	a list of unique words (ignoring case) and its frequency	
// function uneeqFreeq() {
//     $daFile = fopen("data/words.txt", "r") or die("Unable to find file!");
//     $words = fread($daFile,filesize("data/words.txt"));
//      // stores all text to lower case
//     $tinyWords = strtolower($words);
//     $numWords = str_word_count($tinyWords, 1);
//     $frequency = array_count_values($numWords);

//     echo '<pre>';
//     print_r($frequency);
//     echo '</pre>';
    
//     fclose($daFile);
// }// uneeqFreeq


// function that should generate a list of unique words (ignoring case)
//  displays its frequency and ignores a list of words	
function uneeqFreeqSansCommon() {
    $daFile = fopen("data/words.txt", "r") or die("Unable to find file!");
    $words = fread($daFile,filesize("data/words.txt"));
     // stores all text to lower case
    $tinyWords = strtolower($words);
    $rem = removeCommonWords($tinyWords);
    $numWords = str_word_count($rem, 1);
    $frequency = array_count_values($numWords);

    echo '<pre>';
    print_r($frequency);
    echo '</pre>';
    
    fclose($daFile);
}// uneeqFreeq

function removeCommonWords($input){
$commonWords = array('the', 'it','his','her','a','be','i','in','not','there','is','are','was','were','this','that','and','has','had','to','you','me','at','so');
return preg_replace('/\b('.implode('|',$commonWords).')\b/','',$input);
}// removeCommonWords

// $result = array();

// function sansCommon() {
// $daFile = fopen("data/words.txt", "r") or die("Unable to find file!");
// $words = fread($daFile,filesize("data/words.txt"));
//     // stores all text to lower case
// $tinyWords = strtolower($words);
// $rem = removeCommonWords($tinyWords);
// $numWords = str_word_count($rem, 1);
// $frequency = array_count_values($numWords);

// // $result = array();
// $result = $frequency;

// return $result;
// fclose($daFile);
// }// uneeqFreeq


?>