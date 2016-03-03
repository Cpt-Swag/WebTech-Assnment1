<?php

// to access the functions defined in template file
require('./lib/template.php');

// to access the class defined in DatabaseAdapter.php file
require('./lib/DatabaseAdapter.php');
        
// A Variable for your site name
$mySiteName = 'Assignment One'; 

# function that'll read and print from a file (DEBUGGING)
function readz() {
    $daFile = fopen("data/words.txt", "r") or die("Unable to find file!");
    $words = fread($daFile,filesize("data/words.txt"));
    
    return $words;
    fclose($daFile);
}


# function that should generatea list of unique words (ignoring case) 
# and displays the words frequency
function uneeq_freeq() {
    // $tiny_words = strtolower(readz());
    $num_words = str_word_count(make_small(), 1);
    $frequency = array_count_values($num_words);

   return $frequency;;
}// uneeqFreeq


# function that should generate a list of unique words (ignoring case)
#  displays its frequency and ignores a list of words	
function uneeq_freeq_sans_common() {
    //  $tiny_words = strtolower(readz()); // stores all text to lower case
     $removed = remove_common_word(make_small()); //take out unwanted words
     $num_words = str_word_count($removed, 1);
     $frequency = array_count_values($num_words);

     return $frequency;

}// uneeqFreeq


function remove_common_word($input) {
    $common_words = array('the', 'it','his','her','a','be','i','in','not','there',
                            'is','are','was','were','this','that','and','has',
                            'had','to','you','me','at','so');
                            
    return preg_replace('/\b('.implode('|',$common_words).')\b/','',$input);
}// removeCommonWords

function make_small() {
    $tiny_words = strtolower(readz());
    
    return $tiny_words;
}

//function uneeqForm()
//{
//    $daFile = fopen("data/words.txt", "r") or die("Unable to find file!");
//    $words = fread($daFile,filesize("data/words.txt"));
//     // stores all text to lower case
//    $tinyWords = strtolower($words);
//    $rem = removeCommonWords($tinyWords);
//    $numWords = str_word_count($rem, 1);
//    $frequency = array_count_values($numWords);
//
//    return $frequency;
//}

function fnd_median($array) {
    uneeq_freeq_sans_common();
}

// read words store db
// read freeq srore db
// sql select statement to find words
// sql if return null
// add word nd free
// else select statement for freeq
// e.g seleect freequency where word is word
// add freeqs
// then update table

function db_setup() {
    // Variables for SQL string, query results, and row of data from table
    $sqlString = '';
    $db = false;
    $connection = false;
    $results = false;
    $row = false;
    
    $word_data = uneeq_freeq_sans_common();

    // A variable to create an instance of the database class
    $db = new DatabaseAdapter("frequencycounter");

    $connection = $db->getConnection();
    
     

     foreach ($word_data as $words => $value) {
        $db_word = $words; 
        $freeq = $value;
        // // Query to database for a word using SQL
        $sql_select_word = "SELECT * FROM wordfrequency WHERE word = '$db_word'";
        // // Query to database for a frequency using SQ
        //  $sql_select_freeq = "SELECT frequency FROM wordfrequency WHERE word = " . $db_word;
        // $row = $results->fetch_assoc();
        
        $get_word = $db->doQuery($sql_select_word);
        if ($get_word){
            $row = $get_word->fetch_assoc();
            $count = $row["frequency"];
            $count = $count + $freeq;
            $sql_update = "UPDATE wordfrequency SET frequency =  '$count' WHERE word =  '$words'";
            $update_freeq = $db->doQuery($sql_update);
            
            if($update_freeq) {
                // echo "success";
            }
        }
        else{
            $sql_insert = "INSERT INTO `wordfrequency` (`word`, `frequency`) VALUES ('$words' , '$freeq'); ";
            $result = $db->doQuery($sql_insert);
        }
      
         
         
        // if ($get_word == null) { // if word does not exist in the table
        //     $sql_insert = "INSERT INTO `wordfrequency` (`word`, `frequency`) VALUES (" .$db_word . "," . $freeq . "); ";
        //     $result = $db->doQuery($sql_insert);
        // }// if
        // else {
        //     $get_freeq = $db->doQuery($sql_select_freeq);
        //     $freeq_total = $get_freeq + $value;
        //     $sql_update = "UPDATE wordfrequency SET frequency = " . $freeq_total . "WHERE word = " . $get_word;
        //     $update_freeq = $db->doQuery($sql_update);
        // }// else     
   
      
     }// foreach
    

    // Read all records as associative arrays
    // Each column will be the key and the data in the table colum will be the value
    // // e.g.
    // $row = $results->fetch_assoc();
    // while ($row) {
    //     $myBooks[] = $row;
    //     $row = $results->fetch_assoc();
    }// db_setup




?>