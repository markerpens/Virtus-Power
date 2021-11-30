<?php
// Start building the table
function start_table()
{
    echo "<table class=\"table\" border=\"1\">\n";
    // echo "<tr><th style=\"text-align:left;width:150px\">Athlete Name</th> <th>Sex</th> <th>Age Division</th> <th>Equipment</th> <th>Weight Class</th> <th>Best Squat</th> <th>Best Bench Press</th> <th>Best Deadlift</th> <th>Total</th> </tr>";
}

// Create the powerlifting table on the main page
function powerlifting_table($name, $seggs, $division, $equipment, $weightclass, $s, $b, $d, $total, $strcoefficient)
{
    echo "<tr";
    echo "><td>$name</td>
			<td>$seggs</td>
			<td>$division</td>
			<td>$equipment</td> 
			<td>$weightclass</td>
			<td>$s</td>
            <td>$b</td>
            <td>$d</td>
            <td>$total</td>
            <td>$strcoefficient</td>
		</tr>";
}

// Create the details table on the details page
function details($name, $seggs, $division, $equipment, $weightclass, $s, $b, $d, $total, $strcoefficient, $lastmeet, $lastmeetlocation, $lastmeetdate,)
{
    echo "<h2>$name</h2>
			<p>Sex: $seggs</p>
			<p>Division: $division</p>
			<p>Equipment: $equipment</p> 
			<p>Weight Class: $weightclass</p>
			<p>Best Squat: $s</p>
            <p>Best Bench Press: $b</p>
            <p>Best Deadlift: $d</p>
            <p>Total: $total</p>
            <p>Dots: $strcoefficient</p>
            <p>Last Meet Name: $lastmeet</p>
            <p>Last Meet Location: $lastmeetlocation</p>
            <p>Last Meet Date: $lastmeetdate</p>";
}

// Stop building the table
function end_table()
{
    echo "</table>";
}
