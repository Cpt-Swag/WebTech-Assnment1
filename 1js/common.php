<?php

// to access the functions defined in template file
require('./lib/template.php');

// to access the class defined in DatabaseAdapter.php file
require('./lib/DatabaseAdapter.php');
        
// A Variable for your site name
$mySiteName = 'Assignment One'; 

// function to get list of courses
function getListOfCourses(){
	
	$courses = array();
	$db = new DatabaseAdapter();
	
	$sqlString = "Select id, title from courses";
	
	$results = $db->doQuery($sqlString);
	
	while ( ($row = $results->fetch_assoc() ) ) {
		$courses[] = $row;
	}
	
	return $courses;
	
}

// function to get list of course notes
function getListOfNotes( $courseid ){
	$notes = array();
	$db = new DatabaseAdapter();
	
	$sqlString = "Select title, content from notes where courseid=$courseid";
	
	$results = $db->doQuery($sqlString);
	
	while ( ($row = $results->fetch_assoc() ) ) {
		$notes[] = $row;
	}
	
	return $notes;
	
	
}











?>