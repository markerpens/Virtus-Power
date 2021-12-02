<?php
// Start building the table
function start_table()
{
    echo "<table class=\" table table-light table-bordered table-hover\" border=\"1\">\n";
    echo "<thead>
    <tr><th>Athlete Name</th> 
    <th>Sex Division</th> 
    <th>Age Division</th> 
    <th>Equipment</th> 
    <th>Weight Class (Kg)</th> 
    <th>Best Squat (Kg)</th> 
    <th>Best Bench Press (Kg)</th> 
    <th>Best Deadlift (Kg)</th> 
    <th>Total (Kg)</th> 
    <th>Dots</th></tr>
    </thead>";
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
