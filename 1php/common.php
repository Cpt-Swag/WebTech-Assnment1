<?php

// Things to note
// IMprove coupling
// Its way too tight right now
// try using parameters

// to access the functions defined in template file
require('./lib/template.php');

// to access the class defined in DatabaseAdapter.php file
require('./lib/DatabaseAdapter.php');
        
// A Variable for your site name
$mySiteName = 'Assignment One'; 

# function that'll read and print from a file (DEBUGGING)
function readz() {
    $daFile = fopen("data/small.txt", "r") or die("Unable to find file!");
    $words = fread($daFile,filesize("data/words.txt"));
    
    return $words;
    fclose($daFile);
}


# function that should generatea list of unique words (ignoring case) 
# and displays the words frequency
function uneeq_freeq() {
    $num_words = str_word_count(make_small(), 1);
    $frequency = array_count_values($num_words);

   return $frequency;
}// uneeqFreeq


# function that should generate a list of unique words (ignoring case)
#  displays its frequency and ignores a list of words	
function uneeq_freeq_sans_common() {
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


function sort_list() {
    $score = uneeq_freeq_sans_common();
    uasort($score, 'ascen_sort');
    
    return $score;
}


/* since words cannot have an average 
* if amount of words in list even
* the two middle words are returned
*/
function calc_median() {
    $list = sort_list();
    $countz = count($list); //total numbers in array
    $indexd = array_keys($list); //get the numerical indexes for the associative array
   
    if ($countz < 2) {
        return "Not enough words to calculate median!";
    }
    
    $mid = floor(($countz - 1) / 2) - floor(($countz - 1) / 2) + 1;
    
    if ($countz % 2 == 0) {// if there is an even number of elements
        return $indexd[$mid] . " and " . $indexd[$mid-1];
    } 
    
    return $indexd[$mid];
}


function calc_mode() {
    $score = sort_list();
    
    if (count($score) < 2) {
        return "Not enough words to calculate mode!";
    }
    
    $last = end($score);
    
    return key($score);
}


function calc_mean() {
    $score = uneeq_freeq_sans_common();
    if (count($score) < 2) {
        return "Not enough words to calculate mean!";
    }
    
    return floor(array_sum($score) / count($score));// rounds down average incase its a decimal
}

function calc_stdev() {
    $score = uneeq_freeq_sans_common();
    return standard_deviation($score);
}


//Standard dev function based off samples
function standard_deviation(array $a, $sample = false) {
    $n = count($a);
    if ($n === 0) {
        trigger_error("The array has zero elements", E_USER_WARNING);
        return false;
    }
    if ($sample && $n === 1) {
        trigger_error("The array has only 1 element", E_USER_WARNING);
        return false;
    }
    $mean = array_sum($a) / $n;
    $carry = 0.0;
    foreach ($a as $val) {
        $d = ((double) $val) - $mean;
        $carry += $d * $d;
    };
    if ($sample) {
        --$n;
    }
    
    return sqrt($carry / $n);
}

function calc_mmmstd(){
    $median = calc_median();
    $mode = calc_mode();
    $mean = calc_mean();
    $stdev = calc_stdev();
    //forming the array with the values
    $mmmstd = array('Median'=>$median,
                    'Mode'=>$mode,
                    'Mean'=>$mean,
                    'Standard Deviation'=>$stdev);
    return $mmmstd;
}


// Recursive sort function (ascending)
function ascen_sort($a, $b) {
    if ($a == $b) {
        return 0;
    }
    return ($a < $b) ? -1 : 1;
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
        // Query to database for a word using SQL
        $sql_select_word = "SELECT * FROM wordfrequency WHERE word = '$db_word'";
        // Query to database to update frequency using SQL
        $sql_update = "UPDATE wordfrequency SET frequency =  '$count' WHERE word =  '$words'";
         // Query to database to insert frequency using SQL
        $sql_insert = "INSERT INTO `wordfrequency` (`word`, `frequency`) VALUES ('$words' , '$freeq'); ";

        // // Query to database for a frequency using SQ
        //  $sql_select_freeq = "SELECT frequency FROM wordfrequency WHERE word = " . $db_word;
        // $row = $results->fetch_assoc();
        
        $get_word = $db->doQuery($sql_select_word);
        if ($get_word){
            $row = $get_word->fetch_assoc();
            $count = $row["frequency"];
            $count = $count + $freeq;
            // $sql_update = "UPDATE wordfrequency SET frequency =  '$count' WHERE word =  '$words'";
            $update_freeq = $db->doQuery($sql_update);
            
            if($update_freeq) {
                // echo "success";
            }
        }
        else{
            // $sql_insert = "INSERT INTO `wordfrequency` (`word`, `frequency`) VALUES ('$words' , '$freeq'); ";
            $result = $db->doQuery($sql_insert);
        }
      
         

         #EDIT To RE INSERT IN CODE
         
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
    

    }// db_setup






?>