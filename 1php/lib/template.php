<?php

function makeList($listStuff)
{
    foreach ($listStuff as $words => $value) {
        echo $words . " appears " . $value . " times";
        echo "<br>";
    }
}

// A user defined function to take a multidimensional array and put its data into an HTML table
function makeTabel($tableStuff)
{
        foreach ($tableStuff as $word => $value) {
        echo '<table class="table table-bordered" style="width:50%">';
            echo "<tr>";
                echo "<td>" . $word . "</td>";
                echo "<td>" .  $value . "</td> ";
            echo "</tr>";
        echo '</table>';
        }
}
	
?>