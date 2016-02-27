<?php

// to access the functions defined in template file
require('./lib/template.php');

// to access the class defined in DatabaseAdapter.php file
require('./lib/DatabaseAdapter.php');
        
// A Variable for your site name
$mySiteName = 'Assignment One'; 


function readz() {
    $daFile = fopen("data/words.txt", "r") or die("Unable to find file!");
    $words = fread($daFile,filesize("data/words.txt"));
    echo (strtolower($words));
    fclose($daFile);
}


?>