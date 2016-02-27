<?php

// A user defined function to take a multidimensional array and put its data into an HTML table
function generateHtmlTable( $tableData ){

	// opening table tag
	echo '<table class="table table-bordered">';

	//first loop to go through our array
	foreach ($tableData as $key1 => $row) {
		
			// open row tags
			echo "<tr>";
			
			// second loop for arrays contained inside first array
			foreach ($row as $key2 => $rowdata) {
				echo "<td>";
				echo $rowdata;
				echo "</td>";
			}

			// close row tags
			echo "</tr>";
		}
		
	//closing table tag
	echo '</table>';

}
	
?>