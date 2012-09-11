<?php

    $con = mysql_connect('localhost', 'root', '');
    if (!$con)
    {
    die('Could not connect: ' . mysql_error());
    }
    $database ="MyDB";
    mysql_select_db($database, $con);
    
    $result = mysql_query("SELECT * FROM Calculation");
    echo "<table border='1'>
        <tr>
            <th>Longitude</th>
            <th>Latitude</th>
            <th>Distance</th>
            <th>Time Stamp</th>
        </tr>";
    while($row = mysql_fetch_array($result)){
        echo"<tr>";
            echo"<td>". $row['Longitude'] . "</td>";
            echo"<td>". $row['Latitude'] . "</td>";
            echo"<td>". $row['Distance'] . "</td>";
            echo"<td>". $row['TimeStamp'] . "</td>";
        echo"</tr>";
    }
    echo "</table>";
    mysql_close($con);
   echo "<br />";
   echo "<br />";
?>
<html>
    <head></head>
    <body>
         <a href="index.php">Back to main page</a>
         <br />
    </body>
</html>