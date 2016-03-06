<?php

function make_list($listStuff) {
    foreach ($listStuff as $words => $value) {
        echo $words . " appears " . $value . " times";
        echo "<br>";
    }
}

# A user defined function to take a multidimensional array and put its data into an HTML table
function make_table($tableStuff) {       
        echo '<table class="table table-bordered" style="width:50%">';
        // Row for headers
        echo "<tr>";
            echo "<th>" . "WORD" . "</th>";
            echo "<th>" . "SCORE" . "</th>";
        echo "</tr>";
        //Actually data
        foreach ($tableStuff as $word => $value) {
            echo "<tr>";
                echo "<td>" . $word . "</td>";
                echo "<td>" .  $value . "</td> ";
            echo "</tr>";
        }
         echo '</table>';
}

function make_diff_table($tableStuff) {       
        echo '<table class="table table-bordered" style="width:50%">';
        // Row for headers
        echo "<tr>";
            echo "<th>" . "FUNCTION" . "</th>";
            echo "<th>" . "RESULT" . "</th>";
        echo "</tr>";
        //Actually data
        foreach ($tableStuff as $word => $value) {
            echo "<tr>";
                echo "<td>" . $word . "</td>";
                echo "<td>" .  $value . "</td> ";
            echo "</tr>";
        }
         echo '</table>';
}
	
?>